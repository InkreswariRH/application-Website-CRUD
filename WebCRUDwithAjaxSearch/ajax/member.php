<?php
    require '../function.php';
    $key = $_GET["keyword"];

    $query = "SELECT * FROM member WHERE
                nama LIKE '%$key%' OR
                grup LIKE '%$key%' OR
                tahun_lahir LIKE '%$key%' OR
                agensi LIKE '%$key%'";

    $result = tampil($query);

    
?>

<table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Grup</th>
                <th>Tahun Lahir</th>
                <th>Agensi</th>
            </tr>
        </thead>

        <?php $i = 1;?>
        <?php foreach($result as $row){?>
        <tbody>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>">Hapus</a>
                </td>
                <td><img src="img/<?= $row["foto"]; ?>" width=30></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["grup"]; ?></td>
                <td><?= $row["tahun_lahir"]; ?></td>
                <td><?= $row["agensi"]; ?></td>
            </tr>   
        </tbody>
        <?php $i++;?>
        <?php } ?>
    
    </table>