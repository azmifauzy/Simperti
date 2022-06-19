
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">

                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Karyawan</h4>
                            <?php if ($this->session->userdata('jabatan') === "Leader") : ?>
                            <span class="ml-auto">
                                <a href="<?= base_url('karyawan/tambah') ?>" class="btn btn-primary">Tambah</a>
                            </span>
                            <?php endif ?>
                        </div>
                        <div class="card-body table-responsive">
                            <?= $this->session->flashdata('berhasil'); ?>
                            <table class="table" id="bootstrap-data-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Karyawan</th>
                                        <th>Username</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($karyawan as $k) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $k["nama"] ?></td>
                                        <td><?= $k["username"] ?></td>
                                        <td><?= ucwords($k["jabatan"]); ?></td>
                                        <td><?= ucwords($k["status"]); ?></td>
                                        <td>
                                            <a href="<?= base_url('karyawan/detail/') . $k["id"] ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                            <?php if ($this->session->userdata('jabatan') === "Leader"): ?>
                                            <a href="<?= base_url('karyawan/hapus/') . $k["id"] ?>" class="btn btn-danger btnHps"><i class="fas fa-trash"></i></a>
                                            <?php endif ?>
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