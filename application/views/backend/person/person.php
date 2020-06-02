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

	<?php if ($this->session->flashdata('update')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('update'); ?>
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
				<div class="table-responsive">
					<table class="table table-bordered" id="usersTable">
						<thead>
							<tr>
								<th>Nama Lengkap</th>
								<th>Email</th>
								<th>Status Akun</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($person as $item) 
								{ 
									if($item->is_active == 1)
									{
										$statusAkun = '<span class="badge badge-danger">Belum Terverifikasi</span>';
									}
									if($item->is_active == 2)
									{
										$statusAkun = '<span class="badge badge-primary">Sudah Terverifikasi</span>';
									}

							?>
							<tr>
								<td><?php echo $item->fullname ?></td>
								<td><?php echo $item->email ?></td>
								<td><?php echo $statusAkun ?></td>
								<td>
									<div class="flex-container" style="display: flex; flex-wrap: wrap;">
										<a data-toggle="tooltip" title="View" href="<?php echo base_url() ?>Backend/Person/show/<?php echo $item->id_users ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
										<a data-toggle="tooltip" title="Edit" href="<?php echo base_url() ?>Backend/Person/edit/<?php echo $item->id_users ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
										<a data-toggle="tooltip" title="Delete" href="<?php echo base_url() ?>Backend/Person/delete/<?php echo $item->id_users ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
										<?php if($item->is_active == 1) : ?>
											<?php echo form_open('Backend/Person/updateVerivication/'. $item->id_users) ?>
													<button data-toggle="tooltip" title="Akun Tidak Aktif" class="btn btn-secondary" type="submit"><i class="fa fa-window-close"></i></button>
											<?php echo form_close() ?>
										<?php endif; ?>
										<?php if($item->is_active == 2) : ?>
											<?php echo form_open('Backend/Person/upateNonActivation/'. $item->id_users) ?>
												<button data-toggle="tooltip" title="Akun Aktif" class="btn btn-info" type="submit"><i class="fa fa-check"></i></button>
											<?php echo form_close() ?>
										<?php endif; ?>
									</div>
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
	  <?php echo form_open('Registrasi/addUser',array('class'=>'user')) ?>

			
	  		<div class="form-group row">
				<select name="role_id"  class="form-control">
						<option>Pilih Divisi</option>	
						<?php 
							foreach($role_user as $role){
						?>
							<option value="<?php echo $role->id_role ?>"><?php echo $role->role_name ?></option>
						<?php } ?>
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
							'type' => 'number',
							'placeholder' => 'Nomor Telepon WA'
						);
					
					?>
					<?php echo form_input($data) ?>
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
      </div>
     
    </div>
  </div>
</div>
