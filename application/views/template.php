<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AJUMAS</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('') ?>style1/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link href="<?php echo base_url('') ?>style1/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- data table -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" /> -->
    <link href="<?php echo base_url('') ?>style1/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- ===================================== Untuk adamin==================================================== -->

            <?php if ($this->session->userdata('level') == 'admin') { ?>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?php echo base_url('admin') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <img src="<?php echo base_url()?>assets/ajumas.png" class="d-block w-40" alt="..." style="height: 60px">
                <div class="sidebar-brand-text mx-3">AJUMAS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin') ?>">
                    <i class="fas fa-fw fa-grip-vertical"></i>
                    <span>Admin</span></a>
            </li>

            <?php } ?>

            <!-- ===================================== Untuk penyedia jasa==================================================== -->

            <?php if ($this->session->userdata('level') == 'penyedia_jasa') { ?>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?php echo base_url('penyedia_jasa') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <img src="<?php echo base_url()?>assets/ajumas.png" class="d-block w-40" alt="..." style="height: 60px">
                <div class="sidebar-brand-text mx-3">AJUMAS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('penyedia_jasa') ?>">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Penyedia jasa</span></a>
            </li>

            <?php } ?>

            <!-- ====================================================================================================== -->

            <!-- ===================================== Untuk pengguna jasa==================================================== -->

            <?php if ($this->session->userdata('level') == 'pengguna_jasa') { ?>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?php echo base_url('pengguna_jasa') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <img src="<?php echo base_url()?>assets/ajumas.png" class="d-block w-40" alt="..." style="height: 60px">
                <div class="sidebar-brand-text mx-3">AJUMAS</div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('pengguna_jasa') ?>">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Pengguna jasa</span></a>
            </li>

            <?php } ?>

            <!-- ====================================================================================================== -->


            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- ===================================== Untuk admin==================================================== -->



            <?php if($this->session->userdata('level')== 'admin') {?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> Data:</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin') ?>">Admin</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/vpjasa') ?>">Penyedia jasa</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/vujasa') ?>">Pengguna jasa</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/dp_pesanan') ?>">Daftar Pesanan</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/daftar_jasa') ?>">Tambah daftar
                            jasa</a>
                        <!-- <a class="collapse-item" href="cards.html">Ganti Password</a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/verif') ?>">
                    <i class="fas fa-fw fa-user-check"></i>
                    <?php 
                    $filter['kd_verifikasi'] = '0';
                    $sang = $this->db->get_where('penyedia_jasa',$filter)->num_rows();
                    ?>
                    <span class="badge badge-danger badge-counter"><?php echo $sang ?></span>
                    <span>Verifikasi penyedia</span></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/verif1') ?>">
                    <i class="fas fa-fw fa-user-check"></i>
                    <?php 
                    $filter2['kd_verifikasi'] = '0';
                    $sang2 = $this->db->get_where('pengguna_jasa',$filter2)->num_rows();
                ?>
                    <span class="badge badge-danger badge-counter"><?php echo $sang2 ?></span>
                    <span>Verifikasi Pengguna</span></a>
            </li> -->

            <?php } ?>

            <!-- ====================================== verifikasi penyedia jasa ============================================= -->

            <?php if($this->session->userdata('level')== 'verifikasi_jasa') {?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('penyedia_jasa/profil') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('penyedia_jasa/pemesan') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>verifikasi jasa</span></a>
            </li>

            <?php } ?>

            <!-- ===================================== Untuk penyedia_jasa==================================================== -->

            <?php if($this->session->userdata('level')== 'penyedia_jasa') {?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('penyedia_jasa/profil') ?>">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('penyedia_jasa/pemesan') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Daftar pemesan</span></a>
            </li>

            <?php } ?>
            <!-- =============================================================================================================-->


            <!-- ===================================== Untuk pengguna_jasa==================================================== -->

            <?php if($this->session->userdata('level')== 'pengguna_jasa') {?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pengguna_jasa/profil') ?>">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pengguna_jasa/keranjang_pemesan') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Keranjang Pesanan</span></a>
            </li>

            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('login/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->
                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->

                        <!-- ===================================== Untuk adamin==================================================== -->
                        <?php if($this->session->userdata('level')== 'admin') {?>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                                <?php
                                    if (empty($this->session->userdata('foto'))){
                                        ?>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ?>style1/img/undraw_profile.svg">
                                <?php
                                    }else{
                                        ?>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url('assets/foto_pengguna_jasa/').$this->session->userdata('foto'); ?> ">
                                <?php
                                    }
                                    ?>
                                <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                        <?php } ?>

                        <!-- ====================================================================================================== -->

                        <!-- ===================================== Untuk penyedia jasa==================================================== -->
                        <?php if($this->session->userdata('level')== 'penyedia_jasa') {?>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                                <?php
                                    if (empty($this->session->userdata('foto'))){
                                        ?>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ?>style1/img/undraw_profile.svg">
                                <?php
                                    }else{
                                        ?>

                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url('assets/foto_penyedia_jasa/').$this->session->userdata('foto'); ?> ">
                                <?php
                                    }
                                    ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('penyedia_jasa/profil')?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                        <?php } ?>
                        <!-- ====================================================================================================== -->

                        <!-- ===================================== Untuk pengguna jasa==================================================== -->
                        <?php if($this->session->userdata('level')== 'pengguna_jasa') {?>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                                <?php
                                    if (empty($this->session->userdata('foto'))){
                                        ?>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ?>style1/img/undraw_profile.svg">
                                <?php
                                    }else{
                                        ?>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url('assets/foto_pengguna_jasa/').$this->session->userdata('foto'); ?> ">
                                <?php
                                    }
                                    ?>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('pengguna_jasa/profil')?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                        <?php } ?>

                        <!-- ====================================================================================================== -->

                    </ul>



                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo $contents ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AJUMAS <?php echo date('Y') ?> Q</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Siap untuk keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-primary" href="<?php echo base_url('login')?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('') ?>style1/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('') ?>style1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('') ?>style1/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('') ?>style1/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('') ?>style1/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('') ?>style1/js/demo/chart-area-demo.js"></script>
    <!-- <script src="<?php echo base_url('') ?>style1/js/demo/chart-pie-demo.js"></script> -->

    <!-- reting -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!-- data tabel -->
    <script src="<?php echo base_url('') ?>style1/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('') ?>style1/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('') ?>style1/js/demo/datatables-demo.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
    var quill = new Quill('#editor-container', {
        theme: 'snow',
    });

    var initialContent = "<?php echo htmlspecialchars($oka->deskripsi_jasa); ?>";
    quill.clipboard.dangerouslyPasteHTML(initialContent);

    quill.on('text-change', function() {
        var html = document.querySelector('#editor-container .ql-editor').innerHTML;
        document.querySelector('#deskripsi_jasa_input').value = html;
    });
    </script>
    <script>
    var quill = new Quill('#editor-profil', {
        theme: 'snow',
    });

    var initialContent = "<?php echo htmlspecialchars($oka->profil_penyedia); ?>";
    quill.clipboard.dangerouslyPasteHTML(initialContent);

    quill.on('text-change', function() {
        var html = document.querySelector('#editor-profil .ql-editor').innerHTML;
        document.querySelector('#profil_penyedia_input').value = html;
    });
    </script>


    <script>
    AOS.init();


    $(document).ready(function() {
        var images = []; // Array to store image sources
        var currentIndex = 0;

        $('[data-toggle="modal"]').on('click', function() {
            // Populate the images array with sources
            $('[data-toggle="modal"]').each(function() {
                images.push($(this).data('img'));
            });

            // Set the source of the modal image
            var imgSrc = $(this).data('img');
            currentIndex = images.indexOf(imgSrc);
            $('#modalImage').attr('src', imgSrc);

            // Show the modal
            $('#myModal').modal('show');
        });

        // Handle the modal close event
        $('#myModal').on('hidden.bs.modal', function() {
            // Clear the source of the modal image
            $('#modalImage').attr('src', '');
            currentIndex = 0;
            images = [];
        });

        // Handle the next button click
        $('#nextBtn').on('click', function() {
            currentIndex = (currentIndex + 1) % images.length;
            $('#modalImage').attr('src', images[currentIndex]);
        });

        // Handle the previous button click
        $('#prevBtn').on('click', function() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            $('#modalImage').attr('src', images[currentIndex]);
        });
    });
    </script>






    <!-- ======================================= -->

    <script>
    $(function() {
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
    </script>

    <!-- skrip table
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->

    <!-- <script>
    $(document).ready(function() {
        $('#tabelx').DataTable();
    });
    $(document).ready(function() {
        $('#tabelxx').DataTable();
    });
    </script> -->


    <!-- skrip chart data -->
    <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Ajumas Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Penyedia jasa", "Pengguna jasa ", "Daftar jasa"],
            datasets: [{
                data: [<?php echo $penyedia ?>, <?php echo $pengguna ?>, <?php echo $daftar ?>],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
    </script>

</body>

</html>