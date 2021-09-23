<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cetak Kartu Anggota</title>
</head>

<style type="text/css">
	@media print
	{
	    * {-webkit-print-color-adjust:exact;}
	}

	.cetak-container {
		padding-top: 30px;
		padding-left: 30px;
		max-width:850px;
	}
	.kartu-container {
		margin:0;
		margin-right: 30px;
		margin-bottom: 30px;
		/* border:1px solid;  */
		float:left;
		width: 340px;
	}

	.kartu-content-container {
		position: relative;
		border:1px solid #FFFFFF;
		margin:0;
		width: 340px;
		height: 215px;
		background:url('../assets/template/assets/img/bagian_depan.jpg');
		background-repeat: no-repeat; 
		background-size: 340px 215px;
	}

	.kartu-belakang {
		margin-top: 30px;
		background:url('../assets/template/assets/img/bagian_belakang.jpg');
		background-repeat: no-repeat; 
		background-size: 340px 215px;
	}

	.identitas {
		width: 200px;
		float: left;
		margin-top: 60px;
	}

	.tanda-tangan {
		width: 140px;
		float: right;
	}

	.tanda-tangan p {
		font-size: 9px;
		text-align: right;
		margin: 0;
		margin-top: 60px;
		margin-right: 18px;
	}

	.tanda-tangan img {
		margin:  0;
		margin-top: 30px;
		margin-left: 15px;
		width: 120px;
		height: 100px
	}
</style>
<body onload="window.print()">
	<div class="cetak-container">
		<?php
			for ($i = 0; $i < $count; $i++)
			{
				if ($list[$i]["kodewilayah"] == "0901")
				{
					$wilayah = 'Jakarta Pusat';
				}
					else if ($list[$i]["kodewilayah"] == "0902")
				{
					$wilayah = 'Jakarta Selatan'; 
				}
					else if ($list[$i]["kodewilayah"] == "0903")
				{
					$wilayah = 'Jakarta Timur';
				}
					else if ($list[$i]["kodewilayah"] == "0904")
				{
					$wilayah = 'Jakarta Barat';
				}
					else if ($list[$i]["kodewilayah"] == "0905")
				{
					$wilayah = 'Jakarta Utara';
				}
				else {
					$wilayah = 'Kepulauan Seribu';
				}

				$bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

				$year = substr($list[$i]["tanggallahir"], 0,4);
		        $month = substr($list[$i]["tanggallahir"], 5,2);
		        $day = substr($list[$i]["tanggallahir"], 8,2);
		        $format = $day.$month.$year;
		        $format_tanggallahir = $day." "." ".$bulan[(int)$month]." ".$year;

		        $year1 = substr($list[$i]["tgl_registrasi"], 0,4);
		        $month1 = substr($list[$i]["tgl_registrasi"], 5,2);
		        $day1 = substr($list[$i]["tgl_registrasi"], 8,2);
		        $format_tanggalregis = $day1." "." ".$bulan[(int)$month1]." ".$year1;
		?>
		<div class="kartu-container">
			<!-- bagian depan -->
			<div class="kartu-content-container">
				
			</div>

			<!-- bagian belakang -->
			<div class="kartu-content-container kartu-belakang">
				<div class="identitas">
					<table cellspacing="0em" style="font-size: 9px; margin-left: 15px;">
						<tr>
							<td>No. KTA</td>
							<td>:</td>
							<td><?php echo $list[$i]["kodewilayah"].".".$list[$i]["idanggota"].".".$format.".".$list[$i]["jeniskelamin"].".".$day1 ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?php echo $list[$i]["nik"] ?></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo $list[$i]["namalengkap"] ?></td>
						</tr>
						<tr>
							<td>Tempat/Tgl.Lahir</td>
							<td>:</td>
							<td><?php echo $list[$i]["tempatlahir"]."/".$format_tanggallahir ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $list[$i]["alamat"] ?></td>
						</tr>
						<tr>
							<td>Ranting</td>
							<td>:</td>
							<td><?php echo $list[$i]["nama_kecamatan"] ?></td>
						</tr>
						<tr>
							<td>Cabang</td>
							<td>:</td>
							<td><?php echo $list[$i]["nama_kelurahan"] ?></td>
						</tr>
						<tr>
							<td>Daerah</td>
							<td>:</td>
							<td><?php echo $wilayah ?></td>
						</tr>
						<tr>
							<td>Wilayah</td>
							<td>:</td>
							<td><?php echo "Provinsi ".$list[$i]["nama_provinsi"] ?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?php echo $list[$i]["agama"] ?></td>
						</tr>
					</table>
					<p style="font-size: 9px; margin-left: 15px;"><u>Berlaku Selama Menjadi Anggota PAN</u></p>
				</div>
				<div class="tanda-tangan">
					<p>
						<b>Jakarta, <?php echo $format_tanggalregis?></b>
					</p>
					<img src="<?= base_url('assets/template/assets/img/ttd.png')?>">
				</div>
			</div>
		</div>
		<?php
			}
		?>
	</div>
</body>
</html>