{include file="header.tpl"}

<h1>{$jugador}</h1>
<!-- CSS only -->
<ul class="list-group">
    {if !isset($smarty.session.USER_ID)}
        {foreach from=$jugadorArrays item=$jugador}
            <li class="list-group-item list-group-item-action list-group-item-primary"><a href='detalles/{$jugador->id}'>Nombre: {$jugador->nombre}</a></li>
           
        {/foreach}
        
    {else}
        {include file="formjugador.tpl"}
        {foreach from=$jugadorArrays item=$jugador}
            <li class="list-group-item list-group-item-action list-group-item-primary"><a href="borrar/{$jugador->id}" type="button" class="btn btn-outline-danger">Borrar</a>
            <a href="showedit/{$jugador->id}" type="button" class="btn btn-outline-danger">editar</a>
             Nombre: <a href='detalles/{$jugador->id}'>{$jugador->nombre}</a></li>
            
        {/foreach}
    {/if}
</ul>
