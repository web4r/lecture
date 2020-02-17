<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/backend/css/chosen.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/backend/css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">

				<?php if ($this->session->flashdata('errors')): ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>
							<?php echo $this->session->flashdata('errors'); ?>
						</strong> 
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('user_register')): ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>
						<?php echo $this->session->flashdata('user_register'); ?>
					</strong> 
				</div>
				<?php endif; ?>

                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <?php echo form_open_multipart('Registrasi/addUser',array('class'=>'user')) ?>

				<div class="form-group row">
					<select data-placeholder="Pilih Nama Lembaga ....." name="institution_name" id="institution"  class="custom-select chosen-single col-5">
						<?php foreach($institution as $item) { ?>
							<option value=""></option>	
							<option value="<?php echo $item->nama_lembaga ?>"><?php echo $item->nama_lembaga ?></option>
						<?php } ?>
					</select>
				</div>
					
				<div class="form-group row">
						<?php 
							$data = array(

								'class' => 'form-control form-control-user',
								'name' => 'pic_name',
								'placeholder' => 'Nama PIC'

							);
						
						?>
						<?php echo form_input($data) ?>
					
				</div>

				<div class="form-group row">
						<?php 
							$data = array(

								'class' => 'form-control form-control-user',
								'name' => 'email',
								'type' => 'email',
								'placeholder' => 'Email'
							);
						
						?>
						<?php echo form_input($data) ?>
				</div>

				<div class="form-group row">
						<?php 
							$data = array(

								'class' => 'form-control form-control-user',
								'name' => 'phone',
								'placeholder' => 'Telepon'

							);
						
						?>
						<?php echo form_input($data) ?>
				</div>

				<div class="form-group row">

					<?php 
						$data = array(

							'class' => 'form-control form-control-user',
							'name' => 'fax',
							'placeholder' => 'Fax'
						);
					
					?>
					<?php echo form_input($data) ?>
						
				</div>	

				<div class="form-group">
					<label for="file_lampiran" class="control-label">File Lampiran</label>
					<input type="file" name="file_lampiran" class="form-control" />
				</div>
					
				<div class="form-group row">			
					
						<?php 
							$data = array(

								'class' => 'form-control',
								'name' => 'address',
								'placeholder' => 'Alamat Lengkap...',
								'cols' => 5,
								'rows' => 5

							);
						
						?>
						<?php echo form_textarea($data) ?>
					
				</div>

				<div class="form-group">
					<?php 
						$data  = array(
							'class' => 'btn btn-primary btn-user btn-block',
							'name' => 'submit',
							'value' => 'Register Account'

						);
					?>
					
					<?php echo form_submit($data); ?>
					
				</div>
											
								
              <?php echo form_close() ?>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url() ?>Login">Already have an account? Login!</a>
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
  <script src="<?php echo base_url() ?>assets/backend/js/chosen.jquery.js"></script>						
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>
  <script>
	  $(document).ready(function(){
		$("#institution").chosen(); 
	  });
  </script>
</body>

</html>
