<section class="surat-edit">
	<h1 class="text-center">Form Edit Surat</h1>
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
			</strong> 
		</div>
	<?php endif; ?>
</section>

<?php if($this->session->userdata('role_akun') == 6) { ?>
<section class="portofolio-body">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="card border-left-primary">
					<div class="card-body">
						<a href="<?php echo base_url() ?>Backend/Surat/" class="btn btn-secondary mb-5">
						<i class="fa fa-arrow-left"></i> Kembali
						</a>	
						<?php echo form_open('Backend/surat/do_update/'.$surat->id_surat) ?>
							<div class="form-group">
								<?php 
									echo form_label('Tanggal Surat');
									$data = array(
										'class' => 'form-control',
										'type' => 'date',
										'name' => 'tgl_surat',
										'value' => $surat->tgl_surat
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
										'value' => $surat->nomor_surat
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
										'cols' => 3,
										'rows' => 3
									);
									echo form_textarea($data,$surat->tujuan_surat);
								?>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Perihal Surat');
									$data = array(
										'class' => 'form-control',
										'name' => 'perihal_surat',
										'cols' => 3,
										'rows' => 3
									);
									echo form_textarea($data,$surat->perihal_surat);
								?>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Keterangan Surat');
									$data = array(
										'class' => 'form-control',
										'name' => 'keterangan_surat',
										'cols' => 5,
										'rows' => 5
									);
									echo form_textarea($data,$surat->keterangan_surat);
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
	</div>
</section>
<?php } ?>

<?php if($this->session->userdata('role_akun') != 6) { ?>
<section class="portofolio-body">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="card border-left-primary">
					<div class="card-body">
						<a href="<?php echo base_url() ?>Backend/Surat/" class="btn btn-secondary mb-5">
						<i class="fa fa-arrow-left"></i> Kembali
						</a>	
						<?php echo form_open('Backend/surat/do_update/'.$surat->id_surat) ?>
							<div class="form-group">
								<?php 
									echo form_label('Tanggal Surat');
									$data = array(
										'class' => 'form-control',
										'type' => 'date',
										'name' => 'tgl_surat',
										'value' => $surat->tgl_surat,
										'readonly' => 'readonly'
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
										'value' => $surat->nomor_surat,
										'readonly' => 'readonly'
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
										'cols' => 3,
										'rows' => 3
									);
									echo form_textarea($data,$surat->tujuan_surat);
								?>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Perihal Surat');
									$data = array(
										'class' => 'form-control',
										'name' => 'perihal_surat',
										'cols' => 3,
										'rows' => 3
									);
									echo form_textarea($data,$surat->perihal_surat);
								?>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Keterangan Surat');
									$data = array(
										'class' => 'form-control',
										'name' => 'keterangan_surat',
										'cols' => 5,
										'rows' => 5
									);
									echo form_textarea($data,$surat->keterangan_surat);
								?>
							</div>
							<div class="form-group">
								<?php 
									
									$data = array(
										'class' => 'btn btn-primary',
										'value' => 'Update'
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
	</div>
</section>
<?php } ?>
