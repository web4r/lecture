<?php 
	// $api = file_get_contents("http://quotes.stormconsultancy.co.uk/random.json");
	// $data = json_decode($api);

	$ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,'http://quotes.stormconsultancy.co.uk/random.json');
    
    
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    
    $output = curl_exec($ch);
    
    $data = json_decode($output);
    
    curl_close($ch);
?>

<?php if ($this->session->flashdata('permission_denied')): ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('permission_denied'); ?>
	</strong> 
</div>
<?php endif; ?>

<!-- Jumbotron -->
<!-- <div class="jumbotron jumbotron-img jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Belajar <span>Koding</span> itu <span>Mudah</span></h1>
			<a href="#" class="btn btn-success">Mari Belajar</a>
			
		</div>
	</div> -->
<style>
	#counter{
		/* color:blue; */
		font-size: 48px;
		font-weight: bold;
		text-align: center;
		border:1px solid #444;
		box-shadow: 10px 10px #444;
	}
	
</style>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6">
			<h3><q> <?php echo $data->quote ?> </q></h3>
			<div id="quote">
				<i>Quote By : <?php echo $data->author ?></i>
			</div>
			<div class="mt-5 mb-5">
				<button class="btn btn-outline-primary">
					Explore Kelas
				</button>
			</div>
		</div>
		<div class="col-md-6">
			<img class="img-fluid" src="<?php echo base_url() ?>assets/img/front.png" alt="">
		</div>
	</div>
</div>
<div class="container-fluid post-news bg-gray-white">
	<div class=" row text-center">
		<div class="col-md-4 my-5 mx-auto">
			<div class="card border-0 shadow-lg">
				<div class="card-body">
					<svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-journal-code" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
					<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					<path fill-rule="evenodd" d="M8.646 5.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 8 8.646 6.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 8l1.647-1.646a.5.5 0 0 0 0-.708z"/>
					</svg>
					<h5 class="display-5">Belajar coding terstruktur</h5>
				<p>Nikmati berbagai materi baru</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 my-5 mx-auto">
			<div class="card border-0 shadow-lg">
				<div class="card-body">
				<svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-camera-video" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175l3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
				</svg>
					<h5 class="display-5">Dilengkapi dengan video tutorial</h5>
					<p>Agar Belajar jadi lebih paham</p>
				</div>
			</div>
			
		</div>
		<div class="col-md-4 my-5 mx-auto">
		<div class="card border-0 shadow-lg">
			<div class="card-body">
			<svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-wifi" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path d="M15.385 6.115a.485.485 0 0 0-.048-.736A12.443 12.443 0 0 0 8 3 12.44 12.44 0 0 0 .663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.717 2.164.204.148.489.13.668-.049z"/>
			<path d="M13.229 8.271c.216-.216.194-.578-.063-.745A9.456 9.456 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.577 1.336c.205.132.48.108.652-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.472 6.472 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.408.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.611-.091l.015-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .708 0l.707-.707z"/>
			</svg>
				<h5 class="display-5">Akses dimanapun dan kapanpun bisa</h5>
				<p>Belajar jadi lebih Mudah</p>
			</div>
		</div>
			
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-4">
			<div class="card border-0 shadow-lg">
				<div class="card-body">
					<div id="counter">
						<span class="counter-class"><?php echo $total_class ?></span>
						<h4>Kelas</h4>	
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card border-0 shadow-lg">
				<div class="card-body">
					<div id="counter">
						<span class="counter-student"><?php echo $total_student ?></span>
						<h4>Peserta</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card border-0 shadow-lg">
				<div class="card-body">
					<div id="counter">
						<span class="counter-materi"><?php echo $total_materi ?></span>
						<h4>Materi</h4>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	

<div class="container-fluid" id="bg-placeholder">
    <section class="block-lecture mt-4">
        
        <h1 class="text-center pt-3 pb-3 mb-5">
            <i class="fas fa-graduation-cap"></i> DAFTAR KELAS
        </h1>
        
        <div class="row pb-4 text-center">
			<?php if(!empty($contentClass)){
			foreach($contentClass as $content) {
				 ?>
            <div class="col-md-4 mb-5">
				<div class="card mx-auto border-1 shadow-lg">
					<div class="inner">
						<img class="card-img-top img-fluid" style="max-width:400px;height:248px;margin-top:-30px;" src="<?php echo base_url() ?>assets/img/bannerClass/<?php echo $content->class_banner ?>" alt="Card image cap">
					</div>
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $content->class_name ?></h5>
						
						<a href="<?php echo base_url() ?>Frontend/Lecture/detailClassWeb/<?php echo $content->id_class ?>" class="btn btn-outline-primary"><i class="fa fa-eye"></i> Detail Kelas</a>
					</div>
				</div>   
            </div>
			<?php } 

		}  else{
			echo '<div class="col-md-6 col-lg-4">
			<div class="card mx-auto">
				
				<div class="card-body">
					belum ada data
				</div>
			</div>   
		</div>';
		}?>
            
        </div>
    </section>
</div>
