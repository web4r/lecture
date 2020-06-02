
<?php if ($this->session->flashdata('permission_denied')): ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('permission_denied'); ?>
	</strong> 
</div>
<?php endif; ?>
<div class="container">
    <section class="header-promote mt-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 co-lg-12">
                <div class="card" id="bg-promoted-note">
                    <div class="card-body">
                        Page Promote : 
                    </div>
                </div>
            </div>
        </div> 
    </section>
</div>


<div class="container-fluid" id="bg-placeholder">
    <section class="block-lecture mt-4">
        
        <h1 class="text-center text-white pt-3 pb-3">
            <i class="fas fa-graduation-cap"></i> Kelas Terbaru
        </h1>
        
        <div class="row pb-4 text-center">
            <?php foreach($contentClass as $content) { ?>
            <div class="col-md-6 col-lg-4">
                <div class="card">
					<div class="mx-auto pt-2">
						<img class="card-img-top img-fluid" style="width: 240px;height:240px;" src="<?php echo base_url() ?>assets/img/bannerClass/<?php echo $content->class_banner ?>" alt="Card image cap">
					</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $content->class_name ?></h5>
                        <a href="<?php echo base_url() ?>Frontend/Lecture/detailClassWeb/<?php echo $content->id_class ?>" class="btn btn-primary"><i class="fa fa-eye"></i> Detail Kelas</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </section>
</div>
