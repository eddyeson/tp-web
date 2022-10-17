{file="header.tpl" }

<h1>{$jugadores}</h1>
<ul class="list-group">
    {foreach $equiposdejugadores as $jug}
        <li class="list-group-item list-group-item-action list-group-item-success">nombre:{$jug->nombre}</li>
    {/foreach}
</ul>