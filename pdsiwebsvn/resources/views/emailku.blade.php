<?php
//echo "Nama Pengirim : ".$namapengirim;
$isi=explode("~~",$isi_permintaan);
$isi[0]= str_replace("~", "", $isi[0]);
$isi[count($isi)-1]= str_replace("~", "", $isi[count($isi)-1]);
$format=explode("~~",$format_permintaan);
$format[0]= str_replace("~", "", $format[0]);
$format[count($format)-1]= str_replace("~", "", $format[count($format)-1]);
foreach ($isi as $x=>$y){
    $ml[$format[$x]]=$y;
}


?>
Jakarta , <?php echo date('d M Y')?><br><br>			
				
Kepada Yth,<br>				
{{ $ml['Pelanggan'] }}<br><br>				
				
{{ $ml['txtOrder'] }}			(Permintaan Workshop atas)	<br>
No. Routing Slip	:	{{ $ml['NRS'] }}<br>		
No WO	:	{{ $ml['NW'] }}	<br>	
Tanggal	:	{{ $ml['TGl'] }}<br>		
No Register	:	{{ $ml['NReg'] }}<br><br>
<?php
if(isset($ml['TRX'])){
    echo "Transaksi : ".$ml['TRX'];
    
}
?>
				
Telah kami terima 	<br>			
Status Routing	:	{{ $ml['RSTATUS'] }}<br><br>		
				
Hormat Kami<br>				
{{ $ml['HK'] }}				

