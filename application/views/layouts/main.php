<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Tech Class</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Topik
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url() ?>Main/showClassWeb">Pengembangan Website</a>
                    </div>
				</li>
				<?php if($this->session->userdata('fullname')) { ?>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url() ?>Frontend/Student" class=" my-2 my-sm-0">Dashboard</a>
				</li>
				<?php } ?> 
            </ul>
            <div class="my-2 my-lg-0">
                <?php if(empty($this->session->userdata('fullname'))){ ?>
                    <a href="<?php echo base_url() ?>Main/register" class="btn btn-primary my-2 my-sm-0">Daftar</a>
                    <a href="<?php echo base_url() ?>Frontend/login" class="btn btn-outline-danger my-2 my-sm-0">Masuk</a>
                <?php } ?>

				<?php if($this->session->userdata('fullname')) { ?>		
                    <a href="<?php echo base_url() ?>Frontend/Login/logout" class="btn btn-outline-dark my-2 my-sm-0">Logout</a>
                <?php } ?> 
            </div>
        </div>
    </nav>

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d381e4b74a.js" crossorigin="anonymous"></script>
</body>
</html>
