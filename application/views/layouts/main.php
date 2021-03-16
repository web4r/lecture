<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
</head>
<body style="font-family: 'Quicksand', sans-serif;">
	<nav class="navbar navbar-expand-md navbar-toggleable-md navbar-light" id="bg-navbar-custom">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		<a class="navbar-brand text-dark" href="<?php echo base_url() ?>">Techinfo.id</a>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link text-dark" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
			</li>
			<?php if($this->session->userdata('is_loggedin') && $this->session->userdata('role_id') == 4) { ?>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url() ?>Frontend/Student" class=" my-2 my-sm-0">Dashboard</a>
				</li>
			<?php } ?> 
		</ul>
		<div class="form-inline my-2 my-lg-0">
				<?php if(empty($this->session->userdata('fullname'))){ ?>
					<div class="btn-group" role="group">
						<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Register / Login
						</button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						<a href="<?php echo base_url() ?>Main/register" class="dropdown-item">Register</a>
						<a href="<?php echo base_url() ?>Frontend/login" class="dropdown-item">Login</a>
						</div>
					</div>
						
                <?php } ?>

				<?php if($this->session->userdata('is_loggedin') && $this->session->userdata('role_id') == 4) { ?>		
						<a href="<?php echo base_url() ?>Frontend/Login/logout" class="btn btn-dark my-2 my-sm-0">Logout</a>
                <?php } ?> 
		</div>
	</div>
	</nav>
    <!-- <nav class="navbar navbar-expand-lg" id="bg-navbar-custom">
        <a class="navbar-brand text-dark" href="<?php echo base_url() ?>">Techinfo.id</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav navbar-nav">
                
				<?php if($this->session->userdata('fullname')) { ?>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url() ?>Frontend/Student" class=" my-2 my-sm-0">Dashboard</a>
				</li>
				<?php } ?> 
			</ul>
			<form class="form-inline">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
            <div class="form-inline my-2 my-lg-0">
				<?php if(empty($this->session->userdata('fullname'))){ ?>
						<a href="<?php echo base_url() ?>Main/register" class="btn btn-primary my-2 my-sm-0">Daftar</a>
						<a href="<?php echo base_url() ?>Frontend/login" class="btn btn-outline-danger my-2 my-sm-0">Masuk</a>
                <?php } ?>

				<?php if($this->session->userdata('fullname')) { ?>		
						<a href="<?php echo base_url() ?>Frontend/Login/logout" class="btn btn-outline-dark my-2 my-sm-0">Logout</a>
                <?php } ?> 
            </div>
        </div>
	</nav> -->
	


	

    <div class="block-design">
        <?php $this->load->view($content) ?>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <footer class="blockquote-footer">
            Tech Class &copy 2020 || Page rendered in <strong>{elapsed_time}</strong> seconds. 
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
	<script src="https://kit.fontawesome.com/d381e4b74a.js" ></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.waypoints.js"></script>
	<script src="<?php echo base_url() ?>assets/js/counterup.js"></script>
	<script>
		$(document).ready(function() {
            $('.counter-class').counterUp();
			$('.counter-student').counterUp();
			$('.counter-materi').counterUp();
		});
	</script>
</body>
</html>
