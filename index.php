<?php include_once __DIR__ . "./config/config.php"; ?>
<?php require_once __DIR__ . "./app/App.php"; ?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NextEvent</title>
  <?php require_once "./app/includes/stylesheets.php" ?>
  <?php require_once "./app/includes/header_scripts.php" ?>
</head>

<body data-base-url="<?= BASE_URL ?>">

  <div id="main-content">
    <?php $app = new App() ?>
  </div>

  <div class="toast hidden">
    <div class="alert alert-info bg-primary text-neutral-content">
      <span id="toast-message">404 Not Found</span>
    </div>
  </div>

  <?php require_once "./app/includes/footer_scripts.php" ?>
</body>

</html>