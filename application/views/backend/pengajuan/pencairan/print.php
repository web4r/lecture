<style>
	table.rincian {
		width: 100%;
		text-align: center;
	}
	table.rincian tbody.rincian-data , tr.rincian-row , th, td#data-rincian{
		border: 1px solid #444;
	}

	
	td#watermarkuser{
		color:lightgrey;
		font-size:16px;
		text-align: left;
		padding-top: 0px;
		padding-left: 100px;
	}
	td#watermarkfinance{
		color:lightgrey;
		font-size:16px;
		text-align: left;
		padding-left: 100px;
	}
	td#watermarkdk{
		color:lightgrey;
		font-size:16px;
		text-align: left;
		padding-left: 100px;
	}
	td#watermarkdu{
		color:lightgrey;
		font-size:16px;
		text-align: left;
		padding-left: 100px;
	}
</style>

<section class="print-data">
	<table>
		<tr>
			<td>Nomor</td>
			<td>:</td>
			<td><?php echo $pencairan->nomor_pencairan ?></td>
		</tr>
		<tr>
			<td>Nama Pemohon</td>
			<td>:</td>
			<td><?php echo strtoupper($pencairan->nama_pemohon)  ?></td>
		</tr>
		<tr>
			<td>Bagian</td>
			<td>:</td>
			<td><?php echo $pencairan->bagian ?></td>
		</tr>
		<tr>
			<td>Nama Project</td>
			<td>:</td>
			<td><?php echo $pencairan->nama_project ?></td>
		</tr>
		<tr>
			<td>Tanggal Pengajuan</td>
			<td>:</td>
			<td><?php echo date('d-m-Y', strtotime($pencairan->tgl_pengajuan)) ?></td>
		</tr>
	</table>
</section>

<section class="print-rincian">
	<h2 style="text-align: center;">RINCIAN RENCANA PENGGUNAAN ANGGARAN</h2>
	<table class="rincian">
		<thead>
			<tr>
				<th>Nama Barang</th>
				<th>Jumlah</th>
				<th>Satuan</th>
				<th>Harga Satuan</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody class="rincian-data">
			<?php 
				foreach($rincian as $item) {
			?>
			<tr class="rincian-row">
				<td id="data-rincian"><?php echo $item->nama_barang ?></td>
				<td id="data-rincian"><?php echo $item->jumlah ?></td>
				<td id="data-rincian"><?php echo $item->satuan ?></td>
				<td id="data-rincian">Rp. <?php echo number_format($item->harga_satuan,2) ?></td>
				<td id="data-rincian">Rp. <?php echo number_format($item->total,2)  ?></td>
			</tr>
			<?php 
				}
			?>
		</tbody>
	</table>
	<h4>Jumlah Anggaran : Rp. <?php echo number_format($total,2) ?></h4>
</section>

<section class="print-approve">
	<table class="rincian">
		<thead>
			<tr>
				<th>Diajukan Oleh</th>
				<th>Pemeriksa</th>
				<th>Disetujui Oleh</th>
				<th>Mengetahui</th>
			</tr>
		</thead>
		<tbody>
			<tr text-rotate="40">
				<td id="watermarkuser"><?php echo $pencairan->approve_user ?></td>
				<td id="watermarkfinance"><?php echo $pencairan->approve_finance ?></td>
				<td id="watermarkdk"><?php echo $pencairan->approve_dk ?></td>
				<td id="watermarkdu"><?php echo $pencairan->approve_du ?></td>
			</tr>
		</tbody>
	</table>
</section>
