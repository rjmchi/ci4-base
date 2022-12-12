<?= $this->extend('layouts/auth');?>

<?= $this->section('content')?>

<main class="mx-auto my-3 p-3 border bg-neutral-100 rounded-md md:w-1/2">

    <h1 class="text-2xl">Sign Up</h1>

    <form action="<?=route_to('store')?>" method="POST" class="border rounded-md border-primary-700 m-3 p-4">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="username" class="font-semibold">User Name</label>
            <input type="text" name="username" value="<?=set_value('username')?>">
            <span class="text-danger-500"><?= isset($validation) ? display_form_errors($validation, 'username') : ''?></span>
        </div>

        <div class="mb-3">
            <label for="email" class="font-semibold">Email Address</label>
            <input type="email" name="email" value="<?=set_value('email')?>">
            <span class="text-danger-500"><?= isset($validation) ? display_form_errors($validation, 'email') : ''?></span>
        </div>

        <div class="mb-3">
            <label for="password" class="font-semibold">Password</label>
            <input type="password" name="password">
            <span class="text-danger-500"><?= isset($validation) ? display_form_errors($validation, 'password') : ''?></span>
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="font-semibold">Confirm Password</label>
            <input type="password" name="confirm_password">
            <span class="text-danger-500"><?= isset($validation) ? display_form_errors($validation, 'confirm_password') : ''?></span>
        </div>

        <button class="btn btn-primary mt-3">Sign Up</button>
    </form>

    <p class="text-center text-secondary-700"><a href="login">Already have an account? Login Here!</a></p>
</main>

<?= $this->endSection();?>