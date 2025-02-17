<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>โรงเรียนพานพิทยาคม</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@100;400&display=swap" rel="stylesheet">        
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-white">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                    <span class="fs-7 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>โทรศัพท์:</span>
                    <span class="fs-7 fw-bold"> 0-5372-1512 มือถือ. 09-4706-4411</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
        <a href="index.html" class="navbar-brand ps-5 me-0">
            <h3 class="text-white m-0">Education</h3>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('welcome') }}" class="nav-item nav-link active">หน้าแรก</a>
                <a href="{{ route('welcome') }}" class="nav-item nav-link">เกี่ยวกับ</a>
                <a href="{{ route('welcome') }}" class="nav-item nav-link">ระบบสารสนเทศ</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ระบบออนไลน์</a>
                    {{-- <div class="dropdown-menu bg-light m-0">
                        <a href="project.html" class="dropdown-item">Projects</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div> --}}
                </div>
                <a href="contact.html" class="nav-item nav-link">ติดต่อ</a>
            </div>
            <a href="{{ url('dashboard') }}" class="btn btn-primary px-3 d-none d-lg-block">Admin</a>
            {{-- href="{{ url('/takeclass1') }}" --}}
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-3 fw-medium text-primary text-uppercase animated slideInRight">โรงเรียนพานพิทยายม</p>
                                    <h1 class="display-9 text-white mb-5 animated slideInRight">เปิดรับสมัครนักเรียน 12 ก.พ.-13 มี.ค. 2568</h1>
                                    {{-- <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">กดสมัครนักเรียน</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-3 fw-medium text-primary text-uppercase animated slideInRight">โรงเรียนพานพิทยาคม</p>
                                    <h1 class="display-9 text-white mb-5 animated slideInRight">โรงเรียนพานพิทยาคมเป็นองค์กรแห่งการเรียนรู้ มีคุณภาพตามมาตรฐานสากล ส่งเสริมผู้เรียนให้มีทักษะวิชาชีพและดำรงชีวิตบนพื้นฐานหลักปรัชญาเศรษฐกิจพอเพียง</h1>
                                    {{-- <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row gx-3 h-100">
                        <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid" src="img/about-1.jpg">
                        </div>
                        <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                            <img class="img-fluid" src="img/about-2.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">สมัคร</p>
                    <h3 class="display-9 mb-4">ห้องเรียน ม.1</h3>
                    {{-- <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p> --}}
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0 bg-primary p-4">
                            <h1 class="display-1 text-center"> 7 </h1>
                            <h5 class="text-white">แผนการเรียน</h5>
                            {{-- <h5 class="text-white">Experience</h5> --}}
                        </div>
                        <div class="ms-4">
                            {{-- <p><i class="fa fa-check text-primary me-3"></i>ห้องเรียนวิทยาศาสตร์พลังสืบ</p> --}}
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนห้องเรียนพิเศษ (วิทยาศาสตร์-คณิตศาสตร์) ISMP Intensive Science and Mathematics Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนห้องเรียนวิทยาศาสตร์พลังสิบ TPSP Ten Power Science Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP Digital Technology Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP English Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านภาษาจีน CEP Chinese Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP Japanese Excellence Program</p>
                            <p class="mb-0"><i class="fa fa-check text-primary me-3"></i>ห้องเรียนทั่วไป GP General Program</p>
                        </div>
                    </div>			
                </div>
				<div class="col-lg-6">
                    <div class="row gx-3 h-100">
                        <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid" src="img/about-3.jpg">
                        </div>
                        <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                            <img class="img-fluid" src="img/about-22.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">สมัคร</p>
                    <h3 class="display-9 mb-4">ห้องเรียน ม.4</h3>
                    {{-- <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p> --}}
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0 bg-primary p-4">
                            <h1 class="display-1 text-center"> 10 </h1>
                            <h5 class="text-white">แผนการเรียน</h5>
                            {{-- <h5 class="text-white">Experience</h5> --}}
                        </div>
                        <div class="ms-4">
                            {{-- <p><i class="fa fa-check text-primary me-3"></i>ห้องเรียนวิทยาศาสตร์พลังสืบ</p> --}}
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนห้องเรียนพิเศษ (วิทยาศาสตร์-คณิตศาสตร์) ISMP Intensive Science and Mathematics Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนห้องเรียนวิทยาศาสตร์พลังสิบ TPSP Ten Power Science Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนวิทยาศาสตร์ - คณิตศาสตร์ SMEP Science Math Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านคณิตศาสตร์ - ภาษาอังกฤษ EMEP English & Math Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP Digital Technology Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP English Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านภาษาจีน CEP Chinese Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP Japanese Excellence Program</p>
                            <p><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP Vocational Skills Program</p>
                            <p class="mb-0"><i class="fa fa-check text-primary me-3"></i>แผนการเรียนเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP Thai, English & Social Studies Excellence Program</p>
                        </div>
                    </div>			
                </div> 
				 <div class="col-sl-6 d-flex justify-content-center align-items-center"><p>1. ใบสมัครที่กรอกข้อมูลครบถ้วนสมบูรณ์ <br>
                        2. เอกสาร ปพ.7 หรือ สำเนาเอกสาร ปพ.1 เพื่อยืนยันสถานะการเป็นนักเรียน <br>
                        3. รูปถ่ายเครื่องแบบนักเรียนขนาด 1.5 นิ้ว จํานวน 1 รูป <br>
                        4. สำเนาทะเบียนบ้านของนักเรียน<br>
                        คุณสมบัติผู้สมัคร<br>
                        - กําลังศึกษาอยู่ในระดับชั้น ป.6 หรือ ม.3                        
                    </p>
				</div>
				<div class="row justify-content-center">
                        <div class="col-sm-6 text-start justify-content-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Call us</p>
                                    <h5 class="mb-0">09-4706-4411</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Call us</p>
                                    <h5 class="mb-0">0-5372-1512</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                  
            </div>
        </div>
    </div>
    <!-- About End -->
    <div class="container">
        <div class="row justify-content-center p2">
            <div class="col-sm-4 text-start" >
                <a href="{{ url('/takeclass1') }}" class="center btn btn-primary py-3 px-6 animated"><i class="bi bi-1-circle"></i>&nbsp;สมัครเรียน ม.1</a>
            </div>
            <div class="col-sm-4 text-start">
                <a href="{{ url('/takeclass4') }}" class="center btn btn-primary py-3 px-6 animated"><i class="bi bi-4-circle"></i>&nbsp;สมัครเรียน ม.4</a>
            </div>
            
        </div>   
    </div>
    @if (session('download_url'))
        <script>
            window.location.href = "{{ session('download_url') }}";
        </script>
    @endif
    
    <br>
    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center">
            <p class="mb-2">Copyright &copy; <a class="fw-semi-bold" href="#">Your Site Name</a>, All Right Reserved.
            </p>
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            <p class="mb-0">Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a> Distributed
                By: <a href="https://themewagon.com">ThemeWagon</a> </p>
        </div>
    </div>
    <!-- Copyright End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>