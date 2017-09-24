            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu Profil</h1>
                    <?php  
                        $msg = $this->session->flashdata('msg');
                        if (isset($msg)) echo $msg;
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-8">
                <h4>Data Diri</h4>
                <hr>
                    <?= form_open('pemohon/profil')?>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="<?= $profil->nama ?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Pangkat</label>
                        <input type="text" name="pangkat" value="<?= $profil->pangkat ?>"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" name="jabatan" value="<?= $profil->jabatan ?>"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kesatuan</label>
                        <input type="text" name="kesatuan" value="<?= $profil->kesatuan ?>"  class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="ubah_data" value="Update Profil" class="btn btn-sm btn-primary">
                    </div>
                    <?= form_close()?>
                </div>
                <div class="col-md-4">
                    <h4>Ubah Password</h4>
                    <hr>
                    <?= form_open('pemohon/profil')?>
                    <div class="form-group">
                        <label for="">Password Baru</label>
                        <input type="password" name="pw" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ulangi Password</label>
                        <input type="password" name="repw" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="ubah" value="Ubah Password" class="btn btn-sm btn-primary">
                    </div>
                    <?= form_close()?>
                </div>
            </div>