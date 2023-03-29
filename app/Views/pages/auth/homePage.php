<?= $this->extend('layout/authLayout') ?>

<?= $this->section('content') ?>  

                            <form class="form w-100" novalidate="novalidate">
								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Sign In or Sign Up</h1>
									<div class="text-gray-500 fw-semibold fs-6">Aplikasi Pengolahan Data Pasien</div>
								</div>
                                <div class="row g-3 mb-9">
									<div class="col-md-6">
										<a href="<?= base_url('sign-in') ?>" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">Sign in</a>
									</div>
									<div class="col-md-6">
										<a href="<?= base_url('sign-up') ?>" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">Sign up</a>
									</div>
								</div>
							</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  

<?= $this->endSection() ?>