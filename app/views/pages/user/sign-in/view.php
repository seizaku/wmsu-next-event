<main class="h-screen w-full bg-base-100">
  <section class="container mx-auto flex h-screen flex-col items-center justify-center">

    <h1 class="text-3xl font-bold text-primary mb-12">NextEvent</h1>

    <form action="" method="POST" id="login-form" class="card bg-base-100 w-96">
      <div class="card-body">

        <h2 class="card-title mx-auto text-2xl">Get Started</h2>
        <p class="text-sm mx-auto">Let's get started by filling out the form below</p>

        <label class="form-control w-full">
          <div class="label">
            <span class="label-text">Email</span>
          </div>
          <input name="email" placeholder="admin@email.com" class="input input-bordered w-full" />
        </label>
        <label class="form-control w-full">
          <div class="label">
            <span class="label-text">Password</span>
          </div>
          <input type="password" name="password" placeholder="********" class="input input-bordered w-full" />
        </label>
        <div class="form-control">
          <label class="label cursor-pointer w-fit">
            <input type="checkbox" checked="checked" class="checkbox" />
            <span class="label-text ml-2">Remember me</span>
          </label>
        </div>
        <button type="submit" class="btn btn-primary w-full">Login</button>
        <p class="text-sm">Don't have an account yet? <a href="" class="text-primary">Register</a></p>
      </div>
    </form>
  </section>
</main>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script> lucide.createIcons(); </script>

<script type="module" src="<?= BASE_URL . "/assets/js/user.js" ?>"></script>