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
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
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
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>assets/admin_page_assets/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>


    <?php $this->load->view('admin_page/template/sidebar/index.php'); ?>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Grafik Suara</h4>
                            <div class="container col-md-6 col-12 grafik">
                                <canvas id="chartSuara" width="400" height="400"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Pemilih</h5>
                            <div class="container col-12 grafik">
                                <canvas id="chartPemilih" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
    </div>

</div>
<!-- data calon -->
<?php
foreach ($calon as $dataCalon) {
    $namaCalon[] = $dataCalon['nama_calon'];
    $perolehanSuara[] = $dataCalon['jumlah_suara'];
}
?>
<!-- perolehan suara calon -->

<!-- chart suara -->
<script>
    var ctx = document.getElementById('chartSuara');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($namaCalon) ?>,
            datasets: [{
                label: '# of Votes',
                data: <?= json_encode($perolehanSuara) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<?php
$jumlah_belum_milih = count($belumMemilih);
$jumlah_sudah_memilih = count($sudahMemilih);
?>
<script>
    var ctx = document.getElementById('chartPemilih');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['belum memilih', 'sudah memilih'],
            datasets: [{
                label: '# of Votes',
                data: [<?= $jumlah_belum_milih ?>, <?= $jumlah_sudah_memilih ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<!-- <script src="<?= base_url() ?>assets/admin_page_assets/assets/libs/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url() ?>assets/admin_page_assets/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>assets/admin_page_assets/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url() ?>assets/admin_page_assets/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?= base_url() ?>assets/admin_page_assets/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url() ?>assets/admin_page_assets/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>assets/admin_page_assets/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="<?= base_url() ?>assets/admin_page_assets/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url() ?>assets/admin_page_assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url() ?>assets/admin_page_assets/dist/js/pages/dashboards/dashboard1.js"></script>


<!-- <script>
    setInterval(function() {
        $('.grafik').load(<?= base_url('AdminPage') ?>);
    }, 1000);
</script> -->

</body>

</html>