            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Amunisi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Stok Amunisi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                            </style>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nomor Amunisi</th>
                                        <th>Kesatuan</th>
                                        <th>Merk</th>
                                        <th>Kaliber</th>
                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($amunisi as $row): ?>
                                        <tr>
                                            <td><?= $row->no_amunisi ?></td>
                                            <td><?= $row->kesatuan ?></td>
                                            <td><?= $row->merk ?></td>
                                            <td><?= $row->caliber ?></td>
                                            <td><?= $row->jumlah ?></td>
                                            <td><?= $row->kondisi ?></td>
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