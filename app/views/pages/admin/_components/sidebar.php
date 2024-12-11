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
      <a id="dashboard">
        <div class="nav-link flex items-center gap-2">
          <i data-lucide="airplay" class="h-4 w-4"></i>
          Dashboard
        </div>
      </a>
    </li>
    <li>
      <a id="events" class="nav-link">
        <div class="flex items-center gap-2">
          <i data-lucide="land-plot" class="h-4 w-4"></i>
          Events
        </div>
      </a>
    </li>
    <li>
      <h2 class="menu-title">Attendance</h2>
      <ul>
        <!-- <li>
          <a id="attendance" class="nav-link">
            <div class="flex items-center gap-2">
              <i data-lucide="calendar-clock" class="h-4 w-4"></i>
              Mark Attendance
            </div>
          </a>
        </li> -->
        <li>
          <a id="attendance-logs" class="nav-link">
            <div class="flex items-center gap-2">
              <i data-lucide="logs" class="h-4 w-4"></i>
              Logs
            </div>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <h2 class="menu-title">Certificates</h2>
      <ul>
        <li>
          <a id="generate-certificates" class="nav-link">
            <div class="flex items-center gap-2">
              <i data-lucide="square-plus" class="h-4 w-4"></i>
              Generate Certificates
            </div>
          </a>
        </li>
        <li>
          <a id="templates" class="nav-link">
            <i data-lucide="layout-panel-top" class="h-4 w-4"></i>
            Manage Templates
          </a>
        </li>
        <li>
          <a id="certificates" class="nav-link">
            <i data-lucide="award" class="h-4 w-4"></i>
            Issued Certificates
          </a>
        </li>
      </ul>
    </li>
    <li>
      <h2 class="menu-title">Users</h2>
      <ul>
        <li>
          <a id="users" class="nav-link">
            <i data-lucide="users" class="h-4 w-4"></i>
            Participants
          </a>
        </li>
        <li>
          <a id="admin" class="nav-link">
            <i data-lucide="shield" class="h-4 w-4"></i>
            Admin
          </a>
        </li>
      </ul>
    </li>
    <li>
      <h2 class="menu-title">Reports</h2>
      <ul>
        <li>
          <a id="admin" class="nav-link">
            <i data-lucide="logs" class="h-4 w-4"></i>
            Attendance Reports
          </a>
        </li>
        <li>
          <a id="admin" class="nav-link">
            <i data-lucide="logs" class="h-4 w-4"></i>
            Event Reports
          </a>
        </li>
      </ul>
    </li>
    <div class="border mt-auto">
      <button id="logout" class="btn btn-sm btn-ghost w-full">
        <i data-lucide="log-out" class="h-4 w-4"></i>
        Logout
      </button>
    </div>
  </ul>
</div>