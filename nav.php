<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand">Гимназия</a>
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div id="my-nav" class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Item 1 <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Item 2</a>
              </li>
          </ul>
      </div>
    <div class="my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#RegModal" href="#">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#AuthModal" href="#">Авторизация</a>
            </li>
        </ul>
    </div>
  </nav>
<?php include'modalki.php';?>