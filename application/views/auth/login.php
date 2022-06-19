<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?= $title ?></title>

<!-- General CSS Files -->
<link rel="stylesheet" href="<?= base_url('') ?>assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="<?= base_url('') ?>assets/modules/bootstrap-social/bootstrap-social.css">

<!-- Template CSS -->
<link rel="stylesheet" href="<?= base_url('') ?>assets/css/style.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/css/components.min.css">
</head>

<body style="background-image: url(<?= base_url('assets/img/bg.jpg') ?>); background-size: cover;">

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>SIMPER - Login</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('gagal'); ?>
                            <form method="POST" action="" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                    <?php if(form_error('username')) : ?>
                                        <small class="text-danger"><?= form_error('username') ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <?php if(form_error('password')) : ?>
                                        <small class="text-danger"><?= form_error('password') ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; <a href="<?= base_url(''); ?>">SIMPER</a> 2020
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url('') ?>assets/bundles/lib.vendor.bundle.js"></script>
<script src="<?= base_url('') ?>assets/js/CodiePie.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="../js/scripts.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>