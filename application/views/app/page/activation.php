<div class="container">
    <div class="row mt-5 mb-5">
        <?php if ($this->session->flashdata('accountActive')): ?>
        <div class="card bg-primary mx-auto">
            <div class="card-body text-white">
                <?php echo $this->session->flashdata('accountActive'); ?>
            </div>
        </div>
        <?php endif; ?>   
    </div>
    <div class="row mt-5 mb-5">
        <?php if ($this->session->flashdata('accountFailed')): ?>
        <div class="card bg-primary mx-auto">
            <div class="card-body text-white">
                <?php echo $this->session->flashdata('accountFailed'); ?>
            </div>
        </div>
        <?php endif; ?>   
    </div>
</div>
