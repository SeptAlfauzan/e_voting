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
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
                </a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
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
            <a target="_blank" href="<?= base_url('AdminPage/exportExcel') ?>" class="btn btn-info">export data ke excel</a>
            <div class="col-12 row mt-3 mb-3 m-0 p-0">
                <small class="text-danger">*masukkan jumlah pemilih baru</small>
                <div class="row col-12 m-0 p-0 border">

                    <form method="post" action="<?= base_url('AdminPage/insertVoters') ?>" class="form-inline p-0 m-0 order-2 float-right col-8">
                        <div class="form-group">
                            <!-- <label for="exampleFormControlInput1" class="mr-3"></label> -->
                            <input type="number" min="1" required class="form-control col-12" name="jumlah_pemilih" id="exampleFormControlInput1" placeholder="Tambah jumlah pemilih baru">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger position-absolute" style="right: 0 !important" data-toggle="modal" data-target="#deleteAll">
                        Hapus semua pemilih
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body p-5">
                                    <h3 class="text-danger text-center mb-4">Hapus semua data pemilih!</h3>
                                    <h5 class="text-secondary">Apakah anda yakin ingin menghapus semua data pemilih?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, batalkan hapus</button>
                                    <a href="<?= base_url('AdminPage/delAllPemilih') ?>" class="btn btn-danger">Ya, hapus semua data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pemilih as $dataPemilih) { ?>
                        <tr>
                            <td><?= $dataPemilih['id_pemilih'] ?></td>
                            <td><?= $dataPemilih['password_pemilih'] ?></td>
                            <?php if ($dataPemilih['status_pemilih'] == 0) { ?>
                                <td class="text-center"><span class="text-danger">belum memilih</span></td>
                            <?php } else { ?>
                                <td class="text-center"><span class="text-success">sudah memilih</span></td>
                            <?php } ?>
                            <td>
                                <button type="button" class="btn btn-danger col-12" style="right: 0 !important" data-toggle="modal" data-target="#deleteAll<?= $dataPemilih['id_pemilih'] ?>">
                                    Hapus
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteAll<?= $dataPemilih['id_pemilih'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-5">
                                                <h3 class="text-danger text-center mb-4">Hapus data pemilih!</h3>
                                                <h5 class="text-secondary">Apakah anda yakin ingin menghapus data pemilih ini?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, batalkan hapus</button>
                                                <a href="<?= base_url('AdminPage/delPemilih?id=' . $dataPemilih['id_pemilih']) ?>" class="btn btn-danger">Ya, hapus data</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
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