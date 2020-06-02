<div class="container mt-5">


    <section class="register">
	
	<?php if ($this->session->flashdata('no_registered')): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>
            <?php echo $this->session->flashdata('no_registered'); ?>
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

    <?php if ($this->session->flashdata('activation_account')): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>
            <?php echo $this->session->flashdata('activation_account'); ?>
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
        <h1 class="text-center">Login</h1>
        <div class="row">
            <div class="col-md-6 mx-auto">

                <?php echo form_open('Frontend/Login/authUser') ?>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Email">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        
                    </div>
        
        
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                <?php echo form_close() ?>
                <p class="text-center mt-3 mb-3">Atau</p>
                <button type="submit" class="btn btn-outline-dark btn-block">Lupa Password</button>
            </div>
        </div>
            
    </section>
</div>
