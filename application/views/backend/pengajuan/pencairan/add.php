<?php 
if($item->role_akun == 1)
{
	$roleAkun = 'Administrator';
}
if($item->role_akun == 2)
{
	$roleAkun = 'Direktur Utama';
}
if($item->role_akun == 3)
{
	$roleAkun = 'Direktur Keuangan';
}
if($item->role_akun == 4)
{
	$roleAkun = 'Finance';
}

if($item->role_akun == 5)
{
	$roleAkun = 'HRD';
}
if($item->role_akun == 6)
{
	$roleAkun = 'Legal';
}
if($item->role_akun == 7)
{
	$roleAkun = 'Konstruksi';
}
if($item->role_akun == 8)
{
	$roleAkun = 'IT Development';
}
if($item->role_akun == 9)
{
	$roleAkun = 'Research and Development';
}


?>
<section class="pencairan-add">
	<h1 class="text-center">Form Pengajuan Pencairan</h1>
</section>

<section class="pencairan-add-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">

						<a href="<?php echo base_url() ?>Backend/Pencairan" class="btn btn-secondary mb-5">
							<i class="fa fa-arrow-left"></i> Kembali
						</a>

						<?php echo form_open('Backend/Pencairan/do_post') ?>

							<div class="form-group">
								<?php 
									echo form_label('Nomor');
									$data = array(
										'class' => 'form-control',
										'name' => 'nomor_pencairan',
										'placeholder' => 'Nomor di isi oleh bagian finance',
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
										'value' => $item->fullname,
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
										'value' => $roleAkun,	
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
										'placeholder' => 'Masukan Nama Project',
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
									);
									echo form_input($data);
								?>
							</div>
							
							<div class="form-group">
								<?php 
									
									$data = array(
										'class' => 'btn btn-primary',
										'value' => 'Simpan',
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
