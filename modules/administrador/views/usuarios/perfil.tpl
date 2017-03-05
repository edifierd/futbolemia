
<h3>Mi Perfil</h3>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
  			<div class="panel-heading">Datos Personales</div>
  			<div class="panel-body">
    			<ul class="list-group">
  					<li class="list-group-item">Apellido y Nombre: <b>{$usuario.apellido} {$usuario.nombre}</b></li>
  					<li class="list-group-item">DNI: {$usuario.dni}</li>
                    <form name="form1" method="post" action="" class="form">
        				<input type="hidden" value="1" name="guardar" />
  						<li class="list-group-item">
                            <p>
            				Email: {$usuario.email|default:""}
        					</p>
                         </li>
                         <li class="list-group-item">
                         	<label>CAMBIO DE CONTRASEÑA: </label>
                         	<p>
            				<label>Contraseña Actual: </label>
            				<input type="password" name="passActual" />
        					</p>
                            
                         	<p>
            				<label>Nueva Contraseña: </label>
            				<input type="password" name="passNueva" />
        					</p>

        					<p>
            				<label>Confirmar Contraseña: </label>
            				<input type="password" name="passConfirmar" />
       						</p>
                         </li>
                         <li class="list-group-item" style="text-align:center;">
                         	<button type="submit" class="btn btn-primary">Modificar Perfil</button>
                         </li>
                    </form>      
				</ul>
  			</div>
		</div>
	</div>
</div>