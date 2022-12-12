<?= $this->extend('layouts/auth');?>

<?= $this->section('content')?>

<main class="mx-auto my-3 p-3 border border-primary-200 rounded-md md:w-1/2">

    <h1 class="text-2xl">Login</h1>

    <form action="<?=route_to('login')?>" method="POST" class="border rounded-md border-primary-700 m-3 p-4">
    <?= csrf_field() ?>

    <div class="mb-2">
        <label for="email" class="font-semibold">Email Address</label>
        <input type="email" name="email" class="mb-3" value="<?= set_value('email') ?>">
        <span class="text-danger-500"><?= isset($validation) ? display_form_errors($validation, 'email') : ''?></span>
    </div>

    <div class="mb-2">
        <label for="password" class="font-semibold">Password</label>
        <input type="password" name="password">
        <span class="text-danger-500"><?= isset($validation) ? display_form_errors($validation, 'password') : ''?></span>
    </div>

    <button class="btn btn-primary mt-3">Sign In</button>

    </form>

    <p class="text-center text-secondary-700"><a href="register">Create a new account.</a></p>

</main>

<?= $this->endSection();?>