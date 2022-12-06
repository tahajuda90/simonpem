<div class="content shadow p-4 my-4">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mb-2">
            <a href="" class="text-decoration-none text-white"
            >Tambah <span class="pl-2"><i class="fa-solid fa-plus"></i></span
          ></a>
        </button>
    </div>
    <table id="satuanKerja" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Group</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($users as $user):
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php foreach ($user->groups as $group): ?>
                            <?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?><br/>
    <?php endforeach ?></td>
                    <td><?php echo ($user->active) ? anchor("Akses/deactivate/" . $user->id, lang('index_active_link')) : anchor("Akses/activate/" . $user->id, lang('index_inactive_link')); ?></td>
                    <td><a class="btn-sm p-1 btn-warning" href="<?= base_url('Akses/edit_user/'.$user->id)?>"><i class="fa-solid fa-edit"></i>edit</a></td>
                </tr>
                <?php
                $no++;
            endforeach;
            ?>
        </tbody>
    </table>
</div>