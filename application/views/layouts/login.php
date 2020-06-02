<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tech - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/style.css">

</head>

<body class="bg-gradient-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg mt-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block  bg-danger">
					<div class="text-center">
						<!-- <img src="<?php echo base_url() ?>assets/img/logo.png" alt="Login Admin" class="img-fluid"/> -->
						<h1 class="text-white pt-5 ">Tech Class Admin</h1>
					</div>	
					<div class="text-center">
						<h4 class="text-center text-white">Tech Class V1.0</h4>
						<small>Build Number : <?php echo date('Y.m.d') . rand(1,99) ?></small>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
							
							<?php if ($this->session->flashdata('login_success')): ?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>
									<?php echo $this->session->flashdata('login_success'); ?>
								</strong> 
							</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('failed_login')): ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>
									<?php echo $this->session->flashdata('failed_login'); ?>
								</strong> 
							</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('no_access')): ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>
									<?php echo $this->session->flashdata('no_access'); ?>
								</strong> 
							</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('no_account_verify')): ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>
									<?php echo $this->session->flashdata('no_account_verify'); ?>
								</strong> 
							</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('errors')): ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>
									<?php echo $this->session->flashdata('errors'); ?>
								</strong> 
							</div>
							<?php endif; ?> 

							<?php if ($this->session->flashdata('no_account')): ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>
									<?php echo $this->session->flashdata('no_account'); ?>
								</strong> 
							</div>
							<?php endif; ?> 
						  </div>
						  
					<?php echo form_open('Login/authUser',array('class'=>'user')) ?>
						<div class="form-group">
						<?php 
							$data = array(
									'name' => 'email',
									'class' => 'form-control form-control-user',
									'placeholder' => 'Email....'
							);
						?>
						<?php echo form_input($data) ?>
                    </div>
                    <div class="form-group">
						<?php 

							$data = array(
								'name' => 'password',
								'class' => 'form-control form-control-user',
								'placeholder' => 'Password'
							);

						?>
                      <?php echo form_password($data) ?>
                    </div>
						<div class="form-group">
							<?php 
									$data = array(
										'class' => 'btn btn-danger btn-user btn-block',
										'name' => 'submit',
										'value' => 'Login Account'
									)
							?>
							<?php echo form_submit($data) ?>
						</div>
                  <?php echo form_close() ?>
					<!-- <hr>
					<div class="text-center">
						<a class="small" href="<?php echo base_url() ?>Registrasi">Create an Account!</a>
					</div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>

</body>

</html>
