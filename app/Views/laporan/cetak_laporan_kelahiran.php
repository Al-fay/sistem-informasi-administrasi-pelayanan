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
            LAPORAN KELAHIRAN
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
                <th scope="col">Nama Anak</th>
                <th scope="col">Nama Ayah</th>
                <th scope="col">Nama Ibu</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Hari Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Tempat Lahir</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($laporan_kelahiran as $r) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= date('d-m-Y', strtotime($r->tanggal)) ?></td>
                    <td><?= $r->nama_anak ?></td>
                    <td><?= $r->nama_ayah ?></td>
                    <td><?= $r->nama_ibu ?></td>
                    <td><?= $r->jenis_kelamin ?></td>
                    <td><?= $r->alamat ?></td>
                    <td><?= $r->hari_kelahiran ?></td>
                    <td><?= $r->tgl_kelahiran ?></td>
                    <td><?= $r->tempat_kelahiran ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>