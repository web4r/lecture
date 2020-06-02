
<div class="container">
	<div class="row mt-3">
		<div class="col-md-6 mx-auto">
			
			<div class="card">
				<div class="card-body">
					<h1 class="text-center">Detail Pembelian</h1>
					<h3 class="text-center"><?php echo strtoupper($this->session->userdata('fullname'))  ?></h3>
					<ul class="list-group">
						<li class="list-group-item">
							Anda membeli kelas : <?php echo $detailClass->class_name ?>
						</li>
						<li class="list-group-item">
							Kategori Kelas : <?php echo $detailClass->category_name ?>
						</li>
						<li class="list-group-item">
							Tipe kelas : <?php echo $detailClass->type_name ?>
						</li>
						<li class="list-group-item">
							Harga kelas : Rp. <?php echo $detailClass->class_price ?>
						</li>
						<li class="list-group-item">
							<?php if(empty($a->class_id)): ?>
							<?php echo form_open('Frontend/Lecture/completeOrder/'.$detailClass->id_class) ?>
							<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-users"></i> Gabung Kelas</button>
							<?php echo form_close() ?>
							<?php endif; ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
