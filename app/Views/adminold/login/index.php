<?= $this->extend('admin/template/login'); ?>
<?= $this->Section('content'); ?>

<div class="row g-0 app-auth-wrapper">
	<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		<div class="d-flex flex-column align-content-end">
			<div class="app-auth-body mx-auto">
				<div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="<?php echo base_url('assets/images/app-logo.svg'); ?>" alt="logo"></a></div>
				<h2 class="auth-heading text-center mb-5">Log in to Bookoo</h2>
				<div class="auth-form-container text-start">
					<?php if (!empty(session()->getFlashdata('error'))) : ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<?php echo session()->getFlashdata('error'); ?>
						</div>
					<?php endif; ?>
					<?php if (session()->get('isLoggedIn')) : ?>
						<div class="alert alert-info" role="alert">
							Anda telah login. Silakan logout terlebih dahulu.
						</div>
					<?php endif; ?>
					<form class="auth-form login-form" method="post" action="<?php echo base_url('login/process'); ?>">
						<?= csrf_field(); ?>
						<div class="email mb-3">
							<label class="sr-only" for="username">Username</label>
							<input id="username" name="username" type="text" class="form-control username" placeholder="username" required="required">
						</div><!--//form-group-->
						<div class="password mb-3">
							<label class="sr-only" for="password">Password</label>
							<input id="password" name="password" type="password" class="form-control password" placeholder="password" required="required">
						</div><!--//form-group-->
						<div class="text-center">
							<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
						</div>
					</form>
				</div><!--//auth-form-container-->

			</div><!--//auth-body-->
		</div><!--//flex-column-->
	</div><!--//auth-main-col-->
	<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		<div class="auth-background-holder">
		</div>
		<div class="auth-background-mask"></div>
		<div class="auth-background-overlay p-3 p-lg-5">
			<div class="d-flex flex-column align-content-end h-100">
				<div class="h-100"></div>
			</div>
		</div><!--//auth-background-overlay-->
	</div><!--//auth-background-col-->
</div><!--//row-->

<?= $this->endSection('content'); ?>