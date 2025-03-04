<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> โรงเรียนพานพิทยาคม </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@100;400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
                    <span class="fs-5 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>โทรศัพท์:</span>
                    <span class="fs-5 fw-bold"> 0-5372-1512 มือถือ. 09-4706-4411</span>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
        <a href="index.html" class="navbar-brand ps-5 me-0">
            <h1 class="text-white m-0">Education</h1>
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
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ระบบสารสนเทศ</a>
                    {{-- <div class="dropdown-menu bg-light m-0">
                        <a href="project.html" class="dropdown-item">Projects</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div> --}}
                </div>
                {{-- <a href="" class="btn btn-primary px-3 d-none d-lg-block">ติดต่อ</a> --}}
            </div>
            <a href="{{ url('dashboard') }}" class="btn btn-primary px-3 d-none d-lg-block">Admin</a>
        </div>
    </nav>
    <!-- Navbar End -->
    <br>
    <div class="container">
        <form class="row g-3" action="{{ route('store4') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-success text-center" role="alert">
                <h5><i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลนักเรียน ม.4</h5>
                **หากกรอกไม่ครบทุกช่องระบบจะไม่บันทึกข้อมูลให้ หากช่องไหนไม่มี ให้กรอก - ลงไป**
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    {{-- <label for="exampleFormControlInput1" class="form-label">คำนำหน้าชื่อ</label> --}}
                    <select id="classlevel" name="classlevels_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>ระดับชั้นที่สมัครเข้าเรียน</option>
                        <option value="2">ม.4</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_typetitle" name="typetitles_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>คำนำหน้าชื่อ</option>
                        <option value="1">เด็กชาย</option>
                        <option value="2">เด็กหญิง</option>
                        <option value="3">นาย</option>
                        <option value="4">นางสาว</option>
                        <option value="5">นาง</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อนักเรียน</span> --}}
                    <input type="text" name="name" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกชื่อนักเรียน">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span> --}}
                    <input type="text" name="surname" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="กรอกนามสกุล">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อนักเรียน</span> --}}
                    <input type="text" name="nameeng" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="กรอกชื่อนักเรียนภาษาอังกฤษ">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span> --}}
                    <input type="text" name="surnameeng" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="กรอกนามสกุลภาษาอังกฤษ">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">เลขประจำตัวประชาชน</span> --}}
                    <input type="text" name="nationalid" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="เลขประจำตัวประชาชน">
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_religion" name="religions_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>ศาสนา</option>
                        <option value="1">พุทธ</option>
                        <option value="2">อิสลาม</option>
                        <option value="3">คริสต์</option>
                        <option value="4">ซิกส์</option>
                        <option value="5">พราหมณ์/ฮินดู</option>
                        <option value="6">อื่นๆ</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_nationnalitie" name="nationalities_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>สัญชาติ</option>
                        <option value="1">ไทย</option>
                        <option value="2">ญี่ปุ่น</option>
                        <option value="3">กะเหรี่ยง</option>
                        <option value="4">อาข่า</option>
                        <option value="5">ลั๊ว</option>
                        <option value="6">ลาว</option>
                        <option value="7">พม่า</option>
                        <option value="8">ลาหู่</option>
                        <option value="9">ม้ง</option>
                        <option value="10">จีนฮ่อ</option>
                        <option value="11">ละว้า</option>
                        <option value="12">มอญ</option>
                        <option value="13">ไทยใหญ่</option>
                        <option value="14">มาเลเชีย</option>
                        <option value="15">อื่นๆ</option>
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <select id="sel_ethnicities" name="ethnicities_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>เชื้อชาติ</option>
                        <option value="1">ไทย</option>
                        <option value="2">ญี่ปุ่น</option>
                        <option value="3">กะเหรี่ยง</option>
                        <option value="4">อาข่า</option>
                        <option value="5">ลั๊ว</option>
                        <option value="6">ลาว</option>
                        <option value="7">พม่า</option>
                        <option value="8">ลาหู่</option>
                        <option value="9">ม้ง</option>
                        <option value="10">จีนฮ่อ</option>
                        <option value="11">ละว้า</option>
                        <option value="12">มอญ</option>
                        <option value="13">ไทยใหญ่</option>
                        <option value="14">มาเลเชีย</option>
                        <option value="15">อื่นๆ</option>
                    </select>
                </div>


                <div class="col-md-6 mb-2">
                    <div class="input-group date" id="datepicker">
                        <input type="text" name="dateofbirth" class="form-control" placeholder="วันเกิดนักเรียน">
                        <span class="input-group-text">
                            <i class="bi bi-calendar"></i>
                        </span>
                    </div>
                </div>


                <div class="col-md-6 mb-2">
                    <select id="sel_province" name="provincesbirth_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>จังหวัดเกิด</option>
                        <option value="1">น่าน</option>
                        <option value="2">พะเยา</option>
                        <option value="3">ลำปาง</option>
                        <option value="4">ลำพูน</option>
                        <option value="5">อุตรดิตถ์</option>
                        <option value="6">เชียงราย</option>
                        <option value="7">เชียงใหม่</option>
                        <option value="8">แพร่</option>
                        <option value="9">แม่ฮ่องสอน</option>
                        <option value="10">กรุงเทพมหานคร</option>
                        <option value="11">กำแพงเพชร</option>
                        <option value="12">ชัยนาท</option>
                        <option value="13">นครนายก</option>
                        <option value="14">นครปฐม</option>
                        <option value="15">นครสวรรค์</option>
                        <option value="16">นนทบุรี</option>
                        <option value="17">ปทุมธานี</option>
                        <option value="18">พระนครศรีอยุธยา</option>
                        <option value="19">พิจิตร</option>
                        <option value="20">พิษณุโลก</option>
                        <option value="21">ลพบุรี</option>
                        <option value="22">สมุทรปราการ</option>
                        <option value="23">สมุทรสงคราม</option>
                        <option value="24">สมุทรสาคร</option>
                        <option value="25">สระบุรี</option>
                        <option value="26">สิงห์บุรี</option>
                        <option value="27">สุพรรณบุรี</option>
                        <option value="28">สุโขทัย</option>
                        <option value="29">อุทัยธานี</option>
                        <option value="30">อ่างทอง</option>
                        <option value="31">เพชรบูรณ์</option>
                        <option value="32">กาฬสินธุ์</option>
                        <option value="33">ขอนแก่น</option>
                        <option value="34">ชัยภูมิ</option>
                        <option value="35">นครพนม</option>
                        <option value="36">นครราชสีมา</option>
                        <option value="37">บึงกาฬ</option>
                        <option value="38">บุรีรัมย์</option>
                        <option value="39">มหาสารคาม</option>
                        <option value="40">มุกดาหาร</option>
                        <option value="41">ยโสธร</option>
                        <option value="42">ร้อยเอ็ด</option>
                        <option value="43">ศรีสะเกษ</option>
                        <option value="44">สกลนคร</option>
                        <option value="45">สุรินทร์</option>
                        <option value="46">หนองคาย</option>
                        <option value="47">หนองบัวลำภู</option>
                        <option value="48">อำนาจเจริญ</option>
                        <option value="49">อุดรธานี</option>
                        <option value="50">อุบลราชธานี</option>
                        <option value="51">เลย</option>
                        <option value="52">กระบี่</option>
                        <option value="53">ชุมพร</option>
                        <option value="54">ตรัง</option>
                        <option value="55">นครศรีธรรมราช</option>
                        <option value="56">นราธิวาส</option>
                        <option value="57">ปัตตานี</option>
                        <option value="58">พังงา</option>
                        <option value="59">พัทลุง</option>
                        <option value="60">ภูเก็ต</option>
                        <option value="61">ยะลา</option>
                        <option value="62">ระนอง</option>
                        <option value="63">สงขลา</option>
                        <option value="64">สตูล</option>
                        <option value="65">สุราษฎร์ธานี</option>
                        <option value="66">จันทบุรี</option>
                        <option value="67">ฉะเชิงเทรา</option>
                        <option value="68">ชลบุรี</option>
                        <option value="69">ตราด</option>
                        <option value="70">ปราจีนบุรี</option>
                        <option value="71">ระยอง</option>
                        <option value="72">สระแก้ว</option>
                        <option value="73">กาญจนบุรี</option>
                        <option value="74">ตาก</option>
                        <option value="75">ประจวบคีรีขันธ์</option>
                        <option value="76">ราชบุรี</option>
                        <option value="77">เพชรบุรี</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_bloodtype" name="bloodtypes_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>กรุ๊ปเลือด</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">AB</option>
                        <option value="4">O</option>
                        <option value="5">ARh+</option>
                        <option value="6">ARh-</option>
                        <option value="7">BRh+</option>
                        <option value="8">BRh-</option>
                        <option value="9">ABRh+</option>
                        <option value="10">ABRh-</option>
                        <option value="11">ORh+</option>
                        <option value="12">ORh-</option>
                        <option value="13">ไม่ทราบ</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ส่วนสูง</span> --}}
                    <input type="text" name="weight" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="น้ำหนัก">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">น้ำหนัก</span> --}}
                    <input type="text" name="height" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="ส่วนสูง">
                </div>
                {{-- Disability  ความพิการ --}}
                <div class="col-md-6 mb-2">
                    <select id="disability" name="disability" class="form-select"
                        aria-label="Default select example">
                        <option selected>นักเรียนพิการหรือไม่</option>
                        <option value="1">พิการ</option>
                        <option value="2">ไม่พิการ</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">โรงเรียนที่นักเรียนจบมา</span> --}}
                    <input type="text" name="previousschool" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="โรงเรียนเดิมที่จบมา">
                </div>
                <div class="col-md-6 mb-2">
                    <select id="provinceschool" name="provinceschool_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>จังหวัดโรงเรียนเดิม</option>
                        <option value="1">น่าน</option>
                        <option value="2">พะเยา</option>
                        <option value="3">ลำปาง</option>
                        <option value="4">ลำพูน</option>
                        <option value="5">อุตรดิตถ์</option>
                        <option value="6">เชียงราย</option>
                        <option value="7">เชียงใหม่</option>
                        <option value="8">แพร่</option>
                        <option value="9">แม่ฮ่องสอน</option>
                        <option value="10">กรุงเทพมหานคร</option>
                        <option value="11">กำแพงเพชร</option>
                        <option value="12">ชัยนาท</option>
                        <option value="13">นครนายก</option>
                        <option value="14">นครปฐม</option>
                        <option value="15">นครสวรรค์</option>
                        <option value="16">นนทบุรี</option>
                        <option value="17">ปทุมธานี</option>
                        <option value="18">พระนครศรีอยุธยา</option>
                        <option value="19">พิจิตร</option>
                        <option value="20">พิษณุโลก</option>
                        <option value="21">ลพบุรี</option>
                        <option value="22">สมุทรปราการ</option>
                        <option value="23">สมุทรสงคราม</option>
                        <option value="24">สมุทรสาคร</option>
                        <option value="25">สระบุรี</option>
                        <option value="26">สิงห์บุรี</option>
                        <option value="27">สุพรรณบุรี</option>
                        <option value="28">สุโขทัย</option>
                        <option value="29">อุทัยธานี</option>
                        <option value="30">อ่างทอง</option>
                        <option value="31">เพชรบูรณ์</option>
                        <option value="32">กาฬสินธุ์</option>
                        <option value="33">ขอนแก่น</option>
                        <option value="34">ชัยภูมิ</option>
                        <option value="35">นครพนม</option>
                        <option value="36">นครราชสีมา</option>
                        <option value="37">บึงกาฬ</option>
                        <option value="38">บุรีรัมย์</option>
                        <option value="39">มหาสารคาม</option>
                        <option value="40">มุกดาหาร</option>
                        <option value="41">ยโสธร</option>
                        <option value="42">ร้อยเอ็ด</option>
                        <option value="43">ศรีสะเกษ</option>
                        <option value="44">สกลนคร</option>
                        <option value="45">สุรินทร์</option>
                        <option value="46">หนองคาย</option>
                        <option value="47">หนองบัวลำภู</option>
                        <option value="48">อำนาจเจริญ</option>
                        <option value="49">อุดรธานี</option>
                        <option value="50">อุบลราชธานี</option>
                        <option value="51">เลย</option>
                        <option value="52">กระบี่</option>
                        <option value="53">ชุมพร</option>
                        <option value="54">ตรัง</option>
                        <option value="55">นครศรีธรรมราช</option>
                        <option value="56">นราธิวาส</option>
                        <option value="57">ปัตตานี</option>
                        <option value="58">พังงา</option>
                        <option value="59">พัทลุง</option>
                        <option value="60">ภูเก็ต</option>
                        <option value="61">ยะลา</option>
                        <option value="62">ระนอง</option>
                        <option value="63">สงขลา</option>
                        <option value="64">สตูล</option>
                        <option value="65">สุราษฎร์ธานี</option>
                        <option value="66">จันทบุรี</option>
                        <option value="67">ฉะเชิงเทรา</option>
                        <option value="68">ชลบุรี</option>
                        <option value="69">ตราด</option>
                        <option value="70">ปราจีนบุรี</option>
                        <option value="71">ระยอง</option>
                        <option value="72">สระแก้ว</option>
                        <option value="73">กาญจนบุรี</option>
                        <option value="74">ตาก</option>
                        <option value="75">ประจวบคีรีขันธ์</option>
                        <option value="76">ราชบุรี</option>
                        <option value="77">เพชรบุรี</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">นักเรียนเป็นบุตรคนที่</span> --}}
                    <input type="text" name="beingonlychild" class="form-control"
                        aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="นักเรียนเป็นบุตรคนที่">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่ชาย</span> --}}
                    <input type="text" name="brothers" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="จำนวนพี่ชาย(หากไม่มีกรอก0)">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">จำนวนน้องชาย </span> --}}
                    <input type="text" name="youngerbrother" class="form-control"
                        aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="จำนวนน้องชาย(หากไม่มีกรอก0)">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่สาว</span> --}}
                    <input type="text" name="oldersister" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="จำนวนพี่สาว(หากไม่มีกรอก0)">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <div class="col-md-2"><span class="input-group-text " id="inputGroup-sizing-default" >จำนวนน้องสาว</span></div> --}}
                    <input type="text" name="sister" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="จำนวนน้องสาว(หากไม่มีกรอก0)">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่น้องที่ศึกษาอยู่</span> --}}
                    <input type="text" name="sumsiblings" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="จำนวนพี่น้องที่เรียนอยู่">
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-people-fill"></i>&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลที่อยู่ปัจจุบันของนักเรียน
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">รหัสประจำบ้าน</span> --}}
                    <input type="text" name="houseid" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="เลข 11 หลัก">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">บ้านเลขที่</span> --}}
                    <input type="text" name="housenumber" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="บ้านเลขที่">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">หมู่ที่</span> --}}
                    <input type="text" name="villagenumber" class="form-control"
                        aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="หมู่ที่">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อหมู่บ้าน</span> --}}
                    <input type="text" name="villagename" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="ชื่อหมู่บ้าน">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ตำบล</span> --}}
                    <input type="text" name="district" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="ตำบล">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">อำเภอ</span> --}}
                    <input type="text" name="subdistrict" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="อำเภอ">
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_province2" name="provinces_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>จังหวัด</option>
                        <option value="1">น่าน</option>
                        <option value="2">พะเยา</option>
                        <option value="3">ลำปาง</option>
                        <option value="4">ลำพูน</option>
                        <option value="5">อุตรดิตถ์</option>
                        <option value="6">เชียงราย</option>
                        <option value="7">เชียงใหม่</option>
                        <option value="8">แพร่</option>
                        <option value="9">แม่ฮ่องสอน</option>
                        <option value="10">กรุงเทพมหานคร</option>
                        <option value="11">กำแพงเพชร</option>
                        <option value="12">ชัยนาท</option>
                        <option value="13">นครนายก</option>
                        <option value="14">นครปฐม</option>
                        <option value="15">นครสวรรค์</option>
                        <option value="16">นนทบุรี</option>
                        <option value="17">ปทุมธานี</option>
                        <option value="18">พระนครศรีอยุธยา</option>
                        <option value="19">พิจิตร</option>
                        <option value="20">พิษณุโลก</option>
                        <option value="21">ลพบุรี</option>
                        <option value="22">สมุทรปราการ</option>
                        <option value="23">สมุทรสงคราม</option>
                        <option value="24">สมุทรสาคร</option>
                        <option value="25">สระบุรี</option>
                        <option value="26">สิงห์บุรี</option>
                        <option value="27">สุพรรณบุรี</option>
                        <option value="28">สุโขทัย</option>
                        <option value="29">อุทัยธานี</option>
                        <option value="30">อ่างทอง</option>
                        <option value="31">เพชรบูรณ์</option>
                        <option value="32">กาฬสินธุ์</option>
                        <option value="33">ขอนแก่น</option>
                        <option value="34">ชัยภูมิ</option>
                        <option value="35">นครพนม</option>
                        <option value="36">นครราชสีมา</option>
                        <option value="37">บึงกาฬ</option>
                        <option value="38">บุรีรัมย์</option>
                        <option value="39">มหาสารคาม</option>
                        <option value="40">มุกดาหาร</option>
                        <option value="41">ยโสธร</option>
                        <option value="42">ร้อยเอ็ด</option>
                        <option value="43">ศรีสะเกษ</option>
                        <option value="44">สกลนคร</option>
                        <option value="45">สุรินทร์</option>
                        <option value="46">หนองคาย</option>
                        <option value="47">หนองบัวลำภู</option>
                        <option value="48">อำนาจเจริญ</option>
                        <option value="49">อุดรธานี</option>
                        <option value="50">อุบลราชธานี</option>
                        <option value="51">เลย</option>
                        <option value="52">กระบี่</option>
                        <option value="53">ชุมพร</option>
                        <option value="54">ตรัง</option>
                        <option value="55">นครศรีธรรมราช</option>
                        <option value="56">นราธิวาส</option>
                        <option value="57">ปัตตานี</option>
                        <option value="58">พังงา</option>
                        <option value="59">พัทลุง</option>
                        <option value="60">ภูเก็ต</option>
                        <option value="61">ยะลา</option>
                        <option value="62">ระนอง</option>
                        <option value="63">สงขลา</option>
                        <option value="64">สตูล</option>
                        <option value="65">สุราษฎร์ธานี</option>
                        <option value="66">จันทบุรี</option>
                        <option value="67">ฉะเชิงเทรา</option>
                        <option value="68">ชลบุรี</option>
                        <option value="69">ตราด</option>
                        <option value="70">ปราจีนบุรี</option>
                        <option value="71">ระยอง</option>
                        <option value="72">สระแก้ว</option>
                        <option value="73">กาญจนบุรี</option>
                        <option value="74">ตาก</option>
                        <option value="75">ประจวบคีรีขันธ์</option>
                        <option value="76">ราชบุรี</option>
                        <option value="77">เพชรบุรี</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">รหัสไปรษณีย์</span> --}}
                    <input type="text" name="postalcode" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="รหัสไปรษณีย์">
                </div>
                <div class="col-md-6 mb-2">
                    <select id="seltyperesidence" name="typeresidences_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>ลักษณะที่พักอาศัย</option>
                        <option value="1">บ้านตัวเอง</option>
                        <option value="2">บ้านญาติ</option>
                        <option value="3">บ้านเช่า</option>
                        <option value="4">วัด</option>
                        <option value="5">อื่นๆ</option>
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ที่พักห่างจากโรงเรียนเป็นถนนลาดยาง</span> --}}
                    <input type="text" name="distancelatyangroad" class="form-control"
                        aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="ที่พักห่างโรงเรียนเป็นกี่เมตร(1km=1000m)">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ใช้เวลาเดินทางมาโรงเรียน</span> --}}
                    <input type="text" name="traveltime" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="ใช้เวลาเดินทางมาโรงเรียนกี่นาที">
                </div>
                <div class="col-md-6 mb-2">
                    <select id="travelschool1" name="travelschool1s_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>พาหนะที่ใช้มาโรงเรียน</option>
                        <option value="1">เดินเท้า</option>
                        <option value="2">จักรยานยืมเรียน</option>
                        <option value="3">พาหนะไม่เสียค่าโดยสาร</option>
                        <option value="4">พาหนะเสียค่าโดยสาร</option>
                        <option value="5">อื่นๆ</option>
                    </select>
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลบิดาผู้ให้กำเนิด
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <select id="sel_typetitlefather" name="typetitlesfather_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>คำนำหน้าชื่อ</option>
                        <option value="3">นาย</option>
                        {{-- <option value="4">นางสาว</option>
                        <option value="5">นาง</option> --}}
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อบิดา</span> --}}
                    <input type="textname_father" name="name_father" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="ชื่อบิดา">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span> --}}
                    <input type="text" name="surname_father" class="form-control"
                        aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="นามสกุล">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">เลขประจำตัวประชาชนบิดา</span> --}}
                    <input type="text" name="field_citizenfather" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="เลขประจำตัวประชาชน13หลัก">
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_occupationfather" name="occupationfather_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>อาชีพบิดา</option>
                        <option value="1">รับราชการ</option>
                        <option value="2">พนักงานรัฐวิสาหกิจ</option>
                        <option value="3">นักธุรกิจ-ค้าขาย</option>
                        <option value="4">เกษตรกร</option>
                        <option value="5">รับจ้าง</option>
                        <option value="6">พระ/นักบวช</option>
                        <option value="7">พนักงานของรัฐ/ลูกจ้างประจํา/ลูกจ้างชั่วคราว</option>
                        <option value="8">เกษียณ</option>
                        <option value="9">ไม่ได้ประกอบอาชีพ</option>
                        <option value="10">อื่นๆ</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">รายได้บิดา</span> --}}
                    <input type="text" name="income_father" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="รายได้บิดาต่อเดือน">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">เบอร์โทรศัพท์(มือถือ)</span> --}}
                    <input type="text" name="phone_father" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="เบอร์โทรศัพท์(มือถือ)">
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลมารดาผู้ให้กำเนิด
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <select id="sel_typetitlemother" name="typetitlesmother_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>คำนำหน้าชื่อ</option>
                        {{-- <option value="3">นาย</option> --}}
                        <option value="4">นางสาว</option>
                        <option value="5">นาง</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อมารดา</span> --}}
                    <input type="text" name="name_mother" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="ชื่อมารดา">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span> --}}
                    <input type="text" name="surname_mother" class="form-control"
                        aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="นามสกุล">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">เลขมารดา</span> --}}
                    <input type="text" name="field_citizenmother" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="เลขประจำตัวประชาชน13หลัก">
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_occupationmother" name="occupationmother_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>อาชีพมารดา</option>
                        <option value="1">รับราชการ</option>
                        <option value="2">พนักงานรัฐวิสาหกิจ</option>
                        <option value="3">นักธุรกิจ-ค้าขาย</option>
                        <option value="4">เกษตรกร</option>
                        <option value="5">รับจ้าง</option>
                        <option value="6">พระ/นักบวช</option>
                        <option value="7">พนักงานของรัฐ/ลูกจ้างประจํา/ลูกจ้างชั่วคราว</option>
                        <option value="8">เกษียณ</option>
                        <option value="9">ไม่ได้ประกอบอาชีพ</option>
                        <option value="10">อื่นๆ</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">รายได้มารดา</span> --}}
                    <input type="text" name="income_mother" class="form-control"
                        aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="รายได้มารดาต่อเดือน">
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <span class="input-group-text" id="inputGroup-sizing-default">เบอร์โทรศัพท์(มือถือ)</span> --}}
                    <input type="text" name="phone_mother" class="form-control" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="เบอร์โทรศัพท์(มือถือ)">
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp; สถานภาพของบิดา-มารดา
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <select id="sel_maritalstatuse" name="maritalstatuses_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>สถานภาพของบิดามารดา</option>
                        <option value="1">อยู่ด้วยกันจดทะเบียนสมรส</option>
                        <option value="2">โสด</option>
                        <option value="3">อย่าร้าง</option>
                        <option value="4">อยู่ด้วยกันไม่จดทะเบียนสมรส</option>
                        <option value="5">แยกกันอยู่</option>
                        <option value="6">บิดาถึงแก่กรรม</option>
                        <option value="7">มารดาถึงแก่กรรม</option>
                        <option value="8">บิดาและมารดาถึงแก่กรรม</option>
                        <option value="9">บิดาถึงแก่กรรมมารดาแต่งงานใหม่</option>
                        <option value="10">มารดาถึงแก่กรรมบิดาแต่งงานใหม่</option>
                        <option value="11">อื่นๆ</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_parent" name="parent_id" class="form-select"
                        aria-label="Default select example">
                        <option selected>ผู้ปกครองนักเรียนคือ</option>
                        <option value="1">บิดา</option>
                        <option value="2">มารดา</option>
                        <option value="3">อื่นๆ(ญาติ,ปู่-ย่า,ตา-ยาย)</option>
                    </select>
                </div>
                <div class="alert alert-success text-center" role="alert">
                    <i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp; โปรดเลือกห้องเรียนให้ครบ
                </div>
                <div class="row g-2 mb-2">
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool1" name="highschool1_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 1</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool2" name="highschool2_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 2</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool3" name="highschool3_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 3</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool4" name="highschool4_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 4</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool5" name="highschool5_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 5</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool6" name="highschool6_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 6</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool7" name="highschool7_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 7</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool8" name="highschool8_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 8</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool9" name="highschool9_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 9</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_highschool10" name="highschool10_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 10</option>
                            <option value="1">1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                            <option value="2">2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                            <option value="3">3.ห้องเรียนวิทยาศาสตร์ – คณิตศาสตร์ SMEP</option>
                            <option value="4">4.ห้องเน้นความเป็นเลิศทางด้านคณิตศาสตร์ – ภาษาอังกฤษ EMEP</option>
                            <option value="5">5.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                            <option value="6">6.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                            <option value="7">7.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                            <option value="8">8.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                            <option value="9">9.ห้องเน้นความเป็นเลิศทางด้านทักษะอาชีพ VSP</option>
                            <option value="10">10.ห้องเน้นความเป็นเลิศทางด้านภาษาไทย อังกฤษ สังคม TESEP</option>
                        </select>
                    </div>
                    {{-- <div class="col-md-6 mb-2">
                        <select id="sel_highschool11" name="highschool11_id" class="form-select"
                            aria-label="Default select example">
                            <option selected>เลือกแผนการเรียนลำดับที่ 11</option>
                            <option value="1">1.ห้องวิทย์พิเศษ</option>
                            <option value="2">2.ห้องวิทย์พลังสิบ</option>
                            <option value="3">3.วิทย์คณิต</option>
                            <option value="4">4.ศิลป์-คำนวณ</option>
                            <option value="5">5.ศิลป์-คอมพิวเตอร์</option>
                            <option value="6">6.ศิลป์-จีน</option>
                            <option value="7">7.ศิลป์-ญี่ปุ่น</option>
                            <option value="8">8.ศิลป์-อังกฤษ</option>
                            <option value="9">9.ศิลป์-ทั่วไป</option>
                            <option value="10">10.ทวิศึกษา-เทคโนโลยีดิจิตอล</option>
                            <option value="11">11.ทวิศึกษา-ทั่วไป</option>
                        </select>
                        </select>
                    </div> --}}
                </div>
            </div>
            <div class="container ">
                {{-- <div class="row justify-content-center"> --}}
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i
                            class="bi bi-save2"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กดสมัครเรียน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
                {{-- </div>     --}}
            </div>
        </form>
    </div>
    <BR>
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center">
            <p class="mb-2">Copyright &copy; <a class="fw-semi-bold" href="#">Your Site Name</a>, All Right
                Reserved.
            </p>
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            <p class="mb-0">Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
                Distributed
                By: <a href="https://themewagon.com">ThemeWagon</a> </p>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
    <!-- Datepicker JS -->

    <!-- JavaScript Libraries -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function () {
            $('#datepicker input').datepicker({
                format: 'dd/mm/yyyy',       // กำหนดรูปแบบวันเดือนปี
                autoclose: true,            // ปิด popup อัตโนมัติเมื่อเลือกวันที่
                todayHighlight: true,       // ไฮไลท์วันที่ปัจจุบัน
                language: 'th',             // ใช้ภาษาไทย
            }).on('changeDate', function (e) {
                let date = e.date;
                let thaiYear = date.getFullYear() + 543; // แปลง ค.ศ. เป็น พ.ศ.
                let formattedDate = ('0' + date.getDate()).slice(-2) + '/' + ('0' + (date.getMonth() + 1)).slice(-2) + '/' + thaiYear;
                $(this).val(formattedDate);
            });

            // เช็คว่ามีค่าวันเกิดหรือไม่ ถ้าไม่มีให้เซ็ตวันที่ปัจจุบัน
            let currentValue = $('#datepicker input').val();
            if (!currentValue) {
                let today = new Date();
                let thaiYear = today.getFullYear() + 543;
                let formattedToday = ('0' + today.getDate()).slice(-2) + '/' + ('0' + (today.getMonth() + 1)).slice(-2) + '/' + thaiYear;
                $('#datepicker input').datepicker('setDate', formattedToday);
            }
        });
    </script>

    <style>
        #datepicker input {
            width: 100%;
            max-width: 300px;
            font-size: 14px;
            padding: 10px;
        }
        #datepicker .input-group-text {
            padding: 5px;
            font-size: 14px;
        }
        .datepicker {
            font-size: 0.875rem !important;
        }
    </style>
</body>


</html>
