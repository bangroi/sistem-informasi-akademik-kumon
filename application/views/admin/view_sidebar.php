<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="<?php echo base_url().'admin/dashboard'?>">
								<div class="gui-icon"><i class="fa fa-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<li>
							<a href="<?php echo base_url().'admin/c_siswa'?>">
								<div class="gui-icon"><i class="fa fa-users"></i></div>
								<span class="title">Daftar Siswa</span>
							</a>

						</li>
						<li>
							<a href="<?php echo base_url().'admin/c_siswa/subyekBelajar'?>">
								<div class="gui-icon"><i class="fa fa-book"></i></div>
								<span class="title">Subyek Belajar Siswa</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url().'admin/c_kemajuanBelajar'?>">
								<div class="gui-icon"><i class="fa fa-line-chart"></i></div>
								<span class="title">Kemajuan Belajar</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url().'admin/c_bayar'?>">
								<div class="gui-icon"><i class="fa fa-money"></i></div>
								<span class="title">Pembayaran</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url().'admin/C_wali_murid'?>">
								<div class="gui-icon"><i class="fa fa-users"></i></div>
								<span class="title">Data Wali Murid</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'admin/c_profile'?>">
								<div class="gui-icon"><i class="fa fa-user"></i></div>
								<span class="title">Profil Saya</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url('auth/logout'); ?>">
								<div class="gui-icon"><i class="fa fa-sign-out"></i></div>
								<span class="title">Keluar</span>
							</a>
						</li>


					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">&copy; <?php echo date('Y');?></span> <strong>KUMON CITRA HARMONI</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->
<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url().'assets/js/jquery/jquery-1.11.2.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery/jquery-migrate-1.2.1.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap/bootstrap.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/spin/spin.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/autosize/jquery.autosize.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/moment/moment.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.time.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.resize.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.orderBars.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.pie.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/curvedLines.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery-knob/jquery.knob.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/sparkline/jquery.sparkline.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/nanoscroller/jquery.nanoscroller.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/d3/d3.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/d3/d3.v3.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/rickshaw/rickshaw.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/App.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavigation.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppOffcanvas.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppCard.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppForm.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavSearch.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppVendor.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/Chart.js'?>"></script>
		<!-- END JAVASCRIPT -->