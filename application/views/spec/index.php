<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark"><i class="fa fa-laptop"></i> ข้อมูลสเปคคอมพิวเตอร์</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"> <a href="<?php echo base_url('Welcome') ?>">แดชบอร์ด</a> </li>
                  <li class="breadcrumb-item active">ข้อมูลสเปคคอมพิวเตอร์</li>
               </ol>
            </div>
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <!-- /.col -->
            <div class="col-12 col-lg-8 col-md-10">
               <div class="card">
                  <div class="card-header p-2">
                     <ul class="nav nav-pills text-center">
                        <li class="nav-item col-12"> เพิ่มข้อมูลสเปคคอมพิวเตอร์ </li>
                     </ul>
                  </div>

                  <div class="card-body">
                     <div class="card-content">

                        <form action="<?php echo base_url('Spec/insert'); ?>" method="post">
                           <div class="form-group">
                              <label>ชื่อคอมพิวเตอร์</label>
                              <input type="text" class="form-control" name="comName" placeholder="ชื่อคอมพิวเตอร์"
                                 required>
                           </div>
                           <div class="row mb-2">
                              <div class="col">
                                 <label>รหัสประจำเครื่อง</label>
                                 <input type="text" class="form-control" name="codePc" placeholder="รหัสประจำเครื่อง"
                                    required>
                              </div>
                              <div class="col">
                                 <label>รหัสพนักงานที่ดูแล</label>
                                 <input type="text" class="form-control" name="empId" placeholder="รหัสพนักงาน"
                                    required>
                              </div>
                           </div>
                           <div class="row mb-2">
                              <div class="col">
                                 <label>ยี่ห้อ</label>
                                 <input type="text" class="form-control" name="brand" placeholder="ยี่ห้อ" required>
                              </div>
                              <div class="col">
                                 <label>ประเภท</label>
                                 <select name="category" class="form-control">
                                    <option value="โน้ตบุค">โน้ตบุค</option>
                                    <option value="คอมพิวเตอร์ตั้งโต๊ะ">คอมพิวเตอร์ตั้งโต๊ะ</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label>S/N License Windows</label>
                              <input type="text" class="form-control" name="serialLicense"
                                 placeholder="S/N License Windows" required>
                           </div>
                           <div class="form-group">
                              <label>Product ID</label>
                              <input type="text" class="form-control" name="productId" placeholder="Product ID"
                                 required>
                              <small class="text-danger">ตัวอย่าง : 00000-00000-00000-AB012</small>
                           </div>

                           <div class="form-group">
                              <label>Windows</label>
                              <input type="text" class="form-control" name="windows" placeholder="Windows 10 Pro"
                                 required>
                           </div>
                           <div class="dropdown-divider mt-4 mb-4"></div>
                           <div class="row mb-2">
                              <div class="col">
                                 <label>CPU</label>
                                 <input type="text" class="form-control" name="cpu"
                                    placeholder="Core i5 3210M CPU @ 2.50 GHz" required>
                              </div>
                              <div class="col">
                                 <label>GPU</label>
                                 <input type="text" class="form-control" name="gpu" placeholder="GT 820M" required>
                              </div>
                           </div>

                           <div class="row mt-3 mb-3">
                              <div class="col">
                                 <label>RAM</label>
                                 <input type="text" class="form-control" name="ram" placeholder="4GB" required>
                              </div>
                              <div class="col">
                                 <label>SSD</label>
                                 <input type="text" class="form-control" name="ssd" placeholder="120GB" required>
                              </div>
                              <div class="col">
                                 <label>HDD</label>
                                 <input type="text" class="form-control" name="hdd" placeholder="1TB" required>
                              </div>
                           </div>
                           <div class="dropdown-divider mt-4 mb-4"></div>
                           <div class="row mb-2">
                              <div class="col">
                                 <label>เม้าส์</label>
                                 <input type="text" class="form-control" name="mouse" placeholder="Logitech" required>
                              </div>
                              <div class="col">
                                 <label>คีบอร์ด</label>
                                 <input type="text" class="form-control" name="keyboard" placeholder="Logitech"
                                    required>
                              </div>
                           </div>
                           <div class="row mb-4">
                              <div class="col">
                                 <label>จอ</label>
                                 <input type="text" class="form-control" name="monitor" placeholder="AOC" required>
                              </div>
                              <div class="col">
                                 <label>กระเป๋า</label>
                                 <select name="bag" class="form-control">
                                    <option value="1">มี</option>
                                    <option value="0">ไม่มี</option>
                                 </select>
                              </div>
                           </div>

                           <div class="row mb-4">
                              <div class="col">
                                 <label>โทรศัพท์</label>
                                 <input type="text" class="form-control" name="call" placeholder="501" required>
                              </div>
                              <div class="col">
                                 <label>ยี่ห้อโทรศัพท์</label>
                                 <input type="text" class="form-control" name="callBrand" placeholder="Yealink"
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
                              <textarea class="form-control" name="remark" id="" cols="30" rows="10"></textarea>
                           </div>

                           <div class="form-group">
                              <button type="submit" class="btn btn-success btn-block">บันทึก</button>
                           </div>
                        </form>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>