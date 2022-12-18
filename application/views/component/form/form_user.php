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
       <div
                  class="form-group mt-4"
                  id="show_hide_password"
                >
            <label class="form-control-placeholder" for="inputPass"
                    >Password</label
                  >
                 
                 
                  <div class="input-group">
                       <input
                    type="password"
                    class="form-control"
                    id="inputPass"
                    name="password"
                    pattern="<?=$pattern?>"
                    />
                       <div class="input-group-append">
                           <a class="input-group-text" href=""
                      ><i class="fa fa-eye-slash" aria-hidden="true"></i
                        ></a>
                       </div>
                    
                  </div>
                </div>
        <?php if($button == 'Edit'):?>
        <div
                class="form-group mt-4"
                id="show_hide_password2"
                >
                <label class="form-control-placeholder" for="inputPass"
                       >Konfirmasi Password</label
                >


                <div class="input-group">
                    <input
                        type="password"
                        class="form-control"
                        id="inputPass"
                        name="password_confirm"
                        />
                    <div class="input-group-append">
                        <a class="input-group-text" href=""
                           ><i class="fa fa-eye-slash" aria-hidden="true"></i
                            ></a>
                    </div>

                </div>
            </div>
        <?php endif ?>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" name="submit" type="submit">
                <?=$button?>
            </button>
        </div>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
$("#show_hide_password a").on("click", function (event) {
    event.preventDefault();
    if ($("#show_hide_password input").attr("type") === "text") {
      $("#show_hide_password input").attr("type", "password");
      $("#show_hide_password i").addClass("fa-eye-slash");
      $("#show_hide_password i").removeClass("fa-eye");
    } else if ($("#show_hide_password input").attr("type") === "password") {
      $("#show_hide_password input").attr("type", "text");
      $("#show_hide_password i").removeClass("fa-eye-slash");
      $("#show_hide_password i").addClass("fa-eye");
    }
  });
  
  $("#show_hide_password2 a").on("click", function (event) {
    event.preventDefault();
    if ($("#show_hide_password2 input").attr("type") === "text") {
      $("#show_hide_password2 input").attr("type", "password");
      $("#show_hide_password2 i").addClass("fa-eye-slash");
      $("#show_hide_password2 i").removeClass("fa-eye");
    } else if ($("#show_hide_password2 input").attr("type") === "password") {
      $("#show_hide_password2 input").attr("type", "text");
      $("#show_hide_password2 i").removeClass("fa-eye-slash");
      $("#show_hide_password2 i").addClass("fa-eye");
    }
  });
});
</script>