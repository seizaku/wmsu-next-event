<?php require_once __DIR__ . "/../../../../models/EventModel.php" ?>
<?php require_once __DIR__ . "/../../../../models/EventAttendeeModel.php" ?>
<div class="drawer lg:drawer-open">
  <input id="sidebar" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content bg-base-100">

    <?php include_once __DIR__ . "/../_components/navbar.php" ?>

    <section class="w-full p-12">
      <p class="text-3xl font-bold mb-8">Upcoming Events</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8 mt-4">

        <?php $events = new Event() ?>
        <?php $attendee = new EventAttendee() ?>
        <?php foreach ($events->select() as $event):
          extract($event) ?>
          <div class="w-full bg-base-100 border rounded-lg p-4">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes"
                class="rounded-xl" />
            </figure>
            <h1 class="mt-2 text-lg font-bold"><?= $event_name ?></h1>
            <p class="text-sm"><?= $location ?></p>
            <h1 class="mt-2 text-sm"><?= $description ?></h1>
            <div class="mt-2 flex gap-2">
              <button class="btn btn-neutral mt-2">View Details</button>
              <?php if ($attendee->findOne(["user_id" => $_SESSION["user"], "event_id" => $event_id])): ?>
                <button data-event_id="<?= $event_id ?>" class="rsvp btn btn-primary mt-2">RSVP</button>
              <?php endif; ?>
              <button data-event_id="<?= $event_id ?>" class="rsvp btn btn-neutral mt-2">
                <i data-lucide=""></i>
              </button>
            </div>
          </div>
        <?php endforeach; ?>
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