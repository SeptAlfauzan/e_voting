<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>E Voting</title>
</head>

<body class="bg-svg-white">
    <!-- best books to read -->
    <div class="row col-12 m-0 p-0 position-relative " style="height:30vh;">
        <h1 class="txt-banner col-12 text-center text-white">Silahkan Memilih kandidat Ketua OSIS</h1>
    </div>
    <div class="row col-12 pl-5 pr-5 p-0 m-0 justify-content-center" style="margin-top: -50px !important; margin-bottom: 100px !important;">
        <?php foreach ($calon as $dataCalon) { ?>
            <div class="col-lg-3 col-md-4 col-10 p-3 m-0">
                <div class="bg-white col-12 m-0 p-0 border border-secondary shadow rounded" data-aos="fade-up" data-aos-duration="1000">
                    <img class="card-img-top" src="<?= base_url() ?>images/<?= $dataCalon['foto_calon'] ?>" style="height: 30vh; object-fitt: cover" alt="Card image cap">
                    <div class="card-body text-left">
                        <h5 class="card-title"><?= $dataCalon['nama_calon'] ?></h5>
                        <a href="<?= base_url('Detail') ?>?id_calon=<?= $dataCalon['id_calon'] ?>" class="btn btn-primary pl-3 pr-3 col-12">Lihat Visi Misi</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>