<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= $page ?> | SIDPP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="<?= base_url('assets/media/logos/favicon.ico') ?>" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="app-blank app-blank">
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center" style="background-image: url(assets/media/misc/auth-bg.png)">
					<div class="d-flex flex-column flex-center p-6 p-lg-10 w-100">
						<img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20" src="<?= base_url('assets/media/logos/auth-logo.png') ?>" alt="" />
						<h1 class="d-none d-lg-block text-white fs-2qx fw-bold text-center mb-7">Aplikasi Pengolahan Data Pasien</h1>
						<div class="d-none d-lg-block text-white fs-base text-center">Jl. Mbah Ronggo, Dusun Bujel, Desa Sendangrejo, Kecamatan Ngimbang, Kabupaten Lamongan, Provinsi Jawa Timur</div>
					</div>
				</div>
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<div class="w-lg-500px p-10">
                        <?= $this->renderSection('content') ?>
						</div>
					</div>
				</div>
		</div>
		<script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
		<script src="<?= base_url('assets/js/scripts.bundle.js') ?>"></script>
		<script src="<?= base_url('assets/js/global.js') ?>"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <?= $this->renderSection('scripts') ?>
	</body>
</html>