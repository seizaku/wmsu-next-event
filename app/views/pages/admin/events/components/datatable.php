<?php
require_once __DIR__ . "/../../../../../../app/models/EventModel.php";
$events = new Event();
?>

<div class="border w-full bg-base-100 p-4">
  <div class="flex items-center justify-between">
    <div class="flex">
      <div class="relative">
        <input id="search-table" class="grow input input-bordered sm:w-96 pl-10" placeholder="Search" />
        <i data-lucide="search" class="absolute top-3.5 left-3 h-5 w-5 text-base-300"></i>
      </div>
    </div>
    <button id="create-event" class="btn btn-primary">
      <i data-lucide="plus-circle" class="h-5 w-5"></i>
      Create Event
    </button>

  </div>
  <table id="data-table" style="width: 100%;" class="table table-auto ">
    <thead>
      <tr class="bg-base-200">
        <th class="rounded-s">Event</th>
        <th>Duration</th>
        <th>Max Participants</th>
        <th>Description</th>
        <th>Location</th>
        <th class="rounded-e">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($events->select() as $event):
        extract($event) ?>
        <tr>
          <td>
            <span class="font-bold"><?= $event_name ?></span>
          </td>
          <td>
            <ul>
              <li>
                <span class="font-bold text-sm">Start:
                </span><?= (new DateTime($event_start))->format('D, M j, Y g:i A'); ?>
              </li>
              <li>
                <span class="font-bold text-sm">End:
                </span><?= (new DateTime(datetime: $event_end))->format('D, M j, Y g:i A'); ?>
              </li>
            </ul>
          </td>
          <td>
            <span class="flex gap-2 items-center">
              <i data-lucide="users" class="h-4 w-4"></i>
              <?= $capacity ?>
            </span>
          </td>
          <td>
            <?= $description ?>
          </td>
          <td>
            <?= $location ?>
          </td>
          <td>
            <button data-id="<?= $event_id ?>" class="show-attendance btn btn-sm btn-square btn-ghost">
              <i data-lucide="users" class="h-4 w-4"></i>
            </button>
            <button data-id="<?= $event_id ?>" class="update-event btn btn-sm btn-square btn-ghost">
              <i data-lucide="edit" class="h-4 w-4"></i>
            </button>
            <button data-id="<?= $event_id ?>" class="delete-event btn btn-sm btn-square btn-ghost">
              <i data-lucide="trash-2" class="h-4 w-4"></i>
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
  (function () {
    const table = new DataTable('#data-table', {
      responsive: true,
      language: {
        paginate: {
          previous: '&lt;',
          next: '&gt;'
        }
      },
    });

    $("#search-table").on("keypress", function () {
      table.search(this.value).draw();
    })
  })()
</script>