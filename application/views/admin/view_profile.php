
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
				<section class="style-default-bright">
					<?php 
						foreach ($dtprofile->result_array() as $df) {
							$id = $df['id_admin'];
							$nama = $df['nama_admin'];
							$email = $df['email_admin'];
							$notlp = $df['no_tlp_admin'];
							$pass = $df['password_admin'];
						
					 ?>
				 <div class="row justify-content-md-center">
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">Nama Admin</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $nama;?></p>
						</div>
				    </div>
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">Email Admin</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $email;?></p>
						</div>
				    </div>
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">No. Tlp Admin</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $notlp;?></p>
						</div>
				    </div>
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">Passwoard Admin</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $pass;?></p>
						</div>
				    </div>
				   <?php } ?>
				    
				   
				  </div>
				  <section>
				
                <div class="row">
                	<div class="col-md-3"></div>
                	<div class="col-md-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-profile<?=$id; ?>">Edit</button></div>
                </div>
              </section>
			</div><!--end #content-->
			<!-- END CONTENT -->
		</div><!--end #base-->
		<!-- END BASE -->
<!-- tambah wali murid baru -->
			<?php 
				foreach ($dtprofile->result_array() as $df) {
					$id = $df['id_admin'];
					$nama = $df['nama_admin'];
					$email = $df['email_admin'];
					$notlp = $df['no_tlp_admin'];
					$pass = $df['password_admin'];
				
			?>
			<div class="modal fade" id="modal-edit-profile<?=$id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Edit Data Diri Admin</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/c_profile/editAdmin';?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama admin</label>
										<div class="col-sm-8">
											<input type="text" name="namaadmin" value="<?=$nama;?>" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">No.Tlp Admin</label>
										<div class="col-sm-8">
											<input type="text" name="notlpadmin" value="<?=$notlp;?>" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="email" value="<?=$email;?>" name="email" class="form-control" id="regular13" readonly>
										</div>
									</div>
									
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Passwoard</label>
										<div class="col-sm-8">
											<input type="text" value="<?=$pass;?>" name="passadmin" class="form-control" id="regular13">
										</div>
									</div>
									
									
			        </div>  
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit">EDIT</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
<?php } ?>
	
		
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
