<section class="pencairan-head">
	<h1 class="text-center">Pengajuan Pencairan</h1>
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
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
</section>

<section class="pencairan-content">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-12">
				<a href="<?php echo base_url() ?>Backend/Pencairan/post" class="btn btn-primary">
					<i class="fa fa-plus"></i> Pencairan
				</a>
			</div>
		</div>
		<div class="row mt-5">
			<?php if($this->session->userdata('role_akun') > 4) : ?>
			<div class="table-responsive">
				<table class="table" id="pencairanTable">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Nama Pemohon</th>
							<th>Bagian</th>
							<th>Nama Project</th>
							<th>Tanggal Pengajuan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($pencairan as $item) 
						{ 
							if($item->nomor_pencairan)
							{
								$itemNomor = $item->nomor_pencairan;
							}else {
								$itemNomor = '<span class="badge badge-danger">belum ada nomor</span>';
							}
						?>
						<tr>
							<td><?php echo $itemNomor ?></td>
							<td><?php echo $item->nama_pemohon ?></td>
							<td><?php echo $item->bagian ?></td>
							<td><?php echo $item->nama_project ?></td>
							<td><?php echo $item->tgl_pengajuan ?></td>
							<td>
								<a href="<?php echo base_url() ?>Backend/Pencairan/edit/<?php echo $item->id_pencairan ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
									<i class="fa fa-edit"></i>
								</a>
								<a href="<?php echo base_url() ?>Backend/Pencairan/delete/<?php echo $item->id_pencairan ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
									<i class="fa fa-trash"></i>
								</a>
								<a href="<?php echo base_url() ?>Backend/Pencairan/show/<?php echo $item->id_pencairan ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Rincian Pencairan">
									<i class="fa fa-file"></i>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

			<?php if($this->session->userdata('role_akun') == 2 || $this->session->userdata('role_akun') == 3 || $this->session->userdata('role_akun') == 4 ) : ?>
			<div class="table-responsive">
				<table class="table" id="pencairanTable">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Nama Pemohon</th>
							<th>Bagian</th>
							<th>Nama Project</th>
							<th>Tanggal Pengajuan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($pencairanAll as $item) 
						{ 
							if($item->nomor_pencairan)
							{
								$itemNomor = $item->nomor_pencairan;
							}else {
								$itemNomor = '<span class="badge badge-danger">belum ada nomor</span>';
							}
						?>
						<tr>
							<td><?php echo $itemNomor ?></td>
							<td><?php echo $item->nama_pemohon ?></td>
							<td><?php echo $item->bagian ?></td>
							<td><?php echo $item->nama_project ?></td>
							<td><?php echo $item->tgl_pengajuan ?></td>
							<td>
								<a href="<?php echo base_url() ?>Backend/Pencairan/edit/<?php echo $item->id_pencairan ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
									<i class="fa fa-edit"></i>
								</a>
								<a href="<?php echo base_url() ?>Backend/Pencairan/delete/<?php echo $item->id_pencairan ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
									<i class="fa fa-trash"></i>
								</a>
								<a href="<?php echo base_url() ?>Backend/Pencairan/show/<?php echo $item->id_pencairan ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Rincian Pencairan">
									<i class="fa fa-file"></i>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>



		</div>
	</div>
</section>
