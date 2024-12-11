<?php
require_once __DIR__ . "/../../../../../../app/models/EventModel.php";
$events = new Event();
?>

<div class="border w-full bg-base-100 p-4">
  <div class="flex items-center justify-between">
    <div class="flex">
      <div class="relative">
        <input id="search-table" class="grow input input-bordered w-96 pl-10" placeholder="Search" />
        <i data-lucide="search" class="absolute top-3.5 left-3 h-5 w-5 text-base-300"></i>
      </div>
    </div>
  </div>
  <table id="data-table" style="width: 100%;" class="table table-auto w-full">
    <thead>
      <tr class="bg-base-200">
        <th class="rounded-s">Event</th>
        <th>Student</th>
        <th>College</th>
        <th>Year & Section</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Location</th>
        <th class="rounded-e">Actions</th>
      </tr>
    </thead>
    <tbody>

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