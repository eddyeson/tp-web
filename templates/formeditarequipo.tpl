{include file="header.tpl" }
<form action="editarequipos/{$id}" method="POST" class="my-4">
  <div class="mb-3">
    <label for="equipo" class="form-label">equipo</label>
    <input name="equipo" type="text" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="nacionalidad" class="form-label">nacionalidad</label>
    <input name="nacionalidad" type="text">
  </div>
  <button  type="submit" class="btn btn-primary">Crear</button>
</form>