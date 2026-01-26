<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> โรงเรียนพานพิทยาคม </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@100;400&display=swap" rel="stylesheet">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
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
                <div class="h-100 topbar-right d-inline-flex มือถือ. 09-4706-4411</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->align-items-center text-white py-2 px-5">
                    <span class="fs-5 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>โทรศัพท์:</span>
                    <span class="fs-5 fw-bold"> 0-5372-1512  มือถือ. 09-4706-4411</span>
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
                <a href="index.html" class="nav-item nav-link active">หน้าแรก</a>
                <a href="about.html" class="nav-item nav-link">เกี่ยวกับ</a>
                <a href="service.html" class="nav-item nav-link">ระบบสารสนเทศ</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ระบบสารสนเทศ</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="project.html" class="dropdown-item">Projects</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                {{-- <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
            </div>
            <a href="" class="btn btn-primary px-3 d-none d-lg-block">ติดต่อ</a>
        </div>
    </nav>
    <!-- Navbar End -->
    <br>
    <div class="container">
        {{-- <div class="row"> --}}
            <div class="row">
                {{-- <div class="col-6"><br><h6>1. ข้อมูลนักเรียน (หากไม่มี กรุณาใส่เครื่องหมาย -)</h6></div>
                <div class="p-3 mb-2 bg-info bg-gradient text-dark">.bg-info.bg-gradient</div> --}}
                <div class="alert alert-success text-center" role="alert">
                    {{-- A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like. --}}
                    <h5>ข้อมูลนักเรียน </h5> **หากกรอกไม่ครบทุกช่องระบบจะไม่บันทึกข้อมูลให้ หากช่องไหนไม่มี ให้กรอก - ลงไป**</div> 
            </div>
         {{-- </div> --}}
            <form action="{{route('store1')}}" method="POST" enctype="multipart/form-data" class="row g-3>
            @csrf
            {{-- @method('post') --}}
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        {{-- <label for="exampleFormControlInput1" class="form-label">คำนำหน้าชื่อ</label> --}}
                        <select name="classlevel" id="classlevel" class="form-select" aria-label="Default select example" >
                            <option selected>ระดับชั้นที่สมัครเข้าเรียน</option>
                            <option value="1">ม.1</option>
                            <option value="2">ม.4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select id="sel_typetitle" name="typetitle_id" class="form-select" aria-label="Default select example">
                            <option selected>คำนำหน้าชื่อ</option>
                            <option value="1">เด็กชาย</option>
                            <option value="2">เด็กหญิง</option>
                            <option value="3">นาย</option>
                            <option value="4">นางสาว</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span>
                        <input type="text" name="surname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อมูล">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">นามสกุลภาษาอังกฤษ</span>
                        <input type="text" name="surnameeng" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="ดูที่บัตรประชาชน">
                    </div>
                    <div class="mb-3">
                        <select id="sel_ethnicities" name="ethnicities_id" class="form-select" aria-label="Default select example">
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
                            <option value="14">อื่นๆ</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select id="sel_religion" name="religion_id" class="form-select" aria-label="Default select example">
                            <option selected>ศาสนา</option>
                            <option value="1">พุทธ</option>
                            <option value="2">อิสลาม</option>
                            <option value="3">คริสต์</option>
                            <option value="4">ซิกส์</option>
                            <option value="5">พราหมณ์/ฮินดู</option>
                            <option value="6">อื่นๆ</option>
                        </select>
                    </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">ส่วนสูง</span>
                            <input type="text" name="height" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="เซนติเมตร">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">นักเรียนเป็นบุตรคนที่</span>
                            <input type="text" name="beingonlychild" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">จำนวนน้องชาย </span>
                            <input type="text" name="youngerbrother" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">จำนวนน้องสาว</span>
                            <input type="text" name="sister" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                        </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">โรงเรียนที่นักเรียนจบมา</span>
                        <input type="text" name="previousschool" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="เช่น โรงเรียนพานพสกสวัสดิ์">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <select id="sel_genders" name="genders_id" class="form-select" aria-label="Default select example">
                            <option selected>เพศ</option>
                            <option value="1">ชาย</option>
                            <option value="2">หญิง</option>
                        </select>
                        </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ชื่อนักเรียน</span>
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อมูล">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ชื่อนักเรียนภาษาอังกฤษ</span>
                        <input type="text" name="nameeng" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="ดูที่บัตรประชาชน">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">เลขประจำตัวประชาชน</span>
                        <input type="text" name="nationalid" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="เลข13หลักของนักเรียน">
                    </div>
                    <div class="mb-3">
                    <select id="sel_nationnalitie" name="nationnalitie_id" class="form-select" aria-label="Default select example">
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
                        <option value="14">อื่นๆ</option>
                    </select>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="inputGroup-sizing-default">วันเดือนปีเกิด กรอก(ค.ศ.)</span>
                        <input type="text" name="dateofbirth" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="เช่น 2552">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">น้ำหนัก</span>
                        <input type="text" name="weight" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="กิโลกรัม">
                    </div>
                    <div class="mb-3">
                        <select id="sel_bloodtype" name="bloodtype_id" class="form-select" aria-label="Default select example">
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
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่ชาย</span>
                        <input type="text" name="brothers" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่สาว</span>
                        <input type="text" name="oldersister" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                    </div>  
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่น้องที่ศึกษาอยู่</span>
                        <input type="text" name="sumsiblings" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                    </div>
                        
                </div>
            </div>
            
            <div class="row">
                <div class="alert alert-success text-center" role="alert">
                    <h5>ข้อมูลที่อยู่ปัจจุบันของนักเรียน</h5> 
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">รหัสประจำบ้าน</span>
                        <input type="text" name="houseid" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="เลข 11 หลัก">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">หมู่ที่</span>
                        <input type="text" name="villagenumber" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ตำบล</span>
                        <input type="text" name="district" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อความ">
                    </div>
                    <div class="mb-3">
                        <select id="sel_province" name="province_id" class="form-select" aria-label="Default select example">
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
                    <div class="mb-3">
                        <select id="seltyperesidence" name="typeresidence_id" class="form-select" aria-label="Default select example">
                            <option selected>ลักษณะที่พักอาศัย</option>
                            <option value="1">บ้านตัวเอง</option>
                            <option value="2">บ้านญาติ</option>
                            <option value="3">บ้านเช่า</option>
                            <option value="4">วัด</option>
                            <option value="5">อื่นๆ</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ที่พักห่างจากโรงเรียนเป็นถนนลูกรัง</span>
                        <input type="text" name="distancelukrangroad" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="เมตร">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ใช้เวลาเดินทางมาโรงเรียน</span>
                        <input type="text" name="traveltime" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="นาที">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">บ้านเลขที่</span>
                        <input type="text" name="housenumber" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ชื่อหมู่บ้าน</span>
                        <input type="text" name="villagename" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อความ">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">อำเภอ</span>
                        <input type="text" name="subdistrict" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อความ">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">รหัสไปรษณีย์</span>
                        <input type="text" name="postalcode" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อความ">
                    </div>
                    <div class="mb-3">
                        <select id="typeresidence" name="typeresidence_id" class="form-select" aria-label="Default select example">
                            <option selected>ที่พักอาศัยของนักเรียน</option>
                            <option value="1">อาศัยอยู่กับบิดามารดา</option>
                            <option value="2">อาศัยอยู่กับญาติ</option>
                            <option value="3">อาศัยอยู่กับพระ</option>
                            <option value="4">อาศัยอยู่กับครู</option>
                            <option value="5">อาศัยอยู่กับองค์กรการกุศล</option>
                            <option value="6">อื่นๆ</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ที่พักห่างจากโรงเรียนเป็นถนนลาดยาง</span>
                        <input type="text" name="distancelatyangroad" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="เมตร">
                    </div>
                    <div class="mb-3">
                        <select id="schoolbreak" name="schoolbreak_id" class="form-select" aria-label="Default select example">
                            <option selected>พาหนะที่ใช้มาโรงเรียน</option>
                            <option value="1">เดินเท้า</option>
                            <option value="2">จักรยานยืมเรียน</option>
                            <option value="3">พาหนะไม่เสียค่าโดยสาร</option>
                            <option value="4">พาหนะเสียค่าโดยสาร</option>
                            <option value="5">อื่นๆ</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="alert alert-success text-center" role="alert">
                    <h5>ข้อมูลผู้ปกครอง</h5> 
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ชื่อบิดา</span>
                        <input type="textname_father" name="name_father" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อมูล">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">เลขประจำตัวประชาชนบิดา</span>
                        <input type="text" name="field_citizenfather" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="เลข13หลักของบิดา">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">รายได้บิดา</span>
                        <input type="text" name="income_father" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="รายได้ต่อเดือน">
                    </div>
                    <div class="mb-3">
                        <select id="sel_bloodtypefather" name="bloodtypefather_id" class="form-select" aria-label="Default select example">
                            <option selected>กรุ๊ปเลือดบิดา</option>
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
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span>
                        <input type="text" name="surname_father" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อมูล">
                    </div>
                    <div class="mb-3">
                        <select id="sel_occupationfather" name="occupationfather_id" class="form-select" aria-label="Default select example">
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
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">เบอร์โทรศัพท์(มือถือ)</span>
                        <input type="text" name="phone_father" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                    </div>   
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">ชื่อมารดา</span>
                        <input type="text" name="name_mother" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อมูล">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">เลขประจำตัวประชาชนมารดา</span>
                        <input type="text" name="field_citizenmother" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="เลข13หลักของมารดา">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">รายได้มารดา</span>
                        <input type="text" name="income_mother" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="รายได้ต่อเดือน">
                    </div>
                    <div class="mb-3">
                        <select id="sel_bloodtypemother" name="bloodtypemother_id" class="form-select" aria-label="Default select example">
                            <option selected>กรุ๊ปเลือดมารดา</option>
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
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span>
                        <input type="text" name="surname_mother" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกข้อมูล">
                    </div>
                    <div class="mb-3">
                        <select  id="sel_occupationmother" name="occupationmother_id" class="form-select" aria-label="Default select example">
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
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">เบอร์โทรศัพท์(มือถือ)</span>
                        <input type="text" name="phone_mother" class="form-control" aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกตัวเลข">
                    </div>  
                    <div class="mb-3">
                        <select id="sel_maritalstatuse" name="maritalstatuse_id" class="form-select" aria-label="Default select example">
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
                </div>
            </div>
            <div class="container ">
                {{-- <div class="row justify-content-center"> --}}      
                   <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-lg" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กดสมัครเรียน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
            {{-- </div>     --}}
            </div>
            </form>
        </div>
    </div>

<BR>

    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center">
            <p class="mb-2">Copyright &copy; <a class="fw-semi-bold" href="#">Your Site Name</a>, All Right Reserved.
            </p>
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            <p class="mb-0">Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a> Distributed
                By: <a href="https://themewagon.com">ThemeWagon</a> </p>
        </div>
    </div>

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