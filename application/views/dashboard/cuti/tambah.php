
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">

                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kirim Permohonan Cuti</h4>
                            <span class="ml-auto">
                                <a href="<?= base_url('') ?>" class=""><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
                            </span>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-12">
                                <?= $this->session->flashdata('gagal'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <form method="post" action="">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right">Nama Karyawan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="" name="nama" value="<?= $this->session->userdata('nama') ?>" class="form-control" readonly="">
                                                        <?php if(form_error('nama')) : ?>
                                                            <small class="text-danger"><?= form_error('nama') ?></small>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Tanggal Awal Cuti</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="date" name="tgl_awal_cuti" class="form-control">
                                                        <?php if(form_error('tgl_awal_cuti')) : ?>
                                                            <small class="text-danger"><?= form_error('tgl_awal_cuti') ?></small>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Jumlah Cuti</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="number" name="jumlah_cuti" placeholder="Jumlah Cuti" class="form-control">
                                                        <?php if(form_error('jumlah_cuti')) : ?>
                                                            <small class="text-danger"><?= form_error('jumlah_cuti') ?></small>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Subject Cuti</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="subjek_cuti" placeholder="Subject Cuti" class="form-control">
                                                        <?php if(form_error('subjek_cuti')) : ?>
                                                            <small class="text-danger"><?= form_error('subjek_cuti') ?></small>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Keterangan Cuti</td>
                                                    <td>:</td>
                                                    <td>
                                                        <textarea name="keterangan_cuti" placeholder="Jelaskan Permohonan Cuti anda..." class="form-control"></textarea>
                                                        <?php if(form_error('keterangan_cuti')) : ?>
                                                            <small class="text-danger"><?= form_error('keterangan_cuti') ?></small>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr class="text-right">
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="">
                                                        <button type="submit" class="btn btn-success w-100 btnTmbh">Kirim Permohonan</button>
                                                    </td>
                                                </tr>
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