<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>E Voting</title>
</head>

<body class="bg-main bg-svg-white">


    <div class="container col-12 row p-5 m-auto">

        <div class="col-md-6 col-12 m-0 p-0 position-relative">
            <div id="carouselExampleFade" class="carousel slide carousel-fade position-relative" style="top: 30%" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="txt-landing carousel-item active">
                        <h1 class="col-md-8 col-12 text-white">Selamat datang di website E-Voting Ketua OSIS SMKN 1 Boyolangu</h1>
                    </div>
                    <div class="txt-landing carousel-item">
                        <h1 class="col-md-8 col-12 text-white">Login terlebih dahulu dengan username dan password yang telah diberikan panitia</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 m-0 p-0">
            <form class="col-12 bg-transp rounded p-3 pb-5 pt-5 justify-content-center position-relative" style="top: 30%" method="post" action="<?= base_url('Dashboard/login') ?>">
                <?php if ($this->session->flashdata('msg_login')) { ?>
                    <div class="alert alert-danger alert-dismissible fade show col-md-10 col-12 m-auto" role="alert">
                        <?= $this->session->flashdata('msg_login')?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <div class="form-group m-auto col-md-10 col-12">
                    <label class="text-white" for="exampleFormControlInput1">Username</label>
                    <input type="text" class=" form-control border border-white  input-login text-light" style="" name="username" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="form-group m-auto col-md-10 col-12">
                    <label class="text-white" for="exampleFormControlInput1">Password</label>
                    <input type="password" class=" form-control border border-white input-login  text-light" style="" name="password" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="m-auto col-md-10 col-12 pt-3">
                    <button type="submit" class="shadow btn btn-info pl-3 pr-3 col-12">Login</button>
                </div>
            </form>
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