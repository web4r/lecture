<section class="portofolio-head">
	<h1 class="text-center">Data Portofolio Perusahaan</h1>
	<?php if ($this->session->flashdata('delete')): ?>
		<div class="alert alert-success	">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('delete'); ?>
			</strong> 
		</div>
	<?php endif; ?>
</section>

<section class="portofolio-body mt-5">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-3">
				<div class="card border-left-primary shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
						<a href="<?php echo base_url() ?>Backend/Portofolio/post" class="btn btn-primary">
							<i class="fa fa-plus"></i> Portofolio
						</a>
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-md-4">
				<div class="card border-left-danger shadow">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
							<?php echo form_open('Backend/Portofolio/print',array('class' => 'form-inline')) ?>
								<div class="form-group">
									<?php 
											$data = array(
												'class' => 'form-control',	
												'name' => 'tahun',
												'placeholder' => 'Input Tahun Kontrak',
												'required' => 'required'
											);
											echo form_input($data);
										?>

									<?php 
										$data = array(
											'class' => 'btn btn-danger',
											'value' => 'Print',
											'name' => 'print'
										);
										echo form_submit($data);
									?>
										
								</div>
						
								<?php echo form_close(); ?>
							</div>
							<?php if ($this->session->flashdata('no_data')): ?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>
										<?php echo $this->session->flashdata('no_data'); ?>
									</strong> 
								</div>
							<?php endif; ?>
						</div>
				</div>
				
			</div>
			<div class="col-md-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Kontrak</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $total_kontrak  ?></div>
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Nilai Kontrak</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format($total_nilai)  ?></div>
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
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered" width="100%" cellspacing="0" id="portofolioTable">
						<thead>
							<tr>
								<th>Tahun</th>
								<th>Pekerjaan</th>
								<th>Lokasi</th>
								<th>Tanggal Kontrak</th>
								<th>Nilai Kontrak</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($portofolio as $item) 
							{
								
								$tglkontrak = $item->tgl_kontrak;
								if($tglkontrak != '0000-00-00')
								{
									$dateformat = date('d-m-Y',strtotime($tglkontrak)); 
								} 
								else {
									$dateformat = '<span class="badge badge-danger">Belum ada tanggal</span>';
								}
							?>
							<tr>
								<td><?php echo $item->tahun ?></td>
								<td><?php echo $item->pekerjaan ?></td>
								<td><?php echo $item->lokasi ?></td>
								<td><?php echo $dateformat ?></td>
								<td><?php echo number_format($item->nilai,2)  ?></td>
								<td>
									<a href="<?php echo base_url() ?>Backend/Portofolio/view/<?php echo $item->id_portofolio ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
									<a href="<?php echo base_url() ?>Backend/Portofolio/delete/<?php echo $item->id_portofolio ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									<a href="<?php echo base_url() ?>Backend/Portofolio/edit/<?php echo $item->id_portofolio ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
								</td>
							</tr>
							<?php 
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
