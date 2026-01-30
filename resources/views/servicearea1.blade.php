<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html>

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
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@100;400&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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

        /* #datepicker input {
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
            
        } */

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
        <form class="row g-3" action="{{ route('servicearea1.update', $student->id) }}"
                  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="alert alert-success text-center" role="alert">
                <h5><i class="bi bi-person-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp; ตรวจสอบข้อมูลพื้นที่บริการ</h5>
            </div>
            <div class="row g-2 mb-2">
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ระดับชั้นที่สมัครเข้าเรียน:</label>
                        <select id="classlevel" name="classlevels_id"  class="form-select" aria-label="Default select example" disabled>
                            @foreach ($classlevels as $classlevel)
                                @if ($student->classlevels_id == $classlevel->id)
                                    <option selected>
                                        {{ $classlevel->classlevel }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">คำนำหน้าชื่อ:</label>
                        <select id="classlevel" name="classlevels_id"  class="form-select" aria-label="Default select example" disabled>
                            @foreach ($typetitles as $typetitle)
                                @if ($student->typetitles_id == $typetitle->id)
                                    <option selected>
                                        {{ $typetitle->typetitle }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">ชื่อนักเรียน:</label>
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input"
                            id="name" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('name', $student->name ?? '') }}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">นามสกุล:</label>
                        <input type="text" name="surname" class="form-control" aria-label="Sizing example input"
                            id="surname" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('surname', $student->surname ?? '') }}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">โรงเรียนเดิมที่จบมา:</label>
                        {{-- <span class="input-group-text" id="inputGroup-sizing-default">โรงเรียนที่นักเรียนจบมา</span> --}}
                        <input type="text" name="previousschool" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            value="{{ old('previousschool', $student->previousschool ?? '') }}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">จังหวัดโรงเรียนเดิม:</label>
                        <select id="classlevel" name="classlevels_id"  class="form-select" aria-label="Default select example" disabled>
                            @foreach ($provinces as $province)
                                @if ($student->provinceschool_id == $province->id)
                                    <option selected>
                                        {{ $province->province }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-2">
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">แผนการเรียนลำดับที่ 1</label>
                            <select id="classlevel" name="classlevels_id"  class="form-select" aria-label="Default select example" disabled>
                                @foreach ($secondaryschools as $curriculumsec)
                                    @if ($student->secondaryschool1_id == $curriculumsec->id)
                                        <option selected>
                                            {{ $curriculumsec->curriculumsec }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_servicearea" name="servicearea1_id" class="form-select @error('servicearea1_id') is-invalid @enderror"
                            aria-label="Default select example">
                            <option value="">ข้อมูลพื้นที่บริการ</option>
                            <option value="1" {{ old('servicearea1_id', $student->servicearea1_id) == 1 ? 'selected' : '' }}>ในเขต(ม.1)</option>
                            <option value="2" {{ old('servicearea1_id', $student->servicearea1_id) == 2 ? 'selected' : '' }}>นอกเขต(ม.1)</option>
                            {{-- <option value="3" {{ old('serviceareas1_id') == '3' ? 'selected' : '' }}>โรงเรียนเดิม(ม.4)</option>
                            <option value="4" {{ old('serviceareas1_id') == '4' ? 'selected' : '' }}>โรงเรียนอื่นในจังหวัดเชียงราย(ม.4)</option>
                            <option value="5" {{ old('serviceareas1_id') == '5' ? 'selected' : '' }}>โรงเรียนอื่นต่างจังหวัด(ม.4)</option> --}}
                        </select>
                        @error('servicearea1_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <select id="sel_districtschool1" name="districtschool1_id" class="form-select @error('districtschool1_id') is-invalid @enderror"
                            aria-label="Default select example">
                            <option value="">ตำบลของโรงเรียนที่จบ</option>
                            <option value="1" {{ old('servicearea1_id', $student->districtschool1_id) == 1 ? 'selected' : '' }}>1 ต.สันมะเค็ด</option>
                            <option value="2" {{ old('servicearea1_id', $student->districtschool1_id) == 2 ? 'selected' : '' }}>2 ต.แม่อ้อ</option>
                            <option value="3" {{ old('servicearea1_id', $student->districtschool1_id) == 3 ? 'selected' : '' }}>3 ต.ธารทอง</option>
                            <option value="4" {{ old('servicearea1_id', $student->districtschool1_id) == 4 ? 'selected' : '' }}>4 ต.สันติสุข</option>
                            <option value="5" {{ old('servicearea1_id', $student->districtschool1_id) == 5 ? 'selected' : '' }}>5 ต.ดอยงาม</option>
                            <option value="6" {{ old('servicearea1_id', $student->districtschool1_id) == 6 ? 'selected' : '' }}>6 ต.หัวง้ม</option>
                            <option value="7" {{ old('servicearea1_id', $student->districtschool1_id) == 7 ? 'selected' : '' }}>7 ต.เจริญเมือง</option>
                            <option value="8" {{ old('servicearea1_id', $student->districtschool1_id) == 8 ? 'selected' : '' }}>8 ต.ป่าหุ่ง</option>
                            <option value="9" {{ old('servicearea1_id', $student->districtschool1_id) == 9 ? 'selected' : '' }}>9 ต.ม่วงคำ</option>
                            <option value="10" {{ old('servicearea1_id', $student->districtschool1_id) == 10 ? 'selected' : '' }}>10 ต.ทรายขาว</option>
                            <option value="11" {{ old('servicearea1_id', $student->districtschool1_id) == 11 ? 'selected' : '' }}>11 ต.สันกลาง</option>
                            <option value="12" {{ old('servicearea1_id', $student->districtschool1_id) == 12 ? 'selected' : '' }}>12 ต.แม่เย็น</option>
                            <option value="13" {{ old('servicearea1_id', $student->districtschool1_id) == 13 ? 'selected' : '' }}>13 ต.เมืองพาน</option>
                            <option value="14" {{ old('servicearea1_id', $student->districtschool1_id) == 14 ? 'selected' : '' }}>14 ต.ทานตะวัน</option>
                            <option value="15" {{ old('servicearea1_id', $student->districtschool1_id) == 15 ? 'selected' : '' }}>15 ต.และเวียงห้าว</option>
                            <option value="16" {{ old('servicearea1_id', $student->districtschool1_id) == 16 ? 'selected' : '' }}>16 ต.ป่าแงะ อ.ป่าแดด</option>
                            <option value="17" {{ old('servicearea1_id', $student->districtschool1_id) == 17 ? 'selected' : '' }}>17 ต.ป่าแดด อ.ป่าแดด</option>
                            <option value="18" {{ old('servicearea1_id', $student->districtschool1_id) == 18 ? 'selected' : '' }}>18 ต.ป่าแฝก อ.แม่ใจ</option>
                            <option value="19" {{ old('servicearea1_id', $student->districtschool1_id) == 19 ? 'selected' : '' }}>19 อื่นๆ</option>

                        </select>
                        @error('districtschool1_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="container ">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save2"></i> &nbsp;&nbsp;บันทึกข้อมูลการแก้ไข</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="text-center mt-3">
            {{-- <a href="{{ route('students.pdf', $student->id) }}"> <button type="submit"
                    class="btn btn-success btn-lg"><i class="bi bi-cloud-download"></i>&nbsp;&nbsp;&nbsp;โหลดใบสมัคร&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a> --}}
            <a href="{{ route('dashboard) }}"><button type="submit"
                    class="btn btn-info btn-lg"><i class="bi bi-house"></i>&nbsp;&nbsp;&nbsp;กลับหน้าแรก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
        </div><br>  
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
                let thaiYear = date.year(); // แปลง ค.ศ. เป็น พ.ศ.
                // let thaiYear = date.year(); // แปลง ค.ศ. เป็น พ.ศ.
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
