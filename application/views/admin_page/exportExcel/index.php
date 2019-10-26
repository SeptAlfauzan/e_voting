<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        th, td{
            border: 1px solid black;
            text-align: left;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php 
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename= Data_Pemilih.xls");
    ?>
    <table id="example" class="table table-striped table-bordered">
            <tr>
                <th>Username</th>
                <th>Password</th>
                <!-- <th>Status</th> -->
            </tr>
            <?php foreach ($pemilih as $dataPemilih) { ?>
                <tr>
                    <td><?= $dataPemilih['id_pemilih'] ?></td>
                    <td><?= $dataPemilih['password_pemilih'] ?></td>
                    <!-- <?php if ($dataPemilih['status_pemilih'] == 0) { ?>
                        <td class="text-center"><span class="text-danger">belum memilih</span></td>
                    <?php } else { ?>
                        <td class="text-center"><span class="text-success">sudah memilih</span></td>
                    <?php } ?> -->
                </tr>
            <?php } ?>
    </table>
</body>

</html>