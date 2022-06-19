
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?= $title ?></title>

<!-- General CSS Files -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="<?= base_url('') ?>/assets/css/dataTables.bootstrap.min.css">

<!-- Template CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.min.css">
</head>

<body>
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
        <!-- Start app top navbar -->
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="blank.html#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="blank.html#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama') ?></div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?= base_url('karyawan/detail/') . $this->session->userdata('id') ?>" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Start main left sidebar menu -->
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="<?= base_url(); ?>">Simper</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="dropdown">
                        <a href="<?= base_url(''); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">Karyawan</li>
                    <li class="dropdown">
                        <a href="<?= base_url('karyawan'); ?>" class="nav-link"><i class="fas fa-users"></i><span>Karyawan</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="<?= base_url('absensi'); ?>" class="nav-link"><i class="fas fa-clipboard"></i><span>Absensi</span></a>
                    </li>
                    <?php if ($this->session->userdata('jabatan') === "Leader") : ?>
                    <li class="dropdown">
                        <a href="<?= base_url('jabatan'); ?>" class="nav-link"><i class="fas fa-user-tie"></i><span>Jabatan</span></a>
                    </li>
                    <?php endif ?>
                    <li class="menu-header">Cuti</li>
                    <li class="dropdown">
                        <a href="<?= base_url('cuti'); ?>" class="nav-link"><i class="fas fa-smile-beam"></i><span>Data Laporan Cuti</span></a>
                        <a href="<?= base_url('cuti/permohonan'); ?>" class="nav-link"><i class="fas fa-smile-beam"></i><span>Kirim Permohonan Cuti</span></a>
                    </li>
                </ul>
            </aside>
        </div>