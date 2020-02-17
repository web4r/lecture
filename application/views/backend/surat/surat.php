<section class="surat-head">
	<h1 class="text-center">List Surat</h1>
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
			</strong> 
		</div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('delete')): ?>
		<div class="alert alert-success	">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('delete'); ?>
			</strong> 
		</div>
	<?php endif; ?>
</section>


<?php if($this->session->userdata('role_akun') == 6) { ?>

<section class="surat-content">
	<div class="container">
		<div class="row mb-5 mt-5">
			<div class="col-md-3">
				<div class="card border-left-primary shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-backdrop="false">
							<i class="fa fa-plus"></i> Nomor Surat
						</button>
						</div>
					</div>
				</div>
				
			</div>

			<div class="col-md-3">
				<div class="card border-left-primary shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Surat</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"> 
									<?php echo $totalSurat ?> Surat
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-calendar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card border-left-primary shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nomor Terakhir</div>
								<?php if($nomor_terakhir) {?>
								<div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $nomor_terakhir->nomor_surat ?></div>
								<?php } else {
									echo '<div class="h5 mb-0 font-weight-bold text-gray-800"> Belum ada Nomor</div>';	
								}?>
								
							</div>
							<div class="col-auto">
								<i class="fas fa-calendar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="table-responsive">
				<table class="table table-bordered" id="suratTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Nomor Surat</th>
							<th>Pemohon Surat</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach($surat as $item){
							if($item->tujuan_surat)
							{
								$tujuanSurat = '<span class="badge badge-success">Sudah dilengkapi</span>';
							}else {
								$tujuanSurat = '<span class="badge badge-danger">Belum dilengkapi</span>';
							}
						 ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $item->tgl_surat ?></td>
							<td><?php echo $item->nomor_surat ?></td>
							<td><?php echo $item->email ?></td>
							<td><?php echo $tujuanSurat ?></td>
							<td>
								<a href="<?php echo base_url() ?>Backend/Surat/delete/<?php echo $item->id_surat ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								<a href="<?php echo base_url() ?>Backend/Surat/show/<?php echo $item->id_surat ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
								<a href="<?php echo base_url() ?>Backend/Surat/edit/<?php echo $item->id_surat ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<?php } ?>

<?php if($this->session->userdata('role_akun') != 6) { ?>
<section class="surat-content">
	<div class="container">
		<div class="row">
			<div class="table-responsive">
				<table class="table table-bordered" id="suratTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Nomor Surat</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach($mysurat as $item){

						 ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $item->tgl_surat ?></td>
							<td><?php echo $item->nomor_surat ?></td>
							<td>
								
								<a href="<?php echo base_url() ?>Backend/Surat/show/<?php echo $item->id_surat ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
								<a href="<?php echo base_url() ?>Backend/Surat/edit/<?php echo $item->id_surat ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<?php } ?>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?php echo form_open('Backend/surat/post') ?>
			<div class="form-group">
				<select name="id_user" id="userSearch" class="form-control">
					<option>Pilih User</option>
					<?php foreach($user as $item) { ?>
						<option value="<?php echo $item->id_user ?>"><?php echo $item->email ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<?php 
					echo form_label('Tanggal Surat');
					$data = array(
						'class' => 'form-control',
						'type' => 'date',
						'name' => 'tgl_surat',
						'required' => 'required'
					);
					echo form_input($data)
				?>
			</div>
			<div class="form-group">
				<?php 
					echo form_label('Nomor Surat');
					$data = array(
						'class' => 'form-control',
						'type' => 'text',
						'name' => 'nomor_surat',
						'placeholder' => 'Masukan Nomor Surat'
					);
					echo form_input($data);
				?>
			</div>
			<div class="form-group">
				<?php 
					echo form_label('Tujuan Surat');
					$data = array(
						'class' => 'form-control',
						'name' => 'tujuan_surat',
						'placeholder' => 'Masukan Tujuan Surat',
						'cols' => 3,
						'rows' => 3
					);
					echo form_textarea($data);
				?>
			</div>
			<div class="form-group">
				<?php 
					echo form_label('Perihal Surat');
					$data = array(
						'class' => 'form-control',
						'name' => 'perihal_surat',
						'placeholder' => 'Masukan Perihal Surat',
						'cols' => 3,
						'rows' => 3
					);
					echo form_textarea($data);
				?>
			</div>
			<div class="form-group">
				<?php 
					echo form_label('Keterangan Surat');
					$data = array(
						'class' => 'form-control',
						'name' => 'keterangan_surat',
						'placeholder' => 'Masukan Keterangan Surat',
						'cols' => 5,
						'rows' => 5
					);
					echo form_textarea($data);
				?>
			</div>
			<div class="form-group">
				<?php 
					
					$data = array(
						'class' => 'btn btn-primary',
						'value' => 'Simpan'
					);
					echo form_submit($data);
				?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		<?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
