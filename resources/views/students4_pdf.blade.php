@php
    use Carbon\Carbon;
    Carbon::setLocale('th');
@endphp
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title> โรงเรียนพานพิทยาคม </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@100;400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        /* Insert the A4 style code here */
        @page {
            size: A4;
            margin: 15mm 10mm 20mm 20mm
                /* [บน (top): 10mm
                ขวา (right): 10mm
                ล่าง (bottom): 20mm
                ซ้าย (left): 20mm] */
        }

        .container {
            width: 100%;
            max-width: 200mm;
            height: auto;
            */
            /* height: 297mm; */
            margin: 0 auto;
            color: black;
            font-family: 'THSarabun';
            src: url('{{ public_path('fonts/THSarabun.ttf') }}') format('truetype');
            /* font-weight: normal; */
            font: ปกติไม่หนา
        }

        .underline {
            text-decoration: underline !important;
            margin-right: 0.5px !important;
            margin-left: 0.5px !important;
            text-underline-offset: 0.5px !important;
            /* ระยะห่างทางด้านขวาของข้อความ*/
            /* margin-left: 2px; ระยะห่างทางด้านซ้ายของข้อความ  */
            /* text-underline-offset: 6px; */
            /* word-spacing: 2px; ระยะห่างระหว่างคำ */

        }

        @media print {

            body,
            html {
                width: 200mm;
                /* height: 297mm; */
                height: 297mm;
                color: black;
            }
        }

        @font-face {
            font-family: 'THSarabun';
            src: url('{{ public_path('fonts/THSarabun.ttf') }}') format('truetype');
            color: black;
        }

        body {
            font-family: 'THSarabun';
            /* src: url('{{ public_path('fonts/THSarabun.ttf') }}') format('truetype'); */
            font-size: 18px;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container px-1">
        <div class="position-relative" style="width: 100%; height: 70px;">
            <!-- โลโก้ตรงกลาง -->
            <div class="position-absolute" style="left: 50%; transform: translateX(-50%);">
                <img class="img-fluid" style="max-width: 60px;" src="img/logoPPK.png" alt="logo">
            </div>
            <!-- ภาพขวาสุด -->
            <div class="position-absolute" style="right: 0;">
                <img class="img-fluid" style="max-width: 100px;" src="img/klipartz.png" alt="klipartz">
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center"
            style="width: 100%; text-align: center; font-size: 20px;">ใบรับสมัครนักเรียนใหม่
        </div>
        <div class="row d-flex justify-content-center align-items-center col-100%"
            style="width: 100%; text-align: center;">เขียนที่โรงเรียนพานพิทยาคม อําเภอพาน จังหวัดเชียงราย
            วันที่ {{ Carbon::now()->translatedFormat('j') }}
            เดือน {{ Carbon::now()->translatedFormat('F') }}
            พ.ศ. {{ Carbon::now()->addYears(543)->format('Y') }}
        </div>   
        <div class="container row col-100%">  
        <div class="row col-100% text-center" style="font-size: 18px;"background-color: #D8BFD8; color: black;  padding: 0px 0; border-radius: 0px;  width: 100%; display: block; margin-left: 0px;  margin-right: 0px;"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลนักเรียน</div>
            ชื่อนักเรียน<span class="underline">
                {{ $students->typetitle->typetitle??'ไม่ระบุ' }}{{ $students->name }}&nbsp;&nbsp;
                {{ $students->surname }}</span>
            ชั้น:&nbsp;{{$students->classlevel->classlevel ??'ไม่ระบุ'}}&nbsp;ห้อง:.........รหัสนักเรียน:.......................เลขประจำตัวประชาชนนักเรียน:<span
                class="underline"> {{ $students->nationalid }}</span>
            <br> เชื้อชาติ:<span class="underline">{{$students->ethnicity->ethnicitie ?? 'ไม่ระบุ'}}</span>
            สัญชาติ:<span class="underline">{{$students->nationality->nationalitie ?? 'ไม่ระบุ'}}</span>ศาสนา:<span
                class="underline">
                {{ $students->religion->religion ?? 'ไม่ระบุ' }}</span>วันเดือนปีเกิด:<span class="underline">
                {{ $students->dateofbirth? Carbon::parse($students->dateofbirth)->addYears(543)->translatedFormat('d/m/Y'): 'ไม่ระบุ' }}</span>
            จังหวัด:<span class="underline">{{ $students->provincebirth->province ?? 'ไม่ระบุ' }}</span>
            หมู่เลือด:<span class="underline">{{ $students->bloodtype->bloodtype ?? 'ไม่ระบุ' }}</span>
            น้ำหนัก:<span class="underline">{{ $students->weight }}</span>
            ส่วนสูง:<span class="underline">{{ $students->height }}</span>
            ความพิการ:&nbsp;@if ($students->disability == 1)
                <span class="underline">พิการ</span>
            @elseif ($students->disability == 2)
                <span class="underline">ไม่พิการ</span>
            @else
                <span class="underline">ไม่ระบุ</span>
            @endif โรงเรียนเดิม:<span class="underline">{{ $students->previousschool }}</span>
            จังหวัด:<span
                class="underline">{{ $students->provinceschool->province ?? 'ไม่ระบุ' }}</span>นักเรียนมีพี่ชาย:<span
                class="underline">
                {{ $students->brothers ?? '0' }} คน </span> พี่สาว:<span
                class="underline">{{ $students->oldersister ?? '0' }} คน</span>
            น้องชาย:<span class="underline">{{ $students->youngerbrother ?? '0' }} คน </span> น้องสาว:<span
                class="underline">{{ $students->sister }}คน</span>
            นักเรียนเป็นบุตรคนที่ <span
                class="underline">{{ $students->beingonlychild }}</span>มีพี่น้องร่วมบิดามารดาที่เรียนอยู่
            <span class="underline">{{ $students->sumsiblings }}คน</span><br>
        </div>
        {{-- </div> --}}
            <div class="container row col-100%">  
            <div class="row col-100% text-center" style="font-size: 18px; background-color: #D8BFD8; color: black;  padding: 0px 0; border-radius: 0px;  width: 100%; display: block; margin-left: 0px;  margin-right: 0px;"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ปัจจุบันของนักเรียน</div>
            รหัสประจำบ้าน<span class="underline">{{ $students->houseid }}</span>
            ที่<span class="underline">{{ $students->housenumber }}</span>หมู่<span
                class="underline">{{ $students->villagenumber }}</span>
            หมู่บ้าน<span class="underline">{{ $students->villagename }}</span>ตำบล<span
                class="underline">{{ $students->district }}</span>
            อำเภอ<span class="underline">{{ $students->subdistrict }} </span>
            จังหวัด<span class="underline">{{ $students->provincesaddress->province ?? 'ไม่ระบุ' }}
            </span>รหัสไปรษณีย์<span class="underline">
                {{ $students->postalcode }}</span>
            ลักษณะที่พัก<span class="underline">{{ $students->typeresidence->typeresidence ?? 'ไม่ระบุ' }}</span>
            ที่พักห่างโรงเรียนเป็นถนนลาดยาง<span class="underline">{{ $students->distancelatyangroad }} เมตร </span>
            <br>ใช้เวลามาโรงเรียน<span class="underline">{{ $students->traveltime }} นาที</span>
            เดินทางมาโรงเรียน<span
                class="underline">{{ $students->travelschool1->nametravelschool ?? 'ไม่ระบุ' }}</span><br>
            </div>
            <div class="container row col-100%"> 
            <div class="row col-100% text-center" style="font-size: 18px; background-color: #D8BFD8; color: black;  padding: 0px 0; border-radius: 0px;  width: 100%; display: block; margin-left: 0px;  margin-right: 0px;"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลบิดาและมารดา</div>
            บิดาผู้ให้กำเนิด<span
                class="underline">{{ $students->typetitlefather->typetitle ?? 'ไม่ระบุ' }}{{ $students->name_father }}
                &nbsp;&nbsp;{{ $students->surname_father }} </span>
            เลขประชาชน<span class="underline">{{ $students->field_citizenfather }}</span>
            อาชีพ<span class="underline"> {{ $students->occupationfather->occupation ?? 'ไม่ระบุ' }}</span>
            รายได้<span class="underline">{{ $students->income_father ?? 'ไม่ระบุ' }}บาท/เดือน </span>
            มือถือ<span class="underline">{{ $students->phone_father ?? 'ไม่ระบุ' }} </span><br>
            มารดาผู้ให้กำเนิด<span
                class="underline">{{ $students->typetitlemother->typetitle ?? 'ไม่ระบุ' }}{{ $students->name_mother ?? 'ไม่ระบุ' }}&nbsp;&nbsp;{{ $students->surname_mother ?? 'ไม่ระบุ' }}</span>เลขประชาชน<span
                class="underline">{{ $students->field_citizenmother ?? 'ไม่ระบุ' }}</span>
            อาชีพ<span class="underline">{{ $students->occupationmother->occupation ?? 'ไม่ระบุ' }}</span>
            รายได้<span class="underline">{{ $students->income_mother ?? 'ไม่ระบุ' }}บาท/เดือน</span>
            มือถือ<span class="underline">{{ $students->phone_mother ?? 'ไม่ระบุ' }}</span>
            สถานภาพของบิดา-มารดา<span class="underline">{{ $students->maritalstatus->maritalstatuse ?? 'ไม่ระบุ' }}
            </span>
            @if ($students->parent_id == 1)
                บิดาเป็นปกครองนักเรียนชื่อ<span
                    class="underline">{{ $students->typetitlefather->typetitle ?? 'ไม่ระบุ' }}{{ $students->name_father }}
                    &nbsp;&nbsp;{{ $students->surname_father }}</span>
                <br>เลขประชาชน<span class="underline">{{ $students->field_citizenfather }}</span>
                บิดาอาชีพ<span class="underline">{{ $students->occupationfather->occupation ?? 'ไม่ระบุ' }}</span>
                รายได้บิดา<span class="underline">{{ $students->income_father ?? 'ไม่ระบุ' }}บาท/เดือน </span>
                มือถือ<span class="underline">{{ $students->phone_father ?? 'ไม่ระบุ' }} </span>
            @elseif ($students->parent_id == 2)
                มารดาเป็นปกครองนักเรียนชื่อ
                <span class="underline">{{ $students->typetitlemother->typetitle ?? 'ไม่ระบุ' }}{{ $students->name_mother ?? 'ไม่ระบุ' }}&nbsp;&nbsp;{{ $students->surname_mother ?? 'ไม่ระบุ' }}</span>
                <br>เลขประชาชน<span class="underline">{{ $students->field_citizenmother ?? 'ไม่ระบุ' }}</span>
                อาชีพมารดา<span class="underline">{{ $students->occupationmother->occupation ?? 'ไม่ระบุ' }} </span>
                รายได้มารดา<span class="underline"> {{ $students->income_mother ?? 'ไม่ระบุ' }} บาท/เดือน </span>
                มือถือ<span class="underline">{{ $students->phone_mother ?? 'ไม่ระบุ' }} </span>
            @else
                ผู้ปกครองที่ดูแลนักเรียนในปัจจุบันชื่อ......................................................................................มีความสัมพันธ์กับนักเรียนเป็น....................................
                เลขประจําตัวประชาชนผู้ปกครอง&nbsp;............................................................................................................
                อายุ .........................
                ผู้ปกครองอาชีพ&nbsp;
                .....................................................................................&nbsp;รายได้ผู้ปกครอง........................บาท/เดือน
                มือถือ............................
            @endif
            </div>
            <div class="container row col-100%"> 
            <div class="row col-100% text-center" style="font-size: 18px; "background-color: #D8BFD8; color: black;  padding: 0px 0; border-radius: 0px;  width: 100%; display: block; margin-left: 0px;  margin-right: 0px;"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลแผนการเรียนที่นักเรียนเลือก</div>
            <table>
                <tbody>
                  <tr>
                   <td>ลำดับ1</td>
                    <td><span class="underline">{{ $students->highschool1->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                    <td>ลำดับ2</span></td>
                    <td><span class="underline">{{ $students->highschool2->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                  </tr>
                  <tr>
                    <td>ลำดับ3</td>
                    <td><span class="underline">{{ $students->highschool3->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                    <td>ลำดับ4</td>
                    <td><span class="underline">{{ $students->highschool4->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                  </tr>
                <tr>
                    <td>ลำดับ5</td>
                    <td><span class="underline">{{ $students->highschool5->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                    <td>ลำดับ6</td>
                    <td><span class="underline">{{ $students->highschool6->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                  </tr>
                  <tr>
                   <td>ลำดับ7</td>
                    <td><span class="underline">{{ $students->highschool7->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                    <td >ลำดับ8</td>
                    <td><span class="underline">{{ $students->highschool8->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                  </tr>
                    <tr>
                   <td>ลำดับ9</td>
                    <td><span class="underline">{{ $students->highschool9->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                    <td >ลำดับ10</td>
                    <td><span class="underline">{{ $students->highschool10->curriculumhigh ?? 'ไม่ระบุ' }} </span></td>
                  </tr>
                </tbody>
            </table>
            {{-- ลำดับ1:<span
                class="underline">{{ $students->highschool1->curriculumhigh ?? 'ไม่ระบุ' }} </span>
            ลำดับ2:<span
                class="underline">{{ $students->highschool2->curriculumhigh ?? 'ไม่ระบุ' }} </span><br>
            ลำดับ3:<span
                class="underline">{{ $students->highschool3->curriculumhigh ?? 'ไม่ระบุ' }} </span>
            ลำดับ4:<span
                class="underline">{{ $students->highschool4->curriculumhigh ?? 'ไม่ระบุ' }} </span><br>
            ลำดับ5:<span
                class="underline">{{ $students->highschool5->curriculumhigh ?? 'ไม่ระบุ' }} </span>
            ลำดับ6:<span
                class="underline">{{ $students->highschool6->curriculumhigh ?? 'ไม่ระบุ' }} </span><br>
            ลำดับ7:<span
                class="underline">{{ $students->highschool7->curriculumhigh ?? 'ไม่ระบุ' }} </span>
            ลำดับ8:<span
                class="underline">{{ $students->highschool8->curriculumhigh ?? 'ไม่ระบุ' }} </span><br>
            ลำดับ9:<span
                class="underline">{{ $students->highschool9->curriculumhigh ?? 'ไม่ระบุ' }} </span>
            ลำดับ10:<span
                class="underline">{{ $students->highschool10->curriculumhigh ?? 'ไม่ระบุ' }} </span> --}}
            <br>คํารับรองของผู้ปกครอง
            ข้าพเจ้า...................................................................ขอรับรองและยืนยันว่าข้าพเจ้าเป็นผู้ปกครอง
            <span class="underline">
                {{ $students->typetitle->typetitle ?? 'ไม่ระบุ' }}{{ $students->name }}&nbsp;&nbsp;{{ $students->surname }}
            </span>ชั้น&nbsp;&nbsp;{{ $students->classlevel->classlevel ?? 'ไม่ระบุ' }}&nbsp;ห้อง.......   
            </div>
            <div style="font-size: 16px; border: 1px solid black;  padding: 20px;  margin: 20px;width: 90%;">
                <div>ขอให้คำรับรองต่อผู้อํานวยการโรงเรียนพานพิทยาคมว่า
                <br>1. ข้าพเจ้ามีส่วนรับผิดชอบต่อการกระทำของนักเรียน
                โดยข้าพเจ้าจะเป็นผู้คอยตักเตือนนักเรียนที่ข้าพเจ้ารับเป็น ผู้ปกครอง
                ให้หมั่นศึกษาเล่าเรียนและประพฤติตนให้ถูกต้องตามระเบียบของโรงเรียน
                <br>2. ข้าพเจ้าจะอุปถัมภ์ค่าเล่าเรียน เครื่องแต่งกาย
                และอุปกรณ์การเรียนของนักเรียนในความปกครองให้ได้เรียน ตลอดไปจนสำเร็จการศึกษา
                <br>3. ถ้านักเรียนที่ข้าพเจ้ารับเป็นผู้ปกครองกระทำผิดต่อระเบียบโรงเรียนทุกกรณีข้าพเจ้ายินดีให้ทางโรงเรียนลงโทษนักเรียนตามระเบียบของทางโรงเรียนได้
                <br>4. ข้าพเจ้าขอรับรองว่า หากโรงเรียนต้องการพบข้าพเจ้าเพื่อปรึกษาหารือ หรือรับทราบความประพฤติของ
                นักเรียนในความปกครองของข้าพเจ้า ข้าพเจ้าจะรีบมาทันที
                <br>5. ข้าพเจ้าจะส่งเสริมนักเรียนในความปกครองให้นักเรียนได้ร่วมกิจกรรมของโรงเรียน และพัฒนาตนเองในการสร้างชื่อเสียงให้แก่โรงเรียน
                <br>6. หากนักเรียนในความปกครองของข้าพเจ้าไม่สามารถจบหลักสูตรการศึกษาได้ตามที่โรงเรียนกําหนด ข้าพเจ้า
                ยินดีที่จะให้<br>นักเรียนลาออกจากโรงเรียน เพื่อไปศึกษาต่อในสถานศึกษาอื่นต่อไป
                </div>
                <div class="row d-flex justify-content-center align-items-center col-100%" style="width: 100%; text-align: center;">
                &nbsp;ลงชื่อ.............................................................ผู้ปกครอง
                <br> (………………………………………………….)</div>
            </div>
                <div style="font-size: 18px; border: 1px solid black;  padding: 20px;  margin: 20px;width: 90%;">
                ตรวจหลักฐานการมอบตัว (สำหรับเจ้าหน้าที่รับมอบตัว)
                ปพ.1 ตัวจริงพร้อมสำเนาพร้อมสำเนา 1 ชุด
                <br>1.สำเนาทะเบียนบ้านของนักเรียน บิดาผู้ให้กำเนิด มารดาผู้ให้กำเนิด
                <br>2.สำเนาบัตรประจําตัวประชาชนของนักเรียน บิดาผู้ให้กำเนิด มารดาผู้ให้กำเนิด
                <br>3.สำเนาทะเบียนบ้านของผู้ที่เป็นผู้ปกครองนักเรียน (กรณีนักเรียนไม่ได้อยู่กับบิดาหรือมารดา)
                <br>4.อื่นๆ
                (โปรดระบุ..........................................................................................................................................................................................
                <br>
                
                <div style="text-align: center;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    ลงชื่อ......................................................ผู้รับสมัครนักเรียน<br>
                    (……………………….............................) </div><br>

                    (&nbsp;&nbsp;&nbsp;&nbsp;) โรงเรียนเดิม &nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;) โรงเรียนอื่น 
                </div>
            </div>
        </div>
    </div>
</body>

</html>
