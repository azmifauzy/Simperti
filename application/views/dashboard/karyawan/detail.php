
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">

                <div class="section-body">
                    <div class="card profile-widget mt-5">
                        <div class="profile-widget-header">                     
                            <img alt="image" src="<?= base_url('') ?>assets/img/avatar.png" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Hadir</div>
                                    <div class="profile-widget-item-value"><?= $jumlah_hadir ?> Hari</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Izin</div>
                                    <div class="profile-widget-item-value"><?= $jumlah_izin ?> Hari</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Sakit</div>
                                    <div class="profile-widget-item-value"><?= $jumlah_sakit ?> Hari</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Permohonan Cuti</div>
                                    <div class="profile-widget-item-value"><?= $jumlah_cuti ?>x</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Sisa Cuti /tahun</div>
                                    <div class="profile-widget-item-value"><?= $karyawan["jatah_cuti"] ?> Hari</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description pb-0">
                            <div class="card border-0">
                                <div class="card-body">
                                <?= $this->session->flashdata('berhasil'); ?>

                                    <form method="post" action="">
                                        <!-- FORM ON MOBILE -->
                                        <div class="d-md-none">
                                            <div class="form-group">
                                                <label>NIK Karyawan</label>
                                                <?php if ($this->session->userdata('username') === $karyawan["username"]): ?>
                                                <input type="password" class="form-control inputUbah" name="nik" value="<?= $karyawan["nik"] ?>" required="" readonly>
                                                <?php else: ?>
                                                <input type="password" class="form-control inputUbah" name="nik" value="****************" required="" readonly>
                                                <?php endif ?>
                                                <?php if(form_error('nik')) : ?>
                                                    <small class="text-danger"><?= form_error('nik') ?></small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Karyawan</label>
                                                <input type="text" class="form-control inputUbah" name="nama" value="<?= $karyawan["nama"] ?>" required="" readonly>
                                                <?php if(form_error('nama')) : ?>
                                                    <small class="text-danger"><?= form_error('nama') ?></small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Karyawan</label>
                                                <input type="text" class="form-control" value="<?= strtoupper($karyawan["status"]) ?>" required="" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan Karyawan</label>
                                                <input type="text" class="form-control" value="<?= strtoupper($karyawan["jabatan"]) ?>" required="" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control inputUbah" name="username" value="<?= $karyawan["username"] ?>" required="" readonly>
                                                <?php if(form_error('username')) : ?>
                                                    <small class="text-danger"><?= form_error('username') ?></small>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control inputUbah" readonly="" name="password">
                                                <small class="text-danger">isi hanya jika ingin mengganti password.</small>
                                                <?php if(form_error('password')) : ?>
                                                    <small class="text-danger"><?= form_error('password') ?></small>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Konfirmasi Password</label>
                                                <input type="password" class="form-control inputUbah" readonly="" name="password2">
                                                <small class="text-danger">isi hanya jika ingin mengganti password.</small>
                                                <?php if(form_error('password2')) : ?>
                                                    <small class="text-danger"><?= form_error('password2') ?></small>
                                                <?php endif; ?>
                                            </div>

                                            <div class="mt-4">
                                                <span class="inUbah">
                                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                    <button type="reset" class="btn btn-danger btnBatalUbah">Batalkan</button>
                                                </span>
                                                <button type="reset" class="btn btn-primary">Ubah Data</button>
                                            </div>
                                        </div>
                                    </form>

                                    <form method="post" action="">
                                        <!-- FORM ON WEB -->
                                        <div class="d-none d-md-block">
                                            <div class="form-row">
                                                <div class="col">
                                                    <label>NIK Karyawan</label>
                                                    <?php if ($this->session->userdata('username') === $karyawan["username"]): ?>
                                                    <input type="password" class="form-control inputUbah" name="nik" value="<?= $karyawan["nik"] ?>" required="" readonly>
                                                    <?php else: ?>
                                                    <input type="password" class="form-control inputUbah" name="nik" value="****************" required="" readonly>
                                                    <?php endif ?>
                                                    <?php if(form_error('nik')) : ?>
                                                        <small class="text-danger"><?= form_error('nik') ?></small>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="col">
                                                    <label>Nama Karyawan</label>
                                                    <input type="text" class="form-control inputUbah" name="nama" value="<?= $karyawan["nama"] ?>" required="" readonly>
                                                    <?php if(form_error('nama')) : ?>
                                                        <small class="text-danger"><?= form_error('nama') ?></small>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="col">
                                                    <label>Status Karyawan</label>
                                                    <input type="text" class="form-control" value="<?= strtoupper($karyawan["status"]) ?>" required="" readonly>
                                                </div>

                                                <div class="col">
                                                    <label>Jabatan Karyawan</label>
                                                    <input type="text" class="form-control" value="<?= strtoupper($karyawan["jabatan"]) ?>" required="" readonly>
                                                </div>
                                            </div>

                                            <div class="form-row mt-4">
                                                <div class="col">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control inputUbah" name="username" value="<?= $karyawan["username"] ?>" required="" readonly>
                                                    <?php if(form_error('username')) : ?>
                                                        <small class="text-danger"><?= form_error('username') ?></small>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="col">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control inputUbah" readonly="" name="password">
                                                    <small class="text-danger">isi hanya jika ingin mengganti password.</small>
                                                    <?php if(form_error('password')) : ?>
                                                        <small class="text-danger"><?= form_error('password') ?></small>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="col">
                                                    <label>Konfirmasi Password</label>
                                                    <input type="password" class="form-control inputUbah" readonly="" name="password2">
                                                    <small class="text-danger">isi hanya jika ingin mengganti password.</small>
                                                    <?php if(form_error('password2')) : ?>
                                                        <small class="text-danger"><?= form_error('password2') ?></small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                            <?php if ($karyawan["id"] === $this->session->userdata('id')) : ?>
                                            <div class="mt-4">
                                                <span class="inUbah">
                                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                    <button type="reset" class="btn btn-danger btnBatalUbah">Batalkan</button>
                                                </span>
                                                <button type="reset" class="btn btn-primary btnUbah">Ubah Data</button>
                                                <label class="float-right">Bergabung pada tanggal <?= $karyawan["tgl_masuk"] ?></label>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><h4>Data Absensi Karyawan</h4></div>
                            <div class="card-body table-responsive">
                                <table class="table bootstrap-data-table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Status Kehadiran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($absensi_karyawan as $ak) : ?>
                                        <tr>
                                            <td><?= $ak["tgl_absen"] ?></td>
                                            <?php if ($ak["status_absen"] === "hadir") : ?>
                                            <td class="font-weight-bold text-success">
                                                <?= ucwords($ak["status_absen"]) ?>
                                                <i class="fas fa-smile-beam"></i>   
                                            </td>
                                            <?php else: ?>
                                            <td class="font-weight-bold text-warning">
                                                <?= ucwords($ak["status_absen"]) ?>
                                                <i class="fas fa-frown"></i>   
                                            </td>
                                            <?php endif ?>
                                            <td>
                                                <a href="<?= base_url('absensi/detail/') . $ak["id"] ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><h4>Data Cuti Karyawan</h4></div>
                            <div class="card-body table-responsive">
                                <table class="table bootstrap-data-table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Awal Cuti</th>
                                            <th>Jumlah Cuti</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cuti_karyawan as $ck) : ?>
                                        <tr>
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
                                            <td>
                                                <a href="<?= base_url('cuti/detail/') . $ck["id"] ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
        </div>