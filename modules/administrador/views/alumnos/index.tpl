<h3>Listado de Alumnos</h3><br>

<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="javascript:history.back()" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
        <li><a href="{$_layoutParams.root}administrador/alumnos/nuevo" > Nuevo Alumno</a></li>
      </ul>
      <form role="search" method="post" action="{$_layoutParams.root}administrador/alumnos/index" class="navbar-form navbar-left">
        <input type="hidden" value="1" name="buscar" />
        <div class="input-group">
          <div class="input-group-btn search-panel">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              <span id="search_concept">Todas las sedes</span> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#todos">Todas las sedes</a></li>
              <li><a href="#La Cumbre">La Cumbre</a></li>
              <li><a href="#Los Hornos">Los Hornos</a></li>
              <li><a href="#El Retiro">El Retiro</a></li>
            </ul>
          </div>
          <input type="hidden" name="sede" value="todos" id="sede">
          <input type="text" class="form-control" placeholder="Nombre, Apellido o DNI de un alumno" name="casillero" id="casillero">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          </span>
        </div>
      </form>
    </div>
  </div>
</nav>

<table class="table table-striped">
  <tr>
    <th>Apellido Nombre </th>
    <th>DNI</th>
    <th>Sede y Grupo inscripto</th>
    <th colspan="2" style="text-align:center;">Acciones</th>
  </tr>

  {if isset($alumnos) && count($alumnos)}
  {foreach from=$alumnos item=a}
  {if $a.estado == 'a'}
  <tr id="fila{$a.id_alumno}">
    <td><a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}">{$a.apellido} {$a.nombre}</a></td>
    <td>{$a.dni}</td>
    <td>{$a.sede} - {$a.tipo} - {$a.horario} </td>
    <td style="text-align:center;"><a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}" class="btn btn-primary btn-xs" >Ver Perfil</a></td>
    <td style="text-align:center;">
      {* <a href="{$_layoutParams.root}administrador/alumnos/delete/{$a.id_alumno}" class="btn btn-danger btn-xs" onClick="javascript: return confirm('¿Estas seguro?');" >
      Suspender
    </a> *}
    <a href="#" idAlumno="{$a.id_alumno}" class="btn btn-danger btn-xs suspender">
      <i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i>
      Suspender
    </a>
  </td>
</tr>
{else}
<tr style="text-decoration:line-through;">
  <td><a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}">{$a.apellido} {$a.nombre}</a></td>
  <td>{$a.dni}</td>
  <td>{$a.sede} - {$a.tipo} - {$a.horario} </td>
  <td colspan="2" style="text-align:center;">
    <a href="{$_layoutParams.root}administrador/alumnos/reactivar/{$a.id_alumno}" class="btn btn-success btn-xs">Reactivar</a>
  </td>
</tr>
{/if}
{/foreach}
{else}
<tr>
  <td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No se encontraron alumnos</h3></td>
</tr>
{/if}

</table>
