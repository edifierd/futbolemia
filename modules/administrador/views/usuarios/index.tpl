<style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2> BIENVENIDO AL PANEL DE ADMINISTRACIÓN </h2>

<h3>Iniciar Sesi&oacute;n</h3>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Usuario: </td>
            <td><input type="text" name="usuario" value="{$datos.usuario|default:""}" /></td>
        </tr>

        <tr>
            <td style="text-align: right;">Password: </td>
            <td><input type="password" name="pass" /></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"><li class="glyphicon glyphicon-ok" style="margin-right:7px;"> </li> Entrar</button></p>
</form>