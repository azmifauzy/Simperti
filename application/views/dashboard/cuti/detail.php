
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">

                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Cuti</h4>
                            <span class="ml-auto">
                                <a href="<?= base_url('cuti') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </span>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-12">
                                <?= $this->session->flashdata('berhasil'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <form>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Karyawan</td>
                                                    <td>:</td>
                                                    <td><a href="<?= base_url('karyawan/detail/') . $karyawan["id"] ?>"><?= $karyawan["nama"] ?></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Awal Cuti</td>
                                                    <td>:</td>
                                                    <td><?= $cuti["tgl_awal_cuti"] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Cuti</td>
                                                    <td>:</td>
                                                    <td><?= $cuti["jumlah_cuti"] ?> Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>Subjek Cuti</td>
                                                    <td>:</td>
                                                    <td><?= $cuti["subjek_cuti"] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Keterangan Cuti</td>
                                                    <td>:</td>
                                                    <td><?= $cuti["keterangan_cuti"] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Status Permohonan</td>
                                                    <td>:</td>
                                                    <?php if ($cuti["status"] === "pending"): ?>
                                                        <td class="font-weight-bold text-warning"><?= ucwords($cuti["status"]) ?></td>
                                                    <?php elseif ($cuti["status"] === "rejected") : ?>
                                                        <td class="font-weight-bold text-danger">
                                                            <?= ucwords($cuti["status"]) ?>
                                                            <i class="fas fa-frown"></i>
                                                        </td>
                                                    <?php else: ?>
                                                        <td class="font-weight-bold text-success">
                                                            <?= ucwords($cuti["status"]) ?>
                                                            <i class="fas fa-smile-beam"></i>
                                                        </td>
                                                    <?php endif ?>
                                                </tr>
                                                <?php if ($cuti["status"] === "pending"): ?>
                                                <?php if ($this->session->userdata('jabatan') === "Leader") : ?>
                                                <tr>
                                                    <td colspan="3">
                                                        <a href="<?= base_url('cuti/terima/') . $cuti["id"] ?>" type="submit" class="btn btn-success btnTerima">Terima Permohonan</a>
                                                        <a href="<?= base_url('cuti/tolak/') . $cuti["id"] ?>" type="submit" class="btn btn-danger btnTolak">Tolak Permohonan</a>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>