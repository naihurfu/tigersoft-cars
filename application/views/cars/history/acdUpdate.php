<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark"><i class="fa fa-car-crash ml-2 mr-2" aria-hidden="true"></i>
                  ประวัติอุบัติเหตุและอื่นๆ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus fa-fw mr-2" aria-hidden="true"></i>เพิ่มรถ</button> -->
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="d-flex flex-wrap justify-content-center">
            <?php foreach ($query as $c) { ?>
            <div class="card ml-4 mr-4 mb-4" style="width: 100%;">
               <div class="card-body text-center">
                  <div class="card-title">
                     <h5><?php echo $c->c_vrno; ?><p class="text-muted" style="font-size: 10px;">
                           <?php echo $c->c_brand; ?></p>
                     </h5>
                  </div>
                  <hr style="margin-top: 40px;">
                  <p class="card-text" style="font-size: 19px;">
                     <b><?php echo $c->la_dmg; ?></b>
                  </p>
                  <p class="card-text">
                     <?php echo $c->la_detail; ?>
                  </p>
                  <?php if ($c->la_remark) : ?>
                  <hr>
                  <p class="card-text">
                     <?php echo $c->la_remark; ?></p>
                  <?php endif; ?>
               </div>
               <p class="text-muted text-right mr-3 mb-1"> <i class="fa fa-calendar-check fa-fw"> </i>
                  <?php echo date("d M Y", strtotime($c->la_date)); ?></p>
            </div>
            <?php } ?>
         </div>
         <!-- <?php foreach ($query as $c) { ?>
            <div class="container py-2">
              <div class="row">
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                  <div class="row h-50">
                    <div class="col border-right">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                  </div>
                  <h5 class="m-2">
                    <span class="badge badge-pill bg-success">&nbsp;</span>
                  </h5>
                  <div class="row h-50">
                    <div class="col border-right">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                  </div>
                </div>
                <div class="col py-2">
                  <div class="card border-success shadow">
                    <div class="card-body">
                      <div class="float-right text-success"><i class="fa fa-history" aria-hidden="true"></i> <?php echo date("d M Y H:m", strtotime($c->la_timestamp)); ?></div>
                      <div class="row">
                        <p class="text-info mr-2" style="font-size: 12px;"><?php echo $c->c_brand; ?></p>
                        <h4 class="card-title text-success mb-2"><?php echo $c->c_vrno; ?></h4>
                      </div>
                      <div class="p-2 row border-top col-12">
                        <div class="mr-auto"> <label>เหตุที่เกิดขึ้น : </label> <?php echo $c->la_dmg; ?></div>
                        <div class="mr-auto"> <label>วันที่เกิดอุบัติเหตุ : </label> <?php echo date("d M Y", strtotime($c->la_date)); ?></div>
                      </div>
                      <div class="p-2 row col-12 mb-4">
                        <p class="card-text" style="font-size: 14px;" > <label>รายละเอียด</label> <?php echo $c->la_detail; ?></p>
                      </div>
                      <div class="p-2 row col-12 border-top">
                        <p class="card-text" style="font-size: 14px;" > <label>หมายเหตุ</label> <?php echo $c->la_remark; ?></p>
                      </div>
                      <p class="card-text text-right mt-4" style="font-size: 10px;" >บันทึกโดย : <?php echo $c->u_empid; ?> <?php echo $c->u_fname; ?> <?php echo $c->u_lname; ?> </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>-->










      </div>
</div>
</section>