<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html>

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
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@100;400&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"> --}}
    {{-- <link href="css/style.css" rel="stylesheet"> --}}
    <style>
        /* Custom styling for alert */
        .alert {
            max-width: 100%;
            /* Ensure it adjusts to any screen size */
            margin: 10px auto;
            /* Center align for smaller screens */
        }

        #datepicker input {
            width: 100%;
            max-width: 300px;
            font-size: 14px;
            padding: 10px;
        }

        #datepicker .input-group-text {
            padding: 5px;
            /* ลด padding ของไอคอน */
            font-size: 14px;
            /* ปรับขนาดไอคอน */
        }

        .datepicker {
            font-size: 0.875rem !important;
            /* ลดขนาด Font ใน Popup */
        }

        .form-section {
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
        <form class="row g-3" action="{{ route('students1.update', $students->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="alert alert-success text-center" role="alert">
                <h5>ข้อมูลนักเรียน </h5>**หากกรอกไม่ครบทุกช่องระบบจะไม่บันทึกข้อมูลให้ หากช่องไหนไม่มี ให้กรอก - ลงไป**
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ระดับชั้นที่สมัครเข้าเรียน</label>
                        <select id="classlevel" name="classlevels_id" class="form-select"
                            aria-label="Default select example">
                            <option value="" selected>ระดับชั้นที่สมัครเข้าเรียน</option>
                            @foreach ($classlevels as $classlevel)
                                <option value="{{ $classlevel->id }}"
                                    {{ old('classlevels_id', $students->classlevels_id) == $classlevel->id ? 'selected' : '' }}>
                                    {{ $classlevel->classlevel }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">คำนำหน้าชื่อ</label>
                        <select id="typetitles" name="typetitles_id" class="form-select"
                            aria-label="Default select example">
                            <option value="" selected>คำนำหน้าชื่อ</option>
                            @foreach ($typetitles as $typetitle)
                                <option value="{{ $typetitle->id }}"
                                    {{ old('typetitles_id', $students->typetitles_id ?? '') == $typetitle->id ? 'selected' : '' }}>
                                    {{ $typetitle->typetitle }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ชื่อนักเรียน</label>
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input"
                            id="name" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('name', $students->name ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">นามสกุล</label>
                        <input type="text" name="surname" class="form-control" aria-label="Sizing example input"
                            id="surname" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('surname', $students->surname ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ชื่อนักเรียนภาษาอังกฤษ</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อนักเรียน</span> --}}
                        <input type="text" name="nameeng" class="form-control" aria-label="Sizing example input"
                            id="nameeng" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('nameeng', $students->nameeng ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">นามสกุลภาษาอังกฤษ</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span> --}}
                        <input type="text" name="surnameeng" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('surnameeng', $students->surnameeng ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">เลขประจำตัวประชาชน</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">เลขประจำตัวประชาชน</span> --}}
                        <input type="text" name="nationalid" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('nationalid', $students->nationalid ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">มือถือ</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">เลขประจำตัวประชาชน</span> --}}
                        <input type="text" name="phone1student" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('nationalid', $students->phone1student ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ศาสนา</label>
                        <select id="sel_religion" name="religions_id" class="form-select"
                            aria-label="Default select example">
                            {{-- <option value="" selected>ศาสนา</option> --}}
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}"
                                    {{ old('religions_id', $students->religions_id) == $religion->id ? 'selected' : '' }}>
                                    {{ $religion->religion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">สัญชาติ</label>
                        <select id="sel_nationnalitie" name="nationalities_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($nationalitys as $nationality)
                                <option value="{{ $nationality->id }}"
                                    {{ old('nationalities_id', $students->nationalities_id) == $nationality->id ? 'selected' : '' }}>
                                    {{ $nationality->nationalitie }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">เชื้อชาติ</label>
                        <select id="sel_ethnicities" name="ethnicities_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($ethnicitys as $ethnicity)
                                <option value="{{ $ethnicity->id }}"
                                    {{ old('ethnicities_id', $students->ethnicities_id) == $ethnicity->id ? 'selected' : '' }}>
                                    {{ $ethnicity->ethnicitie }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <div class="input-group date" id="datepicker">
                            <label class="input-group-text" for="inputGroupSelect01">วันที่เกิด</label>
                            <input type="text" name="dateofbirth" class="form-control"
                                value="{{ old('dateofbirth', $students->dateofbirth ?? '') }}">
                            <span class="input-group-text">
                                <i class="bi bi-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จังหวัดเกิด</label>
                        <select id="sel_province" name="provincesbirth_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('provincesbirth_id', $students->provincesbirth_id) == $province->id ? 'selected' : '' }}>
                                    {{ $province->province }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">กรุ๊ปเลือด</label>
                        <select id="sel_bloodtype" name="bloodtypes_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($bloodtypes as $bloodtype)
                                <option value="{{ $bloodtype->id }}"
                                    {{ old('bloodtypes_id', $students->bloodtypes_id) == $bloodtype->id ? 'selected' : '' }}>
                                    {{ $bloodtype->bloodtype }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">น้ำหนัก</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">ส่วนสูง</span> --}}
                        <input type="text" name="weight" class="form-control" aria-label="Sizing example input"
                            id="" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('weight', $students->weight ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ส่วนสูง</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">น้ำหนัก</span> --}}
                        <input type="text" name="height" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('height', $students->height ?? '') }}">
                    </div>
                </div>
                {{-- Disability  ความพิการ --}}
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">นักเรียนพิการหรือไม่</label>
                        <select id="disability" name="disability" class="form-select"
                            aria-label="Default select example">
                            <option value="1"
                                {{ old('disability', $students->disability ?? '') == 1 ? 'selected' : '' }}>พิการ
                            </option>
                            <option value="2"
                                {{ old('disability', $students->disability ?? '') == 2 ? 'selected' : '' }}>ไม่พิการ
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">โรงเรียนเดิมที่จบมา</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">โรงเรียนที่นักเรียนจบมา</span> --}}
                        <input type="text" name="previousschool" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('previousschool', $students->previousschool ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จังหวัดโรงเรียนเดิม</label>
                        <select id="provinceschool" name="provinceschool_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('provinceschool_id', $students->provinceschool_id) == $province->id ? 'selected' : '' }}>
                                    {{ $province->province }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">นักเรียนเป็นบุตรคนที่</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">นักเรียนเป็นบุตรคนที่</span> --}}
                        <input type="text" name="beingonlychild" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('beingonlychild', $students->beingonlychild ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จำนวนพี่ชาย(หากไม่มีกรอก0)</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่ชาย</span> --}}
                        <input type="text" name="brothers" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('brothers', $students->brothers ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จำนวนน้องชาย(หากไม่มีกรอก0)</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">จำนวนน้องชาย </span> --}}
                        <input type="text" name="youngerbrother" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('youngerbrother', $students->youngerbrother ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จำนวนพี่สาว(หากไม่มีกรอก0)</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่สาว</span> --}}
                        <input type="text" name="oldersister" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('oldersister', $students->oldersister ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จำนวนน้องสาว(หากไม่มีกรอก0)</label>
                        {{-- <div class="col-md-2"><span class="input-group-text " id="inputGroup-sizing-default" >จำนวนน้องสาว</span></div> --}}
                        <input type="text" name="sister" class="form-control" aria-label="Sizing example input"
                            id="" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('sister', $students->sister ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จำนวนพี่น้องที่เรียนอยู่</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">จำนวนพี่น้องที่ศึกษาอยู่</span> --}}
                        <input type="text" name="sumsiblings" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('sumsiblings', $students->sumsiblings ?? '') }}">
                    </div>
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                ข้อมูลที่อยู่ปัจจุบันของนักเรียน
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">เลขรหัส 11 หลัก</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">รหัสประจำบ้าน</span> --}}
                        <input type="text" name="houseid" class="form-control" aria-label="Sizing example input"
                            id="" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('houseid', $students->houseid ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">บ้านเลขที่</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">บ้านเลขที่</span> --}}
                        <input type="text" name="housenumber" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('housenumber', $students->housenumber ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">หมู่ที่</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">หมู่ที่</span> --}}
                        <input type="text" name="villagenumber" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('villagenumber', $students->villagenumber ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ชื่อหมู่บ้าน</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อหมู่บ้าน</span> --}}
                        <input type="text" name="villagename" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('villagename', $students->villagename ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ตำบล</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">ตำบล</span> --}}
                        <input type="text" name="district" class="form-control" aria-label="Sizing example input"
                            id="" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('district', $students->district ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">อำเภอ</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">อำเภอ</span> --}}
                        <input type="text" name="subdistrict" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('subdistrict', $students->subdistrict ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จังหวัด</label>
                        <select id="sel_province2" name="provinces_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('provinces_id', $students->provinces_id) == $province->id ? 'selected' : '' }}>
                                    {{ $province->province }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">รหัสไปรษณีย์</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">รหัสไปรษณีย์</span> --}}
                        <input type="text" name="postalcode" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('postalcode', $students->postalcode ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ลักษณะที่พักอาศัย</label>
                        <select id="seltyperesidence" name="typeresidences_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($typeresidences as $typeresidence)
                                <option value="{{ $typeresidence->id }}"
                                    {{ old('typeresidences_id', $students->typeresidences_id) == $typeresidence->id ? 'selected' : '' }}>
                                    {{ $typeresidence->typeresidence }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text"
                            for="inputGroupSelect01">ที่พักห่างโรงเรียนเป็นกี่เมตร(1km=1000m)</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">ที่พักห่างจากโรงเรียนเป็นถนนลาดยาง</span> --}}
                        <input type="text" name="distancelatyangroad" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('distancelatyangroad', $students->distancelatyangroad ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text"
                            for="inputGroupSelect01">ใช้เวลาเดินทางมาโรงเรียนกี่นาที</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">ใช้เวลาเดินทางมาโรงเรียน</span> --}}
                        <input type="text" name="traveltime" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('traveltime', $students->traveltime ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">พาหนะที่ใช้มาโรงเรียน</label>
                        <select id="travelschool1" name="travelschool1s_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($travelschool1 as $nametravelschool)
                                <option value="{{ $nametravelschool->id }}"
                                    {{ old('travelschool1s_id', $students->travelschool1s_id) == $nametravelschool->id ? 'selected' : '' }}>
                                    {{ $nametravelschool->nametravelschool }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                ข้อมูลบิดาผู้ให้กำหนด
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">คำนำหน้าชื่อ</label>
                        <select id="sel_typetitlefather" name="typetitlesfather_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($typetitles as $typetitle)
                                <option value="{{ $typetitle->id }}"
                                    {{ old('typetitlesfather_id', $students->typetitlesfather_id) == $typetitle->id ? 'selected' : '' }}>
                                    {{ $typetitle->typetitle }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ชื่อบิดา</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อบิดา</span> --}}
                        <input type="textname_father" name="name_father" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('name_father', $students->name_father ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">นามสกุล</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span> --}}
                        <input type="text" name="surname_father" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('surname_father', $students->surname_father ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">เลขประจำตัวประชาชน13หลัก</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">เลขประจำตัวประชาชนบิดา</span> --}}
                        <input type="text" name="field_citizenfather" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('field_citizenfather', $students->field_citizenfather ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">อาชีพบิดา</label>
                        <select id="sel_occupationfather" name="occupationfather_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($occupations as $occupation)
                                <option value="{{ $occupation->id }}"
                                    {{ old('occupationfather_id', $students->occupationfather_id) == $occupation->id ? 'selected' : '' }}>
                                    {{ $occupation->occupation }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">รายได้บิดา</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">รายได้บิดา</span> --}}
                        <input type="text" name="income_father" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('income_father', $students->income_father ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">เบอร์โทรศัพท์(มือถือ)</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">เบอร์โทรศัพท์(มือถือ)</span> --}}
                        <input type="text" name="phone_father" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('phone_father', $students->phone_father ?? '') }}">
                    </div>
                </div>
            </div>
            <div class="alert alert-success text-center" role="alert">
                ข้อมูลมารดาผู้ให้กำหนด
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">คำนำหน้าชื่อ</label>
                        <select id="sel_typetitlemother" name="typetitlesmother_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($typetitles as $typetitle)
                                <option value="{{ $typetitle->id }}"
                                    {{ old('typetitlesmother_id', $students->typetitlesmother_id) == $typetitle->id ? 'selected' : '' }}>
                                    {{ $typetitle->typetitle }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ชื่อมารดา</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">ชื่อมารดา</span> --}}
                        <input type="text" name="name_mother" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('name_mother', $students->name_mother ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">นามสกุล</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span> --}}
                        <input type="text" name="surname_mother" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('surname_mother', $students->surname_mother ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">เลขประจำตัวประชาชน13หลัก</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">เลขมารดา</span> --}}
                        <input type="text" name="field_citizenmother" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('field_citizenmother', $students->field_citizenmother ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">อาชีพมารดา</label>
                        <select id="sel_occupationmother" name="occupationmother_id" class="form-select"
                            aria-label="Default select example">
                            @foreach ($occupations as $occupation)
                                <option value="{{ $occupation->id }}"
                                    {{ old('occupationmother_id', $students->occupationmother_id) == $occupation->id ? 'selected' : '' }}>
                                    {{ $occupation->occupation }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">อาชีพมารดา</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">รายได้มารดา</span> --}}
                        <input type="text" name="income_mother" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('income_mother', $students->income_mother ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">อาชีพมารดา</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">เบอร์โทรศัพท์(มือถือ)</span> --}}
                        <input type="text" name="phone_mother" class="form-control"
                            aria-label="Sizing example input" id=""
                            aria-describedby="inputGroup-sizing-default"
                            value="{{ old('phone_mother', $students->phone_mother ?? '') }}">
                    </div>
                </div>
                <div class="alert alert-success text-center" role="alert">
                    สถานภาพของบิดา-มารดา
                </div>
                <div class="row g-2 mb-2">
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">สถานภาพของบิดามารดา</label>
                            <select id="sel_maritalstatuses" name="maritalstatuses_id" class="form-select"
                                aria-label="Default select example">
                                @foreach ($maritalstatus as $maritalstatuse)
                                    <option value="{{ $maritalstatuse->id }}"
                                        {{ old('maritalstatuse_id', $students->maritalstatuse_id) == $maritalstatuse->id ? 'selected' : '' }}>
                                        {{ $maritalstatuse->maritalstatuse }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">ผู้ปกครองนักเรียนคือ</label>
                            <select id="disability" name="parent_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('parent_id', $students->parent_id ?? '') == 1 ? 'selected' : '' }}>บิดา
                                </option>
                                <option value="2"
                                    {{ old('parent_id', $students->parent_id ?? '') == 2 ? 'selected' : '' }}>มารดา
                                </option>
                                <option value="3"
                                    {{ old('parent_id', $students->parent_id ?? '') == 3 ? 'selected' : '' }}>อื่นๆ(ญาติ,ปู่-ย่า,ตา-ยาย
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="alert alert-success text-center" role="alert">
                        สายการเรียนที่เลือก
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนที่เลือกลำดับ 1</label>
                            <select id="sel_secondaryschool1" name="secondaryschool1_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('secondaryschool1_id', $students->secondaryschool1_id ?? '') == 1 ? 'selected' : '' }}>ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP
                                </option>
                                <option value="2"
                                    {{ old('secondaryschool1_id', $students->secondaryschool1_id ?? '') == 2 ? 'selected' : '' }}>ห้องวิทยาศาสตร์พลังสิบ TPSP
                                </option>
                                <option value="3"
                                    {{ old('secondaryschool1_id', $students->secondaryschool1_id ?? '') == 3 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP
                                </option>
                                <option value="4"
                                    {{ old('secondaryschool1_id', $students->secondaryschool1_id ?? '') == 4 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP
                                </option>
                                <option value="5"
                                    {{ old('secondaryschool1_id', $students->secondaryschool1_id ?? '') == 5 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP
                                </option>
                                <option value="6"
                                    {{ old('secondaryschool1_id', $students->secondaryschool1_id ?? '') == 6 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP
                                </option>
                                <option value="7"
                                    {{ old('secondaryschool1_id', $students->secondaryschool1_id ?? '') == 7 ? 'selected' : '' }}>ห้องเรียนทั่วไป GP
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนที่เลือกลำดับ 2</label>
                            <select id="sel_secondaryschool2" name="secondaryschool2_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('secondaryschool2_id', $students->secondaryschool2_id ?? '') == 1 ? 'selected' : '' }}>ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP
                                </option>
                                <option value="2"
                                    {{ old('secondaryschool2_id', $students->secondaryschool2_id ?? '') == 2 ? 'selected' : '' }}>ห้องวิทยาศาสตร์พลังสิบ TPSP
                                </option>
                                <option value="3"
                                    {{ old('secondaryschool2_id', $students->secondaryschool2_id ?? '') == 3 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP
                                </option>
                                <option value="4"
                                    {{ old('secondaryschool2_id', $students->secondaryschool2_id ?? '') == 4 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP
                                </option>
                                <option value="5"
                                    {{ old('secondaryschool2_id', $students->secondaryschool2_id ?? '') == 5 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP
                                </option>
                                <option value="6"
                                    {{ old('secondaryschool2_id', $students->secondaryschool2_id ?? '') == 6 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP
                                </option>
                                <option value="7"
                                    {{ old('secondaryschool2_id', $students->secondaryschool2_id ?? '') == 7 ? 'selected' : '' }}>ห้องเรียนทั่วไป GP
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนที่เลือกลำดับ 3</label>
                            <select id="sel_secondaryschool3" name="secondaryschool3_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('secondaryschool3_id', $students->secondaryschool3_id ?? '') == 1 ? 'selected' : '' }}>ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP
                                </option>
                                <option value="2"
                                    {{ old('secondaryschool3_id', $students->secondaryschool3_id ?? '') == 2 ? 'selected' : '' }}>ห้องวิทยาศาสตร์พลังสิบ TPSP
                                </option>
                                <option value="3"
                                    {{ old('secondaryschool3_id', $students->secondaryschool3_id ?? '') == 3 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP
                                </option>
                                <option value="4"
                                    {{ old('secondaryschool3_id', $students->secondaryschool3_id ?? '') == 4 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP
                                </option>
                                <option value="5"
                                    {{ old('secondaryschool3_id', $students->secondaryschool3_id ?? '') == 5 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP
                                </option>
                                <option value="6"
                                    {{ old('secondaryschool3_id', $students->secondaryschool3_id ?? '') == 6 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP
                                </option>
                                <option value="7"
                                    {{ old('secondaryschool3_id', $students->secondaryschool3_id ?? '') == 7 ? 'selected' : '' }}>ห้องเรียนทั่วไป GP
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนที่เลือกลำดับ 4</label>
                            <select id="sel_secondaryschool4" name="secondaryschool4_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('secondaryschool4_id', $students->secondaryschool4_id ?? '') == 1 ? 'selected' : '' }}>ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP
                                </option>
                                <option value="2"
                                    {{ old('secondaryschool4_id', $students->secondaryschool4_id ?? '') == 2 ? 'selected' : '' }}>ห้องวิทยาศาสตร์พลังสิบ TPSP
                                </option>
                                <option value="3"
                                    {{ old('secondaryschool4_id', $students->secondaryschool4_id ?? '') == 3 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP
                                </option>
                                <option value="4"
                                    {{ old('secondaryschool4_id', $students->secondaryschool4_id ?? '') == 4 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP
                                </option>
                                <option value="5"
                                    {{ old('secondaryschool4_id', $students->secondaryschool4_id ?? '') == 5 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP
                                </option>
                                <option value="6"
                                    {{ old('secondaryschool4_id', $students->secondaryschool4_id ?? '') == 6 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP
                                </option>
                                <option value="7"
                                    {{ old('secondaryschool4_id', $students->secondaryschool4_id ?? '') == 7 ? 'selected' : '' }}>ห้องเรียนทั่วไป GP
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนที่เลือกลำดับ 5</label>
                            <select id="sel_secondaryschool5" name="secondaryschool5_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('secondaryschool5_id', $students->secondaryschool5_id ?? '') == 1 ? 'selected' : '' }}>ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP
                                </option>
                                <option value="2"
                                    {{ old('secondaryschool5_id', $students->secondaryschool5_id ?? '') == 2 ? 'selected' : '' }}>ห้องวิทยาศาสตร์พลังสิบ TPSP
                                </option>
                                <option value="3"
                                    {{ old('secondaryschool5_id', $students->secondaryschool5_id ?? '') == 3 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP
                                </option>
                                <option value="4"
                                    {{ old('secondaryschool5_id', $students->secondaryschool5_id ?? '') == 4 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP
                                </option>
                                <option value="5"
                                    {{ old('secondaryschool5_id', $students->secondaryschool5_id ?? '') == 5 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP
                                </option>
                                <option value="6"
                                    {{ old('secondaryschool5_id', $students->secondaryschool5_id ?? '') == 6 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP
                                </option>
                                <option value="7"
                                    {{ old('secondaryschool5_id', $students->secondaryschool5_id ?? '') == 7 ? 'selected' : '' }}>ห้องเรียนทั่วไป GP
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนที่เลือกลำดับ 6</label>
                            <select id="sel_secondaryschool6" name="secondaryschool6_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('secondaryschool6_id', $students->secondaryschool6_id ?? '') == 1 ? 'selected' : '' }}>ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP
                                </option>
                                <option value="2"
                                    {{ old('secondaryschool6_id', $students->secondaryschool6_id ?? '') == 2 ? 'selected' : '' }}>ห้องวิทยาศาสตร์พลังสิบ TPSP
                                </option>
                                <option value="3"
                                    {{ old('secondaryschool6_id', $students->secondaryschool6_id ?? '') == 3 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP
                                </option>
                                <option value="4"
                                    {{ old('secondaryschool6_id', $students->secondaryschool6_id ?? '') == 4 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP
                                </option>
                                <option value="5"
                                    {{ old('secondaryschool6_id', $students->secondaryschool6_id ?? '') == 5 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP
                                </option>
                                <option value="6"
                                    {{ old('secondaryschool6_id', $students->secondaryschool6_id ?? '') == 6 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP
                                </option>
                                <option value="7"
                                    {{ old('secondaryschool6_id', $students->secondaryschool6_id ?? '') == 7 ? 'selected' : '' }}>ห้องเรียนทั่วไป GP
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนที่เลือกลำดับ 7</label>
                            <select id="sel_secondaryschool7" name="secondaryschool7_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('secondaryschool7_id', $students->secondaryschool7_id ?? '') == 1 ? 'selected' : '' }}>ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP
                                </option>
                                <option value="2"
                                    {{ old('secondaryschool7_id', $students->secondaryschool7_id ?? '') == 2 ? 'selected' : '' }}>ห้องวิทยาศาสตร์พลังสิบ TPSP
                                </option>
                                <option value="3"
                                    {{ old('secondaryschool7_id', $students->secondaryschool7_id ?? '') == 3 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP
                                </option>
                                <option value="4"
                                    {{ old('secondaryschool7_id', $students->secondaryschool7_id ?? '') == 4 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP
                                </option>
                                <option value="5"
                                    {{ old('secondaryschool7_id', $students->secondaryschool7_id ?? '') == 5 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP
                                </option>
                                <option value="6"
                                    {{ old('secondaryschool7_id', $students->secondaryschool7_id ?? '') == 6 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP
                                </option>
                                <option value="7"
                                    {{ old('secondaryschool7_id', $students->secondaryschool7_id ?? '') == 7 ? 'selected' : '' }}>ห้องเรียนทั่วไป GP
                                </option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนที่เลือกลำดับ 8</label>
                            <select id="sel_secondaryschool8" name="secondaryschool8_id" class="form-select"
                                aria-label="Default select example">
                                <option value="1"
                                    {{ old('secondaryschool8_id', $students->secondaryschool8_id ?? '') == 1 ? 'selected' : '' }}>ห้องเรียนพิเศษ(วิทยาศาสตร์-คณิตศาสตร์) ISMP
                                </option>
                                <option value="2"
                                    {{ old('secondaryschool8_id', $students->secondaryschool8_id ?? '') == 2 ? 'selected' : '' }}>ห้องวิทยาศาสตร์พลังสิบ TPSP
                                </option>
                                <option value="3"
                                    {{ old('secondaryschool8_id', $students->secondaryschool8_id ?? '') == 3 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านเทคโนโลยีดิจิทัล DTEP
                                </option>
                                <option value="4"
                                    {{ old('secondaryschool8_id', $students->secondaryschool8_id ?? '') == 4 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาอังกฤษ EEP
                                </option>
                                <option value="5"
                                    {{ old('secondaryschool8_id', $students->secondaryschool8_id ?? '') == 5 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาจีน CEP
                                </option>
                                <option value="6"
                                    {{ old('secondaryschool8_id', $students->secondaryschool8_id ?? '') == 6 ? 'selected' : '' }}>ห้องเน้นความเป็นเลิศทางด้านภาษาญี่ปุ่น JEP
                                </option>
                                <option value="7"
                                    {{ old('secondaryschool8_id', $students->secondaryschool8_id ?? '') == 7 ? 'selected' : '' }}>ห้องเรียนทั่วไป GP
                                </option>
                            </select>
                        </div>
                    </div> --}}

                </div>
                <div class="container ">
                    {{-- <div class="row justify-content-center">       --}}
                    <div class="col text-center">
                        <button type="submit"
                            class="btn btn-primary btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กดบันทึก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    </div><br>
                    <a href="{{ route('dashboard') }}"><button type="submit"
                        class="btn btn-info btn-lg"><i class="bi bi-house"></i>&nbsp;&nbsp;&nbsp;กลับหน้าdashboard&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                    {{-- </div>     --}}
                </div>
            </div>
        </form>
        {{-- <div class="text-center mt-3">
           
            <a href="{{ route('students.pdf', $students->id) }}"> <button type="submit"
                    class="btn btn-success btn-lg"><i class="bi bi-cloud-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;โหลดใบสมัคร&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
            
            <a href="{{ route('welcome') }}"><button type="submit"
                    class="btn btn-info btn-lg"><i class="bi bi-house"></i>&nbsp;&nbsp;&nbsp;&nbsp;กลับหน้าแรก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
        </div><br> --}}
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Libraries -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
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
                let thaiYear = date.year() + 543; // แปลง ค.ศ. เป็น พ.ศ.
                let formattedDate = date.format('DD/MM') + '/' + thaiYear;
                let dayOfWeek = date.format('dddd'); // แสดงวันในสัปดาห์

                console.log("วันที่ที่เลือก:", formattedDate, "เป็นวัน", dayOfWeek);
                $(this).val(formattedDate);
            });

            // เซ็ตค่าเริ่มต้น (ถ้ายังไม่มีค่า)
            let currentValue = $('#datepicker input').val();
            if (!currentValue) {
                let today = moment.tz("Asia/Bangkok");
                let thaiYear = today.year() + 543;
                let formattedToday = today.format('DD/MM') + '/' + thaiYear;
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
