<?php if(!class_exists('Rain\Tpl')){exit;}?><form action="/search/curriculum">
<div class="input-group">
    <select class="form-control custom-select search col-md-9" name="search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <option value="">Selecione o Sexo</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        <option value="Outro">Outro</option>
    </select>
    <input type="hidden"  name="filter" value="Sexo">
    <div class="input-group-append">
        <button class="btn btn-success" type="submit">Buscar &nbsp; <i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
</div>
</form>