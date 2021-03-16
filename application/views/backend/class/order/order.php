<div class="container-fluid">
	<h1 class="text-center">Kelas Order</h1>
	<?php if ($this->session->flashdata('order_update')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('order_update'); ?>
		</strong> 
	</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('order_non_update')): ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('order_non_update'); ?>
		</strong> 
	</div>
	<?php endif; ?>
	
	<div class="row">
		<div class="table-responsive">
			<table class="table" id="orderTable">
				<thead>
					<tr>
						
						<th>Nama Kelas</th>
						<th>Peserta</th>
						<th>Status Kelas</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				foreach($orderAdminList as $item) { 
					$class_status = $item->status_order;

					if($class_status == 1)
					{
						$statusClass = '<span class="badge badge-danger">Belum Aktif</span>';
					}
					if($class_status == 2)
					{
						$statusClass = '<span class="badge badge-primary">Sudah Aktif</span>';
					}
				?>
					<tr>
						
						<td><?php echo $item->class_name ?></td>
						<td><?php echo $item->fullname ?></td>
						<td><?php echo $statusClass ?></td>
						<td>

							<?php if($class_status == 1) : ?>
								<?php echo form_open('Backend/Order/activateOrder/'. $item->id_student_lecture) ?>
										<button data-toggle="tooltip" title="Akivasi Kelas" class="btn btn-secondary" type="submit"><i class="fa fa-window-close"></i></button>
								<?php echo form_close() ?>
							<?php endif; ?>
							<?php if($class_status == 2) : ?>
								<?php echo form_open('Backend/Order/nonOrder/'. $item->id_student_lecture) ?>
									<button data-toggle="tooltip" title="Non Akivasi Kelas" class="btn btn-info" type="submit"><i class="fa fa-check"></i></button>
								<?php echo form_close() ?>
							<?php endif; ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
