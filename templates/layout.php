<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Artykuły</title>

  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="public/small-business.css" rel="stylesheet">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Artykuły</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Lista artykułów
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/?action=create">Utwórz artykuł</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/?action=seeder">Seeder</a>
          </li>
          <?php if(!isset($_SESSION['username']) || empty($_SESSION['username'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="/?action=login">Zaloguj</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/?action=createUser">Zarejestruj</a>
          </li>
            <?php else: ?>
              <li class="nav-item">
              <a class="nav-link" href="/?action=logout">Wyloguj</a>
            </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container" style="margin-top: 25px;">
    <?php require_once("templates/pages/$page.php") ?>   
  </div>

  <!-- <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">STOPKA</p>
    </div>
  </footer> -->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>