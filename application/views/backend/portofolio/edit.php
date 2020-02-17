<section class="portofolio-edit">
	<h1 class="text-center">Form Edit Portofolio</h1>
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
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
						<?php echo form_open('Backend/Portofolio/do_update/'.$portofolio->id_portofolio) ?>
							<div class="form-group">
								<?php 
									echo form_label('Tahun');
									$data = array(
										'class' => 'form-control col-10',
										'name' => 'tahun',
										'value' => $portofolio->tahun
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
										'value' => $portofolio->pekerjaan
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
										'value' => $portofolio->sub_bidang
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
										'value' => $portofolio->lokasi
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
										'value' => $portofolio->nama_pejabat
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
										'rows' => 5,
										'cols' => 5
									);
									echo form_textarea($data,$portofolio->alamat_pejabat);
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
												'value' => $portofolio->nomor_kontrak
												
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
												'type' => 'date',
												'value' => $portofolio->tgl_kontrak
												
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
										'value' => $portofolio->nilai
										
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
											'type' => 'date',
											'value' => $portofolio->tgl_selesai
											
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
												'type' => 'date',
												'value' => $portofolio->tgl_ba
												
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
