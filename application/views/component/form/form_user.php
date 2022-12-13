<div class="content shadow p-4 my-4">
    <form method="post" action="<?= base_url(uri_string())?>">
        <div class="form-group">
            <label>E-mail</label>
            <input class="form-control" type="text" <?=($button=='Edit'?'readonly':'')?> value="<?=$email?>" name="email">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" <?=($button=='Edit'?'readonly':'')?> value="<?=$identity?>" name="identity">
        </div>
            <div class="form-group">
                <?php foreach ($groups as $group): ?>
                    <div class="form-check">
                            <?php
                            $gID = $group['id'];
                            $checked = null;
                            $item = null;
                            if (isset($currentGroups)) {
                                if (in_array(1, array_column($currentGroups, 'id'))) {
                                    $gID == 1 ? $checked =' checked="checked"':'';
                                } else {
                                    foreach ($currentGroups as $grp) {
                                        if ($gID == $grp->id) {
                                            $checked = ' checked="checked"';
                                            break;
                                        }
                                    }
                                }
                            }
                            ?>
                        <input type="radio" class="form-check-input" name="groups[]" value="<?php echo $group['id']; ?>"<?php echo $checked; ?>>
                        <label class="form-check-label" for="exampleCheck1">
        <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </label>
                    </div>
            <?php endforeach ?>
            </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" id="passInput" type="password" name="password" pattern="<?=$pattern?>">
        </div>
        <?php if($button == 'Edit'):?>
        <div class="form-group">
            <label>Password Confirm</label>
            <input class="form-control" id="passInput" type="password" name="password_confirm">
        </div>
        <?php endif ?>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" name="submit" type="submit">
                <?=$button?>
            </button>
        </div>
    </form>
</div>