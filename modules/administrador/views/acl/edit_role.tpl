<style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2>Editar Role</h2>

<form name="form1" method="post" action="{$_layoutParams.root}administrador/acl/edit_role/{$datos.id_role}">
    <input type="hidden" value="1" name="guardar">
    
    <table class="table table-bordered" style="width: 350px;">
        <tr>
            <td style="text-align: right;">Role: </td>
            <td><input type="text" name="role" value="{$datos.role|default:""}"></td>
        </tr>
    </table>
        
    <p><button type="submit" class="btn btn-primary"> Modificar </button></p>
</form>