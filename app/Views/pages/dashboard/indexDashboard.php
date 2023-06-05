<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

<div class="row gy-5 g-xl-10 m-20">
    <img src="<?= base_url('assets/img/lisensi.png') ?>" alt="Description of the image">
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>  
<script src="<?= base_url('assets/js/custom/auth/signIn.js') ?>"></script>
<?= $this->endSection() ?>