<h1>{$equipos}</h1>

{if !isset($smarty.session.USER_ID)}
    {foreach from=$equipoArrays item=$equipo}
        <li class="list-group-item list-group-item-action list-group-item-danger"><a href='jugadores/{$equipo->id_equipos}'>Nombre de equipo: {$equipo->equipo}</a>
        </li>
    {/foreach}
        
    {else}
<ul class="list-group">
    {include file="formagregarequipo.tpl"}
    {foreach from=$equipoArrays item=$equipo}
        <li class="list-group-item list-group-item-action list-group-item-danger"><a href='jugadores/{$equipo->id_equipos}'>Nombre de equipo: {$equipo->equipo}</a>
        <a href="borrar-equipo/{$equipo->id_equipos}" type="button" class="btn btn-outline-danger">Borrar</a>
        <a href="showeditequipo/{$equipo->id_equipos}" type="button" class="btn btn-outline-danger">editar</a>
        </li>

    {/foreach}
{/if}
</ul>