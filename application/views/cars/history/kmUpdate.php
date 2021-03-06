<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mt-2 text-center">
            <div class="card-header">
              <h2 class="card-title"><i class="fa fa-chart-line"></i> ประวัติอัพเดตเลขไมล์</h2>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" id="search_text" name="search_text" class="form-control float-right" placeholder="ค้นหา....">
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div id="result" class="card-body table-responsive p-0" style="max-height: 100vh;"></div>
            <script>
              $(document).ready(function(){

               load_data();

               function load_data(query)
               {
                $.ajax({
                 url:"<?php echo base_url(); ?>History/search_km",
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