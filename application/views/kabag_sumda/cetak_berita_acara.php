<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#bigWrapper{
			width: 100%;
		}
		.header{
			text-align: center;
			font-size: 26px;
			margin-bottom: 50px;
			border-bottom: 5px double black;
			padding-bottom: 15px;
		}

		#logoo{
			margin-top: -200px;
			width: 130px;
			height: 200px;
			margin-left: 10px;
			margin-right: 60px;	
		}
		#logoo img{
			width: 130px;
			height: 80px;
		}
		.title{
			margin-left: 50px;
			margin-top: -190px;
		}
		.kontak{
			margin-top: 5px;
			font-size: 12px;
			text-align: center;
		}
		table,th,td{
			border: 1px solid black;
		}
		table {
		    border-collapse: collapse;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2
		}
		tr:first-child{
			width: 40px;
		}
		th{
		    background-color: #4CAF50;
		    color: white;
			/*min-width: 100px;*/
		}
		td{
			padding: 2px;
			padding-left: 10px; 
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="bigWrapper" style="margin-top: 20%;">
		<div class="header">
			<div id="logoo">
				<img src="<?= base_url('') ?>assets/img/logo.png">
			</div>

			<div class="title">
				<div style="font-size: 22px;">
					<strong>
						KEPOLISIAN RESORT KOTA PALEMBANG <br>
					</strong>
				</div>
				<div class="kontak">
					Jln. Gubernur A. Bastari No. 1 <br>
					Palembang - Sumatera Selatan
				</div>
			</div>
		</div>
		<div class="content" style="margin: 0 auto; width:100%;">
			<p style="margin-top: -30px; width: 100%; font-weight: bold; font-size: 18px; text-align: center; margin-bottom: 30px;">Laporan Data Berita Acara</p>
			<table style="width: 100%;">
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
                        <td><?= $row->nrp ?></td>
                        <td><?= $row->no_senpi ?></td>
                        <td><?= $row->no_amunisi ?></td>
                    </tr>
                    <?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
</body>
</html>