<main class="h-screen w-full bg-base-100">
  <section class="container mx-auto flex h-screen flex-col items-center justify-center">
    <form action="" class="card bg-base-100 w-96 shadow">
      <div class="card-body">
        <h2 class="card-title">Create your account</h2>

        <label class="form-control w-full">
          <div class="label">
            <span class="label-text">Email</span>
          </div>
          <input type="text" placeholder="email@wmsu.edu.ph" class="input input-bordered w-full" />
        </label>
        <label class="form-control w-full">
          <div class="label">
            <span class="label-text">Password</span>
          </div>
          <input type="text" placeholder="Type here" class="input input-bordered w-full" />
        </label>
        <div class="form-control">
          <label class="label cursor-pointer w-fit">
            <input type="checkbox" checked="checked" class="checkbox" />
            <span class="label-text ml-2">Remember me</span>
          </label>
        </div>
        <button class="btn w-full">Login</button>
        <p class="text-neutral">
          Already have an account?
          <a href="<?= BASE_URL . "/admin/sign-in" ?>" class="link">Sign in</a>
        </p>
      </div>
    </form>
  </section>
</main>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script> lucide.createIcons(); </script>

<script type="module" src="<?= BASE_URL . "/assets/js/user.js" ?>"></script>