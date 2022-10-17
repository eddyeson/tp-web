<head>

  <base href="{BASE_URL}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<form method="POST" action="validacion">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Constraseña</label>
    <input type="password" name="password">
  </div>

  {if $error}

    <div class="alert alert-danger mt-3">
      {$error}
    </div>

  {/if}
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>