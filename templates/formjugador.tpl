<h2>registra tu jugador</h2>
<form action="add" method="post" class="my-4">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input name="nombre" type="text" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">sensibilidad</label>
    <input name="sensibilidad" type="text">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">dpi</label>
    <input name="dpi" type="text">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">rango</label>
    <input name="rango" type="text">
  </div>
  <div class="mb-3">
  <label for="disabledSelect" class="form-label">Seleccione un equipo</label>
  <select name="id_equipo" class="form-select card-subtitle mb-3" aria-label="Default select example" name="category">
        <option value=""><-Seleccionar equipo-></option>
          {foreach from=$equipos item=$equipo}
              <option value="{$equipo->id_equipos}">{$equipo->equipo}</option>
          {/foreach}
      </select>
</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">rol</label>
    <input name="rol" type="text">
  </div>
  <button href="add" type="submit" class="btn btn-primary">Crear</button>
</form>

