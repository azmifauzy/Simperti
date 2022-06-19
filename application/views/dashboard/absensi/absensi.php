
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">

                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Absensi</h4>
                            <span class="ml-auto">
                            <span class="ml-auto">
                                <a href="<?= base_url('') ?>" class=""><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
                            </span>
                            </span>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table" id="bootstrap-data-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama Karyawan</th>
                                        <th>Status Kehadiran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($absensi as $absen): ?>
                                    <?php $karyawan = $this->db->get_where('karyawan', ["id" => $absen["id_karyawan"]])->row_array(); ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $absen["tgl_absen"] ?></td>
                                        <td><?= $karyawan["nama"] ?></td>

                                        <?php if ($absen["status_absen"] === "hadir") : ?>
                                        <td class="font-weight-bold text-success">
                                            <?= ucwords($absen["status_absen"]) ?>
                                             <i class="fas fa-smile-beam"></i>   
                                        </td>
                                        <?php else: ?>
                                        <td class="font-weight-bold text-warning">
                                            <?= ucwords($absen["status_absen"]) ?>
                                            <i class="fas fa-frown"></i>
                                        </td>
                                        <?php endif ?>
                                        <td>
                                            <a href="<?= base_url('absensi/detail/') . $absen["id"] ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>