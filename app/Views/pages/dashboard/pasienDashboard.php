<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  
<?= $this->include('pages/partials/createKunjungan') ?>
									<div class="card">
										<div class="card-header border-0 pt-6">
											<div class="card-title">
												<div class="d-flex align-items-center position-relative my-1">
													<span class="svg-icon svg-icon-1 position-absolute ms-6">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
													<input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-14" placeholder="Cari kunjungan" />
												</div>
											</div>
											<div class="card-toolbar">
											    <div class="d-flex justify-content-end" data-kt-kunjungan-table-toolbar="base">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
													<span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
															<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
														</svg>
													</span>
													Add Kunjungan</button>
												</div>
												<div class="modal fade" id="kt_modal_add_kunjungan" tabindex="-1" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered mw-650px">
														<div class="modal-content">
															<div class="modal-header" id="kt_modal_add_kunjungan_header">
																<h2 class="fw-bold">Detail Kunjungan</h2>
																<div class="btn btn-icon btn-sm btn-active-icon-primary closed">
																	<span class="svg-icon svg-icon-1">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																			<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
																		</svg>
																	</span>
																</div>
															</div>
															<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
																<form id="form" method="POST">
																	<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_kunjungan_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_kunjungan_header" data-kt-scroll-wrappers="#kt_modal_add_kunjungan_scroll" data-kt-scroll-offset="300px">
                                                                    	<input type="text" name="id" id="id" hidden/>
																		<input type="text" name="kode_kunjungan" id="kode_kunjungan" hidden/>
																		<div class="fv-row mb-3">
																			<label class="required fw-semibold fs-6 mb-2">Full Name</label>
																			<input disabled type="text" name="full_name" id="full_name" class="form-control form-control-solid mb-3 mb-lg-0" />
																		</div>
																		<div class="fv-row mb-7">
																			<label class="required fw-semibold fs-6 mb-2">Kode Pasien</label>
																			<input disabled  type="text" name="kode_pasien" id="kode_pasien" class="form-control form-control-solid mb-3 mb-lg-0" />
																		</div>
																		<div class="fv-row mb-7">
																			<label class="required fw-semibold fs-6 mb-2">Gejala/Keluhan</label>
																			<input disabled  type="text" name="keluhan" id="keluhan" class="form-control form-control-solid mb-3 mb-lg-0" />
																		</div>
																		<div class="fv-row mb-7">
																			<label class="required fw-semibold fs-6 mb-2">Diagnosa</label>
																			<input disabled  type="text" name="diagnosa" id="diagnosa" class="form-control form-control-solid mb-3 mb-lg-0" />
																		</div>
																		<div class="text-center pt-15">
																			<button type="submit" class="btn btn-primary">
																				<span class="indicator-label">Cetak Nota</span>
																			</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card-body py-4">
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_kunjungan">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_kunjungan .form-check-input" value="1" />
															</div>
														</th>
														<th class="min-w-125px">Kode Pasien</th>
														<th class="min-w-125px">Nama</th>
														<th class="min-w-125px">Gejala/Keluhan</th>
                                                        <th class="min-w-125px">Diagnosa</th>
														<th class="min-w-125px">Hari/Tanggal</th>
														<th class="text-end min-w-100px">Actions</th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<?php foreach($data as $row): ?>
													<tr>
														<td>
															<div class="form-check form-check-sm form-check-custom form-check-solid">
																<input class="form-check-input" type="checkbox" value="<?= $row['id_kunjungan'] ?>" />
															</div>
														</td>
														<td><?= $row['kode_pasien'] ?></td>
														<td><?= $row['full_name'] ?></td>
														<td><?= $row['keluhan'] ?></td>
                                                        <td><?= $row['diagnosa'] ?></td>
														<td><?= $row['tanggal'] ?></td>
														<td class="text-end">
															<a onclick="editKunjungan(<?= $row['id_kunjungan'] ?>)" class="btn btn-success btn-active-success-primary btn-sm" data-kt-menu-placement="bottom-end">Detail</a>
															<a onclick="deleteKunjungan(<?= $row['id_kunjungan']?>)" class="btn btn-danger btn-active-danger-primary btn-sm" data-kt-menu-placement="bottom-end">Delete</a>
															
														</td>
													</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>
									</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  
<script>
	const form = document.getElementById('kt_modal_create_campaign_stepper_form');

	form.addEventListener('keydown', (event) => {
	if (event.key === 'Enter') {
		event.preventDefault();
	}
	});

	const searchInput = document.getElementById('searchInput');
	const tableRows = document.querySelectorAll('#kt_table_kunjungan tbody tr');

	searchInput.addEventListener('keyup', function(event) {
	const searchValue = event.target.value.toLowerCase();

	tableRows.forEach(row => {
            const name = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const quantity = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const last_update = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

            if (name.includes(searchValue)) {
                row.style.display = '';
            } else if (quantity.includes(searchValue)) {
                row.style.display = '';
            } else if (last_update.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
	});

	// The DOM elements you wish to replace with Tagify
	var gejala = document.querySelector("#gejala");

	// Initialize Tagify components on the above inputs
	new Tagify(gejala);

	var input = document.querySelector("#id_stok");

	fetch(base_url + 'dashboard/stok/json')
    .then(response => response.json())
    .then(data => {
        if (!Array.isArray(data)) {
            throw new Error('Data is not an array!');
        }

        const dataStok = data.map(item => ({ id: item.id ,name: item.name }));

        const tagifyConfig = {
            whitelist: dataStok.map(item => `${item.id} - ${item.name}`),
            maxTags: 10,
            dropdown: {
                maxItems: 20,
                classname: "tagify-dropdown",
                enabled: 0,
                closeOnSelect: false
            }
        };

        new Tagify(input, tagifyConfig);
    })
    .catch(error => console.error(error));

	var pasien = document.querySelector("#pasien");

	fetch(base_url + 'dashboard/users/json')
    .then(response => response.json())
    .then(data => {
        if (!Array.isArray(data)) {
            throw new Error('Data is not an array!');
        }

        const dataUser = data.map(item => ({ kode_pasien: item.kode_pasien, name: item.name }));

        const tagifyConfig = {
            whitelist: dataUser.map(item => `${item.kode_pasien} - ${item.name}`),
            maxTags: 1,
            dropdown: {
                maxItems: 20,
                classname: "tagify-dropdown",
                enabled: 0,
                closeOnSelect: false
            }
        };

        new Tagify(pasien, tagifyConfig);
    })
    .catch(error => console.error(error));

	function doPembayaran() {
		var url = base_url + 'dashboard/pembayaran/' + id;
		var id = $("#id").val();
		$.ajax({
			url : url,
			type: 'POST',
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(respond){
				Swal.fire({
					icon: respond.icon,
					title: respond.title,
					text: respond.text,
					timer: 3000,
					showCancelButton: false,
					showConfirmButton: false
				});
			},
			error: function (respond, jqXHR, textStatus, errorThrown) {
				Swal.fire({
					icon: 'error',
					title: textStatus,
					text: errorThrown,
					timer: 3000,
					showCancelButton: false,
					showConfirmButton: false
				});
			}
		});
	}

	function editKunjungan(id) {
		save_method = 'update';
		$('#form').attr('action', `${base_url}dashboard/pembayaran/${id}`); 
		$.ajax({
			url : base_url + 'dashboard/pasien/detail/' + id,
			type: "GET",
			dataType: "JSON",
			success: function(respond)
			{
				$('[name="id"]').val(respond[0].id_kunjungan);
				$('[name="full_name"]').val(respond[0].full_name);
				$('[name="kode_pasien"]').val(respond[0].kode_pasien);
				$('[name="kode_kunjungan"]').val(respond[0].kode_kunjungan);
				$('[name="keluhan"]').val(respond[0].keluhan);
				$('[name="diagnosa"]').val(respond[0].diagnosa);
				$('#kt_modal_add_kunjungan').modal('show');
				$('.modal-title').text('Edit Kunjungan'); 
				console.log(respond)
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				Swal.fire({
					icon: 'error',
					title: textStatus,
					text: errorThrown,
				});
			}
		});
	}

	function deleteKunjungan(id) {
		Swal.fire({
			title: 'Anda yakin?',
			text: "Aksi ini tidak dapat dipulihkan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!'
		}).then(function (result) {
			if (result.value) {
				$.ajax({
					url: base_url + 'dashboard/pasien/delete/' + id,
					type: "GET",
					dataType: 'JSON',
					success: function (data) {
						swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Kunjungan berhasil dihapus!',
							showConfirmButton: false,
							timer: 2000
						}).then (function() {
							location.reload();
						});
					},
					error: function (textStatus, jqXHR, errorThrown) {
						Swal.fire({
							icon: 'error',
							title: textStatus,
							text: errorThrown,
						});
					}
				});
			};
		});
	}
	</script>
<script src="<?= base_url('assets/js/custom/utilities/modals/create-campaign.js') ?>"></script>
<?= $this->endSection() ?>