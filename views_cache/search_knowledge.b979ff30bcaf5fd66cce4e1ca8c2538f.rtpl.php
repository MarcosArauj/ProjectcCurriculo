<?php if(!class_exists('Rain\Tpl')){exit;}?><form action="/search/curriculum" >
<div class="input-group">
    <input type="text" class="form-control search" name="search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="campo_conhecumento" placeholder="Digite area de conhecimento desejada" autocomplete="off">
    <input type="hidden" name="filter" value="Conhecimento">
    <div class="input-group-append">
        <button class="btn btn-success" type="submit">Buscar &nbsp; <i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
</div>
</form>