<!DOCTYPE html>
<html>
<head>
	<title>Form Berita Acara Pengetesan dan Penyelesaian</title>
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
            <h5>BERITA ACARA <br>PENGETESAN DAN SELESAI PEKERJAAN</h4>
	</center>

	<table class='table'>
            <tr style="border:none;">
                <td colspan="6" style="border:none;"></td>
                
                
            </tr>
            <?php
            $hari = array ( 1 =>    'senin',
                                'selasa',
                                'rabu',
                                'kamis',
                                'jumat',
                                'sabtu',
                                'minggu'
                        );
            ?>
            <tr>
                <td colspan="6">Pada hari ini <?php echo $hari[date('N')];?> tanggal <?php echo date('d');?> bulan <?php echo date('m');?> tahun <?php echo date('Y');?> bertempat di <?php $sql="select * from m_site where id=".Session::get('site_id'); echo $namasite=collect(Illuminate\Support\Facades\DB::select($sql))->first()->nama_site; ?>, kami yang bertanda tangan di bawah ini :</td>
                
                
            </tr>
            
            <tr>
                <td>Nama</td>
                <td colspan="5">:</td>
                
                
            </tr>
            <tr>
                <td>Jabatan</td>
                <td colspan="5">:</td>
                
                
            </tr>
            <tr>
                <td>Alamat</td>
                <td colspan="5">:</td>
                
                
            </tr>
            <tr>
                <td colspan="6">Dalam hal ini bertindak untuk dan atas nama Workshop Maintenance {{ $namasite }} PT. PDSI dan selanjutnya disebut PIHAK PERTAMA.</td>
                
                
            </tr>
            <tr>
                <td>Nama</td>
                <td colspan="5">:</td>
                
                
            </tr>
            <tr>
                <td>Jabatan</td>
                <td colspan="5">:</td>
                
                
            </tr>
            <tr>
                <td>Alamat</td>
                <td colspan="5">:</td>
                
                
            </tr>
            <?php
            $sql="select b.fullname,a.wo_no from trx_serahterima_form a"
                    . " inner join users b "
                    . " on a.nama_pelanggan=b.username where routingslip_no='".$routingslip_no."'";
            $namapelanggan=collect(Illuminate\Support\Facades\DB::select($sql))->first()->fullname;
            $wono=collect(Illuminate\Support\Facades\DB::select($sql))->first()->wo_no;
            
            
            ?>
            <tr>
                <td colspan="6">Dalam hal ini bertindak untuk dan atas nama {{ $namapelanggan }} PT. PDSI dan selanjutnya disebut PIHAK KEDUA.</td>
                
                
            </tr>
            <tr>
                <td colspan="6">Menyatakan Bahwa : </td>
                
                
            </tr>
            <tr>
                <td colspan="6">1. PIHAK KEDUA telah menyaksikan pengetesan peralatan hasil perbaikan dengan hasil BAIK/TIDAK BAIK*).</td>
                
                
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":"" ?></div></td>
                <td > Dimensional Check</td>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":"" ?></div></td>
                <td > Visual Check</td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":"" ?></div></td>
                <td > NDT</td>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":"" ?></div></td>
                <td > Load Test </td>
            </tr>
            <tr>
                <td ><div style="float: right;border: solid 1px;width: 20px;height: 15px;text-align: center;font-weight:bold;"><?php echo $row==""?"":"" ?></div></td>
                <td colspan="5"> Finishing</td>
            </tr>
            
            <tr>
                <td colspan="6">2. PIHAK PERTAMA telah menyelesaikan pekerjaan sesuai WO No. {{ $wono }} dengan hasil BAIK/TIDAK .</td>
                
                
            </tr>
            <tr>
                <td colspan="6">Demikian Berita Acara ini dibuat untuk dipergunakan sebagaimana mestinya.</td>
                
                
            </tr>
            
            <tr>
                <td colspan="3" style="text-align: center;font-weight: bold;">PIHAK PERTAMA</td>
                <td colspan="3" style="text-align: center;font-weight: bold;">PIHAK KEDUA</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;font-weight: bold;"><br><br><br>(...................)</td>
                <td colspan="3" style="text-align: center;font-weight: bold;"><br><br><br>(...................)</td>
            </tr>
            
            
            
	</table>

</body>
</html>