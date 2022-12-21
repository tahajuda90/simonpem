<div class="row">
    <div class="col-md-8">
        <h2>Manajemen User</h2>
    </div>
    <?php if($this->session->flashdata('message')){ ?>
    <div class="col-md-12">
        <div class="alert alert-dismissible alert-danger" role="alert">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <?=$this->session->flashdata('message')?>
        </div>
    </div>
    <?php }?>
</div>
<?php
if(isset($button) && isset($identity)){
    $this->load->view('component/form/form_user');
}else if(isset ($button)){
    $this->load->view('component/form/form_password');
}else{
    $this->load->view('component/tabel/tabel_user');
}
?>
