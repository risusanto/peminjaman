            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pemohon</h1>
                    <?php  
                        $msg = $this->session->flashdata('msg');
                        if (isset($msg)) echo $msg;
                    ?>
                    <a data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pemohon Senjata Api
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                            </style>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kelengkapan</th>
                                        <th>Nomor Senjata Api</th>
                                        <th>Jumlah Amunisi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0;foreach($pemohon as $row): ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $row->kelengkapan ?></td>
                                        <td><?= $row->no_senpi ?></td>
                                        <td><?= $row->jumlah_amunisi ?></td>
                                        
                                        <td>
                                            <div class="pull-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li><a href="" data-toggle="modal" data-target="#edit" onclick="edit_pemohon(<?= $row->id_pemohon ?>);">Edit</a>
                                                        </li>
                                                        <li><a href="#" onclick="delete_pemohon(<?= $row->id_pemohon ?>)">Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <!-- Add -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Tambah Data Pemohon</h4>
                        </div>
                      <?=form_open('pemohon/pemohon')?>
                        <div class="modal-body">
                          
                          <div class="form-group">
                            <label>Kelengkapan</label>
                            <input class="form-control" type="text" name="kelengkapan">
                          </div>
                          <div class="form-group">
                            <label>Nomor Senjata Api</label>
                            <select class="form-control" name="no_senpi">
                                <?php if (count($senpi) > 0): ?>
                                    <?php foreach ($senpi as $row): ?>
                                        <option value="<?= $row->no_senpi ?>"><?= $row->no_senpi ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option>Senjata api tidak tersedia</option>
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Jumlah Amunisi</label>
                            <input class="form-control" type="number" name="jumlah_amunisi">
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" name="add" value="Simpan">
                        </div>
                      <?=form_close();?>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--/Add -->

            <!-- Edit -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit Data Permohonan</h4>
                        </div>
                      <?=form_open('pemohon/pemohon')?>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Kelengkapan</label>
                            <input class="form-control" type="text" name="kelengkapan" id="edit_kelengkapan">
                            <input class="form-control" type="hidden" name="id_pemohon" id="edit_id_pemohon">
                          </div>
                          <div class="form-group">
                            <label>Nomor Senjata Api</label>
                            <div id="edit_no_senpi"></div>
                          </div>
                          <div class="form-group">
                            <label>Jumlah Amunisi</label>
                            <input class="form-control" type="number" name="jumlah_amunisi" id="edit_jumlah_amunisi">
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
                        </div>
                      <?=form_close();?>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /Edit -->

            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function changeStatus(nrp) {
                    $.ajax({
                        url: '<?= base_url('pemohon/pemohon') ?>',
                        type: 'POST',
                        data: {
                            change: true,
                            nrp: nrp
                        },
                        success: function(response) {
                            $('#btn-' + nrp).html(response);
                            // window.location = '<?= base_url('pemohon/pemohon') ?>';
                        },
                        error: function (e) {
                            console.log(e.responseText);
                        }
                    });
                }

                function delete_pemohon(nrp) {
                    $.ajax({
                        url: "<?= base_url('pemohon/pemohon') ?>",
                        type: 'POST',
                        data: {
                            id_pemohon: nrp,
                            delete: true
                        },
                        success: function() {
                            window.location = "<?= base_url('pemohon/pemohon') ?>";
                        }
                    });
                }

                function edit_pemohon(nrp) {
                    $.get('<?= base_url('pemohon/pemohon?nrp=') ?>' + nrp, function(response) {
                        console.log('<?= base_url('pemohon/pemohon?nrp=') ?>' + nrp);
                        var json = JSON.parse(response);
                        $('#old_nrp').val(json.nrp);
                        $('#edit_nrp').val(json.nrp);
                        $('#edit_id_pemohon').val(json.id_pemohon);
                        $('#edit_nama_anggota').val(json.nama_anggota);
                        $('#edit_pangkat').val(json.pangkat);
                        $('#edit_jabatan').val(json.jabatan);
                        $('#edit_kesatuan').val(json.kesatuan);
                        $('#edit_kelengkapan').val(json.kelengkapan);
                        $('#edit_no_senpi').html(json.dropdown);
                        $('#edit_jumlah_amunisi').val(json.jumlah_amunisi);
                    });
                }

            </script>