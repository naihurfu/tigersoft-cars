<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fa fa-shower ml-2 mr-2" aria-hidden="true"></i> ประวัติการล้างรถ</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <?php foreach ($query as $c) { ?>
            <div class="container py-2">
              <!-- timeline item 2 -->
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
                      <div class="float-right text-success"><i class="fa fa-history" aria-hidden="true"></i> <?php echo date("d M Y H:m", strtotime($c->lw_timestamp)) ;?></div>
                      <div class="row">
                        <p class="text-info mr-2" style="font-size: 12px;"><?php echo $c->c_brand ; ?></p>
                        <h4 class="card-title text-success mb-2"><?php echo $c->c_vrno ;?></h4>
                      </div>
                      <div class="p-2 row border-top col-12">
                        <div class="mr-auto"> <label>วันที่นำรถไปล้าง : </label> <?php echo date("d M Y", strtotime($c->lw_date)) ;?></div>
                      </div>
                      <p class="card-text" style="font-size: 14px;" ><?php echo $c->lw_remark ;?></p>
                      <p class="card-text text-right mt-4" style="font-size: 10px;" >บันทึกโดย : TG9999 Administrator</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
</section>