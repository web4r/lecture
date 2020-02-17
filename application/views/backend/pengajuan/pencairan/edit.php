
<section class="edit-pencairan">
	<h1 class="text-center">Form Edit Pencairan</h1>
</section>

<section class="edit-pencairan-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">

						<a href="<?php echo base_url() ?>Backend/Pencairan" class="btn btn-secondary mb-5">
							<i class="fa fa-arrow-left"></i> Kembali
						</a>

						<?php echo form_open('Backend/Pencairan/do_update/'.$pencairan->id_pencairan) ?>

							<div class="form-group">
								<?php 
									echo form_label('Nomor');
									$data = array(
										'class' => 'form-control',
										'name' => 'nomor_pencairan',
										'value' => $pencairan->nomor_pencairan,
									);
									echo form_input($data);
								?>
							</div>
							
							<div class="form-group">
								<?php 
									echo form_label('Nama Pemohon');
									$data = array(
										'class' => 'form-control',
										'name' => 'nama_pemohon',
										'value' => $pencairan->nama_pemohon,
										'readonly' => 'readonly'
									);
									echo form_input($data);
								?>
							</div>
							
							<div class="form-group">
								<?php 
									echo form_label('Bagian');
									$data = array(
										'class' => 'form-control',
										'name' => 'bagian',
										'value' => $pencairan->bagian,	
										'readonly' => 'readonly'
									);
									echo form_input($data);
								?>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Nama Project');
									$data = array(
										'class' => 'form-control',
										'name' => 'nama_project',
										'value' => $pencairan->nama_project
									);
									echo form_input($data);
								?>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Tanggal Pengajuan Pencairan');
									$data = array(
										'class' => 'form-control',
										'name' => 'tgl_pengajuan',
										'type' => 'date',
										'value' => $pencairan->tgl_pengajuan
									);
									echo form_input($data);
								?>
							</div>
							
							<div class="form-group">
								<?php 
									
									$data = array(
										'class' => 'btn btn-primary',
										'value' => 'Update',
									);
									echo form_submit($data);
								?>
							</div>

						<?php echo form_close() ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
