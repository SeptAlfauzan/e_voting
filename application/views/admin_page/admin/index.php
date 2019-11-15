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
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
        </nav>
    </header>


    <?php $this->load->view('admin_page/template/sidebar/index'); ?>
    <div class="page-wrapper">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('editfail') == true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Edit gagal, </strong><?= $this->session->flashdata('editfail') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Tambah admin baru
            </button>
            <div class="collapse" id="collapseExample">
                <div class="card card-body mt-5">
                    <form class="form-inline" method="post" action="<?= base_url('AdminPage/addNewAdmin') ?>">
                        <div class="form-group mb-2">
                            <label for="staticEmail2" class="sr-only">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="username" name="username">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputPassword2" class="sr-only">Password</label>
                            <input type="text" class="form-control" id="inputPassword2" placeholder="Password" name="password">
                        </div>
                        <button class="btn btn-secondary mb-2 mr-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary mb-2">Tambahkan</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title col-md-8 col-12 m-auto">Admin</h4>
                </div>
                <div class="table-responsive pb-5">
                    <table class="table table-hover col-md-8 col-12  m-auto">
                        <thead>
                            <tr>
                                <th class="border-top-0">Username</th>
                                <th class="border-top-0 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admin as $data) { ?>
                                <tr>
                                    <td class="txt-oflo"><?= $data['username'] ?></td>
                                    <td class="text-right">
                                        <a href="#" class="label label-purple label-rounded text-white" data-toggle="modal" data-target="#modalEdit<?= $data['id_admin'] ?>">edit</a>
                                        <a href="<?= base_url('AdminPage/delAdmin') ?>?id=<?= $data['id_admin'] ?>" class="label label-danger label-rounded text-white">delete</a>
                                    </td>
                                </tr>

                                <!-- Modal edit -->
                                <div class="modal fade" id="modalEdit<?= $data['id_admin'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="<?= base_url('AdminPage/editAdmin') ?>?id=<?= $data['id_admin'] ?>">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Username</label>
                                                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $data['username'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password</label>
                                                        <input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="type your new password">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="retype_password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="retype your new password">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php $this->load->view('admin_page/template/footer/index.php'); ?>