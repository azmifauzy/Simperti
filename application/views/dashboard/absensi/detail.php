
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">

                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Absensi</h4>
                            <span class="ml-auto">
                                <a href="<?= base_url('absensi') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </span>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-10">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>:</td>
                                                <td><?= $detail_absensi["tgl_absen"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Karyawan</td>
                                                <td>:</td>
                                                <td><a href="<?= base_url('karyawan/detail/') . $nama_karyawan["id"] ?>"><?= $nama_karyawan["nama"] ?></a></td>
                                            </tr>
                                            <tr>
                                                <td>Status Kehadiran</td>
                                                <td>:</td>
                                                <?php if ($detail_absensi["status_absen"] === "hadir") : ?>
                                                <td class="font-weight-bold text-success">
                                                    <?= ucwords($detail_absensi["status_absen"]) ?>
                                                     <i class="fas fa-smile-beam"></i>   
                                                </td>
                                                <?php else: ?>
                                                <td class="font-weight-bold text-warning">
                                                    <?= ucwords($detail_absensi["status_absen"]) ?>
                                                    <i class="fas fa-frown"></i>
                                                </td>
                                                <?php endif ?>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <?php if ($detail_absensi["status_absen"] === "hadir") : ?>
                                                <td class="font-weight-bold text-success">
                                                    <?= ucwords($detail_absensi["keterangan"]) ?>
                                                    <i class="fas fa-smile-beam"></i>   
                                                </td>
                                                <?php else: ?>
                                                <td>
                                                    <?= ucwords($detail_absensi["keterangan"]) ?>
                                                </td>
                                                <?php endif ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>