<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url('admin')?>">POLRESTA</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url('logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?= base_url('kabag_sumda') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= base_url('kabag_sumda/senpi') ?>"><i class="fa fa-shield fa-fw"></i> Senjata Api</a>
                            <!-- <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('kabag_sumda/senpi') ?>">Data Senjata Api</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('kabag_sumda/pemasukan_senpi') ?>">Pemasukan Senjata Api</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('kabag_sumda/pengeluaran_senpi') ?>">Pengeluaran Senjata Api</a>
                                </li>
                            </ul> -->
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?= base_url('kabag_sumda/amunisi') ?>"><i class="fa fa-database fa-fw"></i> Amunisi</a><!-- <span class="fa arrow"></span> -->
                            <!-- <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('kabag_sumda/amunisi') ?>">Data Amunisi</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('kabag_sumda/pemasukan_amunisi') ?>">Pemasukan Amunisi</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('kabag_sumda/pengeluaran_amunisi') ?>">Pengeluaran Amunisi</a>
                                </li>
                            </ul> -->
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?= base_url('kabag_sumda/berita_acara') ?>"><i class="fa fa-book fa-fw"></i> Berita Acara</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">