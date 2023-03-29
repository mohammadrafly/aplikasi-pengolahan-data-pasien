<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

                                    <div class="row gy-5 g-xl-10">
										<!--begin::Col-->
										<div class="col-xl-4 mb-xl-10">
											<!--begin::Engage widget 1-->
											<div class="card h-md-100" dir="ltr">
												<!--begin::Body-->
												<div class="card-body d-flex flex-column flex-center">
													<!--begin::Heading-->
													<div class="mb-2">
														<!--begin::Title-->
														<h1 class="fw-semibold text-gray-800 text-center lh-lg">Quick form to
														<br />
														<span class="fw-bolder">Bid a New Shipment</span></h1>
														<!--end::Title-->
														<!--begin::Illustration-->
														<div class="py-10 text-center">
															<img src="assets/media/svg/illustrations/easy/3.svg" class="theme-light-show w-200px" alt="" />
															<img src="assets/media/svg/illustrations/easy/3-dark.svg" class="theme-dark-show w-200px" alt="" />
														</div>
														<!--end::Illustration-->
													</div>
													<!--end::Heading-->
													<!--begin::Links-->
													<div class="text-center mb-1">
														<!--begin::Link-->
														<a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_bidding" data-bs-toggle="modal">Start Now</a>
														<!--end::Link-->
														<!--begin::Link-->
														<a class="btn btn-sm btn-light" href="../../demo1/dist/apps/invoices/view/invoice-2.html">Quick Guide</a>
														<!--end::Link-->
													</div>
													<!--end::Links-->
												</div>
												<!--end::Body-->
											</div>
											<!--end::Engage widget 1-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-xl-8 mb-5 mb-xl-10">
											<!--begin::Row-->
											<div class="row g-lg-5 g-xl-10">
												<!--begin::Col-->
												<div class="col-md-6 col-xl-6 mb-5 mb-xl-10">
													<!--begin::Card widget 12-->
													<div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
														<!--begin::Card body-->
														<div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
															<!--begin::Statistics-->
															<div class="mb-4 px-9">
																<!--begin::Info-->
																<div class="d-flex align-items-center mb-2">
																	<!--begin::Value-->
																	<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">47,769,700</span>
																	<!--end::Value-->
																	<!--begin::Label-->
																	<span class="d-flex align-items-end text-gray-400 fs-6 fw-semibold">Tons</span>
																	<!--end::Label-->
																</div>
																<!--end::Info-->
																<!--begin::Description-->
																<span class="fs-6 fw-semibold text-gray-400">Total Online Sales</span>
																<!--end::Description-->
															</div>
															<!--end::Statistics-->
															<!--begin::Chart-->
															<div id="kt_card_widget_12_chart" class="min-h-auto" style="height: 125px"></div>
															<!--end::Chart-->
														</div>
														<!--end::Card body-->
													</div>
													<!--end::Card widget 12-->
													<!--begin::Card widget 10-->
													<div class="card card-flush h-md-50 mb-lg-10">
														<!--begin::Header-->
														<div class="card-header pt-5">
															<!--begin::Title-->
															<div class="card-title d-flex flex-column">
																<!--begin::Amount-->
																<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">69,700</span>
																<!--end::Amount-->
																<!--begin::Subtitle-->
																<span class="text-gray-400 pt-1 fw-semibold fs-6">Expected Earnings This Month</span>
																<!--end::Subtitle-->
															</div>
															<!--end::Title-->
														</div>
														<!--end::Header-->
														<!--begin::Card body-->
														<div class="card-body d-flex align-items-end pt-0">
															<!--begin::Wrapper-->
															<div class="d-flex align-items-center flex-wrap">
																<!--begin::Chart-->
																<div class="d-flex me-7 me-xxl-10">
																	<div id="kt_card_widget_10_chart" class="min-h-auto" style="height: 78px; width: 78px" data-kt-size="78" data-kt-line="11"></div>
																</div>
																<!--end::Chart-->
																<!--begin::Labels-->
																<div class="d-flex flex-column content-justify-center flex-grow-1">
																	<!--begin::Label-->
																	<div class="d-flex fs-6 fw-semibold align-items-center">
																		<!--begin::Bullet-->
																		<div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
																		<!--end::Bullet-->
																		<!--begin::Label-->
																		<div class="fs-6 fw-semibold text-gray-400 flex-shrink-0">Used Truck freight</div>
																		<!--end::Label-->
																		<!--begin::Separator-->
																		<div class="separator separator-dashed min-w-10px flex-grow-1 mx-2"></div>
																		<!--end::Separator-->
																		<!--begin::Stats-->
																		<div class="ms-auto fw-bolder text-gray-700 text-end">45%</div>
																		<!--end::Stats-->
																	</div>
																	<!--end::Label-->
																	<!--begin::Label-->
																	<div class="d-flex fs-6 fw-semibold align-items-center my-1">
																		<!--begin::Bullet-->
																		<div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
																		<!--end::Bullet-->
																		<!--begin::Label-->
																		<div class="fs-6 fw-semibold text-gray-400 flex-shrink-0">Used Ship freight</div>
																		<!--end::Label-->
																		<!--begin::Separator-->
																		<div class="separator separator-dashed min-w-10px flex-grow-1 mx-2"></div>
																		<!--end::Separator-->
																		<!--begin::Stats-->
																		<div class="ms-auto fw-bolder text-gray-700 text-end">21%</div>
																		<!--end::Stats-->
																	</div>
																	<!--end::Label-->
																	<!--begin::Label-->
																	<div class="d-flex fs-6 fw-semibold align-items-center">
																		<!--begin::Bullet-->
																		<div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF"></div>
																		<!--end::Bullet-->
																		<!--begin::Label-->
																		<div class="fs-6 fw-semibold text-gray-400 flex-shrink-0">Used Plane freight</div>
																		<!--end::Label-->
																		<!--begin::Separator-->
																		<div class="separator separator-dashed min-w-10px flex-grow-1 mx-2"></div>
																		<!--end::Separator-->
																		<!--begin::Stats-->
																		<div class="ms-auto fw-bolder text-gray-700 text-end">34%</div>
																		<!--end::Stats-->
																	</div>
																	<!--end::Label-->
																</div>
																<!--end::Labels-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Card body-->
													</div>
													<!--end::Card widget 10-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6 col-xl-6 mb-md-5 mb-xl-10">
													<!--begin::Card widget 13-->
													<div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
														<!--begin::Card body-->
														<div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
															<!--begin::Statistics-->
															<div class="mb-4 px-9">
																<!--begin::Statistics-->
																<div class="d-flex align-items-center mb-2">
																	<!--begin::Value-->
																	<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">259,786</span>
																	<!--end::Value-->
																	<!--begin::Label-->
																	<!--end::Label-->
																</div>
																<!--end::Statistics-->
																<!--begin::Description-->
																<span class="fs-6 fw-semibold text-gray-400">Total Shipments</span>
																<!--end::Description-->
															</div>
															<!--end::Statistics-->
															<!--begin::Chart-->
															<div id="kt_card_widget_13_chart" class="min-h-auto" style="height: 125px"></div>
															<!--end::Chart-->
														</div>
														<!--end::Card body-->
													</div>
													<!--end::Card widget 13-->
													<!--begin::Card widget 7-->
													<div class="card card-flush h-md-50 mb-lg-10">
														<!--begin::Header-->
														<div class="card-header pt-5">
															<!--begin::Title-->
															<div class="card-title d-flex flex-column">
																<!--begin::Amount-->
																<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">604</span>
																<!--end::Amount-->
																<!--begin::Subtitle-->
																<span class="text-gray-400 pt-1 fw-semibold fs-6">New Customers This Month</span>
																<!--end::Subtitle-->
															</div>
															<!--end::Title-->
														</div>
														<!--end::Header-->
														<!--begin::Card body-->
														<div class="card-body d-flex flex-column justify-content-end pe-0">
															<!--begin::Title-->
															<span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Heroes</span>
															<!--end::Title-->
															<!--begin::Users group-->
															<div class="symbol-group symbol-hover flex-nowrap">
																<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
																	<span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
																</div>
																<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
																	<img alt="Pic" src="assets/media/avatars/300-11.jpg" />
																</div>
																<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
																	<span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
																</div>
																<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
																	<img alt="Pic" src="assets/media/avatars/300-2.jpg" />
																</div>
																<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
																	<span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
																</div>
																<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
																	<img alt="Pic" src="assets/media/avatars/300-12.jpg" />
																</div>
																<a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
																	<span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
																</a>
															</div>
															<!--end::Users group-->
														</div>
														<!--end::Card body-->
													</div>
													<!--end::Card widget 7-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Col-->
									</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  
<script src="<?= base_url('assets/js/custom/auth/signIn.js') ?>"></script>
<?= $this->endSection() ?>