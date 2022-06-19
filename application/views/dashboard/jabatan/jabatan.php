
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">

                <div class="section-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Jabatan</h4>
                                    <span class="ml-auto">
                                        <a href="<?= base_url('') ?>"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
                                    </span>
                                </div>
                                <div class="card-body table-responsive">
                                    <?= $this->session->flashdata('berhasil'); ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID Jabatan</th>
                                                <th>Nama Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($jabatan as $jbt) : ?>
                                            <tr class="dataRowJabatan">
                                                <td class="dataIdJabatan"><?= $jbt["id"] ?></td>
                                                <td class="dataNamaJabatan"><?= $jbt["jabatan"] ?></td>
                                                <td>
                                                    <a href="" class="btn btn-primary btnEdit"><i class="fas fa-edit"></i></a>
                                                    <a href="<?= base_url('jabatan/hapus/') . $jbt["id"] ?>" class="btn btn-danger btnHps"><i class="fas fa-trash"></i></a>
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
                                <div class="card-header"><h4 id="titleTmbhJabatan">Tambah Jabatan</h4></div>
                                <div class="card-body">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label>Nama Jabatan</label>
                                            <input type="hidden" name="id_jabatan" class="form-control">
                                            <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan">
                                            <?php if(form_error('nama_jabatan')) : ?>
                                                <small class="text-danger"><?= form_error('nama_jabatan') ?></small>
                                            <?php endif; ?>
                                        </div> 
                                        <button type="submit" class="btn btn-primary btnTmbh" name="tambah">Tambah Jabatan</button>
                                        <span id="btnSpan">
                                            <button type="submit" class="btn btn-success" name="simpan">Simpah Perubahan</button>
                                            <button type="submit" class="btn btn-danger btnBatalUbah">Batalkan</button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>