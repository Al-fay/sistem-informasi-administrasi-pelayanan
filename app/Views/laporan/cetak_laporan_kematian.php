<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <center>
        <h2 style="margin-top:20px; margin-bottom: 50px;">
            LAPORAN KEMATIAN
            <br>
            KELURAHAN KEDUNGWUNI BARAT
        </h2>
    </center>

    <P>Periode :</P>
    <table style="width:100%" cellpadding="4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tempat Meninggal</th>
                <th scope="col">Hari Kematian</th>
                <th scope="col">Tanggal Meninggal</th>
                <th scope="col">Sebab Meninggal</th>
                <th scope="col">NIK</th>
                <th scope="col">No.KK</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($laporan_kematian as $r) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= date('d-m-Y', strtotime($r->tanggal)) ?></td>
                    <td><?= $r->nama_meninggal ?></td>
                    <td><?= $r->umur ?></td>
                    <td><?= $r->alamat ?></td>
                    <td><?= $r->jenis_kelamin ?></td>
                    <td><?= $r->tempat_meninggal ?></td>
                    <td><?= $r->hari_meninggal ?></td>
                    <td><?= date('d-m-Y', strtotime($r->tgl_meninggal)) ?></td>
                    <td><?= $r->sebab_meninggal ?></td>
                    <td><?= $r->nik ?></td>
                    <td><?= $r->no_kk ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>