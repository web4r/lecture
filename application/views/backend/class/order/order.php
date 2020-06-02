<div class="container-fluid">
	<h1 class="text-center">Kelas Order</h1>
	<?php if ($this->session->flashdata('order_update')): ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('order_update'); ?>
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
				<?php foreach($orderList as $order) { ?>
					<tr>
						<td><?php echo $order->class_name ?></td>
						<td><?php echo $order->fullname ?></td>
						<td><?php echo ($order->class_status == 1) ? '<span class="badge badge-danger">Belum Aktif</span>' : '<span class="badge badge-primary">Sudah Aktif</span>' ?></td>
						<?php echo form_open('Backend/Order/activateOrder/'.$order->id_student_lecture) ?>
						<td>
							<?php 
								if($order->class_status == 1)
								{
							?>
									<button type="submit" class="btn btn-outline-success">Aktifasi Kelas</button>
							<?php 
								}
							?>
							<?php
								if($order->class_status == 2)
								{
							?>
								<button type="submit" class="btn btn-outline-danger">Non Aktifasi Kelas</button>
							<?php 
								}
							?>
						</td>
						<?php echo form_close() ?>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
