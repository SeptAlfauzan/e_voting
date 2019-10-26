<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <title>E Voting</title>
</head>

<body class="bg-svg-landing">
    <!-- best books to read -->
    <div style="height:50vh; background: #002142 !important"></div>
    <div class="container bg-white rounded " style="margin-top: -300px">
        <div class="row col-12 m-auto m-0 p-0">
            <div class="col-md-6 col-12 m-0 order-md-2 order-1">
                <img src="<?= base_url() ?>images/<?= $calon_detail->{'foto_calon'} ?>" class="col-12 m-0 p-0 img-calon rounded" alt="" srcset="">
            </div>
            <div class="col-md-6 col-12 m-0 order-md-1 order-2 m-auto">
                <h1 class="text-center"> <?= $calon_detail->{'nama_calon'} ?> </h1>
                <h2>Visi</h2>
                <div class="text-secondary">
                    <?= $calon_detail->{'visi_calon'} ?>
                </div>
                <h2>Misi</h2>
                <div class="text-secondary">
                    <?= $calon_detail->{'misi_calon'} ?>
                </div>
            </div>
        </div>
        <div class="row col-12 m-auto m-0 p-0">
            <div class="col-md-6 col-12 row ml-md-auto ml-0 m-0">
                <div class="p-1 col-md-6 col-12
col-md-6 col-12 order-md-2 order-1">
                    <button id="btnVote" link="<?= base_url('Detail') ?>/insertVote?id_calon=<?= $calon_detail->{'id_calon'} ?>" class="btn btn-primary col-12 m-0" onclick="vote()">Pilih</button>
                </div>
                <div class="p-1 col-md-6 col-12
col-md-6 col-12  order-md-1 order-2">
                    <a href="<?= base_url('Landing') ?>" class="btn btn-secondary col-12 m-0">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script>
    function vote() {

        const voteLink = $('#btnVote').attr('link');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary m-2',
                cancelButton: 'btn btn-outline-primary m-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin memilih?',
            text: "klik tombol ya jika telah yakin dengan pilihan anda",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, saya yakin',
            cancelButtonText: 'saya tidak yakin',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire(
                    'berhasil memilih!',
                    'Terimakasih telah menggunakan hak suara anda. Anda akan otomatis logout 😊',
                    'success',
                    setTimeout(function() {
                        document.location.href = voteLink
                    }, 3000),

                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }
</script>

</html>