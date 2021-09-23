<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard</title>

  <link rel="shortcut icon" href="<?php echo base_url('assets/template/assets/img/logo.jpeg')?>">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/jqvmap/dist/jqvmap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/summernote/dist/summernote-bs4.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/weathericons/css/weather-icons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/weathericons/css/weather-icons-wind.min.css')?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/components.css')?>">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <?php 
          $this->load->view('template/navbar');
        ?>
      </nav>
      <div class="main-sidebar">
        <?php
          $this->load->view('template/sidebar');
        ?>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Anggota</h4>
                  </div>
                  <div class="card-body">
                    <?= $cntanggota ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-male"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Anggota Laki-laki</h4>
                  </div>
                  <div class="card-body">
                    <?= $cntlaki ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-female"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Anggota Perempuan</h4>
                  </div>
                  <div class="card-body">
                    <?= $cntwanita ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Caleg</h4>
                  </div>
                  <div class="card-body">
                    <?= $cntcaleg ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Persentase Anggota Per Wilayah</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart3"></canvas>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Persentase Data Caleg</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart4"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Jumlah Data Per Wilayah</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="158"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>DATA PER KECAMATAN JAKARTA PUSAT</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php $i = 1 ?>
                      <?php foreach ($datapusat as $key) { ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="font-weight-600"><?= $key['nama'] ?></td>
                          <td><?= $key['laki'] ?></td>
                          <td><?= $key['wanita'] ?></td>
                          <td><?= $key['total'] ?></td>
                        </tr>
                      <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>DATA PER KECAMATAN JAKARTA SELATAN</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php $i = 1 ?>
                      <?php foreach ($dataselatan as $key) { ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="font-weight-600"><?= $key['nama'] ?></td>
                          <td><?= $key['laki'] ?></td>
                          <td><?= $key['wanita'] ?></td>
                          <td><?= $key['total'] ?></td>
                        </tr>
                      <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>DATA PER KECAMATAN JAKARTA TIMUR</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php $i = 1 ?>
                      <?php foreach ($datatimur as $key) { ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="font-weight-600"><?= $key['nama'] ?></td>
                          <td><?= $key['laki'] ?></td>
                          <td><?= $key['wanita'] ?></td>
                          <td><?= $key['total'] ?></td>
                        </tr>
                      <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>DATA PER KECAMATAN JAKARTA BARAT</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php $i = 1 ?>
                      <?php foreach ($databarat as $key) { ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="font-weight-600"><?= $key['nama'] ?></td>
                          <td><?= $key['laki'] ?></td>
                          <td><?= $key['wanita'] ?></td>
                          <td><?= $key['total'] ?></td>
                        </tr>
                      <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>DATA PER KECAMATAN JAKARTA UTARA</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php $i = 1 ?>
                      <?php foreach ($datautara as $key) { ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="font-weight-600"><?= $key['nama'] ?></td>
                          <td><?= $key['laki'] ?></td>
                          <td><?= $key['wanita'] ?></td>
                          <td><?= $key['total'] ?></td>
                        </tr>
                      <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>DATA PER KECAMATAN KEPULAUAN SERIBU</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php $i = 1 ?>
                      <?php foreach ($dataseribu as $key) { ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="font-weight-600"><?= $key['nama'] ?></td>
                          <td><?= $key['laki'] ?></td>
                          <td><?= $key['wanita'] ?></td>
                          <td><?= $key['total'] ?></td>
                        </tr>
                      <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <?php 
          $this->load->view('template/footer');
        ?>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url('assets/template/assets/js/stisla.js')?>"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/template/node_modules/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/chart.js/dist/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/owl.carousel/dist/owl.carousel.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/summernote/dist/summernote-bs4.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/chocolat/dist/js/jquery.chocolat.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/chart.js/dist/Chart.min.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/template/assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/page/index-0.js')?>"></script>
</body>
</html>

<script type="text/javascript">
  var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        datasets: [{
          data: [
            <?= $cntjktpst ?>,
            <?= $cntjktsltn ?>,
            <?= $cntjkttmr ?>,
            <?= $cntjktbrt ?>,
            <?= $cntjktutr ?>,
            <?= $cntjktkep ?>,
          ],
          backgroundColor: [
            '#191d21',
            '#63ed7a',
            '#ffa426',
            '#fc544b',
            '#6777ef',
            '#00FFFF',
          ],
          label: 'Dataset 1'
        }],
        labels: [
          'Jakarta Pusat',
          'Jakarta Selatan',
          'Jakarta Timur',
          'Jakarta Barat',
          'Jakarta Utara',
          'Kepulauan Seribu'
        ],
      },
      options: {
        responsive: true,
        legend: {
          position: 'bottom',
        },
      }
    });

    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        datasets: [{
          data: [
            <?= $cntclgdpri ?>,
            <?= $cntclgdprd ?>,
          ],
          backgroundColor: [
            '#63ed7a',
            '#6777ef',
          ],
          label: 'Dataset 1'
        }],
        labels: [
          'DPR RI',
          'DPRD',
        ],
      },
      options: {
        responsive: true,
        legend: {
          position: 'bottom',
        },
      }
    });

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Jakarta Pusat", "Jakarta Selatan", "Jakarta Timur", "Jakarta Barat", "Jakarta Utara", "Kepulauan Seribu"],
        datasets: [{
          label: 'Laki-laki',
          data: [
            <?= $cntlakipusat ?>, 
            <?= $cntlakiselatan ?>, 
            <?= $cntlakitimur ?>, 
            <?= $cntlakibarat ?>, 
            <?= $cntlakiutara ?>, 
            <?= $cntlakiseribu ?>
          ],
          borderWidth: 2,
          backgroundColor: 'rgba(63,82,227,.8)',
          borderWidth: 0,
          borderColor: 'transparent',
          pointBorderWidth: 0,
          pointRadius: 3.5,
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
        },
        {
          label: 'Perempuan',
          data: [
            <?= $cntperempuanpusat ?>, 
            <?= $cntperempuanselatan ?>, 
            <?= $cntperempuantimur ?>, 
            <?= $cntperempuanbarat ?>, 
            <?= $cntperempuanutara ?>, 
            <?= $cntperempuanseribu ?>
          ],
          borderWidth: 2,
          backgroundColor: 'rgba(254,86,83,.7)',
          borderWidth: 0,
          borderColor: 'transparent',
          pointBorderWidth: 0 ,
          pointRadius: 3.5,
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              // display: false,
              drawBorder: false,
              color: '#f2f2f2',
            },
            ticks: {
              beginAtZero: true,
              stepSize: 10,
              callback: function(value, index, values) {
                return value;
              }
            }
          }],
          xAxes: [{
            gridLines: {
              display: false,
              tickMarkLength: 2,
            }
          }]
        },
      }
    });
</script>