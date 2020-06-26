<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark ml-3"><i class="fa fa-laptop ml-2 mr-2" aria-hidden="true"></i>
                  ข้อมูลสเปคคอมพิวเตอร์</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"> <a class="btn btn-success" href="<?php echo base_url('spec/add'); ?>"
                        role="button">เพิ่มข้อมูล</a>
                  </li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <!-- /.col -->
            <!-- <div class="col-12 col-sm-6 col-md-4">
               <div class="info-box mb-3" style="width: auto; height: 120px;">
                  <span class="info-box-icon bg-success elevation-1" style="width: 120px;"><i
                        class="fas fa-check fa-lg"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">123</span>
                     <span class="info-box-number">
                        l444444444444444444444
                     </span>
                  </div>
               </div>
            </div> -->


            <!-- /.col -->
            <div class="col-md-12">
               <div class="card shadow mt-2 text-center">
                  <div class="card-header">
                     <h2 class="card-title"><i class="fa fa-chart-line"></i> ข้อมูลทั้งหมด</h2>
                     <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                           <input type="text" id="search_text" name="search_text" class="form-control float-right"
                              placeholder="ค้นหา....">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div id="result" class="card-body table-responsive p-0" style="max-height: 100vh;"></div>

                  <!-- <div class="d-flex flex-row-reverse mt-2">
                     <div class="p-2">
                        <a href="<?php echo base_url()?>export/createxls" class="btn btn-sm btn-primary mr-2 mb-2"><i
                              class="fa fa-file-excel" aria-hidden="true"></i> Excel</a>
                     </div>
                  </div> -->

                  <script>
                  $(document).ready(function() {

                     load_data();

                     function load_data(query) {
                        $.ajax({
                           url: "<?php echo base_url(); ?>Spec/search_spec",
                           method: "POST",
                           data: {
                              query: query
                           },
                           success: function(data) {
                              $('#result').html(data);
                           }
                        })
                     }

                     $('#search_text').keyup(function() {
                        var search = $(this).val();
                        if (search != '') {
                           load_data(search);
                        } else {
                           load_data();
                        }
                     });
                  });
                  </script>
               </div>
            </div>
            <!-- /.col -->
         </div>
      </div>
   </section>
</div>
<script type="text/javascript">
$(document).on("click", "#edit", function() {

   var empId = $(this).attr('data-empId');
   var codePc = $(this).attr('data-codePc');
   var comName = $(this).attr('data-comName');
   var category = $(this).attr('data-category');
   var brand = $(this).attr('data-brand');
   var windows = $(this).attr('data-windows');
   var sn = $(this).attr('data-sn');
   var pid = $(this).attr('data-pid');
   var cpu = $(this).attr('data-cpu');
   var gpu = $(this).attr('data-gpu');
   var ssd = $(this).attr('data-ssd');
   var hdd = $(this).attr('data-hdd');
   var ram = $(this).attr('data-ram');
   var mouse = $(this).attr('data-mouse');
   var keyboard = $(this).attr('data-keyboard');
   var monitor = $(this).attr('data-monitor');
   var callnumber = $(this).attr('data-call');
   var callBrand = $(this).attr('data-callBrand');
   var remark = $(this).attr('data-remark');

   var id = $(this).attr('data-id');

   $("#empId").val(empId);
   $("#codePc").val(codePc);
   $("#comName").val(comName);
   $("#category").val(category);
   $("#brand").val(brand);
   $("#windows").val(windows);
   $("#serialLicense").val(sn);
   $("#productId").val(pid);
   $("#cpu").val(cpu);
   $("#gpu").val(gpu);
   $("#ssd").val(ssd);
   $("#hdd").val(hdd);
   $("#ram").val(ram);
   $("#mouse").val(mouse);
   $("#keyboard").val(keyboard);
   $("#monitor").val(monitor);
   $("#call").val(callnumber);
   $("#callBrand").val(callBrand);
   $("#remark").val(remark);

   $('#s_id').val(id);
   $('#m_update').modal('show')
});
</script>
<div class="modal fade" id="m_update" data-backdrop="static" tabindex="-1" role="dialog"
   aria-labelledby="staticBackdropLabel3" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel4">อัพเดทข้อมูล</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?php echo base_url('Spec/update'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <label>ชื่อคอมพิวเตอร์</label>
                  <input type="text" class="form-control" name="comName" id="comName" placeholder="ชื่อคอมพิวเตอร์"
                     required>
               </div>
               <div class="row mb-2">
                  <div class="col">
                     <label>รหัสประจำเครื่อง</label>
                     <input type="text" class="form-control" name="codePc" id="codePc" placeholder="รหัสประจำเครื่อง"
                        required>
                  </div>
                  <div class="col">
                     <label>รหัสพนักงานที่ดูแล</label>
                     <input type="text" class="form-control" name="empId" id="empId" placeholder="รหัสพนักงาน" required>
                  </div>
               </div>
               <div class="row mb-2">
                  <div class="col">
                     <label>ยี่ห้อ</label>
                     <input type="text" class="form-control" name="brand" id="brand" placeholder="ยี่ห้อ" required>
                  </div>
                  <div class="col">
                     <label>ประเภท</label>
                     <select name="category" class="form-control" id="category">
                        <option value="โน้ตบุค">โน้ตบุค</option>
                        <option value="คอมพิวเตอร์ตั้งโต๊ะ">คอมพิวเตอร์ตั้งโต๊ะ</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label>S/N License Windows</label>
                  <input type="text" class="form-control" name="serialLicense" id="serialLicense"
                     placeholder="S/N License Windows" required>
               </div>
               <div class="form-group">
                  <label>Product ID</label>
                  <input type="text" class="form-control" name="productId" id="productId" placeholder="Product ID"
                     required>
                  <small class="text-danger">ตัวอย่าง : 00000-00000-00000-AB012</small>
               </div>

               <div class="form-group">
                  <label>Windows</label>
                  <input type="text" class="form-control" name="windows" id="windows" placeholder="Windows 10 Pro"
                     required>
               </div>
               <div class="dropdown-divider mt-4 mb-4"></div>
               <div class="row mb-2">
                  <div class="col">
                     <label>CPU</label>
                     <input type="text" class="form-control" name="cpu" id="cpu"
                        placeholder="Core i5 3210M CPU @ 2.50 GHz" required>
                  </div>
                  <div class="col">
                     <label>GPU</label>
                     <input type="text" class="form-control" name="gpu" id="gpu" placeholder="GT 820M" required>
                  </div>
               </div>

               <div class="row mt-3 mb-3">
                  <div class="col">
                     <label>RAM</label>
                     <input type="text" class="form-control" name="ram" id="ram" placeholder="4GB" required>
                  </div>
                  <div class="col">
                     <label>SSD</label>
                     <input type="text" class="form-control" name="ssd" id="ssd" placeholder="120GB" required>
                  </div>
                  <div class="col">
                     <label>HDD</label>
                     <input type="text" class="form-control" name="hdd" id="hdd" placeholder="1TB" required>
                  </div>
               </div>
               <div class="dropdown-divider mt-4 mb-4"></div>
               <div class="row mb-2">
                  <div class="col">
                     <label>เม้าส์</label>
                     <input type="text" class="form-control" name="mouse" id="mouse" placeholder="Logitech" required>
                  </div>
                  <div class="col">
                     <label>คีบอร์ด</label>
                     <input type="text" class="form-control" name="keyboard" id="keyboard" placeholder="Logitech"
                        required>
                  </div>
               </div>
               <div class="row mb-4">
                  <div class="col">
                     <label>จอ</label>
                     <input type="text" class="form-control" name="monitor" id="monitor" placeholder="AOC" required>
                  </div>
                  <div class="col">
                     <label>กระเป๋า</label>
                     <select name="bag" class="form-control" id="bag">
                        <option value="1">มี</option>
                        <option value="0">ไม่มี</option>
                     </select>
                  </div>
               </div>

               <div class="row mb-4">
                  <div class="col">
                     <label>โทรศัพท์</label>
                     <input type="text" class="form-control" name="call" id="call" placeholder="501" required>
                  </div>
                  <div class="col">
                     <label>ยี่ห้อโทรศัพท์</label>
                     <input type="text" class="form-control" name="callBrand" id="callBrand" placeholder="Yealink"
                        required>
                  </div>
               </div>
               <!-- <div class="form-group">
                              <label>รูปเครื่องที่เห็นสติกเกอร์</label>
                              <input type="file" class="form-control-file" name="picSticker" id="picSticker">
                           </div>
                           <div class="form-group">
                              <label>รูปสเป็ค</label>
                              <input type="file" class="form-control-file" name="picSpec" id="picSpec">
                           </div> -->
               <div class="form-group">
                  <label>หมายเหตุ</label>
                  <textarea class="form-control" name="remark" id="remark" cols="30" rows="10"></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="s_id" id="s_id">
               <button type="submit" class="btn btn-success btn-block">บันทึก</button>
            </div>
         </form>
      </div>
   </div>
</div>