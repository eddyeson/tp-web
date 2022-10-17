{include file="header.tpl" }

<h1>{$detalles}</h1>

<ul class="list-group">
{foreach from=$details item=$detail}
      <li class="list-group-item list-group-item-success">Nombre: {$detail->nombre}</li>
      <li class="list-group-item list-group-item-success">sensibilidad: {$detail->sensibilidad}</li>
      <li class="list-group-item list-group-item-success">dpi: {$detail->dpi}</li>
      <li class="list-group-item list-group-item-success">rango: {$detail->rango}</li>     
      <li class="list-group-item list-group-item-success">equipo: {$detail->id_equipo}</li>
      <li class="list-group-item list-group-item-success">rol: {$detail->rol}</li>
{/foreach}

</ul>























