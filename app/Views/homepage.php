<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Sistem Pakar</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css') ?>">
    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url('asset/css/responsive.css') ?>">
    <!-- fevicon -->
    <link rel="icon" href="<?= base_url('asset/images/fevicon.png') ?>" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('asset/css/jquery.mCustomScrollbar.min.css') ?>">

    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="<?= base_url('asset/images/loading.gif'); ?>" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo mt-3"> <a href="#"><img src="<?= base_url('asset/images/logo.png'); ?>" alt="logo" /></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">

                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <li><a class="buy" href="<?= base_url('login'); ?>">Login</a></li>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <section class="slider_section">
        <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($homepageData as $key => $item) : ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                        <img class="first-slide img-fluid" src="<?= base_url('asset/images/background.jpg') ?>" alt="">
                        <div class="container">
                            <div class="carousel-caption relative">
                                <h3 class="mb-3">Sekilas Penyakit: </h3>
                                <img src="<?= base_url('uploads/penyakit/' . $item['gambar']) ?>" alt="Penyakit Image" width="300" height="200">
                                <h1><strong><?= $item['nama'] ?></strong></h1>
                                <p><?= $item['detail'] ?></p>
                                <a href="<?= base_url('login'); ?>">Get Started</a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CERTAINTY FACTOR DIAGNOSIS -->
    <div class="certainty-factor-diagnosis mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-3">
                    <div class="title">
                        <h2>Metode<strong class="black" Diagnosis</strong>Diagnosis</h2>
                        <span>Keunggulan metode Certainty Factor dalam diagnosa penyakit ayam!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="certainty-factor-diagnosis-bg">
        <div class="container">
            <div class="white-bg">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="feature-box">
                            <i class="fas fa-stopwatch"></i>
                            <h3>Diagnosis Cepat</h3>
                            <p>Menggunakan metode Certainty Factor untuk diagnosis yang cepat dan akurat.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="feature-box">
                            <i class="fas fa-bullseye"></i>
                            <h3>Akurasi Tinggi</h3>
                            <p>Metode Certainty Factor memastikan tingkat akurasi yang tinggi dalam diagnosa penyakit ayam.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="feature-box">
                            <i class="fas fa-key"></i>
                            <h3>Mudah Digunakan</h3>
                            <p>Antarmuka yang sederhana dan intuitif untuk penggunaan yang mudah oleh peternak ayam.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="feature-box">
                            <i class="fas fa-balance-scale"></i>
                            <h3>Dukungan Keputusan</h3>
                            <p>Membantu peternak ayam dalam membuat keputusan yang tepat berdasarkan hasil diagnosa yang terpercaya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end CERTAINTY FACTOR DIAGNOSIS -->

    <!-- Layanan Dinamis -->
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Layanan<strong class="black">Kami</strong></h2>
                        <span>Cara mudah mendiagnosis penyakit ayam</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box">
                        <i class="fas fa-database"></i>
                        <h3>Data-driven</h3>
                        <p>Menggunakan data dinamis untuk diagnosis.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box">
                        <i class="fas fa-mouse-pointer"></i>
                        <h3>One-click Diagnosis</h3>
                        <p>Menawarkan diagnosis cepat dengan sekali klik.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="service-box">
                        <i class="fas fa-chart-line"></i>
                        <h3>Confidence Level Display</h3>
                        <p>Menampilkan persentase kepercayaan dalam hasil diagnosis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Layanan Dinamis -->
    <!--  footer -->




    <footr>
        <div class="copyright">
            <p id="copyright">
                Copyright <span id="currentYear"></span> All Right Reserved | Developed Using Certainty Factor Method for Chicken Disease Diagnosis
            </p>
        </div>
    </footr>
    <!-- end footer -->
    <!-- Javascript files-->
    <script>
        var currentYear = new Date().getFullYear();
        document.getElementById('currentYear').textContent = currentYear;
    </script>

    <script src="<?= base_url('asset/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/jquery-3.0.0.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/plugin.js') ?>"></script>
    <!-- sidebar -->
    <script src="<?= base_url('asset/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/custom.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>