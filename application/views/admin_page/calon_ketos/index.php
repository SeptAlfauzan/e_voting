<?php $this->load->view('admin_page/template/header/index.php'); ?>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header" data-logobg="skin5">
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
                </a>
                <div class="navbar-brand">
                    <span href="index.html" class="logo text-white m-auto">
                        Admin
                    </span>
                </div>
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item search-box">
                        <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-magnify font-20 mr-1"></i>
                                <div class="ml-1 d-none d-sm-block">
                                    <span>Search</span>
                                </div>
                            </div>
                        </a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter">
                            <a class="srh-btn">
                                <i class="ti-close"></i>
                            </a>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>assets/admin_page_assets/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <?php $this->load->view('admin_page/template/sidebar/index'); ?>
    <div class="page-wrapper">
        <div class="container-fluid">

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                tambah calon <span style="font-size: 22px">+</span>
            </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body m-auto">
                    <?= form_open_multipart('AdminPage/uploadCalon') ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">nama calon</label>
                        <input required type="text" name="nama_calon" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto calon</label>
                        <input required type="file" class="form-control-file" id="profile_image" name="profile_image">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Visi</label>
                        <textarea required class="form-control" id="exampleFormControlTextarea1" name="visi_calon" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Misi</label>
                        <textarea required class="form-control" id="exampleFormControlTextarea1" name="misi_calon" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="ml-auto col-md-6 col-12 row m-0 p-0">
                            <div class="p-1 col-md-6 col-12  order-md-2 order-1">
                                <button class="btn btn-primary col-12">Tambahkan</button>
                            </div>
                            <div class="p-1 col-md-6 col-12  order-md-1 order-2">
                                <button class="btn btn-outline-primary col-12" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Batal</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>


            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Misi</th>
                        <th>Visi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($calon as $dataCalon) { ?>
                        <tr>
                            <td><?= $dataCalon['nama_calon'] ?></td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVisi<?= $dataCalon['id_calon'] ?>">
                                    Lihat Visi
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalVisi<?= $dataCalon['id_calon'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Visi <?= $dataCalon['nama_calon'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?= $dataCalon['visi_calon'] ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMisi<?= $dataCalon['id_calon'] ?>">
                                    Lihat Misi
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalMisi<?= $dataCalon['id_calon'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Misi <?= $dataCalon['nama_calon'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?= $dataCalon['misi_calon'] ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="<?= base_url()?>images/<?= $dataCalon['foto_calon']?>" alt="" srcset="" style="width: 50px; height: 70px; object-fit: cover;">
                            </td>
                            <td class="row col-12">
                                <a href="<?= base_url() ?>AdminPage/editDataCalon?id=<?= $dataCalon['id_calon'] ?>" style="padding: 0 !important" class="btn btn-warning p-0 col-md-6 col-12">
                                    <i class="m-0 p-0 mdi mdi-account-edit md-36" style=" font-size: 30px !important;"></i>
                                </a>
                                <a href="<?= base_url() ?>AdminPage/delDataCalon?id=<?= $dataCalon['id_calon'] ?>" style="padding: 0 !important" class="btn btn-danger col-md-6 col-12">
                                    <i class=" mdi mdi-delete-circle md-36" style="font-size: 30px !important;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

            </table>
        </div>
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
    </div>
</div>
<?php $this->load->view('admin_page/template/footer/index.php'); ?>