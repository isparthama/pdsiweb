<!DOCTYPE html>
<html>
<head>
	<title>Check List Manufacture Data Record (<?php echo $row->routingslip_no;?>)</title>
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
		<h5>Check List <br>Manufacture Data Record</h4>
	</center>

	<table class='table'>
            <tr style="border:none;">
                <td colspan="6" style="border:none;"></td>
                
                
            </tr>
            <tr>
                <td>Nomor Routing Slip</td>
                <td>:</td>
                <td>{{ $row->routingslip_no }}</td>
                <td>Nomor Register</td>
                <td>:</td>
                <td>{{ $row->register_no }}</td>
                
            </tr>
            <tr>
                <td>Nomor WO</td>
                <td>:</td>
                <td>{{ $row->wo_no }}</td>
                <td>User</td>
                <td>:</td>
                <td>{{ $row->nama_pelanggan }}</td>
                
            </tr>
            <tr>
                <td>Nomor MDR</td>
                <td>:</td>
                <td>{{ $row->mdr_no }}</td>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $row->mdr_tgl }}</td>
                
            </tr>
            
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->wo_legal_sts==1?"*":"") ?></div></td>
                <td colspan="5"> WO yang sudah ditandatangani pejabat yang berwenang</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->form_serah_terima_sts==1?"*":"") ?></div></td>
                <td colspan="5">Form serah terima</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->routing_slip_sts==1?"*":"") ?></div></td>
                <td colspan="5">Routing slip</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->form_inspeksi_sts==1?"*":"") ?></div></td>
                <td colspan="5">inspeksi dan rencana perbaikan</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->copy_standar_sts==1?"*":"") ?></div></td>
                <td colspan="5">Copy standar yang dipakai (TKO, TKI, API, ASTM, ANSI, WPS, dll)</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->form_proses_produksi_sts==1?"*":"") ?></div></td>
                <td colspan="5">Formulir Proses Produksi</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->sertifikat_personil_sts==1?"*":"") ?></div></td>
                <td colspan="5">Sertifikat personil jika diperlukan (welder)</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->sertifikat_pengetesan_sts==1?"*":"") ?></div></td>
                <td colspan="5">Sertifikat hasil pengetesan jika diperlukan</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->perhitungan_biaya_perbaikan_sts==1?"*":"") ?></div></td>
                <td colspan="5">Perhitungan biaya perbaikan</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->dokumentasi_perbaikan_sts==1?"*":"") ?></div></td>
                <td colspan="5">Dokumentasi sebelum dan sesudah perbaikan</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->berita_acara_sts==1?"*":"") ?></div></td>
                <td colspan="5">Berita Acara Pengetesan dan Selesai Pekerjaan yang telah ditandatangani kedua belah pihak</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":($row->formulir_pengiriman_sts==1?"*":"") ?></div></td>
                <td colspan="5">Formulir pengiriman selesai pekerjaan</td>
            </tr>
            
            <tr>
                <td colspan="2" style="text-align: center;font-weight: bold;">Dibuat Oleh,<br>Workshop Coordinator</td>
                <td colspan="2" style="text-align: center;font-weight: bold;">&nbsp;</td>
                <td colspan="2" style="text-align: center;font-weight: bold;">Mengetahui,<br>Maintenance Sr Supv</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;font-weight: bold;"><br><br><br>(Nama Jelas)</td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><br><br><br></td>
                <td colspan="2" style="text-align: center;font-weight: bold;"><br><br><br>(Nama Jelas)</td>
            </tr>
            
            
            
	</table>

</body>
</html>