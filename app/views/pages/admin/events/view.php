<div class="drawer lg:drawer-open">
  <input id="sidebar" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content bg-base-100">

    <?php include_once __DIR__ . "/../_components/navbar.php" ?>

    <section class="w-full p-4">
      <?php include_once __DIR__ . "./components/datatable.php" ?>
    </section>

  </div>
  <?php include_once __DIR__ . "/../_components/sidebar.php" ?>
</div>

<div id="modal-container"></div>

<?php include_once __DIR__ . "/../_components/alert.php" ?>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script> lucide.createIcons(); </script>

<script type="module" src="<?= BASE_URL . "/assets/js/admin.js" ?>"></script>