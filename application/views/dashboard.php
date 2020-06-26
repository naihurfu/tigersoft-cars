<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fa fa-home"></i> แดชบอร์ด</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">แดชบอร์ด</li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <?php foreach ($data as $c) { ?>
          <?php if ($c->c_vrno != '9กฎ 9056') : ?>
            <div class="col-4">
              <!-- small box -->
              <div class="info-box py-3 shadow-lg">
                <span class="info-box-icon"><i class="fa fa-car-side fa-lg"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text mb-2"> <?php echo $c->c_vrno; ?> <sup> <?php echo $c->c_brand; ?> </sup></span>
                  <hr class="mt-2 mb-2" />
                  <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                  <?php if ($c->tax > 60) : ?>
                    <span class="badge bg-success">
                      <i class="fa fa-calendar mr-2"></i> ภาษี อีก <?php echo $c->tax; ?> วัน
                    </span> <br />
                  <?php elseif ($c->tax < 1) : ?>
                    <span class="badge bg-danger">
                      <i class="fa fa-calendar mr-2"></i> ภาษีหมดอายุ
                    </span> <br />
                  <?php else : ?>
                    <span class="badge bg-warning">
                      <i class="fa fa-calendar mr-2"></i> ภาษี อีก <?php echo $c->tax; ?> วัน
                    </span> <br />
                  <?php endif; ?>

                  <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                  <?php if ($c->insr > 80) : ?>
                    <span class="badge bg-success">
                      <i class="fa fa-shield-alt mr-2"></i>ประกันภัย อีก <?php echo $c->insr; ?> วัน
                    </span>
                  <?php elseif ($c->insr < 1) : ?>
                    <span class="badge bg-danger">
                      <i class="fa fa-shield-alt mr-2"></i>ประกันภัยหมดอายุ <i class="fa fa-times"></i></span>
                  <?php else : ?>
                    <span class="badge bg-warning">
                      <i class="fa fa-shield-alt mr-2"></i>ประกันภัย อีก <?php echo $c->insr; ?> วัน <i class="fas fa-info-circle"></i>
                    </span>
                  <?php endif; ?>

                  <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                </div>
                <!-- /.info-box-content -->
              </div>
            </div>
          <?php endif; ?>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card" style="height: 100%;">
            <div class="card-body shadow">
              <h3 class="text-lg">เลขไมล์</h3>
              <hr />
              <?php foreach ($data as $c) { ?>
                <div class="col-12">
                  <h6><?php echo $c->c_vrno; ?></h6>
                  <?php if ($c->pb > 80) : ?>
                    <div class="progress mb-3" style="border-radius: 12px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $c->pb . '%'; ?>; border-radius: 12px;" aria-valuenow="<?php echo $c->pb; ?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="text-dark"><?php echo number_format($c->cd_kmpresent); ?> / <?php echo number_format($c->cd_kmneedservice); ?> KM </div>
                      </div>
                    </div>
                  <?php else : ?>
                    <div class="progress mb-3" style="border-radius: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $c->pb . '%'; ?>; border-radius: 12px;" aria-valuenow="<?php echo $c->pb; ?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="text-dark"><?php echo number_format($c->cd_kmpresent); ?> / <?php echo number_format($c->cd_kmneedservice); ?> KM</div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <!-- ./card ใบสั่ง -->
      <div class="card mt-2">
        <div class="card-header text-lg">สถิติใบสั่ง</div>
        <div class="card-body shadow">
          <canvas id="myChart" height="30%" width="100%"></canvas>
          <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var cData = JSON.parse('<?php echo $chart_data ?>');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: cData.label,
                datasets: [{
                  data: cData.data,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                responsive: true,
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: true,
                      min: 0,
                      max: 10
                    }
                  }]
                },
                legend: {
                  display: false
                }
              }
            });
          </script>
        </div>
      </div>
    </div>
  </section>
</div>