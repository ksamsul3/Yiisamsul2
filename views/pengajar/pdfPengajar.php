<!DOCTYPE html>
<html>
<head>
    <title>Data Pengajar NF COMPUTER</title>
    <style>
        .page
        {           
            padding:2cm;
        }
        table
        {
            border-spacing:0;
            border-collapse: collapse; 
            width:100%;
        }

        table td, table th
        {
            border: 1px solid black;
        }
		
		table th
        {
            background-color:green;
        }
    </style>
</head>
<body>
<?php
$ar_judul = ['no','NamaIP','Nama','Kategori','Alamat','HP','Email'];
?>	
    <div class="page">	
        <h1>Data Pengajar NF COMPUTER</h1>
        <table border="0">
        <tr>
            <?php
            foreach ($ar_judul as $jdl) {
                echo '<th>'.$jdl.'</th>';
            }
            ?>
               
        </tr>
        <?php
        $no = 1;
        foreach($dataProvider->getModels() as $pengajar){ 
        ?>
        <tr>
                <td><?= $no++ ?></td>
                <td><?= $pengajar->nip; ?></td>
                <td><?= $pengajar->nama; ?></td>
                <td><?= $pengajar->relasiKategori->nama; ?></td>
                <td><?= $pengajar->alamat; ?></td>
                <td><?= $pengajar->hp; ?></td>
                <td><?= $pengajar->email; ?></td>
               
        </tr>
        <?php
        }
        ?>
        </table>
    </div>   
</body>
</html>