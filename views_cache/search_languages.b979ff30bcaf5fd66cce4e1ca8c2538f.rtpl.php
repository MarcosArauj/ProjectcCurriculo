<?php if(!class_exists('Rain\Tpl')){exit;}?><form action="/search/curriculum">
<div class="input-group">
    <select class="form-control custom-select search col-md-9" name="search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <?php $counter1=-1;  if( isset($lang_cad) && ( is_array($lang_cad) || $lang_cad instanceof Traversable ) && sizeof($lang_cad) ) foreach( $lang_cad as $key1 => $value1 ){ $counter1++; ?>
        <option value="<?php echo htmlspecialchars( $value1["idioma_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idioma_pt"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        <?php } ?>
    </select>
    <input type="hidden"  name="filter" value="Idioma">
    <div class="input-group-append">
        <button class="btn btn-success" type="submit">Buscar &nbsp; <i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
</div>
</form>