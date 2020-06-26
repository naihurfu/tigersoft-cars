<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark ml-3"><i class="fa fa-shower ml-2 mr-2" aria-hidden="true"></i>
                  สรุปข้อมูลการล้างรถ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome') ?>">แดชบอร์ด</a></li>
                  <li class="breadcrumb-item active">สรุปข้อมูลการล้างรถ</li>
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
            <div class="col-12 col-sm-6 col-md-4">
               <div class="info-box mb-3" style="width: auto; height: 120px;">
                  <span class="info-box-icon bg-success elevation-1" style="width: 120px;"><i
                        class="fas fa-check fa-lg"></i></span>

                  <div class="info-box-content">
                     <span class="info-box-text">ล้างแล้ว <?php echo $nw; ?> <sup>คัน</sup></span>
                     <span class="info-box-number">
                        <?php foreach ($washed as $c) { ?>
                        <span class="badge bg-success"> <?php echo $c->c_vrno; ?> </span>
                        <?php } ?>
                     </span>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-4">
               <div class="info-box mb-3" style="width: auto; height: 120px;">
                  <span class="info-box-icon bg-danger elevation-1" style="width: 120px;"><i
                        class="fas fa-times fa-lg"></i></span>

                  <div class="info-box-content">
                     <span class="info-box-text">รถที่ยังไม่ล้าง
                        <?php if ($nu == '') : ?>
                        <p class="text-danger">ไม่มี</p>
                        <?php else : ?>
                        <?php echo $nu; ?> <sup> คัน</sup>
                        <?php endif; ?>
                     </span>
                     <span class="info-box-number">
                        <?php foreach ($unwash as $c) { ?>
                        <span class="badge mr-2 mb-1" style="cursor: pointer; background-color: #ff94a9;"
                           onmouseover="this.style.backgroundColor='#dc3545';"
                           onmouseout="this.style.backgroundColor='#ff94a9';" id="update_status_wash"
                           data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>"
                           data-vr="<?php echo $c->c_vrno; ?>"> <?php echo $c->c_vrno; ?>
                        </span>
                        <?php } ?>
                     </span>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-4">
               <div class="info-box mb-3" style="width: auto; height: 120px;">
                  <span class="info-box-icon bg-info elevation-1" style="width: 120px;"><i
                        class="fas fa-car-side fa-lg"></i></span>

                  <div class="info-box-content">
                     <span class="info-box-text">รถในแผนกทั้งหมด <?php echo $cars; ?> <sup>คัน</sup></span>
                     <span class="info-box-number">
                        <?php foreach ($cars_data as $c) { ?>
                        <span class="badge bg-info" style="cursor: pointer;" id="b_wash"
                           data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>"
                           data-vr="<?php echo $c->c_vrno; ?>"><?php echo $c->c_vrno; ?></span>
                        <?php } ?>
                     </span>
                     <p class="text-danger mt-2" style="font-size: 12px;">* คลิกที่เลขทะเบียนเพื่อเพิ่มข้อมูลการล้างรถ
                     </p>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
            <script type="text/javascript">
            $(document).on("click", "#update_status_wash", function() {
               var id = $(this).attr('data-id');
               var br = $(this).attr('data-br');
               var vr = $(this).attr('data-vr');

               $("#status_cID").val(id);
               $("#status_br_vr").val(br + ' ' + vr);
               $('#modal_status_wash').modal('show')
            });
            </script>

            <script type="text/javascript">
            $(document).on("click", "#editWash", function() {
               var id = $(this).attr('data-id');
               var br = $(this).attr('data-br');
               var vr = $(this).attr('data-vr');
               var date = $(this).attr('data-date');
               var remark = $(this).attr('data-remark');

               $("#uwash_date").val(date);
               $("#uwash_remark").val(remark);
               $("#wid").val(id);
               $("#uwash_br_vr").val(br + ' ' + vr);
               $('#mWashUpdate').modal('show')
            });
            </script>
            <!-- /.col -->
            <div class="col-md-12">
               <div class="card shadow mt-2 text-center">
                  <div class="card-header">
                     <h2 class="card-title"><i class="fa fa-chart-line"></i> ประวัติการล้างรถ</h2>
                     <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                           <input type="text" id="search_text" name="search_text" class="form-control float-right"
                              placeholder="ค้นหา....">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div id="result" class="card-body table-responsive p-0" style="max-height: 100vh;"></div>
                  <script>
                  $(document).ready(function() {

                     load_data();

                     function load_data(query) {
                        $.ajax({
                           url: "<?php echo base_url(); ?>History/search_wash",
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

<div class="modal fade" id="modal_status_wash" data-backdrop="static" tabindex="-1" role="dialog"
   aria-labelledby="staticBackdropLabel3" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel4">ล้างรถ</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?php echo base_url('CarsWash/wash_status_update'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control text-center" id="status_br_vr" disabled>
               </div>
               <div class="form-row">
                  <div class="col col-9">
                     <select name="monthly_wash" class="form-control">
                        <option value="01">มกราคม</option>
                        <option value="02">กุมภาพันธ์</option>
                        <option value="03">มีนาคม</option>
                        <option value="04">เมษายน</option>
                        <option value="05">พฤษภาคม</option>
                        <option value="06">มิถุนายน</option>
                        <option value="07">กรกฎาคม</option>
                        <option value="08">สิงหาคม</option>
                        <option value="09">กันยายน</option>
                        <option value="10">ตุลาคม</option>
                        <option value="11">พฤศจิกายน</option>
                        <option value="12">ธันวาคม</option>
                     </select>
                  </div>
                  <div class="col col-3">
                     <input type="text" name="year_wash" class="form-control text-center"
                        value="<?php echo date('Y'); ?>" readonly>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="cid_status_wash" id="status_cID">
               <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="modal fade" id="m_wash" data-backdrop="static" tabindex="-1" role="dialog"
   aria-labelledby="staticBackdropLabel3" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel4">ล้างรถ</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?php echo site_url('washUpdate'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control text-center" id="wash_br_vr" disabled>
               </div>
               <div class="form-group">
                  <label for="">วันที่จะนำรถไปล้าง</label>
                  <input type="date" name="wash_date" class="form-control" required>
               </div>
               <div class="form-group mt-2">
                  <textarea class="form-control" name="wash_remark" rows="3" maxlength="200"
                     placeholder="หมายเหตุ"></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="wash_cID" id="wash_cID">
               <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="modal fade" id="mWashUpdate" data-backdrop="static" tabindex="-1" role="dialog"
   aria-labelledby="staticBackdropLabel3" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel4">แก้ไขข้อมูลการล้างรถ</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?php echo base_url('CarsWash/wash_edit'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control text-center" id="uwash_br_vr" disabled>
               </div>
               <div class="form-group">
                  <label for="">วันที่จะนำรถไปล้าง</label>
                  <input type="date" id="uwash_date" name="uwash_date" class="form-control" required>
               </div>
               <div class="form-group mt-2">
                  <textarea class="form-control" id="uwash_remark" name="uwash_remark" rows="3" maxlength="200"
                     placeholder="หมายเหตุ"></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="id" id="wid">
               <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
         </form>
      </div>
   </div>
</div>