<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title> โรงเรียนพานพิทยาคม </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

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
    @extends('layouts.admin')
    <div class="container">
        <form class="row g-3" action="{{ route('store1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-success text-center" role="alert">
                 <h5><i class="bi bi-person-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลนักเรียน ม.1</h5>**หากกรอกไม่ครบทุกช่องระบบจะไม่บันทึกข้อมูลให้ หากช่องไหนไม่มี ให้กรอก - ลงไป**
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <select id="classlevel" name="classlevels_id" class="form-select @error('classlevels_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('classlevels_id') == '' ? 'selected' : '' }}>ระดับชั้นที่สมัครเข้าเรียน</option>
                        <option value="1" {{ old('classlevels_id') == '2' ? 'selected' : '' }}>ม.1</option>
                    </select>
                    @error('classlevels_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_typetitle" name="typetitles_id" class="form-select @error('typetitles_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('typetitles_id') == '' ? 'selected' : '' }}>คำนำหน้าชื่อ</option>
                        <option value="1" {{ old('typetitles_id') == '1' ? 'selected' : '' }}>เด็กชาย</option>
                        <option value="2" {{ old('typetitles_id') == '2' ? 'selected' : '' }}>เด็กหญิง</option>
                        <option value="3" {{ old('typetitles_id') == '3' ? 'selected' : '' }}>นาย</option>
                        <option value="4" {{ old('typetitles_id') == '4' ? 'selected' : '' }}>นางสาว</option>
                        <option value="5" {{ old('typetitles_id') == '5' ? 'selected' : '' }}>นาง</option>
                    </select>
                    @error('typetitles_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" aria-label="Sizing example input"
                        id="" aria-describedby="inputGroup-sizing-default" placeholder="กรอกชื่อนักเรียน" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="กรอกนามสกุล" value="{{ old('surname') }}">
                    @error('surname')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="nameeng" class="form-control @error('nameeng') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="กรอกชื่อนักเรียนภาษาอังกฤษ" value="{{ old('nameeng') }}">
                    @error('nameeng')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="surnameeng" class="form-control @error('surnameeng') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="กรอกนามสกุลภาษาอังกฤษ" value="{{ old('surnameeng') }}">
                    @error('surnameeng')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="nationalid" class="form-control @error('nationalid') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="เลขประจำตัวประชาชน" value="{{ old('nationalid') }}">
                    @error('nationalid')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="phone1student" class="form-control @error('phone1student') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="กรอกเบอร์มือถือนักเรียน" value="{{ old('phone1student') }}">
                    @error('phone1student')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_religion" name="religions_id" class="form-select @error('religions_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('religions_id') == '' ? 'selected' : '' }}>ศาสนา</option>
                        <option value="1" {{ old('religions_id') == '1' ? 'selected' : '' }}>พุทธ</option>
                        <option value="2" {{ old('religions_id') == '2' ? 'selected' : '' }}>อิสลาม</option>
                        <option value="3" {{ old('religions_id') == '3' ? 'selected' : '' }}>คริสต์</option>
                        <option value="4" {{ old('religions_id') == '4' ? 'selected' : '' }}>ซิกส์</option>
                        <option value="5" {{ old('religions_id') == '5' ? 'selected' : '' }}>พราหมณ์/ฮินดู</option>
                        <option value="6" {{ old('religions_id') == '6' ? 'selected' : '' }}>อื่นๆ</option>
                    </select>
                    @error('religions_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <select id="sel_nationnalitie" name="nationalities_id" class="form-select @error('nationalities_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('nationalities_id') == '' ? 'selected' : '' }}>สัญชาติ</option>
                        <option value="1" {{ old('nationalities_id') == '1' ? 'selected' : '' }}>ไทย</option>
                        <option value="2" {{ old('nationalities_id') == '2' ? 'selected' : '' }}>ญี่ปุ่น</option>
                        <option value="3" {{ old('nationalities_id') == '3' ? 'selected' : '' }}>กะเหรี่ยง</option>
                        <option value="4" {{ old('nationalities_id') == '4' ? 'selected' : '' }}>อาข่า</option>
                        <option value="5" {{ old('nationalities_id') == '5' ? 'selected' : '' }}>ลั๊ว</option>
                        <option value="6" {{ old('nationalities_id') == '6' ? 'selected' : '' }}>ลาว</option>
                        <option value="7" {{ old('nationalities_id') == '7' ? 'selected' : '' }}>พม่า</option>
                        <option value="8" {{ old('nationalities_id') == '8' ? 'selected' : '' }}>ลาหู่</option>
                        <option value="9" {{ old('nationalities_id') == '9' ? 'selected' : '' }}>ม้ง</option>
                        <option value="10" {{ old('nationalities_id') == '10' ? 'selected' : '' }}>จีนฮ่อ</option>
                        <option value="11" {{ old('nationalities_id') == '11' ? 'selected' : '' }}>ละว้า</option>
                        <option value="12" {{ old('nationalities_id') == '12' ? 'selected' : '' }}>มอญ</option>
                        <option value="13" {{ old('nationalities_id') == '13' ? 'selected' : '' }}>ไทยใหญ่</option>
                        <option value="14" {{ old('nationalities_id') == '14' ? 'selected' : '' }}>มาเลเชีย</option>
                        <option value="15" {{ old('nationalities_id') == '15' ? 'selected' : '' }}>อื่นๆ</option>
                    </select>
                    @error('nationalities_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <select id="sel_ethnicities" name="ethnicities_id" class="form-select @error('ethnicities_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('ethnicities_id') == '' ? 'selected' : '' }}>เชื้อชาติ</option>
                        <option value="1" {{ old('ethnicities_id') == '1' ? 'selected' : '' }}>ไทย</option>
                        <option value="2" {{ old('ethnicities_id') == '2' ? 'selected' : '' }}>ญี่ปุ่น</option>
                        <option value="3" {{ old('ethnicities_id') == '3' ? 'selected' : '' }}>กะเหรี่ยง</option>
                        <option value="4" {{ old('ethnicities_id') == '4' ? 'selected' : '' }}>อาข่า</option>
                        <option value="5" {{ old('ethnicities_id') == '5' ? 'selected' : '' }}>ลั๊ว</option>
                        <option value="6" {{ old('ethnicities_id') == '6' ? 'selected' : '' }}>ลาว</option>
                        <option value="7" {{ old('ethnicities_id') == '7' ? 'selected' : '' }}>พม่า</option>
                        <option value="8" {{ old('ethnicities_id') == '8' ? 'selected' : '' }}>ลาหู่</option>
                        <option value="9" {{ old('ethnicities_id') == '9' ? 'selected' : '' }}>ม้ง</option>
                        <option value="10" {{ old('ethnicities_id') == '10' ? 'selected' : '' }}>จีนฮ่อ</option>
                        <option value="11" {{ old('ethnicities_id') == '11' ? 'selected' : '' }}>ละว้า</option>
                        <option value="12" {{ old('ethnicities_id') == '12' ? 'selected' : '' }}>มอญ</option>
                        <option value="13" {{ old('ethnicities_id') == '13' ? 'selected' : '' }}>ไทยใหญ่</option>
                        <option value="14" {{ old('ethnicities_id') == '14' ? 'selected' : '' }}>มาเลเชีย</option>
                        <option value="15" {{ old('ethnicities_id') == '15' ? 'selected' : '' }}>อื่นๆ</option>
                    </select>
                    @error('ethnicities_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group date" id="datepicker">
                        <label for="inputdate" class="col-sm-3 col-form-label">วันเกิดนักเรียน</label>
                        <input type="text" name="dateofbirth" class="form-control @error('dateofbirth') is-invalid @enderror" placeholder="กรอกเป็น (ค.ศ.)คริสต์ศักราช" value="{{ old('dateofbirth') }}">
                        <span class="input-group-text">
                            <i class="bi bi-calendar"></i>
                        </span>
                    </div>
                    @error('dateofbirth')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_province" name="provincesbirth_id" class="form-select" --}}
                    <select id="sel_province" name="provincesbirth_id" class="form-select @error('provincesbirth_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('provincesbirth_id') == '' ? 'selected' : '' }}>จังหวัดเกิด</option>
                        <option value="1" {{ old('provincesbirth_id') == '1' ? 'selected' : '' }}>น่าน</option>
                        <option value="2" {{ old('provincesbirth_id') == '2' ? 'selected' : '' }}>พะเยา</option>
                        <option value="3" {{ old('provincesbirth_id') == '3' ? 'selected' : '' }}>ลำปาง</option>
                        <option value="4" {{ old('provincesbirth_id') == '4' ? 'selected' : '' }}>ลำพูน</option>
                        <option value="5" {{ old('provincesbirth_id') == '5' ? 'selected' : '' }}>อุตรดิตถ์</option>
                        <option value="6" {{ old('provincesbirth_id') == '6' ? 'selected' : '' }}>เชียงราย</option>
                        <option value="7" {{ old('provincesbirth_id') == '7' ? 'selected' : '' }}>เชียงใหม่</option>
                        <option value="8" {{ old('provincesbirth_id') == '8' ? 'selected' : '' }}>แพร่</option>
                        <option value="9" {{ old('provincesbirth_id') == '9' ? 'selected' : '' }}>แม่ฮ่องสอน</option>
                        <option value="10" {{ old('provincesbirth_id') == '10' ? 'selected' : '' }}>กรุงเทพมหานคร</option>
                        <option value="11" {{ old('provincesbirth_id') == '11' ? 'selected' : '' }}>กำแพงเพชร</option>
                        <option value="12" {{ old('provincesbirth_id') == '12' ? 'selected' : '' }}>ชัยนาท</option>
                        <option value="13" {{ old('provincesbirth_id') == '13' ? 'selected' : '' }}>นครนายก</option>
                        <option value="14" {{ old('provincesbirth_id') == '14' ? 'selected' : '' }}>นครปฐม</option>
                        <option value="15" {{ old('provincesbirth_id') == '15' ? 'selected' : '' }}>นครสวรรค์</option>
                        <option value="16" {{ old('provincesbirth_id') == '16' ? 'selected' : '' }}>นนทบุรี</option>
                        <option value="17" {{ old('provincesbirth_id') == '17' ? 'selected' : '' }}>ปทุมธานี</option>
                        <option value="18" {{ old('provincesbirth_id') == '18' ? 'selected' : '' }}>พระนครศรีอยุธยา</option>
                        <option value="19" {{ old('provincesbirth_id') == '19' ? 'selected' : '' }}>พิจิตร</option>
                        <option value="20" {{ old('provincesbirth_id') == '20' ? 'selected' : '' }}>พิษณุโลก</option>
                        <option value="21" {{ old('provincesbirth_id') == '21' ? 'selected' : '' }}>ลพบุรี</option>
                        <option value="22" {{ old('provincesbirth_id') == '22' ? 'selected' : '' }}>สมุทรปราการ</option>
                        <option value="23" {{ old('provincesbirth_id') == '23' ? 'selected' : '' }}>สมุทรสงคราม</option>
                        <option value="24" {{ old('provincesbirth_id') == '24' ? 'selected' : '' }}>สมุทรสาคร</option>
                        <option value="25" {{ old('provincesbirth_id') == '25' ? 'selected' : '' }}>สระบุรี</option>
                        <option value="26" {{ old('provincesbirth_id') == '26' ? 'selected' : '' }}>สิงห์บุรี</option>
                        <option value="27" {{ old('provincesbirth_id') == '27' ? 'selected' : '' }}>สุพรรณบุรี</option>
                        <option value="28" {{ old('provincesbirth_id') == '28' ? 'selected' : '' }}>สุโขทัย</option>
                        <option value="29" {{ old('provincesbirth_id') == '29' ? 'selected' : '' }}>อุทัยธานี</option>
                        <option value="30" {{ old('provincesbirth_id') == '30' ? 'selected' : '' }}>อ่างทอง</option>
                        <option value="31" {{ old('provincesbirth_id') == '31' ? 'selected' : '' }}>เพชรบูรณ์</option>
                        <option value="32" {{ old('provincesbirth_id') == '32' ? 'selected' : '' }}>กาฬสินธุ์</option>
                        <option value="33" {{ old('provincesbirth_id') == '33' ? 'selected' : '' }}>ขอนแก่น</option>
                        <option value="34" {{ old('provincesbirth_id') == '34' ? 'selected' : '' }}>ชัยภูมิ</option>
                        <option value="35" {{ old('provincesbirth_id') == '35' ? 'selected' : '' }}>นครพนม</option>
                        <option value="36" {{ old('provincesbirth_id') == '36' ? 'selected' : '' }}>นครราชสีมา</option>
                        <option value="37" {{ old('provincesbirth_id') == '37' ? 'selected' : '' }}>บึงกาฬ</option>
                        <option value="38" {{ old('provincesbirth_id') == '38' ? 'selected' : '' }}>บุรีรัมย์</option>
                        <option value="39" {{ old('provincesbirth_id') == '39' ? 'selected' : '' }}>มหาสารคาม</option>
                        <option value="40" {{ old('provincesbirth_id') == '40' ? 'selected' : '' }}>มุกดาหาร</option>
                        <option value="41" {{ old('provincesbirth_id') == '41' ? 'selected' : '' }}>ยโสธร</option>
                        <option value="42" {{ old('provincesbirth_id') == '42' ? 'selected' : '' }}>ร้อยเอ็ด</option>
                        <option value="43" {{ old('provincesbirth_id') == '43' ? 'selected' : '' }}>ศรีสะเกษ</option>
                        <option value="44" {{ old('provincesbirth_id') == '44' ? 'selected' : '' }}>สกลนคร</option>
                        <option value="45" {{ old('provincesbirth_id') == '45' ? 'selected' : '' }}>สุรินทร์</option>
                        <option value="46" {{ old('provincesbirth_id') == '46' ? 'selected' : '' }}>หนองคาย</option>
                        <option value="47" {{ old('provincesbirth_id') == '47' ? 'selected' : '' }}>หนองบัวลำภู</option>
                        <option value="48" {{ old('provincesbirth_id') == '48' ? 'selected' : '' }}>อำนาจเจริญ</option>
                        <option value="49" {{ old('provincesbirth_id') == '49' ? 'selected' : '' }}>อุดรธานี</option>
                        <option value="50" {{ old('provincesbirth_id') == '50' ? 'selected' : '' }}>อุบลราชธานี</option>
                        <option value="51" {{ old('provincesbirth_id') == '51' ? 'selected' : '' }}>เลย</option>
                        <option value="52" {{ old('provincesbirth_id') == '52' ? 'selected' : '' }}>กระบี่</option>
                        <option value="53" {{ old('provincesbirth_id') == '53' ? 'selected' : '' }}>ชุมพร</option>
                        <option value="54" {{ old('provincesbirth_id') == '54' ? 'selected' : '' }}>ตรัง</option>
                        <option value="55" {{ old('provincesbirth_id') == '55' ? 'selected' : '' }}>นครศรีธรรมราช</option>
                        <option value="56" {{ old('provincesbirth_id') == '56' ? 'selected' : '' }}>นราธิวาส</option>
                        <option value="57" {{ old('provincesbirth_id') == '57' ? 'selected' : '' }}>ปัตตานี</option>
                        <option value="58" {{ old('provincesbirth_id') == '58' ? 'selected' : '' }}>พังงา</option>
                        <option value="59" {{ old('provincesbirth_id') == '59' ? 'selected' : '' }}>พัทลุง</option>
                        <option value="60" {{ old('provincesbirth_id') == '60' ? 'selected' : '' }}>ภูเก็ต</option>
                        <option value="61" {{ old('provincesbirth_id') == '61' ? 'selected' : '' }}>ยะลา</option>
                        <option value="62" {{ old('provincesbirth_id') == '62' ? 'selected' : '' }}>ระนอง</option>
                        <option value="63" {{ old('provincesbirth_id') == '63' ? 'selected' : '' }}>สงขลา</option>
                        <option value="64" {{ old('provincesbirth_id') == '64' ? 'selected' : '' }}>สตูล</option>
                        <option value="65" {{ old('provincesbirth_id') == '65' ? 'selected' : '' }}>สุราษฎร์ธานี</option>
                        <option value="66" {{ old('provincesbirth_id') == '66' ? 'selected' : '' }}>จันทบุรี</option>
                        <option value="67" {{ old('provincesbirth_id') == '67' ? 'selected' : '' }}>ฉะเชิงเทรา</option>
                        <option value="68" {{ old('provincesbirth_id') == '68' ? 'selected' : '' }}>ชลบุรี</option>
                        <option value="69" {{ old('provincesbirth_id') == '69' ? 'selected' : '' }}>ตราด</option>
                        <option value="70" {{ old('provincesbirth_id') == '70' ? 'selected' : '' }}>ปราจีนบุรี</option>
                        <option value="71" {{ old('provincesbirth_id') == '71' ? 'selected' : '' }}>ระยอง</option>
                        <option value="72" {{ old('provincesbirth_id') == '72' ? 'selected' : '' }}>สระแก้ว</option>
                        <option value="73" {{ old('provincesbirth_id') == '73' ? 'selected' : '' }}>กาญจนบุรี</option>
                        <option value="74" {{ old('provincesbirth_id') == '74' ? 'selected' : '' }}>ตาก</option>
                        <option value="75" {{ old('provincesbirth_id') == '75' ? 'selected' : '' }}>ประจวบคีรีขันธ์</option>
                        <option value="76" {{ old('provincesbirth_id') == '76' ? 'selected' : '' }}>ราชบุรี</option>
                        <option value="77" {{ old('provincesbirth_id') == '77' ? 'selected' : '' }}>เพชรบุรี</option>
                    </select>
                    @error('provincesbirth_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_bloodtype" name="bloodtypes_id" class="form-select" --}}
                    <select id="sel_bloodtype" name="bloodtypes_id" class="form-select @error('bloodtypes_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('bloodtypes_id') == '' ? 'selected' : '' }}>กรุ๊ปเลือด</option>
                        <option value="1" {{ old('bloodtypes_id') == '1' ? 'selected' : '' }}>A</option>
                        <option value="2" {{ old('bloodtypes_id') == '2' ? 'selected' : '' }}>B</option>
                        <option value="3" {{ old('bloodtypes_id') == '3' ? 'selected' : '' }}>AB</option>
                        <option value="4" {{ old('bloodtypes_id') == '4' ? 'selected' : '' }}>O</option>
                        <option value="5" {{ old('bloodtypes_id') == '5' ? 'selected' : '' }}>ARh+</option>
                        <option value="6" {{ old('bloodtypes_id') == '6' ? 'selected' : '' }}>ARh-</option>
                        <option value="7" {{ old('bloodtypes_id') == '7' ? 'selected' : '' }}>BRh+</option>
                        <option value="8" {{ old('bloodtypes_id') == '8' ? 'selected' : '' }}>BRh-</option>
                        <option value="9" {{ old('bloodtypes_id') == '9' ? 'selected' : '' }}>ABRh+</option>
                        <option value="10" {{ old('bloodtypes_id') == '10' ? 'selected' : '' }}>ABRh-</option>
                        <option value="11" {{ old('bloodtypes_id') == '11' ? 'selected' : '' }}>ORh+</option>
                        <option value="12" {{ old('bloodtypes_id') == '12' ? 'selected' : '' }}>ORh-</option>
                        <option value="13" {{ old('bloodtypes_id') == '13' ? 'selected' : '' }}>ไม่ทราบ</option>
                    </select>
                    @error('bloodtypes_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                        <input type="text" name="weight" class="form-control @error('weight') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="น้ำหนัก" value="{{ old('weight') }}">
                    @error('weight')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="height" class="form-control @error('height') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="ส่วนสูง" value="{{ old('height') }}">
                    @error('height')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="disability" name="disability" class="form-select" --}}
                     <select id="disability" name="disability" class="form-select @error('disability') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('disability') == '' ? 'selected' : '' }}>นักเรียนพิการหรือไม่</option>
                        <option value="1" {{ old('disability') == '1' ? 'selected' : '' }}>พิการ</option>
                        <option value="2" {{ old('disability') == '2' ? 'selected' : '' }}>ไม่พิการ</option>
                    </select>
                    @error('disability')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                        <input type="text" name="previousschool" class="form-control @error('previousschool') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="โรงเรียนเดิมที่นักเรียนจบมา" value="{{ old('previousschool') }}">
                    @error('previousschool')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="provinceschool" name="provinceschool_id" class="form-select" --}}
                    <select id="provinceschool" name="provinceschool_id" class="form-select @error('provinceschool_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('provinceschool_id') == '' ? 'selected' : '' }}>จังหวัดโรงเรียนเดิม</option>
                        <option value="1" {{ old('provinceschool_id') == '1' ? 'selected' : '' }}>น่าน</option>
                        <option value="2" {{ old('provinceschool_id') == '2' ? 'selected' : '' }}>พะเยา</option>
                        <option value="3" {{ old('provinceschool_id') == '3' ? 'selected' : '' }}>ลำปาง</option>
                        <option value="4" {{ old('provinceschool_id') == '4' ? 'selected' : '' }}>ลำพูน</option>
                        <option value="5" {{ old('provinceschool_id') == '5' ? 'selected' : '' }}>อุตรดิตถ์</option>
                        <option value="6" {{ old('provinceschool_id') == '6' ? 'selected' : '' }}>เชียงราย</option>
                        <option value="7" {{ old('provinceschool_id') == '7' ? 'selected' : '' }}>เชียงใหม่</option>
                        <option value="8" {{ old('provinceschool_id') == '8' ? 'selected' : '' }}>แพร่</option>
                        <option value="9" {{ old('provinceschool_id') == '9' ? 'selected' : '' }}>แม่ฮ่องสอน</option>
                        <option value="10" {{ old('provinceschool_id') == '10' ? 'selected' : '' }}>กรุงเทพมหานคร</option>
                        <option value="11" {{ old('provinceschool_id') == '11' ? 'selected' : '' }}>กำแพงเพชร</option>
                        <option value="12" {{ old('provinceschool_id') == '12' ? 'selected' : '' }}>ชัยนาท</option>
                        <option value="13" {{ old('provinceschool_id') == '13' ? 'selected' : '' }}>นครนายก</option>
                        <option value="14" {{ old('provinceschool_id') == '14' ? 'selected' : '' }}>นครปฐม</option>
                        <option value="15" {{ old('provinceschool_id') == '15' ? 'selected' : '' }}>นครสวรรค์</option>
                        <option value="16" {{ old('provinceschool_id') == '16' ? 'selected' : '' }}>นนทบุรี</option>
                        <option value="17" {{ old('provinceschool_id') == '17' ? 'selected' : '' }}>ปทุมธานี</option>
                        <option value="18" {{ old('provinceschool_id') == '18' ? 'selected' : '' }}>พระนครศรีอยุธยา</option>
                        <option value="19" {{ old('provinceschool_id') == '19' ? 'selected' : '' }}>พิจิตร</option>
                        <option value="20" {{ old('provinceschool_id') == '20' ? 'selected' : '' }}>พิษณุโลก</option>
                        <option value="21" {{ old('provinceschool_id') == '21' ? 'selected' : '' }}>ลพบุรี</option>
                        <option value="22" {{ old('provinceschool_id') == '22' ? 'selected' : '' }}>สมุทรปราการ</option>
                        <option value="23" {{ old('provinceschool_id') == '23' ? 'selected' : '' }}>สมุทรสงคราม</option>
                        <option value="24" {{ old('provinceschool_id') == '24' ? 'selected' : '' }}>สมุทรสาคร</option>
                        <option value="25" {{ old('provinceschool_id') == '25' ? 'selected' : '' }}>สระบุรี</option>
                        <option value="26" {{ old('provincesbirth_id') == '26' ? 'selected' : '' }}>สิงห์บุรี</option>
                        <option value="27" {{ old('provinceschool_id') == '27' ? 'selected' : '' }}>สุพรรณบุรี</option>
                        <option value="28" {{ old('provinceschool_id') == '28' ? 'selected' : '' }}>สุโขทัย</option>
                        <option value="29" {{ old('provinceschool_id') == '29' ? 'selected' : '' }}>อุทัยธานี</option>
                        <option value="30" {{ old('provinceschool_id') == '30' ? 'selected' : '' }}>อ่างทอง</option>
                        <option value="31" {{ old('provinceschool_id') == '31' ? 'selected' : '' }}>เพชรบูรณ์</option>
                        <option value="32" {{ old('provinceschool_id') == '32' ? 'selected' : '' }}>กาฬสินธุ์</option>
                        <option value="33" {{ old('provinceschool_id') == '33' ? 'selected' : '' }}>ขอนแก่น</option>
                        <option value="34" {{ old('provinceschool_id') == '34' ? 'selected' : '' }}>ชัยภูมิ</option>
                        <option value="35" {{ old('provinceschool_id') == '35' ? 'selected' : '' }}>นครพนม</option>
                        <option value="36" {{ old('provinceschool_id') == '36' ? 'selected' : '' }}>นครราชสีมา</option>
                        <option value="37" {{ old('provinceschool_id') == '37' ? 'selected' : '' }}>บึงกาฬ</option>
                        <option value="38" {{ old('provinceschool_id') == '38' ? 'selected' : '' }}>บุรีรัมย์</option>
                        <option value="39" {{ old('provinceschool_id') == '39' ? 'selected' : '' }}>มหาสารคาม</option>
                        <option value="40" {{ old('provinceschool_id') == '40' ? 'selected' : '' }}>มุกดาหาร</option>
                        <option value="41" {{ old('provinceschool_id') == '41' ? 'selected' : '' }}>ยโสธร</option>
                        <option value="42" {{ old('provinceschool_id') == '42' ? 'selected' : '' }}>ร้อยเอ็ด</option>
                        <option value="43" {{ old('provinceschool_id') == '43' ? 'selected' : '' }}>ศรีสะเกษ</option>
                        <option value="44" {{ old('provinceschool_id') == '44' ? 'selected' : '' }}>สกลนคร</option>
                        <option value="45" {{ old('provinceschool_id') == '45' ? 'selected' : '' }}>สุรินทร์</option>
                        <option value="46" {{ old('provinceschool_id') == '46' ? 'selected' : '' }}>หนองคาย</option>
                        <option value="47" {{ old('provinceschool_id') == '47' ? 'selected' : '' }}>หนองบัวลำภู</option>
                        <option value="48" {{ old('provinceschool_id') == '48' ? 'selected' : '' }}>อำนาจเจริญ</option>
                        <option value="49" {{ old('provinceschool_id') == '49' ? 'selected' : '' }}>อุดรธานี</option>
                        <option value="50" {{ old('provinceschool_id') == '50' ? 'selected' : '' }}>อุบลราชธานี</option>
                        <option value="51" {{ old('provinceschool_id') == '51' ? 'selected' : '' }}>เลย</option>
                        <option value="52" {{ old('provinceschool_id') == '52' ? 'selected' : '' }}>กระบี่</option>
                        <option value="53" {{ old('provinceschool_id') == '53' ? 'selected' : '' }}>ชุมพร</option>
                        <option value="54" {{ old('provinceschool_id') == '54' ? 'selected' : '' }}>ตรัง</option>
                        <option value="55" {{ old('provinceschool_id') == '55' ? 'selected' : '' }}>นครศรีธรรมราช</option>
                        <option value="56" {{ old('provinceschool_id') == '56' ? 'selected' : '' }}>นราธิวาส</option>
                        <option value="57" {{ old('provinceschool_id') == '57' ? 'selected' : '' }}>ปัตตานี</option>
                        <option value="58" {{ old('provinceschool_id') == '58' ? 'selected' : '' }}>พังงา</option>
                        <option value="59" {{ old('provinceschool_id') == '59' ? 'selected' : '' }}>พัทลุง</option>
                        <option value="60" {{ old('provinceschool_id') == '60' ? 'selected' : '' }}>ภูเก็ต</option>
                        <option value="61" {{ old('provinceschool_id') == '61' ? 'selected' : '' }}>ยะลา</option>
                        <option value="62" {{ old('provinceschool_id') == '62' ? 'selected' : '' }}>ระนอง</option>
                        <option value="63" {{ old('provinceschool_id') == '63' ? 'selected' : '' }}>สงขลา</option>
                        <option value="64" {{ old('provinceschool_id') == '64' ? 'selected' : '' }}>สตูล</option>
                        <option value="65" {{ old('provinceschool_id') == '65' ? 'selected' : '' }}>สุราษฎร์ธานี</option>
                        <option value="66" {{ old('provinceschool_id') == '66' ? 'selected' : '' }}>จันทบุรี</option>
                        <option value="67" {{ old('provinceschool_id') == '67' ? 'selected' : '' }}>ฉะเชิงเทรา</option>
                        <option value="68" {{ old('provinceschool_id') == '68' ? 'selected' : '' }}>ชลบุรี</option>
                        <option value="69" {{ old('provinceschool_id') == '69' ? 'selected' : '' }}>ตราด</option>
                        <option value="70" {{ old('provinceschool_id') == '70' ? 'selected' : '' }}>ปราจีนบุรี</option>
                        <option value="71" {{ old('provinceschool_id') == '71' ? 'selected' : '' }}>ระยอง</option>
                        <option value="72" {{ old('provinceschool_id') == '72' ? 'selected' : '' }}>สระแก้ว</option>
                        <option value="73" {{ old('provinceschool_id') == '73' ? 'selected' : '' }}>กาญจนบุรี</option>
                        <option value="74" {{ old('provinceschool_id') == '74' ? 'selected' : '' }}>ตาก</option>
                        <option value="75" {{ old('provinceschool_id') == '75' ? 'selected' : '' }}>ประจวบคีรีขันธ์</option>
                        <option value="76" {{ old('provinceschool_id') == '76' ? 'selected' : '' }}>ราชบุรี</option>
                        <option value="77" {{ old('provinceschool_id') == '77' ? 'selected' : '' }}>เพชรบุรี</option>
                    </select>
                    @error('provinceschool_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="beingonlychild" class="form-control @error('beingonlychild') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="นักเรียนเป็นบุตรคนที่" value="{{ old('beingonlychild') }}">
                    @error('beingonlychild')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror    
                </div>

                <div class="col-md-6 mb-2">
                    <input type="text" name="brothers" class="form-control @error('brothers') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="จำนวนพี่ชาย(หากไม่มีกรอก0)" value="{{ old('brothers') }}">
                    @error('brothers')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>    
                <div class="col-md-6 mb-2">
                    <input type="text" name="youngerbrother" class="form-control @error('youngerbrother') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="จำนวนน้องชาย(หากไม่มีกรอก0)" value="{{ old('youngerbrother') }}">
                    @error('youngerbrother')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="oldersister" class="form-control @error('oldersister') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="จำนวนพี่สาว(หากไม่มีกรอก0)" value="{{ old('oldersister') }}">
                    @error('oldersister')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="sister" class="form-control @error('sister') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="จำนวนน้องสาว(หากไม่มีกรอก0)" value="{{ old('sister') }}">
                    @error('sister')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror 
                </div> 
                <div class="col-md-6 mb-2">
                    <input type="text" name="sumsiblings" class="form-control @error('sumsiblings') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="จำนวนพี่น้องที่เรียนอยู่" value="{{ old('sumsiblings') }}">
                    @error('sumsiblings')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror     
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-people-fill"></i>&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลที่อยู่ปัจจุบันของนักเรียน
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <input type="text" name="houseid" class="form-control @error('houseid') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="เลขทะเบียนบ้าน 11 หลัก" value="{{ old('houseid') }}">
                    @error('houseid')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="housenumber" class="form-control @error('housenumber') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="บ้านเลขที่" value="{{ old('housenumber') }}">
                    @error('housenumber')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror 
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="villagenumber" class="form-control @error('villagenumber') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="หมู่ที่" value="{{ old('villagenumber') }}">
                    @error('villagenumber')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror 
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="villagename" class="form-control @error('villagename') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="ชื่อหมู่บ้าน" value="{{ old('villagename') }}">
                    @error('villagename')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2"> 
                    <input type="text" name="district" class="form-control @error('district') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="ตำบล" value="{{ old('district') }}">
                    @error('district')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="subdistrict" class="form-control @error('subdistrict') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="อำเภอ" value="{{ old('district') }}">
                    @error('subdistrict')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_province2" name="provinces_id" class="form-select" --}}
                    <select id="sel_province2" name="provinces_id" class="form-select @error('provinces_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('provinces_id') == '' ? 'selected' : '' }}>จังหวัดเกิด</option>
                        <option value="1" {{ old('provinces_id') == '1' ? 'selected' : '' }}>น่าน</option>
                        <option value="2" {{ old('provinces_id') == '2' ? 'selected' : '' }}>พะเยา</option>
                        <option value="3" {{ old('provinces_id') == '3' ? 'selected' : '' }}>ลำปาง</option>
                        <option value="4" {{ old('provinces_id') == '4' ? 'selected' : '' }}>ลำพูน</option>
                        <option value="5" {{ old('provinces_id') == '5' ? 'selected' : '' }}>อุตรดิตถ์</option>
                        <option value="6" {{ old('provinces_id') == '6' ? 'selected' : '' }}>เชียงราย</option>
                        <option value="7" {{ old('provinces_id') == '7' ? 'selected' : '' }}>เชียงใหม่</option>
                        <option value="8" {{ old('provinces_id') == '8' ? 'selected' : '' }}>แพร่</option>
                        <option value="9" {{ old('provinces_id') == '9' ? 'selected' : '' }}>แม่ฮ่องสอน</option>
                        <option value="10" {{ old('provinces_id') == '10' ? 'selected' : '' }}>กรุงเทพมหานคร</option>
                        <option value="11" {{ old('provinces_id') == '11' ? 'selected' : '' }}>กำแพงเพชร</option>
                        <option value="12" {{ old('provinces_id') == '12' ? 'selected' : '' }}>ชัยนาท</option>
                        <option value="13" {{ old('provinces_id') == '13' ? 'selected' : '' }}>นครนายก</option>
                        <option value="14" {{ old('provinces_id') == '14' ? 'selected' : '' }}>นครปฐม</option>
                        <option value="15" {{ old('provinces_id') == '15' ? 'selected' : '' }}>นครสวรรค์</option>
                        <option value="16" {{ old('provinces_id') == '16' ? 'selected' : '' }}>นนทบุรี</option>
                        <option value="17" {{ old('provinces_id') == '17' ? 'selected' : '' }}>ปทุมธานี</option>
                        <option value="18" {{ old('provinces_id') == '18' ? 'selected' : '' }}>พระนครศรีอยุธยา</option>
                        <option value="19" {{ old('provinces_id') == '19' ? 'selected' : '' }}>พิจิตร</option>
                        <option value="20" {{ old('provinces_id') == '20' ? 'selected' : '' }}>พิษณุโลก</option>
                        <option value="21" {{ old('provinces_id') == '21' ? 'selected' : '' }}>ลพบุรี</option>
                        <option value="22" {{ old('provinces_id') == '22' ? 'selected' : '' }}>สมุทรปราการ</option>
                        <option value="23" {{ old('provinces_id') == '23' ? 'selected' : '' }}>สมุทรสงคราม</option>
                        <option value="24" {{ old('provinces_id') == '24' ? 'selected' : '' }}>สมุทรสาคร</option>
                        <option value="25" {{ old('provinces_id') == '25' ? 'selected' : '' }}>สระบุรี</option>
                        <option value="26" {{ old('provinces_id') == '26' ? 'selected' : '' }}>สิงห์บุรี</option>
                        <option value="27" {{ old('provinces_id') == '27' ? 'selected' : '' }}>สุพรรณบุรี</option>
                        <option value="28" {{ old('provinces_id') == '28' ? 'selected' : '' }}>สุโขทัย</option>
                        <option value="29" {{ old('provinces_id') == '29' ? 'selected' : '' }}>อุทัยธานี</option>
                        <option value="30" {{ old('provinces_id') == '30' ? 'selected' : '' }}>อ่างทอง</option>
                        <option value="31" {{ old('provinces_id') == '31' ? 'selected' : '' }}>เพชรบูรณ์</option>
                        <option value="32" {{ old('provinces_id') == '32' ? 'selected' : '' }}>กาฬสินธุ์</option>
                        <option value="33" {{ old('provinces_id') == '33' ? 'selected' : '' }}>ขอนแก่น</option>
                        <option value="34" {{ old('provinces_id') == '34' ? 'selected' : '' }}>ชัยภูมิ</option>
                        <option value="35" {{ old('provinces_id') == '35' ? 'selected' : '' }}>นครพนม</option>
                        <option value="36" {{ old('provinces_id') == '36' ? 'selected' : '' }}>นครราชสีมา</option>
                        <option value="37" {{ old('provinces_id') == '37' ? 'selected' : '' }}>บึงกาฬ</option>
                        <option value="38" {{ old('provinces_id') == '38' ? 'selected' : '' }}>บุรีรัมย์</option>
                        <option value="39" {{ old('provinces_id') == '39' ? 'selected' : '' }}>มหาสารคาม</option>
                        <option value="40" {{ old('provinces_id') == '40' ? 'selected' : '' }}>มุกดาหาร</option>
                        <option value="41" {{ old('provinces_id') == '41' ? 'selected' : '' }}>ยโสธร</option>
                        <option value="42" {{ old('provinces_id') == '42' ? 'selected' : '' }}>ร้อยเอ็ด</option>
                        <option value="43" {{ old('provinces_id') == '43' ? 'selected' : '' }}>ศรีสะเกษ</option>
                        <option value="44" {{ old('provinces_id') == '44' ? 'selected' : '' }}>สกลนคร</option>
                        <option value="45" {{ old('provinces_id') == '45' ? 'selected' : '' }}>สุรินทร์</option>
                        <option value="46" {{ old('provinces_id') == '46' ? 'selected' : '' }}>หนองคาย</option>
                        <option value="47" {{ old('provinces_id') == '47' ? 'selected' : '' }}>หนองบัวลำภู</option>
                        <option value="48" {{ old('provinces_id') == '48' ? 'selected' : '' }}>อำนาจเจริญ</option>
                        <option value="49" {{ old('provinces_id') == '49' ? 'selected' : '' }}>อุดรธานี</option>
                        <option value="50" {{ old('provinces_id') == '50' ? 'selected' : '' }}>อุบลราชธานี</option>
                        <option value="51" {{ old('provinces_id') == '51' ? 'selected' : '' }}>เลย</option>
                        <option value="52" {{ old('provinces_id') == '52' ? 'selected' : '' }}>กระบี่</option>
                        <option value="53" {{ old('provinces_id') == '53' ? 'selected' : '' }}>ชุมพร</option>
                        <option value="54" {{ old('provinces_id') == '54' ? 'selected' : '' }}>ตรัง</option>
                        <option value="55" {{ old('provinces_id') == '55' ? 'selected' : '' }}>นครศรีธรรมราช</option>
                        <option value="56" {{ old('provinces_id') == '56' ? 'selected' : '' }}>นราธิวาส</option>
                        <option value="57" {{ old('provinces_id') == '57' ? 'selected' : '' }}>ปัตตานี</option>
                        <option value="58" {{ old('provinces_id') == '58' ? 'selected' : '' }}>พังงา</option>
                        <option value="59" {{ old('provinces_id') == '59' ? 'selected' : '' }}>พัทลุง</option>
                        <option value="60" {{ old('provinces_id') == '60' ? 'selected' : '' }}>ภูเก็ต</option>
                        <option value="61" {{ old('provinces_id') == '61' ? 'selected' : '' }}>ยะลา</option>
                        <option value="62" {{ old('provinces_id') == '62' ? 'selected' : '' }}>ระนอง</option>
                        <option value="63" {{ old('provinces_id') == '63' ? 'selected' : '' }}>สงขลา</option>
                        <option value="64" {{ old('provinces_id') == '64' ? 'selected' : '' }}>สตูล</option>
                        <option value="65" {{ old('provinces_id') == '65' ? 'selected' : '' }}>สุราษฎร์ธานี</option>
                        <option value="66" {{ old('provinces_id') == '66' ? 'selected' : '' }}>จันทบุรี</option>
                        <option value="67" {{ old('provinces_id') == '67' ? 'selected' : '' }}>ฉะเชิงเทรา</option>
                        <option value="68" {{ old('provinces_id') == '68' ? 'selected' : '' }}>ชลบุรี</option>
                        <option value="69" {{ old('provinces_id') == '69' ? 'selected' : '' }}>ตราด</option>
                        <option value="70" {{ old('provinces_id') == '70' ? 'selected' : '' }}>ปราจีนบุรี</option>
                        <option value="71" {{ old('provinces_id') == '71' ? 'selected' : '' }}>ระยอง</option>
                        <option value="72" {{ old('provinces_id') == '72' ? 'selected' : '' }}>สระแก้ว</option>
                        <option value="73" {{ old('provinces_id') == '73' ? 'selected' : '' }}>กาญจนบุรี</option>
                        <option value="74" {{ old('provinces_id') == '74' ? 'selected' : '' }}>ตาก</option>
                        <option value="75" {{ old('provinces_id') == '75' ? 'selected' : '' }}>ประจวบคีรีขันธ์</option>
                        <option value="76" {{ old('provinces_id') == '76' ? 'selected' : '' }}>ราชบุรี</option>
                        <option value="77" {{ old('provinces_id') == '77' ? 'selected' : '' }}>เพชรบุรี</option>
                    </select>
                    @error('provinces_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="postalcode" class="form-control @error('postalcode') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="รหัสไปรษณีย์" value="{{ old('postalcode') }}">
                    @error('postalcode')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <select id="seltyperesidence" name="typeresidences_id" class="form-select @error('typeresidences_id') is-invalid @enderror"
                    {{-- <select id="seltyperesidence" name="typeresidences_id" class="form-select" --}}
                        aria-label="Default select example">
                        <option value="" {{ old('typeresidences_id') == '' ? 'selected' : '' }}>ลักษณะที่พักอาศัย</option>
                        <option value="1" {{ old('typeresidences_id') == '1' ? 'selected' : '' }}>บ้านตัวเอง</option>
                        <option value="2" {{ old('typeresidences_id') == '2' ? 'selected' : '' }}>บ้านญาติ</option>
                        <option value="3" {{ old('typeresidences_id') == '3' ? 'selected' : '' }}>บ้านเช่า</option>
                        <option value="4" {{ old('typeresidences_id') == '4' ? 'selected' : '' }}>วัด</option>
                        <option value="5" {{ old('typeresidences_id') == '5' ? 'selected' : '' }}>อื่นๆ</option>
                    </select>
                    @error('typeresidences_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="distancelatyangroad" class="form-control @error('distancelatyangroad') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="ที่พักห่างโรงเรียนเป็นกี่เมตร(1km=1000m)" value="{{ old('distancelatyangroad') }}">
                    @error('distancelatyangroad')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="traveltime" class="form-control @error('traveltime') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="ใช้เวลาเดินทางมาโรงเรียนกี่นาที" value="{{ old('traveltime') }}">
                    @error('traveltime')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="travelschool1" name="travelschool1s_id" class="form-select" --}}
                    <select id="travelschool1" name="travelschool1s_id" class="form-select @error('travelschool1s_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('travelschool1s_id') == '' ? 'selected' : '' }}>พาหนะที่ใช้มาโรงเรียน</option>
                        <option value="1" {{ old('travelschool1s_id') == '1' ? 'selected' : '' }}>เดินเท้า</option>
                        <option value="2" {{ old('travelschool1s_id') == '2' ? 'selected' : '' }}>จักรยานยืมเรียน</option>
                        <option value="3" {{ old('travelschool1s_id') == '3' ? 'selected' : '' }}>พาหนะไม่เสียค่าโดยสาร</option>
                        <option value="4" {{ old('travelschool1s_id') == '4' ? 'selected' : '' }}>พาหนะเสียค่าโดยสาร</option>
                        <option value="5" {{ old('travelschool1s_id') == '5' ? 'selected' : '' }}>อื่นๆ</option>
                    </select>
                    @error('travelschool1s_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลบิดาผู้ให้กำเนิด
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_typetitlefather" name="typetitlesfather_id" class="form-select" --}}
                    <select id="sel_typetitlefather" name="typetitlesfather_id" class="form-select @error('typetitlesfather_id') is-invalid @enderror"
                        aria-label="Default select example">
                        {{-- <option selected>คำนำหน้าชื่อ</option>
                        <option value="3">นาย</option> --}}
                        <option value="" {{ old('typetitlesfather_id') == '' ? 'selected' : '' }}>คำนำหน้าชื่อ</option>
                        <option value="1" {{ old('typetitlesfather_id') == '1' ? 'selected' : '' }}>นาย</option>
                    </select>
                    @error('typetitlesfather_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <input type="textname_father" name="name_father" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="ชื่อบิดา"> --}}
                    <input type="text" name="name_father" class="form-control @error('name_father') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="ชื่อบิดา" value="{{ old('name_father') }}">
                    @error('name_father')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <input type="text" name="surname_father" class="form-control"
                        aria-label="Sizing example input" id="" aria-describedby="inputGroup-sizing-default"
                        placeholder="นามสกุล"> --}}
                    <input type="text" name="surname_father" class="form-control @error('surname_father') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="นามสกุล" value="{{ old('surname_father') }}">
                    @error('surname_father')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <input type="text" id="field_citizenfather" name="field_citizenfather" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        placeholder="เลขประจำตัวประชาชน13หลัก"> --}}
                    <input type="text" name="field_citizenfather" class="form-control @error('field_citizenfather') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="เลขประจำตัวประชาชน13หลัก" value="{{ old('field_citizenfather') }}">
                    @error('field_citizenfather')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_occupationfather" name="occupationfather_id" class="form-select" --}}
                    <select id="sel_occupationfather" name="occupationfather_id" class="form-select @error('occupationfather_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option selected>อาชีพบิดา</option>
                        {{-- <option value="" {{ old('occupationfather_id') == '' ? 'selected' : '' }}>อาชีพบิดา</option> --}}
                        <option value="1" {{ old('occupationfather_id') == '1' ? 'selected' : '' }}>รับราชการ</option>
                        <option value="2" {{ old('occupationfather_id') == '2' ? 'selected' : '' }}>พนักงานรัฐวิสาหกิจ</option>
                        <option value="3" {{ old('occupationfather_id') == '3' ? 'selected' : '' }}>นักธุรกิจ-ค้าขาย</option>
                        <option value="4" {{ old('occupationfather_id') == '4' ? 'selected' : '' }}>เกษตรกร</option>
                        <option value="5" {{ old('occupationfather_id') == '5' ? 'selected' : '' }}>รับจ้าง</option>
                        <option value="6" {{ old('occupationfather_id') == '6' ? 'selected' : '' }}>พระ/นักบวช</option>
                        <option value="7" {{ old('occupationfather_id') == '7' ? 'selected' : '' }}>พนักงานของรัฐ/ลูกจ้างประจํา/ลูกจ้างชั่วคราว</option>
                        <option value="8" {{ old('occupationfather_id') == '8' ? 'selected' : '' }}>เกษียณ</option>
                        <option value="9" {{ old('occupationfather_id') == '9' ? 'selected' : '' }}>ไม่ได้ประกอบอาชีพ</option>
                        <option value="10" {{ old('occupationfather_id') == '10' ? 'selected' : '' }}>อื่นๆ</option>    
                    </select>
                    @error('occupationfather_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="income_father" class="form-control @error('income_father') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="รายได้บิดาต่อเดือน" value="{{ old('income_father') }}">
                    @error('income_father')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="phone_father" class="form-control @error('phone_father') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="เบอร์โทรศัพท์(มือถือ)" value="{{ old('phone_father') }}">
                    @error('phone_father')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
               <i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลมารดาผู้ให้กำเนิด
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_typetitlemother" name="typetitlesmother_id" class="form-select" --}}
                    <select id="sel_typetitlemother" name="typetitlesmother_id" class="form-select @error('typetitlesmother_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('typetitlesmother_id') == '' ? 'selected' : '' }}>คำนำหน้าชื่อ</option>
                        <option value="4" {{ old('typetitlesmother_id') == '4' ? 'selected' : '' }}>นางสาว</option>
                        <option value="5" {{ old('typetitlesmother_id') == '5' ? 'selected' : '' }}>นาง</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="name_mother" class="form-control @error('name_mother') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="ชื่อมารดา" value="{{ old('name_mother') }}">
                    @error('name_mother')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="surname_mother" class="form-control @error('surname_mother') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="นามสกุล" value="{{ old('surname_mother') }}">
                    @error('surname_mother')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror 
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="field_citizenmother" class="form-control @error('field_citizenmother') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="เลขประจำตัวประชาชน13หลัก" value="{{ old('field_citizenmother') }}">
                    @error('field_citizenmother')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror 
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_occupationmother" name="occupationmother_id" class="form-select" --}}
                    <select id="sel_occupationmother" name="occupationmother_id" class="form-select @error('occupationmother_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('occupationmother_id') == '' ? 'selected' : '' }}>อาชีพมารดา</option>
                        <option value="1" {{ old('occupationmother_id') == '1' ? 'selected' : '' }}>รับราชการ</option>
                        <option value="2" {{ old('occupationmother_id') == '2' ? 'selected' : '' }}>พนักงานรัฐวิสาหกิจ</option>
                        <option value="3" {{ old('occupationmother_id') == '3' ? 'selected' : '' }}>นักธุรกิจ-ค้าขาย</option>
                        <option value="4" {{ old('occupationmother_id') == '4' ? 'selected' : '' }}>เกษตรกร</option>
                        <option value="5" {{ old('occupationmother_id') == '5' ? 'selected' : '' }}>รับจ้าง</option>
                        <option value="6" {{ old('occupationmother_id') == '6' ? 'selected' : '' }}>พระ/นักบวช</option>
                        <option value="7" {{ old('occupationmother_id') == '7' ? 'selected' : '' }}>พนักงานของรัฐ/ลูกจ้างประจํา/ลูกจ้างชั่วคราว</option>
                        <option value="8" {{ old('occupationmother_id') == '8' ? 'selected' : '' }}>เกษียณ</option>
                        <option value="9" {{ old('occupationmother_id') == '9' ? 'selected' : '' }}>ไม่ได้ประกอบอาชีพ</option>
                        <option value="10" {{ old('occupationmother_id') == '10' ? 'selected' : '' }}>อื่นๆ</option> 
                    </select>
                    @error('occupationmother_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="income_mother" class="form-control @error('income_mother') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="รายได้มารดาต่อเดือน" value="{{ old('income_mother') }}">
                    @error('income_mother')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror 
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="phone_mother" class="form-control @error('phone_mother') is-invalid @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="เบอร์โทรศัพท์(มือถือ)" value="{{ old('phone_mother') }}">
                    @error('phone_mother')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror 
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp; สถานภาพของบิดา-มารดา
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_maritalstatuse" name="maritalstatuses_id" class="form-select" --}}
                    <select id="sel_maritalstatuse" name="maritalstatuses_id" class="form-select @error('maritalstatuses_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('maritalstatuses_id') == '' ? 'selected' : '' }}>สถานภาพของบิดามารดา</option>
                        <option value="1" {{ old('maritalstatuses_id') == '1' ? 'selected' : '' }}>อยู่ด้วยกันจดทะเบียนสมรส</option>
                        <option value="2" {{ old('maritalstatuses_id') == '2' ? 'selected' : '' }}>โสด</option>
                        <option value="3" {{ old('maritalstatuses_id') == '3' ? 'selected' : '' }}>อย่าร้าง</option>
                        <option value="4" {{ old('maritalstatuses_id') == '4' ? 'selected' : '' }}>อยู่ด้วยกันไม่จดทะเบียนสมรส</option>
                        <option value="5" {{ old('maritalstatuses_id') == '5' ? 'selected' : '' }}>แยกกันอยู่</option>
                        <option value="6" {{ old('maritalstatuses_id') == '6' ? 'selected' : '' }}>บิดาถึงแก่กรรม</option>
                        <option value="7" {{ old('maritalstatuses_id') == '7' ? 'selected' : '' }}>มารดาถึงแก่กรรม</option>
                        <option value="8" {{ old('maritalstatuses_id') == '8' ? 'selected' : '' }}>บิดาและมารดาถึงแก่กรรม</option>
                        <option value="9" {{ old('maritalstatuses_id') == '9' ? 'selected' : '' }}>บิดาถึงแก่กรรมมารดาแต่งงานใหม่</option> 
                        <option value="10" {{ old('maritalstatuses_id') == '10' ? 'selected' : '' }}>มารดาถึงแก่กรรมบิดาแต่งงานใหม่</option>
                        <option value="11" {{ old('maritalstatuses_id') == '11' ? 'selected' : '' }}>อื่นๆ</option> 
                    </select>
                    @error('maritalstatuses_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_parent" name="parent_id" class="form-select" --}}
                    <select id="sel_parent" name="parent_id" class="form-select @error('parent_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('parent_id') == '' ? 'selected' : '' }}>ผู้ปกครองนักเรียนคือ</option>
                        <option value="1" {{ old('parent_id') == '1' ? 'selected' : '' }}>บิดา</option>
                        <option value="2" {{ old('parent_id') == '2' ? 'selected' : '' }}>มารดา</option>
                        <option value="3" {{ old('parent_id') == '3' ? 'selected' : '' }}>อื่นๆ(ญาติ,ปู่-ย่า,ตา-ยาย ฯล)</option>
                    </select>
                    @error('parent_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-journal-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;  โปรดเลือกห้องเรียน
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_secondaryschool1" name="secondaryschool1_id" class="form-select" --}}
                    <select id="sel_secondaryschool1" name="secondaryschool1_id" class="form-select @error('secondaryschool1_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('secondaryschool1_id') == '' ? 'selected' : '' }}>เลือกแผนการเรียนลำดับที่ 1</option>
                        <option value="1" {{ old('secondaryschool1_id') == '1' ? 'selected' : '' }}>1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                        <option value="2" {{ old('secondaryschool1_id') == '2' ? 'selected' : '' }}>2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                        <option value="3" {{ old('secondaryschool1_id') == '3' ? 'selected' : '' }}>3.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                        <option value="4" {{ old('secondaryschool1_id') == '4' ? 'selected' : '' }}>4.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                        <option value="5" {{ old('secondaryschool1_id') == '5' ? 'selected' : '' }}>5.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                        <option value="6" {{ old('secondaryschool1_id') == '6' ? 'selected' : '' }}>6.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                        <option value="7" {{ old('secondaryschool1_id') == '7' ? 'selected' : '' }}>7.ห้องเรียนทั่วไป GP</option>
                    </select>
                        @error('secondaryschool1_id')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_secondaryschool2" name="secondaryschool2_id" class="form-select" --}}
                    <select id="sel_secondaryschool2" name="secondaryschool2_id" class="form-select @error('secondaryschool2_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('secondaryschool2_id') == '' ? 'selected' : '' }}>เลือกแผนการเรียนลำดับที่ 2</option>
                        <option value="1" {{ old('secondaryschool2_id') == '1' ? 'selected' : '' }}>1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                        <option value="2" {{ old('secondaryschool2_id') == '2' ? 'selected' : '' }}>2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                        <option value="3" {{ old('secondaryschool2_id') == '3' ? 'selected' : '' }}>3.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                        <option value="4" {{ old('secondaryschool2_id') == '4' ? 'selected' : '' }}>4.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                        <option value="5" {{ old('secondaryschool2_id') == '5' ? 'selected' : '' }}>5.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                        <option value="6" {{ old('secondaryschool2_id') == '6' ? 'selected' : '' }}>6.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                        <option value="7" {{ old('secondaryschool2_id') == '7' ? 'selected' : '' }}>7.ห้องเรียนทั่วไป GP</option>
                    </select>
                        @error('secondaryschool2_id')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_secondaryschool3" name="secondaryschool3_id" class="form-select" --}}
                    <select id="sel_secondaryschool3" name="secondaryschool3_id" class="form-select @error('secondaryschool3_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('secondaryschool3_id') == '' ? 'selected' : '' }}>เลือกแผนการเรียนลำดับที่ 3</option>
                        <option value="1" {{ old('secondaryschool3_id') == '1' ? 'selected' : '' }}>1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                        <option value="2" {{ old('secondaryschool3_id') == '2' ? 'selected' : '' }}>2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                        <option value="3" {{ old('secondaryschool3_id') == '3' ? 'selected' : '' }}>3.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                        <option value="4" {{ old('secondaryschool3_id') == '4' ? 'selected' : '' }}>4.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                        <option value="5" {{ old('secondaryschool3_id') == '5' ? 'selected' : '' }}>5.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                        <option value="6" {{ old('secondaryschool3_id') == '6' ? 'selected' : '' }}>6.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                        <option value="7" {{ old('secondaryschool3_id') == '7' ? 'selected' : '' }}>7.ห้องเรียนทั่วไป GP</option>
                    </select>
                        @error('secondaryschool3_id')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_secondaryschool4" name="secondaryschool4_id" class="form-select" --}}
                    <select id="sel_secondaryschool4" name="secondaryschool4_id" class="form-select @error('secondaryschool4_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('secondaryschool4_id') == '' ? 'selected' : '' }}>เลือกแผนการเรียนลำดับที่ 4</option>
                        <option value="1" {{ old('secondaryschool4_id') == '1' ? 'selected' : '' }}>1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                        <option value="2" {{ old('secondaryschool4_id') == '2' ? 'selected' : '' }}>2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                        <option value="3" {{ old('secondaryschool4_id') == '3' ? 'selected' : '' }}>3.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                        <option value="4" {{ old('secondaryschool4_id') == '4' ? 'selected' : '' }}>4.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                        <option value="5" {{ old('secondaryschool4_id') == '5' ? 'selected' : '' }}>5.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                        <option value="6" {{ old('secondaryschool4_id') == '6' ? 'selected' : '' }}>6.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                        <option value="7" {{ old('secondaryschool4_id') == '7' ? 'selected' : '' }}>7.ห้องเรียนทั่วไป GP</option>
                    </select>
                        @error('secondaryschool4_id')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_secondaryschool5" name="secondaryschool5_id" class="form-select" --}}
                    <select id="sel_secondaryschool5" name="secondaryschool5_id" class="form-select @error('secondaryschool5_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('secondaryschool5_id') == '' ? 'selected' : '' }}>เลือกแผนการเรียนลำดับที่ 5</option>
                        <option value="1" {{ old('secondaryschool5_id') == '1' ? 'selected' : '' }}>1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                        <option value="2" {{ old('secondaryschool5_id') == '2' ? 'selected' : '' }}>2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                        <option value="3" {{ old('secondaryschool5_id') == '3' ? 'selected' : '' }}>3.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                        <option value="4" {{ old('secondaryschool5_id') == '4' ? 'selected' : '' }}>4.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                        <option value="5" {{ old('secondaryschool5_id') == '5' ? 'selected' : '' }}>5.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                        <option value="6" {{ old('secondaryschool5_id') == '6' ? 'selected' : '' }}>6.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                        <option value="7" {{ old('secondaryschool5_id') == '7' ? 'selected' : '' }}>7.ห้องเรียนทั่วไป GP</option>
                    </select>
                        @error('secondaryschool5_id')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_secondaryschool6" name="secondaryschool6_id" class="form-select" --}}
                    <select id="sel_secondaryschool6" name="secondaryschool6_id" class="form-select @error('secondaryschool6_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('secondaryschool6_id') == '' ? 'selected' : '' }}>เลือกแผนการเรียนลำดับที่ 6</option>
                        <option value="1" {{ old('secondaryschool6_id') == '1' ? 'selected' : '' }}>1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                        <option value="2" {{ old('secondaryschool6_id') == '2' ? 'selected' : '' }}>2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                        <option value="3" {{ old('secondaryschool6_id') == '3' ? 'selected' : '' }}>3.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                        <option value="4" {{ old('secondaryschool6_id') == '4' ? 'selected' : '' }}>4.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                        <option value="5" {{ old('secondaryschool6_id') == '5' ? 'selected' : '' }}>5.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                        <option value="6" {{ old('secondaryschool6_id') == '6' ? 'selected' : '' }}>6.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                        <option value="7" {{ old('secondaryschool6_id') == '7' ? 'selected' : '' }}>7.ห้องเรียนทั่วไป GP</option>
                    </select>
                        @error('secondaryschool6_id')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-6 mb-2">
                    {{-- <select id="sel_secondaryschool7" name="secondaryschool7_id" class="form-select" --}}
                    <select id="sel_secondaryschool7" name="secondaryschool7_id" class="form-select @error('secondaryschool7_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option value="" {{ old('secondaryschool7_id') == '' ? 'selected' : '' }}>เลือกแผนการเรียนลำดับที่ 7</option>
                        <option value="1" {{ old('secondaryschool7_id') == '1' ? 'selected' : '' }}>1.ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP</option>
                        <option value="2" {{ old('secondaryschool7_id') == '2' ? 'selected' : '' }}>2.ห้องวิทยาศาสตร์พลังสิบ TPSP</option>
                        <option value="3" {{ old('secondaryschool7_id') == '3' ? 'selected' : '' }}>3.ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP</option>
                        <option value="4" {{ old('secondaryschool7_id') == '4' ? 'selected' : '' }}>4.ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP</option>
                        <option value="5" {{ old('secondaryschool7_id') == '5' ? 'selected' : '' }}>5.ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP</option>
                        <option value="6" {{ old('secondaryschool7_id') == '6' ? 'selected' : '' }}>6.ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP</option>
                        <option value="7" {{ old('secondaryschool7_id') == '7' ? 'selected' : '' }}>7.ห้องเรียนทั่วไป GP</option>
                    </select>
                        @error('secondaryschool7_id')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                </div>
            </div>
            <div class="container ">
                {{-- <div class="row justify-content-center"> --}}
                <div class="col text-center">
                    <button type="submit"
                        class="btn btn-primary btn-lg"><i class="bi bi-save2"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กดสมัครเรียน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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
    <!-- JavaScript Libraries -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"></script>
    <<!-- moment.js และ moment-timezone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone-with-data.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function () {
            moment.locale('th'); // ตั้งค่า moment ให้ใช้ภาษาไทย

            $('#datepicker input').datepicker({
                format: 'dd/mm/yyyy',       // รูปแบบวันที่
                autoclose: true,            // ปิด popup อัตโนมัติเมื่อเลือกวันที่
                todayHighlight: true,       // ไฮไลท์วันที่ปัจจุบัน
                language: 'th',             // ใช้ภาษาไทย
                container: 'body', // ป้องกัน Datepicker ซ่อนอยู่หลัง Element อื่น
                orientation: 'bottom', // ให้แสดงข้างล่างของ input
            }).on('changeDate', function (e) {
                let date = moment.tz(e.date, "Asia/Bangkok"); // กำหนดโซนเวลาเป็นไทย
                let thaiYear = date.year(); // แปลง ค.ศ. เป็น พ.ศ.
                let formattedDate = date.format('DD/MM') + '/' + thaiYear;
                let dayOfWeek = date.format('dddd'); // แสดงวันในสัปดาห์

                console.log("วันที่ที่เลือก:", formattedDate, "เป็นวัน", dayOfWeek);
                $(this).val(formattedDate);
            });

            // เซ็ตค่าเริ่มต้น (ถ้ายังไม่มีค่า)
            let currentValue = $('#datepicker input').val();
            if (!currentValue) {
                let today = moment.tz("Asia/Bangkok");
                let thaiYear = today.year();
                let formattedToday = today.format('DD/MM') + '/' + thaiYear;
                $('#datepicker input').datepicker('setDate', formattedToday);
            }
            // $('#nationalid').inputmask('9-9999-99999-99-9'); 
            // $('#phone1student').inputmask('999-999-9999');
            // $('#houseid').inputmask('9999-999999-9'); 
            // $('#field_citizenfather').inputmask('9-9999-99999-99-9'); 
            // $('#phone_father').inputmask('999-999-9999');
            // $('#field_citizenmother').inputmask('9-9999-99999-99-9'); 
            // $('#phone_mother').inputmask('999-999-9999');
        });
    </script>
    <style>
        input::placeholder{
            color: red;
            /* font-weight: bold; */
            font-size: 16px;
        }
    </style>
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