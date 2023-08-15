<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Personal Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-md mt-5">

    <div class="row justify-content-center">
      <div class="col-md-2 mb-2 text-center">
        <img class="img-fluid" style="max-height: 40vh;" alt="model" class="model" src="https://www.indotechpren.org/assets/img/unila.png">
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="./">
              <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="number" class="form-control" id="number" name="number">
              </div>
              <button type="submit" class="btn btn-primary justify-self-center">Submit</button>
            </form>
            
            
            <?php if (isset($_POST['number'])) :?>
              <div class="mb-3">
                <label for="result" class="form-label">Result</label>
                <input type="text" class="form-control" id="result" name="result" value="<?= LuasPersegi($_POST['number']) ?>">
              </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>