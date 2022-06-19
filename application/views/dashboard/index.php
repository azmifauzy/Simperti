
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Hi, <?= $this->session->userdata('nama') ?></h1>
                </div>

                <div class="section-body">


                <?php if ($cuti_warn == null) : ?>

                <?php else : ?>
                    <?php if ($cuti_warn["status"] === "approved"): ?>
                        
                    <div class="hero align-items-center bg-success text-white mb-3">
                            <div class="hero-inner text-center">
                                <h2>Congratulations <i class="fas fa-smile-beam" style="font-size: 20px;"></i></h2>
                                <p class="lead">
                                    Permohonan Cuti Anda telah Disetujui oleh Leader <i class="fas fa-smile-beam"></i>
                                </p>
                                <a href="<?= base_url('cuti/detail/') . $cuti_warn["id"] ?>" class="text-white btn btn-success"><i class="fas fa-arrow-left"></i> Lihat Detail Permohonan Cuti Anda</a>
                            </div>
                        </div>
                    </div>
                    <?php elseif($cuti_warn["status"] === "rejected"): ?>
                    <div class="hero align-items-center bg-danger text-white mb-3">
                            <div class="hero-inner text-center">
                                <h2>We're Sorry <i class="fas fa-frown" style="font-size: 20px;"></i></h2>
                                <p class="lead">
                                    Permohonan Cuti Anda telah ditolak oleh Leader <i class="fas fa-frown"></i>
                                </p>
                                <a href="<?= base_url('cuti/detail/') . $cuti_warn["id"] ?>" class="text-white btn btn-danger"><i class="fas fa-arrow-left"></i> Lihat Detail Permohonan Cuti Anda</a>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>

                <?php endif; ?>

                    <div class="card">
                        <div class="card-header">
                            <h4>Kehadiran Anda</h4>
                            <a href="" class="btn btn-danger ml-auto pt-2 pb-2 pr-3 pl-3 btnClose"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="card-body">

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <?php if ($status_kehadiran_hari_ini): ?>

                                        <b class="mb-3"><i class="fas fa-check" style="font-size: 15px;"></i> 
                                        Anda sudah mengisi kehadiran hari ini...
                                        </b>
                                        <p>
                                            <?= $status_kehadiran_hari_ini["tgl_absen"] ?> - 
                                            <?php if ($status_kehadiran_hari_ini["status_absen"] === "hadir") : ?>
                                                <span class="font-weight-bold text-success">
                                                    <?= ucwords($status_kehadiran_hari_ini["status_absen"]) ?>
                                                    <i class="fas fa-smile-beam"></i>   
                                                </span>
                                            <?php else: ?>
                                                <span class="font-weight-bold text-warning">
                                                    <?= ucwords($status_kehadiran_hari_ini["status_absen"]) ?>
                                                    <i class="fas fa-frown"></i>
                                                </span>
                                            <?php endif ?>
                                        </p>
                                        <a href="<?= base_url('absensi/detail/') . $status_kehadiran_hari_ini["id"] ?>"><i class="fas fa-arrow-left"></i> Lihat Detail Kehadiran Anda Hari ini.</a>

                                    <?php else: ?>
                                        
                                        <b class="mb-3"><i class="fas fa-exclamation-circle" style="font-size: 15px;"></i> 
                                        Anda belum mengisi kehadiran hari ini...
                                        </b>
                                        <form method="post" action="" class="mt-3">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4"><input type="checkbox" name="kehadiran" value="hadir"> Hadir</div>
                                                    <div class="col-md-4"><input type="checkbox" name="kehadiran" value="izin"> Izin</div>
                                                    <div class="col-md-4"><input type="checkbox" name="kehadiran" value="sakit"> Sakit</div>
                                                </div>
                                                    <?php if(form_error('kehadiran')) : ?>
                                                        <small class="text-danger"><?= form_error('kehadiran') ?></small>
                                                    <?php endif; ?>
                                            </div>

                                            <div class="subket" id="subket">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control" name="keterangan" placeholder="Mohon jelaskan ketidak hadiran anda..."></textarea>
                                                    <?php if(form_error('keterangan')) : ?>
                                                        <small class="text-danger"><?= form_error('keterangan') ?></small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <button type="submit" name="hadir" class="btn btn-primary btnTmbh mb-3">Lapor Kehadiran</button>
                                        </form>
                                    <?php endif ?>

                                </div>
                                <div class="col-md-6">
                                    <b>Data Kehadiran Anda</b>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">Hadir</div>
                                                <div class="col-md-6"><b><?= $jumlah_hadir ?> Hari</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-3">
                                            <div class="row">
                                                <div class="col-md-6">Izin</div>
                                                <div class="col-md-6"><b><?= $jumlah_izin ?> Hari</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-3">
                                            <div class="row">
                                                <div class="col-md-6">Sakit</div>
                                                <div class="col-md-6"><b><?= $jumlah_sakit ?> Hari</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="<?= base_url('karyawan/detail/') . $this->session->userdata('id') ?>"><i class="fas fa-arrow-left"></i> Lihat Data Kehadiran Anda</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <a href="<?= base_url('karyawan') ?>"><h4>Karyawan</h4></a>
                                    </div>
                                    <div class="card-body">
                                        <?= $jumlah_karyawan ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <a href="<?= base_url('absensi') ?>"><h4>Karyawan Hadir Hari ini</h4></a>
                                    </div>
                                    <div class="card-body">
                                        <?= $hadir_hari_ini ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <a href="<?= base_url('jabatan') ?>"><h4>Jabatan</h4></a>
                                    </div>
                                    <div class="card-body">
                                        <?= $jumlah_jabatan ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-smile-beam"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <a href="<?= base_url('cuti') ?>"><h4>Cuti</h4></a>
                                    </div>
                                    <div class="card-body">
                                        <?= $jumlah_cuti ?>
                                    </div>
                                </div>
                            </div>
                        </div>                  
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header"><h4>Karyawan yang Sedang Login</h4></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="" class="form-control" value="<?= $this->session->userdata('nama') ?>" readonly disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" name="" class="form-control" value="<?= ucwords($this->session->userdata('jabatan')) ?>" readonly disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Login</label>
                                        <input type="text" name="" class="form-control" value="<?= $this->session->userdata('timelog') ?>" readonly disabled>
                                    </div>
                                    <a href="<?= base_url('karyawan/detail/') . $this->session->userdata('id') ?>"><i class="fas fa-arrow-left"></i> Lihat Profil</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <?php if ($this->session->userdata('jabatan') === "Leader") : ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Permintaan Cuti Karyawan</h4>
                                    <a href="<?= base_url('cuti') ?>" class="ml-auto"><i class="fas fa-arrow-left"></i> Lihat Data Cuti</a>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table bootstrap-data-table">
                                        <thead>
                                            <tr>
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal Awal Cuti</th>
                                                <th>Jumlah Cuti</th>
                                                <th>Status Cuti</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cuti_pending as $cp) : ?>
                                            <?php $karyawan = $this->db->get_where('karyawan', ["id" => $cp["id_karyawan"]])->row_array(); ?>
                                            <tr>
                                                <td><a href="<?= base_url('karyawan/detail/') . $karyawan["id"] ?>"><?= $karyawan["nama"] ?></a></td>
                                                <td><?= $cp["tgl_awal_cuti"] ?></td>
                                                <td><?= $cp["jumlah_cuti"] ?> Hari</td>
                                                <td class="font-weight-bold text-warning"><?= $cp["status"] ?></td>

                                                <th>
                                                    <a href="<?= base_url('cuti/terima/') . $cp["id"] ?>" class="btn btn-success d-block mt-2 mb-2 btnTerima">Terima</a>
                                                    <a href="<?= base_url('cuti/tolak/') . $cp["id"] ?>" class="btn btn-danger d-block btnTolak mb-2">Tolak</a>
                                                    <a href="<?= base_url('cuti/detail/') . $cp["id"] ?>" class="btn btn-primary d-block">Detail</a>
                                                </th>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php endif ?>
                            <!--  -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Permohonan Cuti Anda</h4>
                                    <a href="<?= base_url('karyawan/detail/') . $this->session->userdata('id') ?>" class="ml-auto"><i class="fas fa-arrow-left"></i> Lihat Data Cuti</a>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table bootstrap-data-table">
                                        <thead>
                                            <tr>
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal Awal Cuti</th>
                                                <th>Jumlah Cuti</th>
                                                <th>Status Cuti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cuti_karyawan as $ck) : ?>
                                            <?php $karyawan = $this->db->get_where('karyawan', ["id" => $ck["id_karyawan"]])->row_array(); ?>
                                            <tr>
                                                <td><a href="<?= base_url('karyawan/detail/') . $karyawan["id"] ?>"><?= $karyawan["nama"] ?></a></td>
                                                <td><?= $ck["tgl_awal_cuti"] ?></td>
                                                <td><?= $ck["jumlah_cuti"] ?> Hari</td>
                                                <?php if ($ck["status"] === "pending"): ?>
                                                    <td class="font-weight-bold text-warning"><?= ucwords($ck["status"]) ?></td>
                                                <?php elseif ($ck["status"] === "rejected") : ?>
                                                    <td class="font-weight-bold text-danger">
                                                        <?= ucwords($ck["status"]) ?>
                                                        <i class="fas fa-frown"></i>
                                                    </td>
                                                <?php else: ?>
                                                    <td class="font-weight-bold text-success">
                                                        <?= ucwords($ck["status"]) ?>
                                                        <i class="fas fa-smile-beam"></i>
                                                    </td>
                                                <?php endif ?>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>