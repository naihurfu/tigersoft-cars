
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fa fa-info-circle"></i> แจ้งปัญหา/แนะนำ การใช้งานเว็บไซต์</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?php echo base_url('AdminUsers/report'); ?>" type="button" class="btn btn-success">แจ้งปัญหา</a></li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-triangle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ปัญหาทั้งหมด</span>
              <span class="info-box-number">
                <?php echo $all; ?>
                <small>เรื่อง</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ปัญหาที่แก้ไขแล้ว</span>
              <span class="info-box-number">
                <?php echo $fixed; ?>
                <small>เรื่อง</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-history"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ปัญหาที่รอการแก้ไข</span>
              <span class="info-box-number">
                <?php echo $waiting; ?>
                <small>เรื่อง</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!--------------------------------------------------------------------------------------------------------------------->

        <div class="col-md-12">
          <div class="card shadow mt-2 text-center">
            <div class="card-header">
              <h2 class="card-title">ปัญหาและคำแนะนำทั้งหมด</h2>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" id="search_text" name="search_text" class="form-control float-right" placeholder="ค้นหาเรื่อง....">
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div id="result" class="card-body table-responsive p-0 text-center" style="max-height: 100vh;"></div>

            <script>
              $(document).ready(function(){
               load_data();
               function load_data(query)
               {
                $.ajax({
                 url:"<?php echo base_url(); ?>Me/fetch_report",
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
      </div>
      <!-- /.col -->
    </div>
  </div>
</section>
</div>