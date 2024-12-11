<?php require_once __DIR__ . "/../../../../models/EventModel.php" ?>
<div class="drawer lg:drawer-open">
  <input id="sidebar" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content bg-base-100">

    <?php include_once __DIR__ . "/../_components/navbar.php" ?>

    <section class="w-full p-12">
      <p class="text-3xl font-bold mb-8">Upcoming Events</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8 mt-4">

        <?php $event = new Event() ?>

        <div class="card card-compact bg-base-100 w-86 border rounded-lg">
          <figure>
            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
          </figure>
          <div class="card-body">
            <h2 class="card-title">CCS Hackaton</h2>
            <p> </p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary">RSVP</button>
            </div>
          </div>
        </div>

      </div>
    </section>

  </div>
  <?php include_once __DIR__ . "/../_components/sidebar.php" ?>
</div>

<div id="modal-container"></div>

<?php include_once __DIR__ . "/../_components/alert.php" ?>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script> lucide.createIcons(); </script>

<script type="module" src="<?= BASE_URL . "/assets/js/user.js" ?>"></script>