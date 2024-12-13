<dialog id="modal" class="modal">
  <div class="modal-box">
    <h1 class="text-lg font-bold mb-4">Update Event</h1>
    <form action="" id="update-event-form" enctype="multipart/form-data">

      <input type="hidden" name="event_id" id="event_id">

      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Name</span>
        </div>
        <input name="event_name" class="input input-bordered w-full" />
      </label>

      <div class="grid grid-cols-2 gap-4">
        <label class="form-control w-full">
          <div class="label">
            <span class="label-text">Event Start</span>
          </div>
          <input type="datetime-local" name="event_start" class="input input-bordered w-full" />
        </label>
        <label class="form-control w-full">
          <div class="label">
            <span class="label-text">Event End</span>
          </div>
          <input type="datetime-local" name="event_end" class="input input-bordered w-full" />
        </label>
      </div>

      <!-- Coordinates -->
      <input type="hidden" name="latitude" id="latitude">
      <input type="hidden" name="longitude" id="longitude">

      <div class="grid grid-cols-2 gap-4">
        <label class="form-control w-full">
          <div class="label">
            <span class="label-text">Location</span>
          </div>
          <input type="text" name="location" id="location-input" placeholder="Eg. Western Mindanao State University"
            class="input input-bordered w-full" />
        </label>
        <label class="form-control w-full">
          <div class="label">
            <span class="label-text">Max Participants</span>
          </div>
          <input type="number" name="capacity" class="input input-bordered w-full" />
        </label>
      </div>

      <div id="map" class="h-44 w-full bg-neutral mt-4"></div>

      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Description</span>
        </div>
        <textarea name="description" class="h-44 p-4 input input-bordered w-full"></textarea>
      </label>

    </form>
    <div class="modal-action">
      <form method="dialog">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn">Close</button>
        <button id="update-form" type="button" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</dialog>