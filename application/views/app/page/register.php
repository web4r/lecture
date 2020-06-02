<?php if ($this->session->flashdata('user_register')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>
            <?php echo $this->session->flashdata('user_register'); ?>
        </strong> 
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('user_failed')): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>
            <?php echo $this->session->flashdata('user_failed'); ?>
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

<div class="container mt-5">
    <section class="register">
        <h1 class="text-center">Form Pendaftaran</h1>
        <?php echo form_open('Frontend/Register/saveUser') ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input name="fullname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" required>
                <small id="emailHelp" class="form-text text-muted">Masukan nama lengkap anda</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Email" required>
                <small id="emailHelp" class="form-text text-muted">Masukan email anda dengan format yang benar</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                <small id="emailHelp" class="form-text text-muted">Buat Password dengan rekomendasi <i>Huruf besar,huruf kecil dan angka</i></small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Telepon/Hp</label>
                <input name="phone" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nomor Telepon" required>
                <small id="emailHelp" class="form-text text-muted">Masukan nomor telepon anda</small>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        <?php echo form_close() ?>
    </section>
</div>
