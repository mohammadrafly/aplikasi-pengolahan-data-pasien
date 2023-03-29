<?= $this->extend('layout/authLayout') ?>

<?= $this->section('content') ?>  

                            <form class="form w-100" id="SignUp">
								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
									<div class="text-gray-500 fw-semibold fs-6">Aplikasi Pengolahan Data Pasien</div>
								</div>
                                <div class="fv-row mb-8">
									<input type="text" placeholder="Name" name="name" id="name" autocomplete="off" class="form-control bg-transparent" required/>
								</div>
                                <div class="fv-row mb-8">
									<input type="text" placeholder="Username" name="username" id="username" autocomplete="off" class="form-control bg-transparent" required/>
								</div>
								<div class="fv-row mb-8">
									<input type="email" placeholder="Email" name="email" id="email" autocomplete="off" class="form-control bg-transparent" required/>
								</div>
								<div class="fv-row mb-8" data-kt-password-meter="true">
									<div class="mb-1">
										<div class="position-relative mb-3">
											<input class="form-control bg-transparent" type="password" placeholder="Password" name="password" id="password" autocomplete="off" required/>
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
										</div>
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
									</div>
									<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
								</div>
								<div class="fv-row mb-8">
									<input placeholder="Repeat Password" name="password_confirmation" id="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent" required/>
								</div>
								<div class="d-grid mb-10">
									<button type="submit" class="btn btn-primary">
										<span class="indicator-label">Sign up</span>
									</button>
								</div>
								<div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
								<a href="<?= base_url('sign-in') ?>" class="link-primary fw-semibold">Sign in</a></div>
							</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  
<script src="<?= base_url('assets/js/custom/auth/signUp.js') ?>"></script>
<?= $this->endSection() ?>