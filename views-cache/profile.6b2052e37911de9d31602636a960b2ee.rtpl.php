<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("navebar");?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Outros Cursos <?php echo htmlspecialchars( $user["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
    </div>

    <div class="alert_message col-md-8">
        <?php echo flash(); ?>

    </div>
    <form action="/curriculum/personal_data/photo" method="post" enctype="multipart/form-data">
    <div class="col-md-8">
        <div  class="card border-success">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p> Id:  <?php echo htmlspecialchars( $user["id_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                        <img class="img-circle" src="<?php echo htmlspecialchars( $user["foto_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nova_imagem">

                        <label id="userphoto" for="foto_usuario">Enviar Foto</label>
                        <input type="file" name="foto_usuario" id="foto_usuario" onchange="carregarImagem(event)"/>
                    </div>
                    <!-- Coluna 2 -->
                    <div class="col">
                       
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-danger float-left" href="/user/other_courses" title="Voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar </a>
                <div class="float-right">
                    <button class="btn btn-md btn-success" type="submit"><i class="fa fa-plus-circle" aria-hidden="true"></i> Registrar Foto</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    var carregarImagem = function(){
        var reader = new FileReader();
        reader.onload = function(){

            var output = document.getElementById('nova_imagem');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>