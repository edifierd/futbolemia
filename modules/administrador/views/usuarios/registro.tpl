<h2>Dar de alta nuevo usuario</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="enviar" />

        <p>
            <label>Usuario: </label>
            <input type="text" name="usuario" value="{$datos.usuario|default:""}" />
        </p>

        <p>
            <label>Email: </label>
            <input type="text" name="email" value="{$datos.email|default:""}" />
        </p>
        
        <p>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="{$datos.nombre|default:""}" />
        </p>
        
        <p>
            <label>Apellido: </label>
            <input type="text" name="apellido" value="{$datos.apellido|default:""}" />
        </p>
        
        <p>
            <label>DNI: </label>
            <input type="text" name="dni" value="{$datos.dni|default:""}" />
        </p>

        <p>
            <label>Password: </label>
            <input type="password" name="pass" />
        </p>

        <p>
            <label>Confirmar: </label>
            <input type="password" name="confirmar" />
        </p>    

        <p>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </p>
    </form>
</div>