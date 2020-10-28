
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
				<div class="card-header row">
              	<div class="col-sm-2">
                	<h3 class="card-title">Data Wali Murid</h3>
            	</div>
                <div class="col-md-2" style="margin:20px;">
                  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-daftar-walimurid">Daftar Wali Murid Baru</button>
              	</div>
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
				                  <th>Nama</th>
				                  <th>Alamat</th>
				                  <th>No. Telepon</th>
				                  <th>Email</th>
				                  <th> Password</th>
				                </tr>
							</thead>
							<tbody>
							<?php 
							$no=0;
								foreach ($datawalimurid->result_array() as $dw) {
			                      $no++;
			                      $id = $dw['id_wali_murid'];
			                      $nama = $dw['nama_wali_murid'];
			                      $alamat = $dw['alamat_wali_murid'];
			                      $notlp = $dw['no_tlp_wali_murid'];
			                      $email = $dw['email_wali_murid'];
			                      $pass = $dw['pass_wali_murid'];
			                ?>
								<tr>
									<td><?php echo $no; ?></td>
					                <td><?php echo $nama; ?></td>
					                <td><?php echo $alamat; ?></td>
					                <td><?php echo $notlp; ?></td>
					                <td><?php echo $email; ?></td>
					                <td><?php echo $pass; ?></td>
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
