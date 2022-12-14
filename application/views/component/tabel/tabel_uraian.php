<div class="content shadow p-4 my-4">
    <h2 class="my-4">Daftar Uraian Pekerjaan</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="bg-info text-white">
                    <th scope="col-4">Uraian Pekerjaan</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($pekerjaan)) {
                    foreach ($pekerjaan as $pkj) {
                        ?>
                        <tr>
                            <td><?=$pkj->uraian_pkrj?></td>
                            <td><?=$pkj->satuan?></td>
                            <td><?=$pkj->volume?></td>
                            <td><a class="btn-xs p-2 btn-warning" href="<?= base_url('realisasi/uraian/edit/'.$pkj->id_pkrj)?>"><i class="fa-solid fa-edit"></i>Edit</a></td>
                        </tr>
                    <?php
                }}else{
                    echo '<tr>
                            <td class="text-center" colspan="4">Uraian Belum Dibuat</td>
                        </tr>';
                }
                ?>
                        
            </tbody>
        </table>
    </div>
</div>