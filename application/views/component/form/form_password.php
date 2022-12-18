<div class="content shadow p-4 my-4">
    <form method="post" action="<?= base_url(uri_string())?>">
        <input type="hidden" name="id" value="<?=$id_user?>">
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
                    />
                       <div class="input-group-append">
                           <a class="input-group-text" href=""
                      ><i class="fa fa-eye-slash" aria-hidden="true"></i
                        ></a>
                       </div>
                    
                  </div>
                </div>
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
                        name="new"
                        />
                    <div class="input-group-append">
                        <a class="input-group-text" href=""
                           ><i class="fa fa-eye-slash" aria-hidden="true"></i
                            ></a>
                    </div>

                </div>
            </div>
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
                        name="new_confirm"
                        />
                    <div class="input-group-append">
                        <a class="input-group-text" href=""
                           ><i class="fa fa-eye-slash" aria-hidden="true"></i
                            ></a>
                    </div>

                </div>
            </div>
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