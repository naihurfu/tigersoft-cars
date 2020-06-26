<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">แจ้งปัญหา/แนะนำ การใช้งานเว็บไซต์</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome'); ?>">แดชบอร์ด</a></li>
                  <li class="breadcrumb-item active">แจ้งปัญหา</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <style>
   .ui-autocomplete {
      position: absolute;
      z-index: 1000;
      cursor: default;
      padding: 0;
      margin-top: 2px;
      list-style: none;
      background-color: #ffffff;
      border: 1px solid #ccc;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
   }

   .ui-autocomplete>li {
      padding: 3px 20px;
   }

   .ui-autocomplete>li.ui-state-focus {
      background-color: #DDD;
   }

   .ui-helper-hidden-accessible {
      display: none;
   }
   </style>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid col-lg-8 col-md-10 col-12">
         <form action="<?php echo base_url('AdminUsers/reported'); ?>" method="post">
            <div class="card container col-lg-8 col-md-10 col-12">
               <div class="container">
                  <div class="form-group mt-3">
                     <select name="topic" class="form-control">
                        <option value="problem">แจ้งปัญหาการใช้งาน</option>
                        <option value="commend">แนะนำ / ติชม / ปรับปรุงเว็บไซต์</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="r_priority">
                        <option selected style="display: none;">ลำดับความสำคัญ...</option>
                        <option value="เร่งด่วน">เร่งด่วน</option>
                        <option value="ปกติ">ปกติ</option>
                     </select>
                     <small class="text-danger">*เลือกได้เลย ไม่ต้องเกรงใจ</small>
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" placeholder="หัวข้อ" name="r_topic" required id="topic">
                  </div>
                  <div class="form-group">
                     <textarea class="form-control" name="r_detail" rows="8" placeholder="รายละเอียด"
                        required></textarea>
                     <small class="text-danger">*รายละเอียด หากเป็น ERROR รบกวน Copy ข้อความที่แสดงได้จะดีมาก</small>
                  </div>
                  <input type="hidden" value="<?php echo $this->session->userdata('uid'); ?>" name="u_id">
                  <button class="btn btn-primary btn-block mb-3" type="submit">บันทึก</button>
               </div>
            </div>
         </form>
         <script type="text/javascript">
         $(function() {
            var availableTags = [
               "พบบัคในการใช้งาน",
               "ไม่สามารถบันทึกข้อมูลได้",
               "ระบบแสดงข้อมูลผิดพลาด",
               "หน้าเว็บไม่สามารถใช้งานได้",
               "Error 404"
            ];

            $("#topic").autocomplete({
               source: availableTags
            });
         });
         </script>
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->