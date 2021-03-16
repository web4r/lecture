<?php if ($this->session->flashdata('create')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('create'); ?>
			</strong> 
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('delete')): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('delete'); ?>
			</strong> 
		</div>
	<?php endif; ?>







<h1 class="text-center">Dashborad</h1>

<section class="information-account">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h3><i class="fa fa-user"></i> Informasi Akun</h3>
					<ul class="list-group">
						<li class="list-group-item">Nama Lengkap : <?php echo $user->fullname; ?></li>
						<li class="list-group-item">Email : <?php echo $user->email; ?></li>
						<li class="list-group-item">Password : 
							<a href='<?php echo base_url() ?>Backend/Person/showPassword/<?php echo $user->id ?>' class="btn btn-danger">Ganti Password <i class="fa fa-edit"></i></a>
						</li>
						<li class="list-group-item">Status Akun : 
							<span class="badge badge-primary"><?php echo ($user->is_active == 1) ? 'Belum Aktif' : 'Aktif' ; ?></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h1 class="text-center">List Kupon</h1>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Tambah Kupon
					</button>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Kode Kupon</th>
								<th>Diskon</th>
								<th>Action</th>
								<th>Log Kupon</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($cuponlist as $cupon) :?>
							<tr>
								<td><?php echo $cupon->cupon_name ?></td>
								<td><?php echo $cupon->diskon ?></td>
								<td>
								<a href="<?php echo base_url() ?>Admin/deleteCupon/<?php echo $cupon->id_cupon ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								</td>
								<td><?php echo $cupon->cupon_created ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Form Kupon</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php echo form_open('Admin/create_cupon'); ?>
						<div class="modal-body">
								<div class="form-group">
									<label for="kupon">Kode Kupon</label>
									<input type="text" class="form-control" name="cupon_name" required>
								</div>
								<div class="form-group">
									<label for="kupon">Nilai Diskon</label>
									<input type="text" class="form-control" name="diskon" required>
								</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
						<?php echo form_close(); ?>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
