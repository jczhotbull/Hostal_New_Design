<!-- Small modal update pass -->

<div class="modal fade" id="password<?php echo $row_usuarios['id_per']; ?>"
data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">  <!-- tamaños modal-sm  modal-lg    modal-full-width --> 

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-dark" id="mySmallModalLabel"><i class="fa-regular fa-bookmark fa-lg"></i></h5>
      <!--          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button> --> 
            </div>



            <div class="modal-body">

<form method="post">




<div class="mb-0">
     
<label class="form-label">Set new password</label>

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key fa-lg"></i></span>
<input type="password" maxlength="16" class="form-control" id="pass_per_mod" name="pass_per_mod" placeholder="*******" aria-describedby="basic-addon1" required>
        </div>

</div>








              
            </div>


            <div class="modal-footer">






<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-lg"></i></button>

<button type="submit" class="ms-2 btn btn-outline-dark" name="editar_password_personal" value="<?php echo $row_usuarios['id_per']; ?>" ><i class="fa-regular fa-floppy-disk fa-lg"></i></button>

</form> 

            </div>


        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->










