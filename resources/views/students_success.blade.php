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

        <div class="alert alert-success text-center" role="alert">
            <h5>**ขอบคุณสำหรับการสมัครเรียน! ระบบได้บันทึกข้อมูลของท่านเรียบร้อยแล้ว** </h5>
        </div>

        <h1>สมัครเรียนสำเร็จ</h1>
        
        {{-- <a href="{{ route('takeclass1') }}" class="btn btn-primary">กลับไปหน้าหลัก</a> --}}

        <div class="container ">
            {{-- <div class="row justify-content-center">       --}}
            <div class="col text-center">
                <button type="submit"
                    class="btn btn-primary btn-lg"><a href="{{ route('welcome') }}" class="btn btn-primary">กลับไปหน้าหลัก</a></button>
            </div><br>
            {{-- </div>     --}}
        </div>

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



</body>


</html>
