
        <!-- Start app main Content -->
        <div class="main-content">

                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Karyawan</h4>
                            <span class="ml-auto">
                                <a href="<?= base_url('karyawan') ?>" class=""><i class="fas fa-arrow-left"></i> Kembali</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('karyawan/tambah') ?>">
                                <!-- FORM ON MOBILE -->
                                <div class="d-md-none">
                                    <div class="form-group">
                                        <label>NIK Karyawan</label>
                                        <input type="number" class="form-control" placeholder="NIK" name="nik">
                                        <?php if(form_error('nik')) : ?>
                                                <small class="text-danger"><?= form_error('nik') ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Karyawan</label>
                                        <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama">
                                        <?php if(form_error('nama')) : ?>
                                                <small class="text-danger"><?= form_error('nama') ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Karyawan</label>
                                        <select class="form-control" name="status">
                                          <option value="kontrak">KONTRAK</option>
                                          <option value="tetap">TETAP</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan Karyawan</label>
                                        <select class="form-control" name="jabatan">
                                            <?php foreach ($jabatan as $jbt): ?>
                                                <option value="<?= $jbt["jabatan"] ?>"><?= $jbt["jabatan"] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="username">
                                        <?php if(form_error('username')) : ?>
                                                <small class="text-danger"><?= form_error('username') ?></small>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                        <?php if(form_error('password')) : ?>
                                                <small class="text-danger"><?= form_error('password') ?></small>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2">
                                        <?php if(form_error('password2')) : ?>
                                                <small class="text-danger"><?= form_error('password2') ?></small>
                                        <?php endif; ?>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary btnTmbh">Tambah Karyawan</button>
                                        <button type="reset" class="btn btn-danger">Reset Data</button>
                                    </div>
                                </div>

                            </form>
                            <form method="post" action="<?= base_url('karyawan/tambah') ?>">
                                <!-- FORM ON WEB -->
                                <div class="d-none d-md-block">
                                    <div class="form-row">
                                        <div class="col">
                                            <label>NIK Karyawan</label>
                                            <input type="number" class="form-control" placeholder="NIK" name="nik">
                                            <?php if(form_error('nik')) : ?>
                                                <small class="text-danger"><?= form_error('nik') ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col">
                                            <label>Nama Karyawan</label>
                                            <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama">
                                            <?php if(form_error('nama')) : ?>
                                                <small class="text-danger"><?= form_error('nama') ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col">
                                            <label>Status Karyawan</label>
                                            <select class="form-control" name="status">
                                                <option value="kontrak">KONTRAK</option>
                                                <option value="tetap">TETAP</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label>Jabatan Karyawan</label>
                                            <select class="form-control" name="jabatan">
                                                <?php foreach ($jabatan as $jbt): ?>
                                                    <option value="<?= $jbt["jabatan"] ?>"><?= $jbt["jabatan"] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mt-4">
                                        <div class="col">
                                            <label>Username</label>
                                            <input type="text" class="form-control" placeholder="Username" name="username">
                                            <?php if(form_error('username')) : ?>
                                                <small class="text-danger"><?= form_error('username') ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                            <?php if(form_error('password')) : ?>
                                                <small class="text-danger"><?= form_error('password') ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2">
                                            <?php if(form_error('password2')) : ?>
                                                <small class="text-danger"><?= form_error('password2') ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary btnTmbh">Tambah Karyawan</button>
                                        <button type="reset" class="btn btn-danger">Reset Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>