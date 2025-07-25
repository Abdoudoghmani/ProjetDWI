<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajouter un Recour</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap hada -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="styleRecour.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center" style="margin:20px;">
      <div class="col-lg-6 col-md-8 login-box">
        <div class="col-lg-12 login-title">
          Saisissez votre recour
        </div>
        <div class="col-lg-12 login-form">
          <form action="recour/ajouter-recour.php" method="post">
            <input type="hidden" name="id_student" value="<?php echo isset($_GET['id_student']) ? htmlspecialchars($_GET['id_student']) : ''; ?>">
            <div class="form-group">
              <label for="module" class="form-control-label">Module</label>
              <input type="text" class="form-control"id="nom" name="module" required>
            </div>
            <div class="form-group">
              <label for="nature" class="form-control-label">Nature du recours (CC ou Examen)</label>
              <input type="text" class="form-control"id="nom" name="nature" required>
            </div>
            <div class="form-group">
              <label for="noteAffichee" class="form-control-label">Note affichée</label>
              <input type="number" class="form-control"id="nom" name="noteAffichee" required>
            </div>
                <div class="form-group">
                  <label for="noteReelle" class="form-control-label">Note réelle</label>
                  <input type="number" class="form-control" id="nom" name="noteReelle" required>
                </div>
                <div class="col-12 login-btm login-button justify-content-center d-flex">
                  <button type="submit" class="btn btn-outline-primary">Ajouter</button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
      </script>
</body>
</html>