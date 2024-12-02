<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<h1 class="app-page-title">Ubah Profil Perusahaan</h1>
		<?php if (!empty(session()->getFlashdata('error'))) : ?>
			<div class="alert alert-danger" role="alert">
				<h4>Error</h4>
				<p><?php echo session()->getFlashdata('error'); ?></p>
			</div>
		<?php endif; ?>
		<?php if (session()->has('success')) : ?>
			<div class="alert alert-success">
				<?= session('success') ?>
			</div>
		<?php endif; ?>
		<div class="row gy-4">
			<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-startmb-4 mt-4">
				<div class="app-card-body px-4 w-100">
					<form action="<?= base_url('admin/profil/proses_edit'); ?>" method="post" enctype="multipart/form-data">
						<?= csrf_field() ?>
						<div class="mb-3">
							<label for="nama_perusahaan" class="form-label mt-4">Nama Perusahaan</label>
							<input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $profil_pengguna->nama_perusahaan; ?>" required>
						</div>
						<div class="mb-3">
							<label for="deskripsi_perusahaan_in" class="form-label">Deskripsi Perusahaan (Indonesia)</label>
							<textarea class="form-control tiny" id="deskripsi_perusahaan_in" name="deskripsi_perusahaan_in"><?= $profil_pengguna->deskripsi_perusahaan_in; ?></textarea>
						</div>
						<div class="mb-3">
							<label for="deskripsi_perusahaan_en" class="form-label">Deskripsi Perusahaan (Inggris)</label>
							<textarea class="form-control tiny" id="deskripsi_perusahaan_en" name="deskripsi_perusahaan_en"><?= $profil_pengguna->deskripsi_perusahaan_en; ?></textarea>
						</div>
						<div class="mb-3">
							<label for="title_website" class="form-label">Slogan</label>
							<input type="text" class="form-control" id="title_website" name="title_website" value="<?= $profil_pengguna->title_website; ?>" required>
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<textarea class="form-control tiny" id="alamat" name="alamat"><?= $profil_pengguna->alamat; ?></textarea>
						</div>
						<div class="mb-3">
							<label for="deskripsi_kontak_in" class="form-label">Deskripsi Kontak (Indonesia)</label>
							<textarea class="form-control tiny" id="deskripsi_kontak_in" name="deskripsi_kontak_in"><?= $profil_pengguna->deskripsi_kontak_in; ?></textarea>
						</div>
						<div class="mb-3">
							<label for="deskripsi_kontak_en" class="form-label">Deskripsi Kontak (Inggris)</label>
							<textarea class="form-control tiny" id="deskripsi_kontak_en" name="deskripsi_kontak_en"><?= $profil_pengguna->deskripsi_kontak_en; ?></textarea>
						</div>
						<div class="mb-3">
							<label for="link_maps" class="form-label">Link Maps</label>
							<textarea style="height: 8em;" class="form-control" type="text" id="link_maps" name="link_maps" rows="3"><?= $profil_pengguna->link_maps; ?></textarea>
						</div>
						<div class="mb-3">
							<label for="link_whatsapp" class="form-label">Link WhatsApp</label>
							<input type="text" class="form-control" id="link_whatsapp" name="link_whatsapp" value="<?= $profil_pengguna->link_whatsapp; ?>">
						</div>
						<div class="mb-3">
							<label for="no_hp" class="form-label">No Telepon</label>
							<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $profil_pengguna->no_hp; ?>">
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input class="form-control" id="email" name="email" value="<?= $profil_pengguna->email; ?>">
						</div>
						<div class="mb-3">
							<label for="teks_footer" class="form-label">Teks Footer</label>
							<input class="form-control" id="teks_footer" name="teks_footer" value="<?= $profil_pengguna->teks_footer; ?>">
						</div>
						<div class="mb-3">
							<label for="favicon_website" class="form-label">Favicon Website</label>
							<input type="file" class="form-control" id="favicon_website" name="favicon_website">
							<img width="150px" class="img-thumbnail" src="<?= base_url() . "asset-user/images/" . $profil_pengguna->favicon_website; ?>">
						</div>
						<div class="mb-3">
							<label for="logo_perusahaan" class="form-label">Logo Perusahaan</label>
							<input type="file" class="form-control" id="logo_perusahaan" name="logo_perusahaan">
							<img width="150px" class="img-thumbnail" src="<?= base_url() . "asset-user/images/" . $profil_pengguna->logo_perusahaan; ?>">
						</div>
						<div class="mb-3">
							<label for="foto_utama" class="form-label">Foto Utama</label>
							<input type="file" class="form-control" id="foto_utama" name="foto_utama">
							<img width="150px" class="img-thumbnail" src="<?= base_url() . "asset-user/images/" . $profil_pengguna->foto_utama; ?>">
							<p>*Ukuran foto maksimal 1900x1144 pixels</p>
							<p>*Foto harus berekstensi jpg/png/jpeg</p>
						</div>
						<!-- Tambahkan kolom lain yang perlu diubah sesuai dengan struktur tabel tb_profil -->
						<div class="mt-4">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-secondary">Batal</a>
						</div>
					</form>
				</div><!--//app-card-body-->
			</div><!--//app-card-->
		</div><!--//row-->
	</div><!--//container-xl-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>