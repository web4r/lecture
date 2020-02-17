<?php 
	if($pencairan->nomor_pencairan)
	{
		$itemNomor = $pencairan->nomor_pencairan;
	}else {

		$itemNomor = '<span class="badge badge-danger">belum ada nomor</span>';
	}

	if($pencairan->approve_user)
	{
		$userApprove = '<span class="badge badge-primary">Sudah di setujui</span>' . '( ' . $pencairan->approve_user .' )';
	}else {
		$userApprove = '<span class="badge badge-danger">Belum di setujui</span>';
	}

	if($pencairan->approve_finance)
	{
		$financeApprove = '<span class="badge badge-primary">Sudah di setujui</span> ' . '( ' . $pencairan->approve_finance .' )';
	}else {
		$financeApprove = '<span class="badge badge-danger">Belum di setujui</span>';
	}

	if($pencairan->approve_dk)
	{
		$dkApprove = '<span class="badge badge-primary">Sudah di setujui</span> ' . '( ' . $pencairan->approve_dk .' )';
	}else {
		$dkApprove = '<span class="badge badge-danger">Belum di setujui</span>';
	}

	if($pencairan->approve_du)
	{
		$duApprove = '<span class="badge badge-primary">Sudah di setujui</span> ' . '( ' . $pencairan->approve_du .' )';
	}else {
		$duApprove = '<span class="badge badge-danger">Belum di setujui</span>';
	}


	/**
	 * UnApprove
	 */
	if(empty($pencairan->approve_user))
	{
		$userUnApprove = '<span class="badge badge-danger">Belum di setujui</span>';
	}

	if(empty($pencairan->approve_finance))
	{
		$financeUnApprove = '<span class="badge badge-danger">Belum di setujui</span>';
	}

	if(empty($pencairan->approve_du))
	{
		$duUnApprove = '<span class="badge badge-danger">Belum di setujui</span>';
	}

	if(empty($pencairan->approve_dk))
	{
		$dkUnApprove = '<span class="badge badge-danger">Belum di setujui</span>';
	}

?>
<section class="rincian-head">
	<h1 class="text-center">Rincian Pencairan</h1>
	<?php echo form_open('Backend/Pencairan/print/'.$pencairan->id_pencairan); ?>
	<div class="text-center">
		<button type="submit" class="btn btn-danger">	
			<i class="fa fa-print"></i> Print
		</button>
	</div>
	<?php echo form_close(); ?>


	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
			</strong> 
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('delete_rincian')): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('delete_rincian'); ?>
			</strong> 
		</div>
	<?php endif; ?>
</section>

<section class="rincian-body">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-5 col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo base_url() ?>Backend/Pencairan" class="btn btn-secondary mb-3">
							<i class="fa fa-arrow-left"></i> Kembali
						</a>
						<ul class="list-group">
							<li class="list-group-item">Nomor : <?php echo $itemNomor ?></li>
							<li class="list-group-item">Nama Pemohon : <?php echo $pencairan->nama_pemohon ?></li>
							<li class="list-group-item">Bagian : <?php echo $pencairan->bagian ?></li>
							<li class="list-group-item">Nama Project : <?php echo $pencairan->nama_project ?></li>
							<li class="list-group-item">Tanggal Pengajuan : <?php echo $pencairan->tgl_pengajuan ?></li>
						</ul>

						<?php if($this->session->userdata('role_akun') == 2) : ?>
							<?php if($this->session->userdata('approval') == 1) : ?>
								
								<?php echo form_open('Backend/Pencairan/do_approve_du/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-success btn-block mt-3',
											'value' => 'Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>

								<?php echo form_open('Backend/Pencairan/do_unapprove_du/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-danger btn-block mt-3',
											'value' => 'Tidak Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>
							<?php endif; ?>
						<?php endif; ?>


						<?php if($this->session->userdata('role_akun') == 3) : ?>
							<?php if($this->session->userdata('approval') == 1) : ?>
								<?php echo form_open('Backend/Pencairan/do_approve_dk/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-success btn-block mt-3',
											'value' => 'Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>

								<?php echo form_open('Backend/Pencairan/do_unapprove_dk/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-danger btn-block mt-3',
											'value' => 'Tidak Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>
							<?php endif; ?>
						<?php endif; ?>


						<?php if($this->session->userdata('role_akun') == 4) : ?>
							<?php if($this->session->userdata('approval') == 1) : ?>
								<?php echo form_open('Backend/Pencairan/do_approve_finance/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-success btn-block mt-3',
											'value' => 'Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>

								<?php echo form_open('Backend/Pencairan/do_unapprove_finance/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-danger btn-block mt-3',
											'value' => 'Tidak Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>
							<?php endif; ?>
						<?php endif; ?>


						<?php if($this->session->userdata('role_akun') == 6) : ?>
							<?php if($this->session->userdata('approval') == 1) : ?>
								<?php echo form_open('Backend/Pencairan/do_approve/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-success btn-block mt-3',
											'value' => 'Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>
							<?php endif; ?>
						<?php endif; ?>

						<?php if($this->session->userdata('role_akun') == 9) : ?>
							<?php if($this->session->userdata('approval') == 1) : ?>
								<?php echo form_open('Backend/Pencairan/do_approve/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-success btn-block mt-3',
											'value' => 'Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>

								<?php echo form_open('Backend/Pencairan/do_unapprove_user/'.$pencairan->id_pencairan)?>
								
								<div class="form-group">
									<?php 
										$data = array(
											'class' => 'btn btn-danger btn-block mt-3',
											'value' => 'Tidak Setuju'
										);
										echo form_submit($data);
									?>	
									
								</div>
								<?php echo form_close()?>
							<?php endif; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-body">
						<ul class="list-group">
							<h5>Total Pengajuan Anggaran</h5>
							<li class="list-group-item mb-3">Total Pengajuan Anggaran : Rp. <?php echo number_format($total_rincian,2)  ?></li>
							<h5>Status Pencairan</h5>
							<li class="list-group-item">Divisi Approve Status : <?php echo ($pencairan->approve_user ? $userApprove : $userUnApprove) ?></li>
							<li class="list-group-item">Finance Approve Status : <?php echo ($pencairan->approve_finance ? $financeApprove : $financeUnApprove) ?></li>
							<li class="list-group-item">Direktur Keuangan Approve Status : <?php echo ($pencairan->approve_dk ? $dkApprove : $dkUnApprove) ?></li>
							<li class="list-group-item">Direktur Utama Approve Status : <?php echo ($pencairan->approve_du ? $duApprove : $duUnApprove) ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<?php 
							if(empty($pencairan->approve_user) || empty($pencairan->approve_finance) || empty($pencairan->approve_dk) || empty($pencairan->approve_du) )
							{
					
						?>
						<button  class="btn btn-primary mb-3" data-toggle="modal" data-target="#rincianModal">
							<i class="fa fa-plus"></i> Rincian
						</button>
						<?php				
				
							}
						
						?>
						
						<div class="table-responsive">
							<table class="table" id="rincianTable">
								<thead>
									<tr>
										<th>Nama Barang</th>
										<th>Jumlah</th>
										<th>Satuan</th>
										<th>Harga Satuan</th>
										<th>Total</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($rincian as $itemRincian){ ?>
									<tr>
										<td><?php echo $itemRincian->nama_barang ?></td>
										<td><?php echo $itemRincian->jumlah ?></td>
										<td><?php echo $itemRincian->satuan ?></td>
										<td>Rp. <?php echo number_format($itemRincian->harga_satuan,2) ?></td>
										<td>Rp. <?php echo number_format($itemRincian->total,2) ?></td>
										<td>
											<a href="<?php echo base_url() ?>Backend/Pencairan/deleteRincian/<?php echo $itemRincian->id_rincian_pencairan ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
												<i class="fa fa-trash"></i>
											</a>
											<a href="<?php echo base_url() ?>Backend/Pencairan/editRincian/<?php echo $itemRincian->id_rincian_pencairan ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
												<i class="fa fa-edit"></i>
											</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="rincianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Rincian Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?php echo form_open('Backend/Pencairan/do_rincian/'.$pencairan->id_pencairan) ?>
			<div class="form-group">
				<?php 
				echo form_label('Nama Barang');
				$data = array(
					'class' => 'form-control',
					'type' => 'text',
					'placeholder' => 'Masukan Nama Barang',
					'name' => 'nama_barang'
				);
				echo form_input($data);
				?>
			</div>

			<div class="form-group">
				<?php 
				echo form_label('Jumlah');
				$data = array(
					'class' => 'form-control',
					'type' => 'text',
					'placeholder' => 'Masukan Jumlah Barang',
					'name' => 'jumlah'
				);
				echo form_input($data);
				?>
			</div>

			<div class="form-group">
				<?php 
				echo form_label('Satuan');
				$data = array(
					'class' => 'form-control',
					'type' => 'text',
					'placeholder' => 'Masukan Satuan Barang',
					'name' => 'satuan'
				);
				echo form_input($data);
				?>
			</div>

			<div class="form-group">
				<?php 
				echo form_label('Harga Satuan');
				$data = array(
					'class' => 'form-control',
					'type' => 'text',
					'placeholder' => 'Masukan Harga Satuan Barang',
					'name' => 'harga_satuan'
				);
				echo form_input($data);
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
