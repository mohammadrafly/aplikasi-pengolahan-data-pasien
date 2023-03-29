<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

									<!--begin Card-->
									<div class="card">
										<!--begin Card header-->
										<div class="card-header border-0 pt-6">
											<div class="card-title">
												<!--begin Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<!--begin Svg Icon | path: icons/duotune/general/gen021.svg-->
													<span class="svg-icon svg-icon-1 position-absolute ms-6">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
													<!--end Svg Icon-->
													<input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-14" placeholder="Cari user" />
												</div>
												<!--end Search-->
											</div>
											<!--begin Card toolbar-->
											<div class="card-toolbar">
												<!--begin Toolbar-->
												<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
													<!--begin Add user-->
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
													<!--begin Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
															<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
														</svg>
													</span>
													<!--end Svg Icon-->Add User</button>
													<!--end Add user-->
												</div>
												<!--end Toolbar-->
												<!--begin Modal - Add task-->
												<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
													<!--begin Modal dialog-->
													<div class="modal-dialog modal-dialog-centered mw-650px">
														<!--begin Modal content-->
														<div class="modal-content">
															<!--begin Modal header-->
															<div class="modal-header" id="kt_modal_add_user_header">
																<!--begin Modal title-->
																<h2 class="fw-bold modal-title">Add User</h2>
																<!--end Modal title-->
																<!--begin Close-->
																<div class="btn btn-icon btn-sm btn-active-icon-primary close" data-kt-users-modal-action="close">
																	<!--begin Svg Icon | path: icons/duotune/arrows/arr061.svg-->
																	<span class="svg-icon svg-icon-1">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																			<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
																		</svg>
																	</span>
																	<!--end Svg Icon-->
																</div>
																<!--end Close-->
															</div>
															<!--end Modal header-->
															<!--begin Modal body-->
															<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
																<!--begin Form-->
																<form id="form" class="form">
																	<!--begin Scroll-->
																	<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
																		<input hidden name="id" id="id">
																		<div class="fv-row mb-7">
																			<label class="required fw-semibold fs-6 mb-2">Full Name</label>
																			<input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name"/>
																		</div>
																		<div class="fv-row mb-7">
																			<label class="required fw-semibold fs-6 mb-2">Username</label>
																			<input type="text" name="username" id="username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="username"/>
																		</div>
																		<div class="fv-row mb-7">
																			<label class="required fw-semibold fs-6 mb-2">Email</label>
																			<input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com"/>
																		</div>
																		<div class="fv-row mb-7" id="pass">
																			<label class="required fw-semibold fs-6 mb-2">Password</label>
																			<input type="password" name="password" id="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="qwerty123"/>
																		</div>
																		<div class="fv-row mb-7">
																			<label class="required fw-semibold fs-6 mb-2">Alamat</label>
																			<textarea type="text" name="alamat" id="alamat" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="alamat"></textarea>
																		</div>
																		<div class="mb-7">
																			<label class="required fw-semibold fs-6 mb-5">Jenis Kelamin</label>
																			<div class="d-flex fv-row">
																				<div class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input me-3" name="jenis_kelamin" type="radio" value="laki-laki" />
																					<label class="form-check-label">
																						<div class="fw-bold text-gray-800">Laki-Laki</div>
																					</label>
																				</div>
																			</div>
																			<div class='separator separator-dashed my-5'></div>
																			<div class="d-flex fv-row">
																				<div class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input me-3" name="jenis_kelamin" type="radio" value="perempuan" />
																					<label class="form-check-label">
																						<div class="fw-bold text-gray-800">Perempuan</div>
																					</label>
																				</div>
																			</div>
																		</div>
																		<div class="mb-7">
																			<label class="required fw-semibold fs-6 mb-5">Role</label>
																			<div class="d-flex fv-row">
																				<div class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input me-3" name="role" type="radio" value="admin" />
																					<label class="form-check-label">
																						<div class="fw-bold text-gray-800">Administrator</div>
																					</label>
																				</div>
																			</div>
																			<div class='separator separator-dashed my-5'></div>
																			<div class="d-flex fv-row">
																				<div class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input me-3" name="role" type="radio" value="bidan" />
																					<label class="form-check-label">
																						<div class="fw-bold text-gray-800">Bidan</div>
																					</label>
																				</div>
																			</div>
																			<div class='separator separator-dashed my-5'></div>
																			<div class="d-flex fv-row">
																				<div class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input me-3" name="role" type="radio" value="pasien"/>
																					<label class="form-check-label">
																						<div class="fw-bold text-gray-800">Pasien</div>
																					</label>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--end Scroll-->
																	<!--begin Actions-->
																	<div class="text-center pt-15">
																		<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
																		<button onclick="saveUser()" class="btn btn-primary">
																			<span class="indicator-label">Save</span>
																		</button>
																	</div>
																	<!--end Actions-->
																</form>
																<!--end Form-->
															</div>
															<!--end Modal body-->
														</div>
														<!--end Modal content-->
													</div>
													<!--end Modal dialog-->
												</div>
												<!--end Modal - Add task-->
											</div>
											<!--end Card toolbar-->
										</div>
										<!--end Card header-->
										<!--begin Card body-->
										<div class="card-body py-4">
											<!--begin Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
												<!--begin Table head-->
												<thead>
													<!--begin Table row-->
													<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
														<th class="min-w-125px">Nama</th>
														<th class="min-w-125px">Email</th>
														<th class="min-w-125px">Username</th>
														<th class="min-w-125px">Role</th>
														<th class="min-w-125px">Create Date</th>
														<th class="min-w-125px">Update Date</th>
														<th class="text-end min-w-100px">Actions</th>
													</tr>
													<!--end Table row-->
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<?php foreach($data as $row): ?>
													<tr>
														<td><?= $row['name'] ?></td>
														<td>
															<?php if($row['email'] === ''): ?>
																<div class="badge badge-light fw-bold">NULL</div>
															<?php else: ?>
																<?= $row['email'] ?>
															<?php endif ?>
														</td>
														<td>
															<?php if($row['username'] === ''): ?>
																<div class="badge badge-light fw-bold">NULL</div>
															<?php else: ?>
																<?= $row['username'] ?>
															<?php endif ?>	
														</td>
														<td>
															<?php if($row['role'] === 'pasien'): ?>
																<div class="badge badge-success fw-bold"><?= $row['role'] ?></div>
															<?php elseif($row['role'] === 'bidan'): ?>
																<div class="badge badge-primary fw-bold"><?= $row['role'] ?></div>
															<?php else: ?>
																<div class="badge badge-light fw-bold"><?= $row['role'] ?></div>
															<?php endif ?>
														</td>
														<td><?= $row['created_at'] ?></td>
														<td><?= $row['updated_at'] ?></td>
														<td class="text-end">
															<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
															<span class="svg-icon svg-icon-5 m-0">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															</a>
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
																<div class="menu-item px-3">
																	<a onclick="editUser(<?= $row['id']?>)" class="menu-link px-3">Update</a>
																</div>
																<div class="menu-item px-3">
																	<a onclick="deleteUser(<?= $row['id']?>)" class="menu-link px-3">Delete</a>
																</div>
															</div>
														</td>
													</tr>
													<?php endforeach ?>
													<!--end Table row-->
												</tbody>
												<!--end Table body-->
											</table>
											<!--end Table-->
										</div>
										<!--end Card body-->
									</div>
									<!--end Card-->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  
<script>
	const searchInput = document.getElementById('searchInput');
	const tableRows = document.querySelectorAll('#kt_table_users tbody tr');

	searchInput.addEventListener('keyup', function(event) {
	const searchValue = event.target.value.toLowerCase();

	tableRows.forEach(row => {
		const name = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
		const email = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
		const username = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
		const role = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

		if (name.includes(searchValue)) {
			row.style.display = '';
		} else if (email.includes(searchValue)) {
			row.style.display = '';
		} else if (username.includes(searchValue)) {
			row.style.display = '';
		} else if (role.includes(searchValue)) {
			row.style.display = '';
		} else {
			row.style.display = 'none';
		}
	});
	});
</script>
<script src="<?= base_url('assets/js/custom/Users.js') ?>"></script>
<?= $this->endSection() ?>