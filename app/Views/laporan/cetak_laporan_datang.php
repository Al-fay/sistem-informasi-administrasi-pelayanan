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
            LAPORAN PENDUDUK PENDATANG
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
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat Asal</th>
                <th scope="col">Alamat Sekarang</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($laporan_datang as $r) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= date('d-m-Y', strtotime($r->tanggal)) ?></td>
                    <td><?= $r->kepala_keluarga ?></td>
                    <td><?= $r->tempat_lahir ?></td>
                    <td><?= $r->tgl_lahir ?></td>
                    <td><?= $r->jenis_kelamin ?></td>
                    <td><?= $r->alamat_asal ?></td>
                    <td><?= $r->alamat_sekarang ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>