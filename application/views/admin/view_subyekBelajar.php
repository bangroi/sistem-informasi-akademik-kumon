
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
							<h2><span class="fa fa-user"></span> Data Pengguna</h2>
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
				                  <th>Qr Code</th>
				                  <th>ID Siswa</th>
				                  <th>Nama Siswa</th>
				                  <th>Subyek</th>
				                  <th>Level</th>
				                  <th>Status Siswa</th>
				                
				                  <th class="text-rigth">aksi</th>
				                </tr>
							</thead>
							<tbody>
							<?php 
							$no=0;
								foreach ($dtsubyek->result_array() as $ds) {
		                       $no++;
		                       $qrcode = $ds['img_qrcode'];
		                       $id=$ds['id_siswa'];
						       $nama=$ds['nama_siswa'];
						       $subyek = $ds['subyek'];
						       $level = $ds['level'];
						       $status = $ds['status_subyek_siswa'];
						       $idsubyek = $subyek.$id;

			        
			                ?>
								<tr>
									<td><?php echo $no; ?></td>
					               <td><a href="<?php echo base_url().'assets/imgqrcode/'.$qrcode;?>" download><img style="width:40px;height:40px;"  src="<?php echo base_url().'assets/imgqrcode/'.$qrcode;?>" alt="<?php echo$qrcode; ?>"/></a></td>
					                <td><?php echo $id; ?></td>
					                <td><?php echo $nama; ?></td>
					                <td><?php echo $subyek; ?></td>
					                <td><?= $level; ?> </td>
					                <td><?= $status; ?></td>

					               
									<td>
										<a class="btn btn-icon-toggle" href="#" title="Update Kemajuan Belajar" data-toggle="modal" data-target="#modal-kemajuan-belajar<?php echo $idsubyek;?>"><i class="fa fa-plus"></i></a>
									 	<a class="btn btn-icon-toggle" href="#" title="Edit row" data-toggle="modal" data-target="#modal-edit_siswa<?php echo $id;?>"><i class="fa fa-edit"></i></a>
                   						 <a href="<?php echo base_url('admin/c_siswa/hapusSubyek/'.$idsubyek);?>" class="btn btn-icon-toggle" title="Delete row"><i class="fa fa-trash"></i></a>
                   						 
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

	<!-- ============ MODAL EDIT subyek belajar siswa =============== -->
			<?php 
				$no=0;
					foreach ($dtsubyek->result_array() as $ds) {
	               $no++;
	               $id = $ds['id_siswa'];
			       $nama = $ds['nama_siswa'];
			       $subyek = $ds['subyek'];
			       $level = $ds['level'];
			       $status = $ds['status_subyek_siswa'];
    
            ?>
			<div class="modal fade" id="modal-edit_siswa<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Edit Data Siswa</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/c_siswa/updateSiswa'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label ">ID SISWA</label>
										<div class="col-sm-8">
											<input type="text" name="idsiswa" value="<?php echo $id;?>" class="form-control" id="regular13" readonly>
											
										</div> 
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">NAMA</label>
										<div class="col-sm-8">
											<input type="text" name="namasiswa" value="<?php echo $nama;?>" class="form-control" id="regular13" readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">SUBYEK BELAJAR</label>
										<div class="col-sm-8">
											<input type="text" name="kelas" value="<?php echo $subyek;?>" class="form-control" id="regular13" readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">LEVEL BELAJAR SISWA</label>
										<div class="col-sm-8">
											<input type="text" name="tgldaftar" value="<?php echo $level;?>" class="form-control" id="regular13" readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">STATUS BELAJAR SISWA</label>
										<div class="col-sm-8">
											<select id="select13" name="reallevel" class="form-control" required>
												<option value="">PILIH STATUS BELAJAR SISWA</option>
												<option value="aktif">AKTIF</option>
												<option value="cuti">CUTI</option>
												<option value="coba gratis">COBA GRATIS</option>
											</select>
										</div>
									</div>
									
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Edit</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL update kemajuan belajar =============== -->
			<?php 
				foreach ($dtsubyek->result_array() as $ds) {
					 $id=$ds['id_siswa'];
					 $subyek = $ds['subyek'];
			         $nama=$ds['nama_siswa'];
			         $idsubyek = $subyek.$id;
			?>

			<div class="modal fade" id="modal-kemajuan-belajar<?php echo $idsubyek;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Update Kemajuan Belajar <?= $nama; ?></h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/c_kemajuanBelajar/tambahKemajuanBelajar'?>">
			        <div class="modal-body">
			        	<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Id Siswa</label>
							<div class="col-sm-8">
								<input type="text" name="idsubyek" value="<?php echo $subyek.$id;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Nama Siswa</label>
							<div class="col-sm-8">
								<input type="text" name="namasiswa" value="<?php echo $nama;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Subyek Belajar</label>
							<div class="col-sm-8">
								<input type="text" name="subyek" value="<?php echo $subyek;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Periode Bulan</label>
							<div class="col-sm-8">
								<select id="select13" name="tgl_kb" class="form-control" required>
												<option value="">Pilih periode bulan</option>
												<option value="1">Januari</option>
												<option value="2">Februari</option>
												<option value="3">Maret</option>
												<option value="4">April</option>
												<option value="5">Mei</option>
												<option value="6">Juni</option>
												<option value="7">Juli</option>
												<option value="8">Agustus</option>
												<option value="9">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
								</select>
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Periode Tahun</label>
							<div class="col-sm-8">
								<input type="text" name="tahun_kb" class="form-control" id="regular13" required>
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Terget Level Bulan ini</label>
							<div class="col-sm-3">
								<select id="select13" name="tlevel" class="form-control" required>
												<option value="">Pilih Level</option>
												<option value="7a">7A</option>
												<option value="6a">6A</option>
												<option value="5a">5A</option>
												<option value="4a">4A</option>
												<option value="3a">3A</option>
												<option value="2a">2A</option>
												<option value="a">A</option>
												<option value="b">B</option>
												<option value="c">C</option>
												<option value="d">D</option>
												<option value="e">E</option>
												<option value="f">F</option>
												<option value="g">G</option>
												<option value="h">H</option>
												<option value="i">I</option>
												<option value="j">J</option>
												<option value="k">K</option>
												<option value="l">L</option>
												<option value="m">M</option>
												<option value="n">N</option>
												<option value="o">O</option>
								</select>
							</div>
							<label for="regular13"  class="col-sm-2 control-label">Nomor</label>
							<div class="col-sm-4">
								<input type="text" name="nomertargetlevel" class="form-control" placeholder="input nomer" id="regular13" required>
							</div>  
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Real Level Bulan ini</label>
							<div class="col-sm-3">
								<select id="select13" name="rlevel" class="form-control" required>
												<option value="">Pilih Level</option>
												<option value="7a">7A</option>
												<option value="6a">6A</option>
												<option value="5a">5A</option>
												<option value="4a">4A</option>
												<option value="3a">3A</option>
												<option value="2a">2A</option>
												<option value="a">A</option>
												<option value="b">B</option>
												<option value="c">C</option>
												<option value="d">D</option>
												<option value="e">E</option>
												<option value="f">F</option>
												<option value="g">G</option>
												<option value="h">H</option>
												<option value="i">I</option>
												<option value="j">J</option>
												<option value="k">K</option>
												<option value="l">L</option>
												<option value="m">M</option>
												<option value="n">N</option>
												<option value="o">O</option>
								</select>
							</div>
							<label for="regular13" class="col-sm-2 control-label">Nomor</label>
							<div class="col-sm-4">
								<input type="text" name="nomerreallevel" class="form-control" placeholder="input nomer" id="regular13" required>
							</div>  
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Catatan Penting Siswa</label>
							<div class="col-sm-8">
								<input type="text" name="catatan_kb" class="form-control" id="regular13" required>
							</div> 
						</div>
						
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Update</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			

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
