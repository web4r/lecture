<section class="edit-rincian">
	<h1 class="text-center">Form Edit Rincian</h1>
</section>

<section class="edit-rincian-body">
<?php echo form_open('Backend/Pencairan/do_update_rincian/'.$pencairan->id_pencairan.'/'.$pencairan->id_rincian_pencairan) ?>
			<div class="form-group">
				<?php 
				echo form_label('Nama Barang');
				$data = array(
					'class' => 'form-control',
					'type' => 'text',
					'name' => 'nama_barang',
					'value' => $pencairan->nama_barang
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
					'name' => 'jumlah',
					'value' => $pencairan->jumlah
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
					'name' => 'satuan',
					'value' => $pencairan->satuan
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
					'name' => 'harga_satuan',
					'value' => $pencairan->harga_satuan
				);
				echo form_input($data);
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
			</div>

		<?php echo form_close() ?>
</section>
