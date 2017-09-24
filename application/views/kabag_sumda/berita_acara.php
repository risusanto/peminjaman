            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Berita Acara</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Berita Acara
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                            </style>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>NRP</th>
                                        <th>Nomor Senjata Api</th>
                                        <th>Nomor Amunisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($berita as $row): ?>
                                    <tr>
                                        <td><?= $row->no_ba ?></td>
                                        <td><?= $this->Pemohon_m->get_row(['id_pemohon'=>$row->id_pemohon])->nrp ?></td>
                                        <td><?= $row->no_senpi ?></td>
                                        <td><?= $row->no_amunisi ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <a href="<?= base_url('kabag_sumda/berita_acara/cetak') ?>" class="btn btn-primary btn-lg"><i class="fa fa-download"></i> CETAK</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
            </script>