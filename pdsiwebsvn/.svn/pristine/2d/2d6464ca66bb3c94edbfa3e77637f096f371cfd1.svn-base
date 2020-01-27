<!DOCTYPE html>
<html>
<head>
	<title>Form Pengiriman Selesai Pekerjaan (<?php echo $row->serahterima_no;?>)</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
        <img style="float:right;" width="100" height="50" src="{{ public_path('pertamina/images/logo.png') }}" >
	<center>
		<h5>Formulir Pengiriman Selesai Pekerjaan</h4>
	</center>

	<table class='table'>
            <tr style="border:none;">
                <td colspan="6" style="border:none;"></td>
                
                
            </tr>
            <tr>
                <td>Nomor Form</td>
                <td>:</td>
                <td>{{ $row->serahterima_no }}</td>
                <td>Nomor WO</td>
                <td>:</td>
                <td>{{ $row->wo_no }}</td>
                
            </tr>
            <?php
            $daftar_hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
           );
           
           $namahari = date('l', strtotime($row->form_tanggal));

           
            ?>
            <tr>
                <td>Hari</td>
                <td>:</td>
                <td>{{ $daftar_hari[$namahari] }}</td>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ date('d M Y',strtotime($row->form_tanggal)) }}</td>
                
            </tr>
            <tr>
                <td>Pengirim</td>
                <td>:</td>
                <td>{{ $row->pengirim }}</td>
                <td>Penerima</td>
                <td>:</td>
                <td>{{ $row->penerima }}</td>
                
            </tr>
            <tr>
                <td>Driver</td>
                <td>:</td>
                <td>{{ $row->driver }}</td>
                <td>Jam</td>
                <td>:</td>
                <td>{{ $row->kirim_jam }}</td>
                
            </tr>
            <tr>
                <td>Nomor Polisi</td>
                <td>:</td>
                <td colspan="4">{{ $row->nopolisi }}</td>
                
                
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->klarifikasi_sts==1?"*":"") ?></div></td>
                <td colspan="5"> Peralatan sudah selesai diperbaiki sesuai permintaan</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->mdr_sts==1?"*":"") ?></div></td>
                <td colspan="5">MDR lengkap dan sesuai</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;font-weight: bold;">Pengirim</td>
                <td colspan="2" style="text-align: center;font-weight: bold;">Driver</td>
                <td colspan="2" style="text-align: center;font-weight: bold;">Penerima</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;font-weight: bold;"><br><br><br>({{ $row->pengirim }})</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><br><br><br>({{ $row->driver }})</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><br><br><br>({{ $row->penerima }})</td>
            </tr>
            
            
            
	</table>

</body>
</html>