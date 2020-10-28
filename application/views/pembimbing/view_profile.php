
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
              	<div class="col-sm-4">
							<h2><span class="fa fa-user"></span> <?php echo $title; ?></h2>
					</div>
                <div class="col-md-2" style="margin:20px;">
                  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Tambah Admin</button>
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
				                  <th>Email</th>
				                  <th>No. Telpon</th>
				                  <th>Password</th>
				                  <th class="text-right">Aksi</th>
				                </tr>
							</thead>
							<tbody>
							<?php 
								$no=0;
								foreach ($dtprofile->result_array() as $df) {
									$no++;
									$id = $df['id_admin'];
									$nama = $df['nama_admin'];
									$email = $df['email_admin'];
									$notlp = $df['no_tlp_admin'];
									$pass = $df['password_admin'];
			                ?>
								<tr>
									<td><?= $no; ?></td>
					                <td><?= $nama; ?></td>
					                <td><?= $email; ?></td>
					                <td><?= $notlp; ?> </td>
					                <td><?= $pass; ?></td>
					                <td class="text-right">
					                	<a class="btn btn-icon-toggle" href="#" title="edit admin" data-toggle="modal" data-target="#modal-edit<?= $id;?>"><i class="fa fa-edit"></i></a>
					                	<a class="btn btn-icon-toggle" a href="<?php echo base_url('c_pembimbing/hapusAdminp/'.$id); ?>" title="hapus"><i class="fa fa-trash"></i></a>
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

<!-- tambah admin -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Daftar Admin</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?= base_url().'c_pembimbing/tambahAdminp';?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama admin</label>
										<div class="col-sm-8">
											<input type="text" name="namaadmin"  class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">No.Tlp Admin</label>
										<div class="col-sm-8">
											<input type="text" name="notlpadmin"  class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="email"  name="email" class="form-control" id="regular13">
										</div>
									</div>
									
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Passwoard</label>
										<div class="col-sm-8">
											<input type="text"  name="passadmin" class="form-control" id="regular13">
										</div>
									</div>
									
									
			        </div>  
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit">Tambah</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>

	
<!-- edit admin -->
			<?php 
				foreach ($dtprofile->result_array() as $df) {
					$id = $df['id_admin'];
					$nama = $df['nama_admin'];
					$email = $df['email_admin'];
					$notlp = $df['no_tlp_admin'];
					$pass = $df['password_admin'];
				
			?>
			<div class="modal fade" id="modal-edit<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Edit Data Diri Admin</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?= base_url().'c_pembimbing/editAdminp';?>" enctype="multipart/form-data">
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
											<input type="email" value="<?=$email;?>" name="email" class="form-control" id="regular13">
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
