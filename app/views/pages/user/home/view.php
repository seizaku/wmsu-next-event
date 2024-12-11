<div class="drawer lg:drawer-open">
  <input id="sidebar" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content bg-base-100">

    <?php include_once __DIR__ . "/../_components/navbar.php" ?>

    <section class="w-full p-12">
      <p class="text-3xl font-bold">Dashboard</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8 mt-4">

        <div class="w-full h-28 bg-base-100 border rounded-lg p-4">
          <div class="flex items-center justify-between">
            <h1 class="text-sm font-bold">Total Events</h1>
            <i data-lucide="calendar" class="h-4 w-4 text-neutral"></i>
          </div>
          <h1 class="mt-1 text-2xl font-bold">12</h1>
          <p class="text-sm ">+2 from last month</p>
        </div>

        <div class="w-full h-28 bg-base-100 border rounded-lg p-4">
          <div class="flex items-center justify-between">
            <h1 class="text-sm font-bold">Attended Events</h1>
            <i data-lucide="land-plot" class="h-4 w-4 text-neutral"></i>
          </div>
          <h1 class="mt-1 text-2xl font-bold">12</h1>
          <p class="text-sm ">+2 from last month</p>
        </div>

        <div class="w-full h-28 bg-base-100 border rounded-lg p-4">
          <div class="flex items-center justify-between">
            <h1 class="text-sm font-bold">Certificates Earned</h1>
            <i data-lucide="award" class="h-4 w-4 text-neutral"></i>
          </div>
          <h1 class="mt-1 text-2xl font-bold">12</h1>
          <p class="text-sm ">+2 from last month</p>
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