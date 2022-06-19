
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">

                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Cuti</h4>
                            <span class="ml-auto">
                                <a href="<?= base_url('') ?>" class=""><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
                            </span>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table" id="bootstrap-data-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Karyawan</th>
                                        <th>Tanggal Awal Cuti</th>
                                        <th>Jumlah Cuti</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cuti as $c): ?>
                                    <?php $karyawan = $this->db->get_where('karyawan', ["id" => $c["id_karyawan"]])->row_array(); ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $karyawan["nama"] ?></td>
                                        <td><?= $c["tgl_awal_cuti"] ?></td>
                                        <td><?= $c["jumlah_cuti"] ?> Hari</td>
                                        <?php if ($c["status"] === "pending"): ?>
                                            <td class="font-weight-bold text-warning"><?= ucwords($c["status"]) ?></td>
                                        <?php elseif ($c["status"] === "rejected") : ?>
                                            <td class="font-weight-bold text-danger">
                                                <?= ucwords($c["status"]) ?>
                                                <i class="fas fa-frown"></i>
                                            </td>
                                        <?php else: ?>
                                            <td class="font-weight-bold text-success">
                                                <?= ucwords($c["status"]) ?>
                                                <i class="fas fa-smile-beam"></i>
                                            </td>
                                        <?php endif ?>
                                        <td>
                                            <a href="<?= base_url('cuti/detail/') . $c["id"] ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
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