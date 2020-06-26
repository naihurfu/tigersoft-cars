<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> <i class="fa fa-wrench"></i> เช็คสภาพรถ</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome'); ?>">แดชบอร์ด</a></li>
            <li class="breadcrumb-item active">เช็คสภาพรถ</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="d-flex flex-wrap justify-content-start">

        <?php foreach ($query as $c) { ?>
          <div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
            <div class="card card-widget widget-user" style="width: auto;">
              <div class="widget-user-header" style="height: 100px;">
                <h3 class="widget-user-username"><?php echo $c->c_vrno ;?></h3>
                <h5 class="widget-user-desc"><?php echo $c->c_brand ;?></h5>

              </div>
              <div class="card-footer" style="padding: 0; margin: 0;">
                <div class="row">
                  <div class="col-sm-4 border-right border-top">
                    <div class="description-block">
                      <h5 class="description-header">เครื่องมือ</h5>
                      <span class="description-text">
                        <?php if ($c->chk_tools == True): ?>
                          <span class="badge bg-success"> 
                            <i class="fa fa-check-circle"></i> มี 
                          </span>
                          <?php else: ?>
                            <span class="badge bg-danger"> 
                              <i class="fa fa-times"></i> ไม่มี 
                            </span>
                          <?php endif; ?>
                        </span>
                      </div>
                    </div>
                    <div class="col-sm-4 border-right border-top">
                      <div class="description-block">
                        <h5 class="description-header">ล้ออะไหล่</h5>
                        <span class="description-text">
                          <?php if ($c->chk_sparetire == True): ?>
                            <span class="badge bg-success">
                              <i class="fa fa-check-circle"></i> มี </span>
                            </span>
                            <?php else: ?>
                              <span class="badge bg-danger"> 
                                <i class="fa fa-times"></i> ไม่มี 
                              </span>
                            <?php endif; ?>
                          </div>
                        </div>
                        <div class="col-sm-4 border-top">
                          <div class="description-block">
                            <h5 class="description-header">ลมยาง</h5>
                            <span class="description-text">
                              <span class="badge bg-info"> <i class="fa fa-check-circle"></i> หน้า <?php echo $c->chk_ftire ;?> </span>
                              <span class="badge bg-info"> <i class="fa fa-check-circle"></i> หลัง <?php echo $c->chk_btire ;?> </span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 justify-content-center">
                        <button class="btn btn-outline-success btn-block btn-sm" id="b_check" 
                        data-id="<?php echo $c->c_id; ?>"
                        data-vr="<?php echo $c->c_vrno; ?>"
                        data-br="<?php echo $c->c_brand; ?>"
                        data-tools="<?php echo $c->chk_tools; ?>"
                        data-sparetire="<?php echo $c->chk_sparetire; ?>"
                        data-ftire="<?php echo $c->chk_ftire ;?>"
                        data-btire="<?php echo $c->chk_btire ;?>"> อัพเดตข้อมูล 
                      </button>
                    </div>
                     <!-- <button type="button" id="b_wash" data-id="<?php echo $c->c_id; ?>" data-br="<?php echo $c->c_brand; ?>" data-vr="<?php echo $c->c_vrno; ?>" class="btn btn-outline-info btn-sm btn-block"><i class="fa fa-fw fa-shower"></i> ล้างรถ</button> -->
                  </div>

                  <div class="row">
                    <div class="col text-right mr-2">
                      <small class="text-muted" style="font-size: 12px;">ล้างรถล่าสุด : <?php echo date("d M Y", strtotime($c->cw_date)) ; ?></small>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>


          </div>
          <!--<div class="row">
            <div class="col-md-12">
              <div class="card shadow mt-2 text-center">
                <div class="card-header">
                  <h2 class="card-title"><i class="fa fa-shower"></i> ประวัติการล้างรถ</h2>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" id="search_text" name="search_text" class="form-control float-right" placeholder="ค้นหา....">
                    </div>
                  </div>
                </div>
                <div id="result" class="card-body table-responsive p-0" style="max-height: 100vh;"></div>
                <script>
                  $(document).ready(function(){

                   load_data();

                   function load_data(query)
                   {
                    $.ajax({
                      url:"<?php echo base_url(); ?>History/search_wash",
                      method:"POST",
                      data:{query:query},
                      success:function(data){
                        $('#result').html(data);
                      }
                    })
                  }

                  $('#search_text').keyup(function(){
                    var search = $(this).val();
                    if(search != '')
                    {
                     load_data(search);
                   }
                   else
                   {
                     load_data();
                   }
                 });
                });
              </script>
            </div>
          </div>-->
        </div>
      </section>
    </div>


    <!-- OTHER -->
    <script>
      $(document).on("click", "#b_check", function () {
        var id = $(this).attr('data-id');
        var br = $(this).attr('data-br');
        var vr = $(this).attr('data-vr');
        var tools = $(this).attr('data-tools');
        var sparetire = $(this).attr('data-sparetire');
        var ftire = $(this).attr('data-ftire');
        var btire = $(this).attr('data-btire');

        $("#ck_cID").val(id);
        $("#br_vr").val(br + vr);
        $('#tools').val(tools);
        $('#spare_tire').val(sparetire);
        $('#f_tire').val(ftire);
        $('#b_tire').val(btire);

        $('#m_check').modal('show')
      });
    </script>
    <div class="modal fade" id="m_check" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel2">เช็คสภาพรถ</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo base_url('Check/checked') ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>รุ่น/เลขทะเบียน</label>
                <input type="text" class="form-control text-center" id="br_vr" readonly>
              </div>

              <div class="form-group">
                <label for="tools">เครื่องมือ</label>
                <select class="form-control" name="tools" id="tools">
                  <option value="1">มี</option>
                  <option value="0">ไม่มี</option>
                </select>
              </div>
              <div class="form-group">
                <label for="spare_tire">ล้ออะไหล่</label>
                <select class="form-control" id="spare_tire" name="spare_tire">
                  <option value="1">มี</option>
                  <option value="0">ไม่มี</option>
                </select>
              </div>

              <label for="tire">ลมยาง</label>
              <div class="row">
                <div class="col">
                  <input id="f_tire" name="f_tire" type="number" class="form-control" placeholder="หน้า" minlength="1" maxlength="2">
                </div>
                <div class="col">
                  <input id="b_tire" name="b_tire" type="number" class="form-control" placeholder="หลัง" minlength="1" maxlength="2">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <input type="hidden" name="cID" id="ck_cID">
              <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>