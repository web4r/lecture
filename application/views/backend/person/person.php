<section class="person">
	<h1 class="text-center">Users List</h1>
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
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
			</strong> 
		</div>
	<?php endif; ?>
</section>

<section class="person-content">
	<div class="container">
		<div class="row mb-3">
			<div class="col-md-12">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				<i class="fa fa-plus"></i> Users
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered" id="usersTable">
					<thead>
						<tr>
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>Divisi</th>
							<th>Status Akun</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($person as $item) 
							{ 
								if($item->stat_akun == 1)
								{
									$statusAkun = '<span class="badge badge-success">Sudah Terverifikasi</span>';
								}
								if($item->stat_akun == 2)
								{
									$statusAkun = '<span class="badge badge-danger">Belum Terverifikasi</span>';
								}

								
								if($item->role_akun == 1)
								{
									$roleAkun = '<span class="badge badge-success">Administrator</span>';
								}
								if($item->role_akun == 2)
								{
									$roleAkun = '<span class="badge badge-primary">Direktur Utama</span>';
								}
								if($item->role_akun == 3)
								{
									$roleAkun = '<span class="badge badge-primary">Direktur Keuangan</span>';
								}
								if($item->role_akun == 4)
								{
									$roleAkun = '<span class="badge badge-primary">Finance</span>';
								}

								if($item->role_akun == 5)
								{
									$roleAkun = '<span class="badge badge-primary">HRD</span>';
								}
								if($item->role_akun == 6)
								{
									$roleAkun = '<span class="badge badge-primary">Legal</span>';
								}
								if($item->role_akun == 7)
								{
									$roleAkun = '<span class="badge badge-primary">Konstruksi</span>';
								}
								if($item->role_akun == 8)
								{
									$roleAkun = '<span class="badge badge-primary">IT Development</span>';
								}
								if($item->role_akun == 9)
								{
									$roleAkun = '<span class="badge badge-primary">Research and Development</span>';
								}
						?>
						<tr>
							<td><?php echo $item->fullname ?></td>
							<td><?php echo $item->email ?></td>
							<td><?php echo $roleAkun ?></td>
							<td><?php echo $statusAkun ?></td>
							<td>
								<a href="<?php echo base_url() ?>Backend/Person/show/<?php echo $item->id_user ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
								<a href="<?php echo base_url() ?>Backend/Person/edit/<?php echo $item->id_user ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
								<a href="<?php echo base_url() ?>Backend/Person/delete/<?php echo $item->id_user ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php 
							}	
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Registrasi Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php echo form_open_multipart('Registrasi/addUser',array('class'=>'user')) ?>

			
	  		<div class="form-group row">
				<select  name="role_akun"  class="form-control">
						<option>Pilih Divisi</option>	
						<option value="1">Administrator</option>
						<option value="2">Direktur Utama</option>
						<option value="3">Direktur Keuangan</option>	
						<option value="4">Finance</option>
						<option value="5">HRD</option>
						<option value="6">Legal</option>
						<option value="7">Konstruksi</option>
						<option value="8">IT Development</option>
						<option value="9">Research and Development</option>
				</select>
			</div>
			<div class="form-group row">
					<?php 
						$data = array(

							'class' => 'form-control',
							'name' => 'fullname',
							'placeholder' => 'Nama Lengkap'

						);
					
					?>
					<?php echo form_input($data) ?>
				
			</div>

			<div class="form-group row">
					<?php 
						$data = array(

							'class' => 'form-control',
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

							'class' => 'form-control',
							'name' => 'phone',
							'placeholder' => 'Telepon'

						);
					
					?>
					<?php echo form_input($data) ?>
			</div>

			<div class="form-group row">

				<?php 
					$data = array(

						'class' => 'form-control',
						'name' => 'fax',
						'placeholder' => 'Fax'
					);
				
				?>
				<?php echo form_input($data) ?>
					
			</div>	

			<!-- <div class="form-group">
				<div class="input-group mb-3">
					
					<div class="custom-file">
						<input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
						<label class="custom-file-label" for="inputGroupFile01">Upload Foto Max 1mb</label>
						
					</div>
					
				</div>
				
			</div> -->
				
		

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
      </div>
     
    </div>
  </div>
</div>
