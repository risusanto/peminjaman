            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Berita Acara</h1>
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
                            Berita Acara / Paur Log
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                            </style>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. Berita Acara</th>
                                        <th>NRP</th>
                                        <th>No. Senjata Api</th>
                                        <th>No. Amunisi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($berita_acara as $row): ?>
                                    <tr>
                                        <td><?= $row->no_ba ?></td>
                                        <td><?= $row->nrp ?></td>
                                        <td><?= $row->no_senpi ?></td>
                                        <td><?= $row->no_amunisi ?></td>
                                        <td>
                                            <div class="pull-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li><a href="" data-toggle="modal" data-target="#edit" onclick="edit_berita_acara(<?= $row->no_ba ?>);">Edit</a>
                                                        </li>
                                                        <li><a href="#" onclick="delete_berita_acara(<?= $row->no_ba ?>)">Hapus</a>
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
                            <h4 class="modal-title" id="myModalLabel">Tambah Data Berita Acara</h4>
                        </div>
                      <?=form_open('admin/paur-log')?>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>No. Berita Acara</label>
                            <input class="form-control" type="text" name="no_ba">
                          </div>
                          <div class="form-group">
                            <label>NRP</label>
                            <select class="form-control" name="nrp">
                                <?php  
                                    if (!isset($pemohon))
                                    {
                                        echo '<option>Data pemohon tidak tersedia</option>';
                                    }
                                ?>
                                <?php foreach ($pemohon as $row): ?>
                                    <option value="<?= $row->nrp ?>"><?= $row->nrp ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>No. Senjata Api</label>
                            <select class="form-control" name="no_senpi">
                                <?php  
                                    if (!isset($senpi))
                                    {
                                        echo '<option>Data senjata api tidak tersedia</option>';
                                    }
                                ?>
                                <?php foreach ($senpi as $row): ?>
                                    <option value="<?= $row->no_senpi ?>"><?= $row->no_senpi ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>No. Amunisi</label>
                            <select class="form-control" name="no_amunisi">
                                <?php  
                                    if (!isset($amunisi))
                                    {
                                        echo '<option>Data amunisi tidak tersedia</option>';
                                    }
                                ?>
                                <?php foreach ($amunisi as $row): ?>
                                    <option value="<?= $row->no_amunisi ?>"><?= $row->no_amunisi ?></option>
                                <?php endforeach; ?>
                            </select>
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
                            <h4 class="modal-title" id="myModalLabel">Edit Data Pemohon</h4>
                        </div>
                      <?=form_open('admin/paur-log')?>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>No. Berita Acara</label>
                            <input class="form-control" type="text" id="edit_no_ba" name="no_ba">
                            <input type="hidden" name="old_no_ba" id="old_no_ba">
                          </div>
                          <div class="form-group">
                            <label>NRP</label>
                            <div id="edit_nrp"></div>
                          </div>
                          <div class="form-group">
                            <label>No. Senjata Api</label>
                            <div id="edit_no_senpi"></div>
                          </div>
                          <div class="form-group">
                            <label>No. Amunisi</label>
                            <div id="edit_no_amunisi"></div>
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

                function delete_berita_acara(no_ba) {
                    $.ajax({
                        url: "<?= base_url('admin/paur-log') ?>",
                        type: 'POST',
                        data: {
                            no_ba: no_ba,
                            delete: true
                        },
                        success: function() {
                            window.location = "<?= base_url('admin/paur-log') ?>";
                        }
                    });
                }

                function edit_berita_acara(no_ba) {
                    $.get('<?= base_url('admin/paur-log?no_ba=') ?>' + no_ba, function(response) {
                        var json = JSON.parse(response);
                        $('#old_no_ba').val(json.no_ba);
                        $('#edit_no_ba').val(json.no_ba);
                        $('#edit_nrp').html(json.dropdown_nrp);
                        $('#edit_no_senpi').html(json.dropdown_senpi);
                        $('#edit_no_amunisi').html(json.dropdown_amunisi);
                    });
                }

            </script>