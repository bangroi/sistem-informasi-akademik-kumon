
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
				                  <th class="text-rigth">aksi</th>
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
					                <td>
										<a class="btn btn-icon-toggle" href="#" title="Update Kemajuan Belajar" data-toggle="modal" data-target="#modal-kemajuan-belajar<?php echo $id_kb;?>"><i class="fa fa-plus"></i></a>
					                	<a class="btn btn-icon-toggle" href="#" title="Update Kemajuan Belajar" data-toggle="modal" data-target="#modal-edit_siswa<?php echo $id_kb;?>"><i class="fa fa-edit"></i></a>
					                	<a class="btn btn-icon-toggle" a href="<?php echo base_url('admin/c_kemajuanBelajar/hapusKemajuanBelajar/'.$id_kb); ?>" title="hapus"><i class="fa fa-trash"></i></a>
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

			
			<!-- ============ MODAL EDIT siswa =============== -->
			<?php 
				foreach ($datasiswa->result_array() as $ds) {
					$id_kb=$ds['id_kb'];
                	$id=$ds['id_subyek_siswa'];
			    	$nama=$ds['nama_siswa'];
			        $target=$ds['target_level_kb'];
			        $no_t = $ds['t_no_level_kb'];
			        $level=$ds['real_level_kb'];
			        $no_l = $ds['r_no_level_kb'];
			        $bulan=$ds['tgl_kb'];
			        $tahun= $ds['tahun_kb'];
			        $subyek= $ds['subyek'];
			         
			?>
			<div class="modal fade" id="modal-edit_siswa<?php echo $id_kb;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Edit Kemajuan Belajar <?= $nama; ?></h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/c_kemajuanBelajar/editKemajuanBelajar'?>">
			        <div class="modal-body">
			        	<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Id Siswa</label>
							<div class="col-sm-8">
								<input type="text" name="idsubyek" value="<?php echo $id?>" class="form-control" id="regular13" readonly >
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
												<option value="<?php echo $bulan;?>">
													<?php 
													 echo $monthName = date("F", mktime(0, 0, 0, $bulan, 10));
													?></option>
												<option value="1">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">Mey</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
								</select>
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Periode Tahun</label>
							<div class="col-sm-8">
								<input type="text" name="tahun_kb" value="<?php echo $tahun;?>" class="form-control" id="regular13" required>
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Terget Level Bulan ini</label>
							<div class="col-sm-3">
								<select id="select13" name="tlevel" class="form-control"  required>
												<option value="<?php echo $target;?>"><?php echo $target;?></option>
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
			

			<!-- ============ MODAL update kemajuan belajar =============== -->
			<?php 
				foreach ($datasiswa->result_array() as $ds) {
					 $id=$ds['id_siswa'];
					 $id_kb=$ds['id_kb'];
					 $subyek = $ds['subyek'];
			         $nama=$ds['nama_siswa'];
			         $bulan=$ds['tgl_kb'];
			         $idsubyek = $subyek.$id;
			?>

			<div class="modal fade" id="modal-kemajuan-belajar<?php echo $id_kb;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
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

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($datasiswa->result_array() as $a) {
					 $id=$ds['id_siswa'];
			         $nama=$ds['nama_siswa'];
			         $tgllhr=$ds['tgl_lahir'];
			         $kelas=$ds['kelas'];
			         $tgldftr=$ds['tanggal_daftar'];
			         $sekolah=$ds['sekolah'];
			         $foto=$ds['foto_siswa'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="hidden" name="nama" value="<?php echo $nama;?>">
											<p>Apakah Anda yakin mau menghapus data <b><?php echo $nama;?></b> ?</p>
										</div>
									</div>
	
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-trash"></span> Hapus</button>
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
