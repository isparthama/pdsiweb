<!DOCTYPE html>
<html>
<head>
	<title>Biaya perbaikan </title>
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
		<h5>List Biaya Perbaikan</h4>
	</center>

	<table class='table'>
            <tr style="border:none;">
                <td colspan="6" style="border:none;"></td>
                
                
            </tr>
            <tr>
                <td>A. Penggunaan Mesin</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>
            <tr>
                <td colspan="6" >
                    <table width="100%" border="1">
                        <tr>
                            <td>No</td>
                            <td>Nama Mesin</td>
                            <td>Kum.(Jam)</td>
                            <td>Tarif Perjam (Rp)</td>
                            <td>Biaya</td>
                            
                        </tr>
                        <?php
                        $no=1;$jum=0;
                        foreach ($listmesin as $mesin){
                            $jum +=$mesin->estimasi_harga_total;
                            echo '<tr>
                            <td>'.$no.'</td>
                            <td>'.$mesin->keterangan.'</td>
                            <td style="text-align:right;">'.number_format($mesin->estimasi_jumlah).'</td>
                            <td style="text-align:right;">'.number_format($mesin->estimasi_harga).'</td>
                            <td style="text-align:right;">'.number_format($mesin->estimasi_harga_total).'</td>
                            
                        </tr>';
                        }
                        
                        ?>
                        <tr>
                            <td colspan="4">Total Biaya</td>
                            <td style="text-align:right;">{{ number_format($jum) }}</td>
                            
                            
                        </tr>
                    </table>
                    
                </td>
                
                
            </tr>
            <tr style="border:none;">
                <td colspan="6" style="border:none;"></td>
                
                
            </tr>
            <tr>
                <td>B. Penggunaan Tools</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>
            <tr>
                <td colspan="6" >
                    <table width="100%" border="1">
                        <tr>
                            <td>No</td>
                            <td>Nama Tools</td>
                            <td>Kum.(Jam)</td>
                            <td>Tarif Perjam (Rp)</td>
                            <td>Biaya</td>
                            
                        </tr>
                        <?php
                        $no=1;$jum=0;
                        foreach ($listtool as $tool){
                            $jum +=$tool->estimasi_harga_total;
                            echo '<tr>
                            <td>'.$no.'</td>
                            <td>'.$tool->keterangan.'</td>
                            <td style="text-align:right;">'.number_format($tool->estimasi_jumlah).'</td>
                            <td style="text-align:right;">'.number_format($tool->estimasi_harga).'</td>
                            <td style="text-align:right;">'.number_format($tool->estimasi_harga_total).'</td>
                            
                        </tr>';
                        }
                        
                        ?>
                        <tr>
                            <td colspan="4">Total Biaya</td>
                            <td style="text-align:right;">{{ number_format($jum) }}</td>
                            
                            
                        </tr>
                    </table>
                    
                </td>
                
                
            </tr>
            <tr style="border:none;">
                <td colspan="6" style="border:none;"></td>
                
                
            </tr>
            <tr>
                <td>C. Penggunaan Personil</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>
            <tr>
                <td colspan="6" >
                    <table width="100%" border="1">
                        <tr>
                            <td>No</td>
                            <td>Nama Personil</td>
                            <td>Kum.(Jam)</td>
                            <td>Tarif Perjam (Rp)</td>
                            <td>Biaya</td>
                            
                        </tr>
                        <?php
                        $no=1;$jum=0;
                        foreach ($listpersonil as $personil){
                            $jum +=$personil->estimasi_harga_total;
                            echo '<tr>
                            <td>'.$no.'</td>
                            <td>'.$personil->keterangan.'</td>
                            <td style="text-align:right;">'.number_format($personil->estimasi_jumlah).'</td>
                            <td style="text-align:right;">'.number_format($personil->estimasi_harga).'</td>
                            <td style="text-align:right;">'.number_format($personil->estimasi_harga_total).'</td>
                            
                        </tr>';
                        }
                        
                        ?>
                        <tr>
                            <td colspan="4">Total Biaya</td>
                            <td style="text-align:right;">{{ number_format($jum) }}</td>
                            
                            
                        </tr>
                    </table>
                    
                </td>
                
                
            </tr>
            <tr style="border:none;">
                <td colspan="6" style="border:none;"></td>
                
                
            </tr>
            <tr>
                <td>D. Penggunaan Material</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>
            <tr>
                <td colspan="6" >
                    <table width="100%" border="1">
                        <tr>
                            <td>No</td>
                            <td>Nama Material</td>
                            <td>Kum.(Jam)</td>
                            <td>Tarif Perjam (Rp)</td>
                            <td>Biaya</td>
                            
                        </tr>
                        <?php
                        $no=1;$jum=0;
                        foreach ($listmaterial as $material){
                            $jum +=$material->estimasi_harga_total;
                            echo '<tr>
                            <td>'.$no.'</td>
                            <td>'.$material->keterangan.'</td>
                            <td style="text-align:right;">'.number_format($material->estimasi_jumlah).'</td>
                            <td style="text-align:right;">'.number_format($material->estimasi_harga).'</td>
                            <td style="text-align:right;">'.number_format($material->estimasi_harga_total).'</td>
                            
                        </tr>';
                        }
                        
                        ?>
                        <tr>
                            <td colspan="4">Total Biaya</td>
                            <td style="text-align:right;">{{ number_format($jum) }}</td>
                            
                            
                        </tr>
                    </table>
                    
                </td>
                
                
            </tr>
	</table>

</body>
</html>