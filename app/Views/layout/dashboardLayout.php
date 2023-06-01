<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= $page ?> | SIDPP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="canonical" href="https://preview.keenthemes.com/keen" />
		<link rel="shortcut icon" href="<?= base_url('assets/media/logos/favicon.ico') ?>" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
		<script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
		<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
		<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
	</head>
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); };</script>
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <?= $this->include('layout/partials/header') ?>
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					<?= $this->include('layout/partials/sidebar') ?>
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
                            <?= $this->include('layout/partials/breadcrumb') ?>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Row-->
									<?= $this->renderSection('content') ?>
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<?= $this->include('layout/partials/footer') ?>
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
        <?= $this->include('layout/partials/scrollToTop') ?>
		<script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
		<script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
        <script src="<?= base_url('assets/js/global.js') ?>"></script>
		<script src="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/account/settings/signin-methods.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/account/settings/profile-details.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/account/settings/deactivate-account.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/pages/user-profile/general.js') ?>"></script>
		<script src="<?= base_url('assets/js/widgets.bundle.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/apps/chat/chat.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/utilities/modals/upgrade-plan.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/utilities/modals/create-campaign.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/utilities/modals/two-factor-authentication.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom/utilities/modals/users-search.js') ?>"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<?= $this->renderSection('scripts') ?>
	</body>
</html>