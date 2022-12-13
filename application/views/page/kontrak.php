<div class="row">
    <div class="col-md-8">
        <h2>Kontrak Pekerjaan</h2>
    </div>
    <div class="col-md-4">
        <nav aria-label="breadcrumb ">
             <ol class="breadcrumb shadow p-3 mb-5 rounded">
                <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Home</a></li>
                <?php
                if(count($this->uri->segment_array())>1){
                    echo '<li class="breadcrumb-item"><a href="'.base_url('kontrak').'">Kontrak</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>';
                }else{
                    echo '<li class="breadcrumb-item active" aria-current="page">Kontrak</li>';
                }
                ?>
                
            </ol>
        </nav>
    </div>
    <?php if($this->session->flashdata('error')){ ?>
    <div class="col-md-12">
        <div class="alert alert-dismissible alert-danger" role="alert">
            <button class="close" type="button" data-dismiss="alert">×</button>
            This is a success alert—check it out!
        </div>
    </div>
    <?php }?>
</div>
<?php
if (empty($button)) {
    $this->load->view('component/tabel/tabel_kntrkpkrj');
} else {
    $this->load->view('component/form/form_kntrkpkrj');
}
?>