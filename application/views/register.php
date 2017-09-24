<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url('assets/vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url('assets/dist/css/sb-admin-2.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register Pemohon</h3>
                    </div>
                    <div class="panel-body">
                        <?=form_open('register')?>
                            <fieldset>
                              <?= $this->session->flashdata('msg') ?>
                                <div class="form-group">
                                    <label for="">NRP : </label>
                                    <input class="form-control"  name="nrp" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama : </label>
                                    <input class="form-control"  name="nama" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan : </label>
                                    <input class="form-control"  name="jabatan" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Pangkat : </label>
                                    <input class="form-control"  name="pangkat" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Kesatuan : </label>
                                    <input class="form-control"  name="kesatuan" type="text" autofocus>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="">Password : </label>
                                    <input class="form-control"  name="password" type="password" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Ulangi Password : </label>
                                    <input class="form-control"  name="repassword" type="password" autofocus>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="daftar" value="Daftar">
                                </div>
                                
                            </fieldset>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('assets/vendor/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('assets/dist/js/sb-admin-2.js')?>"></script>

</body>

</html>
