<?= $this->extend('layout/authLayout') ?>

<?= $this->section('content') ?>  

                            <form class="form w-100" id="SignIn">
								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Sign In</h1>
									<div class="text-gray-500 fw-semibold fs-6">Aplikasi Pengolahan Data Pasien</div>
									<?php if (!empty(session()->getFlashdata('error'))) : ?>
										<div class="alert alert-warning alert-dismissible fade show" role="alert">
											<?php echo session()->getFlashdata('error'); ?>
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
									<?php endif; ?>
								</div>
								<div class="fv-row mb-8">
									<input type="text" placeholder="Email/Username" name="username" autocomplete="off" class="form-control bg-transparent" />
								</div>
								<div class="fv-row mb-3">
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
								</div>
								<div class="d-grid mb-10">
									<button type="submit" class="btn btn-primary">
										<span class="indicator-label">Sign In</span>
									</button>
								</div>
							</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  
<script src="<?= base_url('assets/js/custom/auth/signIn.js') ?>"></script>
<?= $this->endSection() ?>