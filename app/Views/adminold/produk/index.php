<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>


<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Produk</h1>
            </div>
            </br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?php echo base_url() . "admin/produk/tambah" ?>" class="btn btn-primary me-md-2"> + Tambah Produk</a>
            </div>
        </div>
        <div class="tab-content" id="orders-table-tab-content">
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center" valign="middle">Nama Produk (In)</th>
                                        <th class="text-center" valign="middle">Nama Produk (En)</th>
                                        <th class="text-center" valign="middle">Deskripsi Produk (In)</th>
                                        <th class="text-center" valign="middle">Deskripsi Produk (En)</th>
                                        <th class="text-center" valign="middle">Foto Produk</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($all_data_produk as $tampilProduk) : ?>
                                        <tr>
                                            <td><?= $tampilProduk->nama_produk_in ?></td>
                                            <td><?= $tampilProduk->nama_produk_en ?></td>
                                            <td><?= $tampilProduk->deskripsi_produk_in ?></td>
                                            <td><?= $tampilProduk->deskripsi_produk_en ?></td>
                                            <td><img src="<?= base_url() . 'asset-user/images/' . $tampilProduk->foto_produk ?>" class="img-fluid" alt="Foto Produk"></td>
                                            <td valign="middle">
                                                <div class="d-grid gap-2">
                                                    <a href="<?= base_url('admin/produk/delete') . '/' . $tampilProduk->id_produk ?>" class="btn btn-danger">Hapus</a>
                                                    <a href="<?= base_url('admin/produk/edit') . '/' . $tampilProduk->id_produk ?>" class="btn btn-primary">Ubah</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<?= $this->endSection('content') ?>