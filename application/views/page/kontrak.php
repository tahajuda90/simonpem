<div class="row">
    <div class="col-md-8">
        <h2>Kontrak Pekerjaan</h2>
    </div>
    <div class="col-md-4">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb shadow p-3 mb-5 rounded">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <?php 
    if(empty($action)){
        $this->load->view('component/tabel/tabel_kntrkpkrj');
    } else {
        $this->load->view('component/form/form_kntrkpkrj');
    }
    ?>
</div>