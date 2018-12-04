<!DOCTYPE html>
<html>
<head>
  <title>Crud Project</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('assests/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assests/css/style.css') ?>">
  <script type="text/javascript" src="<?= base_url('assests/js/bootstrap.min.js')?>"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">DashBoard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-sm-2">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('login/dashboard')?>">EMPLOYEES</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('article/article_list') ?>">ARTICLES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('images/gallery_image') ?>">IMAGES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logout');?>">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>