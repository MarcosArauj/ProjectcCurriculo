<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header");?>
<?php require $this->checkTemplate("navebar_register");?>

<main role="main">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4"> Buscar Curriculos </h4>
    </div>
<section class="container col-md-6">
<div class="alert_message">
    <?php echo flash(); ?>
</div>
    <div class="row">
    <div class="form-group col-md-8">

            <div id="formacao">
                <form action="/search/curriculum">
                <div class="input-group">
                    <input  type="text" name="search" class="form-control search" placeholder="Busca por Fomação" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Buscar &nbsp; <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
                </form>
            </div>
            <div id="sexo">
                <form action="/search/curriculum">
                    <div class="input-group">
                    <select class="form-control search col-md-9" name="search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <option value="">Selecione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                        <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Buscar &nbsp; <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="selecao">
                <div  style="color: #0062cc">
                    <h4 class="text-center"><b>Selecione um filtro para a busca</b></h4>
                </div>
            </div>
    </div>
    <div class="form-group col-md-4">
        <select class="form-control search" id="filtro">
            <option value="">Selecione...</option>
            <option value="Formação">Formação</option>
            <option value="Sexo">Sexo</option>
        </select>
    </div>
    </div>
</section>
<section class="container col-md-6">
    <?php if( $curriculum ){ ?>
    <div class="card bg-info">
        <h4 class="text-center">Curriculos</h4>
        <div class="card-body">
            <table class="table table-striped border-success">
                <thead>
                <tr>
                    <th style="width: 10px"><strong>#</strong></th>
                </tr>
                </thead>
            <tbody>
            <?php $counter1=-1;  if( isset($curriculum) && ( is_array($curriculum) || $curriculum instanceof Traversable ) && sizeof($curriculum) ) foreach( $curriculum as $key1 => $value1 ){ $counter1++; ?>
            <tr>
           <td><a href="<?php echo site('root'); ?>/curriculum/<?php echo htmlspecialchars( $value1["cod_curriculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank"> <?php echo htmlspecialchars( $value1["id_pessoa"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></td>
                <td> <?php echo htmlspecialchars( $value1["primeiro_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <ul class="pagination justify-content-end">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li  class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php } ?>
</section>
</main>

<?php require $this->checkTemplate("footer");?>