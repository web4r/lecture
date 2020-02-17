

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Office AAPT</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/backend/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/backend/css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/vendor/datatables/dataTables.bootstrap4.css') ?>">
	
	<link href="<?php echo base_url('assets/backend/css/style.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>Admin">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Office</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>Admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profile</span></a>
      </li>

     
      <!-- Nav Item - Pages Collapse Menu -->
 
			<?php if($this->session->userdata('role_akun') == 1) { ?>
			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Management Users :</h6>
            <a class="collapse-item" href="<?php echo base_url() ?>Backend/Person">List Users</a>
						<a class="collapse-item" href="<?php echo base_url() ?>Backend/Person/verifyUser">Verifikasi Users</a>
          </div>
        </div>
			</li>
			<?php } ?>

			<?php if($this->session->userdata('role_akun') == 2) { ?>

				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePencairan" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fa fa-file"></i>
						<span>Pengajuan</span>
					</a>
					<div id="collapsePencairan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?php echo base_url() ?>Backend/Pencairan">Pencairan</a>
						</div>
					</div>
				</li>

				<?php } ?>	

			<?php if($this->session->userdata('role_akun') == 3) { ?>

				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePencairan" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fa fa-file"></i>
						<span>Pengajuan</span>
					</a>
					<div id="collapsePencairan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?php echo base_url() ?>Backend/Pencairan">Pencairan</a>
						</div>
					</div>
				</li>

				<?php } ?>	

			<?php if($this->session->userdata('role_akun') == 4) { ?>

			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePencairan" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fa fa-file"></i>
          <span>Pengajuan</span>
        </a>
        <div id="collapsePencairan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url() ?>Backend/Pencairan">Pencairan</a>
          </div>
        </div>
			</li>

			<?php } ?>	


			<?php if($this->session->userdata('role_akun') == 6) { ?>
			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePortofolio" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-users"></i>
          <span>Portofolio</span>
        </a>
        <div id="collapsePortofolio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Perusahaan :</h6>
            <a class="collapse-item" href="<?php echo base_url() ?>Backend/Portofolio">Data Portofolio</a>
          </div>
        </div>
			</li>

			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMail" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fa fa-paper-plane"></i>
          <span>Surat</span>
        </a>
        <div id="collapseMail" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Management Surat :</h6>
						<a class="collapse-item" href="<?php echo base_url() ?>Backend/Surat">Nomor Surat</a>
          </div>
        </div>
			</li>

			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMail" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fa fa-paper-plane"></i>
          <span>Cloud File</span>
        </a>
        <div id="collapseMail" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url() ?>Backend/Cloud">Public</a>
          </div>
        </div>
			</li>

			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePencairan" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fa fa-file"></i>
          <span>Pengajuan</span>
        </a>
        <div id="collapsePencairan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url() ?>Backend/Pencairan">Pencairan</a>
          </div>
        </div>
			</li>
		
			<?php } ?>

			<?php if($this->session->userdata('role_akun') == 8) { ?>
			
			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMail" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fa fa-paper-plane"></i>
          <span>Surat</span>
        </a>
        <div id="collapseMail" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Management Surat :</h6>
            <a class="collapse-item" href="<?php echo base_url() ?>Backend/Surat">Nomor Surat</a>
          </div>
        </div>
			</li>
			<?php } ?>

			<?php if($this->session->userdata('role_akun') == 9) { ?>
			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMail" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fa fa-cloud"></i>
          <span>Cloud File</span>
        </a>
        <div id="collapseMail" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url() ?>Backend/Cloud">Public</a>
						<a class="collapse-item" href="<?php echo base_url() ?>Backend/Cloud">Alap-Alap</a>
          </div>
        </div>
			</li>

			<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>Admin">
          <i class="fas fa-fw fa-image"></i>
          <span>Gambar Kerja</span></a>
			</li>
			
			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePencairan" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fa fa-file"></i>
          <span>Pengajuan</span>
        </a>
        <div id="collapsePencairan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url() ?>Backend/Pencairan">Pencairan</a>
          </div>
        </div>
			</li>
		
			<?php } ?>



    
      <!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			
			<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>Login/logout">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Logout</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
					<div class=" d-flex">
						<h1 class="justify-content-center">E-Office AAPT</h1>
					</div>

         

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
					<?php $this->load->view($main_admin) ?>
					
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Nomads News <?php echo date('Y') ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 

  <!-- Bootstrap core JavaScript-->
 	<script src="<?php echo base_url('assets/backend/vendor/jquery/jquery.min.js') ?>"></script>
 	<script src="<?php echo base_url('as	sets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/backend/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <!-- Core plugin JavaScript-->
		<script src="<?php echo base_url('assets/backend/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
		

  <!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('assets/backend/js/sb-admin-2.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/backend/js/jquery.counterup.js') ?>"></script>

	<script src="<?php echo base_url('assets/backend/js/jquery.waypoints.min.js') ?>"></script>

	<script>

		$('.counter').counterUp();

		$('#usersTable').dataTable();
		$('#portofolioTable').dataTable();
		$('#suratTable').dataTable();
		$('#cloudTable').dataTable();
		$('#pencairanTable').dataTable();
		$('#rincianTable').dataTable();
		
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
		
	</script>
</body>

</html>
