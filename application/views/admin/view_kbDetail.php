
	<body class="menubar-hoverable header-fixed ">
		<!-- <?php
			        foreach($data as $data){
			            $bln[] = $data->tgl_kb;
			            $rlevel[] = (float) $data->r_no_level_kb;
			            $tlevel[] = (float) $data->t_no_level_kb;
			        }
			    ?> -->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
							<h2><span class="fa fa-user"></span> <?php echo $title; ?></h2>
					</div>
						<?php echo $this->session->flashdata('msg');?>
				</section>
				
					
			<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
					<div class="section-body">	
						<div class="row">
							<div class="table-responsive">
							<table class="table table-bordered table-hover" id="datatable1">
							<thead>
								<tr>
				                  <th>No.</th>
				                  <th>Subyek Belajar</th>
				                  <th>periode Bulan</th>
				                  <th>Tahun</th>
				                  <th>Target Belajar</th>
				                  <th>Kemajuan Belajar</th>
				                  <th>Catatan</th>
				                </tr>
							</thead>
							<tbody>
							<?php 
							$no=0;
								foreach ($dtsiswa->result_array() as $ds) {
			                		$no++;
			                		$id_kb=$ds['id_kb'];
			                    	$id=$ds['id_subyek_siswa'];
							        $target=$ds['target_level_kb'];
							        $no_t = $ds['t_no_level_kb'];
							        $level=$ds['real_level_kb'];
							        $no_l = $ds['r_no_level_kb'];
							        $bulan=$ds['tgl_kb'];
							        $tahun= $ds['tahun_kb'];
							        $subyek= $ds['subyek'];
							        $catatan = $ds['catatan_kb'];
			                ?>
								<tr>
									<td><?php echo $no; ?></td>
					                <td><?php echo $subyek; ?></td>
					                <td><?php echo $bulan; ?></td>
					                <td><?php echo $tahun; ?></td>
					                <td><?php echo $target.$no_t; ?></td>
					                <td><?php echo $level.$no_l; ?></td>
					                <td><?php echo $catatan; ?></td>
					                
              					   </tr>

							<?php } ?>
								
							</tbody>
						  </table>
						</div>
						</div>
					</div><!--end .section-body -->

					<?php 
						$t=$dtabsensi->row_array();
						echo 'Total presensi pada bulan '.date('F Y') .' adalah: '.$t['total_absensi'].' kali kehadiran';
					?>
				</section>
				<!-- END TABLE HOVER -->
				

	
			</div><!--end #content-->
			<!-- END CONTENT -->
		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<!--Load chart js-->
			<!-- <script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script>
			<script>
				
			
					            var lineChartData = {
					            	
			
					            	labels : <?php echo json_encode($bln);?>,
					                datasets : [
					                	{
					                    	label: "target level",
								fillColor : "rgba(255,105,180,0)",
								strokeColor : "rgba(255,105,180,1)",
								pointColor : "rgba(151,187,205,1)",
								lineTension:0.1,
								borderDash: [5, 5],
								pointStrokeColor : "#fff",
								data : <?php echo json_encode($tlevel);?>
							},
					                    
					                    {
					                    	label: "real level",
					                        fillColor: "rgba(60,141,188,0)",
					                        strokeColor: "rgba(60,141,188,0.8)",
					                        lineTension:"0.1",
					                        pointColor: "#3b8bba",
					                        pointStrokeColor: "#fff",
					                        data : <?php echo json_encode($rlevel);?>
					                    },
					                    
			
					                ],
			
					            } 
			
			
					        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
			
			
					       
					   	</script> -->
		
		<script src="<?php echo base_url().'assets/js/jquery-3.1.1.js'?>"></script>
		
		<script src="<?php echo base_url().'assets/js/bootstrap/bootstrap.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/spin/spin.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/autosize/jquery.autosize.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/jquery.dataTables.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/extensions/ColVis/js/dataTables.colVis.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/nanoscroller/jquery.nanoscroller.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/App.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavigation.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppOffcanvas.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppCard.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppForm.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavSearch.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppVendor.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/core/DemoTableDynamic.js'?>"></script>
		<!-- END JAVASCRIPT -->
			<script type="text/javascript">
				$(document).ready(function(){
					$('.form-chat').submit(function(){
						alert('Ini adalah klik events tombol kirim pesan');
					});
				});
			</script>

	</body>
</html>
