<?php if(isset($errors) && count($errors) !=0 ) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php foreach ($errors as $error){
            echo $error.'<br>';
        }?>
    </div>
<?php endif; ?>