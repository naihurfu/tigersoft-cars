<div class="content-wrapper">

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="col-8">
               </div>
               <div class="card shadow mt-2 text-center">
                  <div class="card-header">
                     <h2 class="card-title"><i class="fa fa-shield-alt"></i> ประวัติการโดนใบสั่ง</h2>
                     <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                           <input type="text" id="search_text" name="search_text" class="form-control float-right"
                              placeholder="ค้นหา....">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div id="result">
                  </div>

                  <script>
                  $(document).ready(function() {
                     load_data();

                     function load_data(query) {
                        $.ajax({
                           url: "<?php echo base_url(); ?>History/search_ticket",
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