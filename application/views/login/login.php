<!DOCTYPE html>
<html lang="en">

<head>
   <title>Tigersoft Cars | ระบบจัดการรถ</title>
   <meta name="mobile-web-app-capable" content="yes">
   <link rel="apple-touch-icon" sizes="128x128" href="<?php echo base_url(); ?>assets/car.png" />
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css"
      href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css"
      href="<?php echo base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animate/animate.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css"
      href="<?php echo base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/util.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/main.css">
   <!--===============================================================================================-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <link
      href="https://fonts.googleapis.com/css?family=Kanit:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
      rel="stylesheet">


</head>

<body>

   <div class="limiter">
      <div class="container-login100">
         <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
               <img src="<?php echo base_url(); ?>assets/login/images/img-01.png" alt="IMG">

               <div class="title-web text-center">
                  <h1 style="margin-top: 30px;">TIGERSOFT CARS</h1>
                  <small> เว็บไซต์จัดการรถ บริษัทไทเกอร์ซอฟท์ (1998) จำกัด</small>
               </div>
            </div>

            <form class="login100-form validate-form" method="post" action="<?php echo site_url('login_submit'); ?>">
               <span class="login100-form-title">
                  เข้าสู่ระบบ
                  <hr />
               </span>
               <div class="wrap-input100 validate-input" data-validate="Valid Employee ID is required: TG0999">
                  <input class="input100" type="text" name="empID" placeholder="รหัสพนักงาน" required
                     style="text-transform:uppercase">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                     <i class="fa fa-user" aria-hidden="true"></i>
                  </span>
               </div>

               <div class="wrap-input100 validate-input" data-validate="Password is required">
                  <input class="input100" type="password" name="pwd" placeholder="รหัสผ่าน" required required>
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
               </div>

               <div class="container-login100-form-btn">
                  <button class="login100-form-btn" type="submit">
                     เข้าสู่ระบบ
                  </button>
               </div>
               <div class="text-center p-t-115">
                  <p style="font-size: 10px">Copyright &copy; <?php echo date("Y") ?> Developed by <a
                        href="https://www.facebook.com/Partynannii" style="font-size: 10px;">PARTY<sup> CS</sup></a> All
                     rights reserved.</p>
               </div>
            </form>
         </div>
      </div>
   </div>




   <!--===============================================================================================-->
   <script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
   <!--===============================================================================================-->
   <script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
   <script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
   <!--===============================================================================================-->
   <script src="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
   <!--===============================================================================================-->
   <script src="<?php echo base_url(); ?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
   <script>
   $('.js-tilt').tilt({
      scale: 1.1
   })
   </script>
   <!--===============================================================================================-->
   <script src="js/main.js"></script>

   <script type="text/javascript">
   <?php if ($this->session->flashdata('login_error')): ?>
      Swal.fire('ผิดพลาด ไม่สามารถเข้าสู่ระบบ!', 'โปรดตรวจสอบรหัสพนักงานหรือรหัสผ่านอีกครั้ง', 'error'); 
   <?php endif; ?>
   </script>

</body>

</html>