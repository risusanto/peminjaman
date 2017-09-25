<?php
function terbilang($x='')
{
	$angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
	if ($x < 12)
	 return " " . $angka[$x];
 elseif ($x < 20)
	 return terbilang($x - 10) . " Belas";
 elseif ($x < 100)
	 return terbilang($x / 10) . " Puluh" . terbilang($x % 10);
 elseif ($x < 200)
	 return "Seratus" . terbilang($x - 100);
 elseif ($x < 1000)
	 return terbilang($x / 100) . " Ratus" . terbilang($x % 100);
 elseif ($x < 2000)
	 return "Seribu" . terbilang($x - 1000);
 elseif ($x < 1000000)
	 return terbilang($x / 1000) . " Ribu" . terbilang($x % 1000);
 elseif ($x < 1000000000)
	 return terbilang($x / 1000000) . " Juta" . terbilang($x % 1000000);
}
 ?>
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
            font-size: 22px;
            margin-bottom: 50px;
            border-bottom: 5px double black;
            padding-bottom: 15px;
        }

        #logoo{
            margin-top: -210px;
            width: 100px;
            height: 170px;
            margin-left: 5px;
            margin-right: 40px;
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
	</style>
</head>
<body>
	<div id="bigWrapper">
		<div class="header">

			<div class="title">
				<strong>
					KEPOLISIAN NEGARA REPUBLIK INDONESIA<br>
					DAERAH SUMATERA SELATAN <br>
					RESORT KOTA PALEMBANG
				</strong>
			</div>
		</div>
		<div class="content" style="margin: 0 auto; width:100%;">
			<p style="margin-top: -30px; width: 100%; font-weight: bold; font-size: 18px; text-align: center; margin-bottom: 30px;">
				BERITA ACARA <br>
				<u>SERAH TERIMA SENPI DINAS</u>
			</p>
			<p>Pada hari ini ............................................................. Tahun <strong><?=terbilang(date('Y'))?></strong> ..................</p>
			<p>
				<table style="border: none;">
					<tr>
						<td style="border:none !important;">Nama</td>
						<td style="border:none !important;">: DIRJO</td>
					</tr>
					<tr>
						<td style="border:none !important;">Pangkat/Nrp</td>
						<td style="border:none !important;">: BRIGADIR/09030992</td>
					</tr>
					<tr>
						<td style="border:none !important;">Jabatan</td>
						<td style="border:none !important;">: BRIG.SENMU</td>
					</tr>
					<tr>
						<td style="border:none !important;">Kesatuan</td>
						<td style="border:none !important;">: POLRESTA PALEMBANG</td>
					</tr>
				</table>
			</p>
			<p>Disebut <u><strong>PIHAK PERTAMA</strong></u></p>
			<p>
				<table style="border: none;">
					<tr>
						<td style="border:none !important;">Nama</td>
						<td style="border:none !important;">: <?=strtoupper($pemohon->nama)?></td>
					</tr>
					<tr>
						<td style="border:none !important;">Pangkat/Nrp</td>
						<td style="border:none !important;">: <?=strtoupper($pemohon->pangkat)?>/<?=strtoupper($pemohon->nrp)?></td>
					</tr>
					<tr>
						<td style="border:none !important;">Jabatan</td>
						<td style="border:none !important;">: <?=strtoupper($pemohon->jabatan)?></td>
					</tr>
					<tr>
						<td style="border:none !important;">Kesatuan</td>
						<td style="border:none !important;">: <?=strtoupper($pemohon->kesatuan)?></td>
					</tr>
				</table>
			</p>
			<p>Disebut <u><strong>PIHAK KEDUA</strong></u></p>
			<p>Dengan ini <u><strong>PIHAK PERTAMA</strong></u> telah menyerahkan senpi jenis <?=$senpi->jenis?> Cal <?=$senpi->kaliber?> merk <?=$senpi->merk?>
			Nomor: <?=$senpi->no_senpi?> dengan amunisi sebanyak <?=$permohonan->jumlah_amunisi?> (<?=terbilang($permohonan->jumlah_amunisi)?>) butir kepada <u><strong>PIHAK KEDUA</strong></u> dalam keadaan layak pakai. Demikian berita acara serah terima senpi diatas dibuat dengan sebenarnya dan masing-masing pihak bertanda tangan dibawah ini</p>
            <div style="text-align: center;  line-height: .1;">
                <p>YANG MENERIMA,</p>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <p><u><?=strtoupper($pemohon->nama)?></u></p>
                <p><?=strtoupper($pemohon->pangkat)?> NRP <?=strtoupper($pemohon->nrp)?></p>
            </div>
						<div style="text-align: center; line-height: .1;">
                <p>Palembang, .................... <?=date('Y')?></p>
                <p>YANG MENYERAHKAN,</p>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <p><u>DIRJO</u></p>
                <p>BRIGADIR/09030992</p>
            </div>
						<br><br><br><br><br><br><br><br><br>
						<div style="text-align: center; line-height: .1;">
                <p>MENGETAHUI</p>
                <p>KASUBAG SARPRAS,</p>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                <p><u>A. SARTONO</u></p>
                <p>IPTU NRP 06101334</p>
            </div>
		</div>
	</div>
</body>
</html>
