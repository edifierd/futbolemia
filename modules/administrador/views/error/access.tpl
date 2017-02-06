<h1 style="color:#F00;">{if isset($mensaje)} {$mensaje}{/if}</h1>

<p>&nbsp;</p>

<a href="{$_layoutParams.root}administrador">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

{if (!Session::get('autenticado'))}

| <a href="{$_layoutParams.root}administrador/login">Iniciar Sesi&oacute;n</a>

{/if}