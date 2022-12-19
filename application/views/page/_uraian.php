<div class="row">
    <div class="col-md-8">
        <h2>Uraian Pekerjaan</h2>
    </div>
    <div class="col-md-4">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb shadow p-3 mb-5 rounded">
                <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('realisasi')?>">Realisasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Uraian</li>
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
$this->load->view('component/form/form_uraian');
if (isset($pekerjaan)) {
    $this->load->view('component/tabel/tabel_uraian');
}
?>
