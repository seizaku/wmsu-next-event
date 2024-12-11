<div class="drawer-side">
  <label for="sidebar" aria-label="close sidebar" class="drawer-overlay"></label>
  <ul class="menu bg-base-100 text-base-content h-full w-60 border-r flex flex-col">
    <li class="mb-4">
      <a class="mx-auto btn btn-block btn-ghost justify-center no-animation hover:bg-transparent">
        <img src="<?= "http://localhost/sync-events/assets/images/logo.svg" ?>" class="w-[86px] py-2 mx-auto hidden">
        <h1 class="text-2xl font-bold drop-shadow-xl">NextEvent.</h1>
      </a>
    </li>
    <li>
      <a id="home">
        <div class="nav-link flex items-center gap-2">
          <i data-lucide="airplay" class="h-4 w-4"></i>
          Home
        </div>
      </a>
    </li>
    <li>
      <h2 class="menu-title">Events</h2>
      <ul>
        <li>
          <a id="events" class="nav-link">
            <i data-lucide="land-plot" class="h-4 w-4"></i>
            Upcoming Events
          </a>
        </li>
        <li>
          <a id="rsvp-events" class="nav-link">
            <i data-lucide="circle-check" class="h-4 w-4"></i>
            RSVP'd Events
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a id="certificates">
        <div class="nav-link flex items-center gap-2">
          <i data-lucide="award" class="h-4 w-4"></i>
          Certificates
        </div>
      </a>
    </li>

    <div class="border mt-auto">
      <button id="logout" class="btn btn-sm btn-ghost w-full">
        <i data-lucide="log-out" class="h-4 w-4"></i>
        Logout
      </button>
    </div>
  </ul>
</div>