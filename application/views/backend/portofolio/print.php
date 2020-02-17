 
<style>
	th {
		border: 1px solid black;
		border-collapse: collapse;
		/* font-size: 50px; */
	}
	td#data {
		border: 1px solid black;
		border-collapse: collapse;
		/* width: 50%; */
		/* font-size: 40px; */
	}
	td#nodata {
		border: 1px solid black;
		border-collapse: collapse;
		/* width: 10px; */
		/* font-size: 50px; */
	}
	td#lokasi {
		border: 1px solid black;
		border-collapse: collapse;
		/* width: 150px; */
		/* font-size: 50px; */
	}
	td#tglselesai {
		border: 1px solid black;
		border-collapse: collapse;
		/* width: 100px; */
		/* font-size: 50px; */
	}
</style>
<section class="print">
	<table>
		<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Pekerjaan</th>
				<th rowspan="2">Sub Bidang Pekerjaan</th>
				<th rowspan="2">Lokasi</th>
				<th colspan="2">Pemberi Tugas / Pejabat Pembuat Komitmen</th>
				<th colspan="2">Kontrak</th>
				<th colspan="2">Tanggal Selesai Menurut</th>
			</tr>
			<tr>
				<th>Nama</th>
				<th>Alamat / Telepon</th>
				<th>No / Tanggal</th>
				<th>Nilai</th>
				<th>Kontrak</th>
				<th>BA Serah Terima</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach($portofolio as $item) 
			{
				if($item->pekerjaan)
				{
					$pekerjaan = $item->pekerjaan;
				}else{
					$pekerjaan = 'belum ada data';
				}
				if($item->sub_bidang)
				{
					$sub_bidang = $item->sub_bidang;
				}else{
					$sub_bidang = 'belum ada data';
				}
				if($item->lokasi)
				{
					$lokasi = $item->lokasi;
				}else{
					$lokasi = 'belum ada data';
				}
				if($item->nama_pejabat)
				{
					$nama_pejabat = $item->nama_pejabat;
				}else{
					$nama_pejabat = 'belum ada data';
				}
				if($item->alamat_pejabat)
				{
					$alamat_pejabat = $item->alamat_pejabat;
				}else{
					$alamat_pejabat = 'belum ada data';
				}
				if($item->nomor_kontrak)
				{
					$nomor_kontrak = $item->nomor_kontrak;
				}else{
					$nomor_kontrak = 'belum ada data';
				}
			
				if($item->tgl_kontrak != '0000-00-00'){
					$tglkontrak = 'Tanggal ' . date('d-m-Y',strtotime($item->tgl_kontrak));
				}
				else {
					$tglkontrak = '';
				}

				if($item->tgl_selesai != '0000-00-00'){
					$tglselesai = date('d-m-Y',strtotime($item->tgl_selesai))  ;
				}
				else {
					$tglselesai = '';
				}

				if($item->tgl_ba != '0000-00-00'){
					$tglba =  date('d-m-Y',strtotime($item->tgl_ba)) ;
				}
				else {
					$tglba = '';
				}
			?>
				<tr>
					<td id="nodata"><?php echo $no++ ?></td>
					<td id="data"><?php echo $pekerjaan?></td>
					<td id="data"><?php echo $sub_bidang?></td>
					<td id="lokasi"><?php echo $lokasi?></td>
					<td id="data"><?php echo strtoupper($nama_pejabat) ?></td>
					<td id="data"><?php echo strtoupper($alamat_pejabat) ?></td>
					<td id="data"><?php echo strtoupper($nomor_kontrak) ?>  <br> <?php echo $tglkontrak ?> </td>
					<td id="data">Rp. <?php echo number_format($item->nilai,2)?></td>
					<td id="tglselesai"><?php echo $tglselesai?></td>
					<td id="tglselesai"><?php echo $tglba?></td>
					
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	<div class="total-nilai">
		<h2>Total Nilai Kontrak : Rp. <?php echo number_format($total_nilai_tahun)  ?></h2>
	</div>
</section>
