

<h1>{$equipos}</h1>

<ul class="list-group">
    {foreach from=$equipoArrays item=$equipo}
        <li class="list-group-item list-group-item-action list-group-item-danger"><a href='jugadores/{$equipo->id_equipos}'>Nombre de equipo: {$equipo->equipo}</a</li>

    {/foreach}
</ul>