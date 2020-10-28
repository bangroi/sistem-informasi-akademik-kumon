
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
					<div class="section-header">
							<h2><span class="fa fa-user"></span> <?php echo $title; ?></h2>
					</div>
						<?php echo $this->session->flashdata('msg');?>
				</section>

				<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
					<div class="section-body">	
						<form action="<?php echo base_url().'admin/c_kemajuanBelajar/filterKB'?>" method="POST">
						
								<div class="row" style="padding: 10px;">
									<div class="col-sm-1"><i class="fa fa-filter"></i> <b>FILTER</b></div>
									<div class="col-sm-2"><input type="text" name="subyek" placeholder="Subyek"></div>
									<div class="col-sm-2"><input type="text" name="level" placeholder="Level" ></div>
									<div class="col-sm-2"><input type="text" name="bulan" placeholder="Bulan"></div>
									<div class="col-sm-2"><input type="text" name="tahun" placeholder="Tahun"></div>
									<div class="col-sm-2"><input type="submit" name="filter" value="Filter" class="btm btn-primary"></div>
								</div>
								</form>
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="datatable1">		
							<thead>
								<tr>
				                  <th>No.</th>
				                  <th>ID Siswa</th>
				                  <th>Nama Siswa</th>
				                  <th>Subyek Belajar</th>
				                  <th>periode Bulan</th>
				                  <th>Tahun</th>
				                  <th>Target Belajar</th>
				                  <th>Kemajuan Belajar</th>
				                  <th>Details</th>
				                </tr>
							</thead>
							<tbody>
							<?php 
							$no=0;
								foreach ($datasiswa->result_array() as $ds) {
			                		$no++;
			                		$id_kb=$ds['id_kb'];
			                    	$id=$ds['id_siswa'];
							    	$nama=$ds['nama_siswa'];
							        $target=$ds['target_level_kb'];
							        $no_t = $ds['t_no_level_kb'];
							        $level=$ds['real_level_kb'];
							        $no_l = $ds['r_no_level_kb'];
							        $bulan=$ds['tgl_kb'];
							        $tahun= $ds['tahun_kb'];
							        $subyek= $ds['subyek'];
							        $idsubyek = $subyek.$id;
			        
			                ?>
								<tr>
									<td><?php echo $no; ?></td>
					                <td><?php echo $id; ?></td>
					                <td><?php echo $nama; ?></td>
					                <td><?php echo $subyek; ?></td>
					                <?php 
										$monthName = date("F", mktime(0, 0, 0, $bulan, 10));
									?>
					                <td><?php echo $monthName; ?></td>
					                <td><?php echo $tahun; ?></td>
					                <td><?php echo $target.$no_t; ?></td>
					                <td><?php echo $level.$no_l; ?></td>
					                <td>
					                	<a class="btn btn-icon-toggle" a href="<?php echo base_url('admin/c_kemajuanBelajar/kbDetail/'.$idsubyek); ?>" title="Details">Details</a>
					                </td>
              					   </tr>

							<?php } ?>
								
							</tbody>
						  </table>
						</div>
						</div>
					</div><!--end .section-body -->
				</section>
				<!-- END TABLE HOVER -->
			</div><!--end #content-->
			<!-- END CONTENT -->
		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
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
