<section class="portofolio-add">
	<h2 class="text-center">Form Portofolio Perusahaan</h2>
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
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
</section>

<section class="portofolio-body">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="card border-left-primary">
					<div class="card-body">
						<a href="<?php echo base_url() ?>Backend/Portofolio/" class="btn btn-secondary mb-5">
						<i class="fa fa-arrow-left"></i> Kembali
						</a>	
						<?php echo form_open('Backend/Portofolio/do_post') ?>
							<div class="form-group">
								<?php 
									echo form_label('Tahun');
									$data = array(
										'class' => 'form-control col-10',
										'name' => 'tahun',
										'placeholder' => 'Masukan Tahun Pekerjaan'
									);
									echo form_input($data);
								?>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Nama Pekerjaan');
									$data = array(
										'class' => 'form-control col-10',
										'name' => 'pekerjaan',
										'placeholder' => 'Masukan Nama Pekerjaan'
									);
									echo form_input($data);
								?>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Sub Bidang Pekerjaan');
									$data = array(
										'class' => 'form-control col-7',
										'name' => 'sub_bidang',
										'placeholder' => 'Masukan Sub Bidang Pekerjaan'
									);
									echo form_input($data);
								?>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Lokasi Pekerjaan');
									$data = array(
										'class' => 'form-control col-5',
										'name' => 'lokasi',
										'placeholder' => 'Masukan Lokasi Pekerjaan'
									);
									echo form_input($data);
								?>
							</div>
							<h4>Pemberi Tugas / Pejabat Pembuat Komitmen</h4>
							<div class="form-group">
								<?php 
									echo form_label('Nama');
									$data = array(
										'class' => 'form-control col-8',
										'name' => 'nama_pejabat',
										'placeholder' => 'Masukan Nama Pemberi Tugas'
									);
									echo form_input($data);
								?>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Alamat / Telepon');
									$data = array(
										'class' => 'form-control',
										'name' => 'alamat_pejabat',
										'placeholder' => 'Masukan Alamat / Telepon',
										'rows' => 5,
										'cols' => 5
									);
									echo form_textarea($data);
								?>
							</div>
							<h4>Kontrak</h4>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<?php 
											echo form_label('Nomor Kontrak');
											$data = array(
												'class' => 'form-control',
												'name' => 'nomor_kontrak',
												'placeholder' => 'Masukan Nomor Kontrak',
												
											);
											echo form_input($data);
										?>
									</div>
									<div class="col-md-6">
										<?php 
											echo form_label('Tanggal Kontrak');
											$data = array(
												'class' => 'form-control',
												'name' => 'tgl_kontrak',
												'type' => 'date'
												
											);
											echo form_input($data);
										?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<?php 
									echo form_label('Nilai Kontrak');
									$data = array(
										'class' => 'form-control col-6',
										'name' => 'nilai',
										'placeholder' => 'Masukan Nilai Kontrak',
										
									);
									echo form_input($data);
								?>
							</div>
							<h4>Tanggal Selesai</h4>
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
									<?php 
										echo form_label('Tanggal Selesai Kontrak');
										$data = array(
											'class' => 'form-control',
											'name' => 'tgl_selesai',
											'type' => 'date'
											
										);
										echo form_input($data);
									?>
									</div>
									<div class="col-md-6">
										<?php 
											echo form_label('Tanggal BA Serah Terima');
											$data = array(
												'class' => 'form-control',
												'name' => 'tgl_ba',
												'type' => 'date'
												
											);
											echo form_input($data);
										?>
									</div>
								</div>	
							</div>

							<div class="form-group">
								<?php 
									$data = array(
										'class' => 'btn btn-primary',
										'value' => 'Simpan'
									);
									echo form_submit($data)
								?>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
