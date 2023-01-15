<?php
    $title = 'Home';
    require_once 'includes/header.php';
    require_once 'includes/navbar.php';
?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button light" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="images/s4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1 class="display-1 d-none d-sm-block">Enjoy Your Stay</h1>
        <p class="d-none d-sm-block">>Some representative placeholder content for the first slide.</p>
        <a href="register.php" class="btn btn-primary border-0 Res-room-btn" target="_blank"  rel="noopener noreferrer">RESERVE A ROOM</a>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/s3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1 class="display-1 d-none d-sm-block">Safty and Comfortable</h1>
        <p class="d-none d-sm-block">>Some representative placeholder content for the second slide.</p>
        <a href="register.php" class="btn btn-primary border-0 Res-room-btn" target="_blank" rel="noopener noreferrer">RESERVE A ROOM</a>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/s5.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1 class="display-1 d-none d-sm-block">Diffirent services </h1>
        <p class="d-none d-sm-block">Some representative placeholder content for the third slide.</p>
        <a href="register.php" class="btn btn-primary border-0 Res-room-btn responsive-content" target="_blank" rel="noopener noreferrer">RESERVE A ROOM</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  <?php require_once 'includes/rooms.php'; ?>
  <?php require_once 'includes/services.php'; ?>
  <?php require_once 'includes/about.php'; ?>
  <?php require_once 'includes/location.php';?>
  <?php require_once 'includes/footer.php'; ?>



