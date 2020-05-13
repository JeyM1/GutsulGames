<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GutsulGames</title>

        <link rel="stylesheet" href="./css/styles.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;600;800&display=swap" rel="stylesheet">

    </head>
    <body>
      <nav class="navbar navbar-expand-lg header">
        <div class="container align-items-center">
          <a class="navbar-brand logo" href="#">Gutsul Games</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto justify-content-between">
                <li class="nav-item">
                  <a class="nav-link" href="#">Головна <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Каталог</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Про нас</a>
                </li>
              </ul>
              <div>
                <a href="#">
                  <img src="./images/shopping-cart.svg">
                </a>
                <a href="#">
                  <img src="./images/search.svg">
                </a>
              </div>
              <div class="d-flex col-sm-4 justify-content-between">
                <a class="button_main" id="login" href="#">Логін</a>
                <a class="button_main" id="register" href="#">Реєстрація</a>
              </div>
            </div>
        </div>
      </nav>
    </body>
</html>