<?php $this->load->view('admin_page/template/header/index.php'); ?>
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
                    <a href="index.html" class="logo">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url() ?>assets/admin_page_assets/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url() ?>assets/admin_page_assets/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?= base_url() ?>assets/admin_page_assets/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="<?= base_url() ?>assets/admin_page_assets/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                </div>
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            
        </nav>
    </header>


    <?php $this->load->view('admin_page/template/sidebar/index'); ?>
    <div class="page-wrapper">
        <div class="container-fluid">
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
                        <button class="btn btn-outline-primary col-12">Kembali</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
    </div>
</div>
<?php $this->load->view('admin_page/template/footer/index.php'); ?>