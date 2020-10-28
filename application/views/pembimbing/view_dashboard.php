
	<body class="menubar-hoverable header-fixed ">

		

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
						<div class="row">
							<?php 
								$t=$totaldata->row_array();
								$s=$totalsiswa->row_array();
								$a=$totalabsensi->row_array();
							?>
							<!-- BEGIN ALERT - REVENUE -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-info no-margin">
											<strong class="text-xl"><?php echo $s['total_siswa'];?></strong><br/>
											<span class="opacity-50">Total Siswa Pada bulan <?php echo date('F Y');?></span>
											
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - REVENUE -->
							
							<!-- BEGIN ALERT - VISITS -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-warning no-margin">
											<strong class="text-xl"><?php echo $a['total_absensi'];?></strong><br/>
											<span class="opacity-50">Total Presensi per-Tanggal <?php echo date('d F Y');?></span>
											
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - VISITS -->
							
							<!-- BEGIN ALERT - BOUNCE RATES -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-danger no-margin">
											<strong class="text-xl"><?php echo 'Rp '. $t['total_bayar'];?></strong><br/>
											<span class="opacity-50">Total Uang Masuk Per-bulan <?php echo date('F Y');?></span>
											
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - BOUNCE RATES -->
							
							<!-- BEGIN ALERT - TIME ON SITE -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-success no-margin">
											<strong class="text-xl"><?php echo 'Rp '.$t['total_tagihan'];?></strong><br/>
											<span class="opacity-50">Total Tagihan Pada bulan <?php echo date('F Y');?></span>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - TIME ON SITE -->

						</div><!--end .row -->
						<div class="row">

							<!-- BEGIN TODOS -->
							<div class="col-md-4">
								<div class="card ">
									<div class="card-head">
										<header>Daftar Presensi Siswa</header>
									</div><!--end .card-head -->
							<!-- BEGIN TABLE HOVER -->
								      <div class="table-responsive" style="overflow-y: auto; overflow-x: scroll; height: 500px; background-color: #f2f2f2; padding: 10px;">
								      <table class="table table-bordered table-hover" id="datatable1" >
								      <thead>
								        <tr>
								                  <th>No.</th>
								                  <th>Nama Siswa</th>
								                  <th>Subyek Belajar</th>
								                   <th>Jam Datang</th>
								                 
								                </tr>
								      </thead>
								      <tbody >
								        <?php 
								          $no = 0;
								          foreach ($dtabsensi->result_array() as $x) {
								            $no++;
								            $nama = $x['nama_siswa'];
								            $tgl= $x['tanggal_absensi'];
								            $bulan = $x['bulan_absensi'];
								            $tahun = $x['tahun_absensi'];
								            $subyek = $x['subyek']; 
								            $waktu = $x['waktu'];
								          
								         ?>
								        <tr>
								          <td><?= $no; ?></td>
								          <td><?= $nama; ?></td>
								          <td><?= $subyek; ?></td>
								          <td><?= $waktu ?></td>
								        </tr>
								         <?php } ?>
								      </tbody>
								      </table>
								  </div><!--end .section-body -->

								  

								<!-- END TABLE HOVER -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END TODOS -->
							<!-- BEGIN TODOS -->
							<div class="col-md-8">
								<div class="card ">
									<div class="card-head">
										<header>Daftar Presensi Siswa</header>
										<div class="tools hidden-md">
											<a href="<?= base_url().'admin/c_bayar'?>" class="btn btn-icon-toggle"><i class="fa fa-arrow-right"></i></a>
										</div>
									</div><!--end .card-head -->
							<!-- BEGIN TABLE HOVER -->
								      <div class="table-responsive" style="overflow-y: auto; overflow-x: scroll; height: 500px; background-color: #f2f2f2; padding: 10px;">
								      <table class="table table-bordered table-hover" id="datatable1" >
								      <thead>
								        <tr>
								          <th>No.</th>
						                  <th>Id siswa</th>
						                  <th>Nama Siswa</th>
						                  <th>Bulan Pembayaran</th>
						                  <th>Jenis Bayar</th>
						                  <th>Jumlah Tagihan</th>
						                  <th>Jumlah Bayar</th>
								        </tr>
								      </thead>
								      <tbody >
								       <?php 
										$no=0;
											foreach ($dtbayar->result_array() as $db) {
					                       $no++;
					                       $id_b = $db['id_bayar'];
					                       $id=$db['id_siswa'];
					                       $nama = $db['nama_siswa'];
					                       $subyek = $db['subyek'];
					                       $bulan = $db['bulan_bayar'];
					                       $tahun = $db['tahun_bayar'];
					                       $jnsbyr = $db['jenis_bayar'];
					                       $jmltghn = $db['jumlah_tagihan'];
					                       $jmlbyr = $db['jumlah_bayar'];
					                    ?>
								        <tr>
								          	<td><?= $no; ?></td>
							                <td><?= $nama; ?></td>
							                <td><?= $subyek; ?></td>
							                <?php 
												$monthName = date("F", mktime(0, 0, 0, $bulan, 10));
											?>
							                <td><?= $monthName.' '.$tahun; ?></td>
							                <td><?= $jnsbyr; ?></td>
							                <td><?= $jmltghn; ?></td>
							                <td><?= $jmlbyr; ?></td>
								        </tr>
								         <?php } ?>
								      </tbody>
								      </table>
								  </div><!--end .section-body -->

								  

								<!-- END TABLE HOVER -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END TODOS -->
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			
			

		</div><!--end #base-->
		<!-- END BASE -->

		
		<script>

			var lineChartData = {
				labels : <?php echo json_encode($bulan);?>,
				datasets : [
					
					{
						fillColor : "rgba(151,187,205,0.5)",
						strokeColor : "rgba(151,187,205,1)",
						pointColor : "rgba(151,187,205,1)",
						pointStrokeColor : "#fff",
						data : <?php echo json_encode($value);?>
					}
				]
				
			}

		var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

		var lineChart = {
				labels : <?php echo json_encode($bln);?>,
				datasets : [
					
					{
						fillColor : "rgba(220,220,220,0.5)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						data : <?php echo json_encode($val);?>
					}
				]
				
			}

		var myLineplg = new Chart(document.getElementById("canvasplg").getContext("2d")).Line(lineChart);
		
		</script>
	</body>
</html>
