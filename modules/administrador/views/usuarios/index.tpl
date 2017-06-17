<div class="row" style="margin-top:20px">
  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form name="form1" method="post" action="" role="form">
      <input type="hidden" value="1" name="enviar" />
      <fieldset>
        <p class="h2">Administración Futbolemia</p>
        <hr class="colorgraph">
        <div class="form-group">
          <input type="text" name="usuario" value="{$datos.usuario|default:""}" id="email" class="form-control input-lg" placeholder="Usuario" />
        </div>
        <div class="form-group">
          <input type="password" name="pass" id="password" class="form-control input-lg" placeholder="Contraseña"/>
        </div>
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Iniciar Sesión">
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
