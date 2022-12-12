<?= $this->extend('layouts/main');?>

<?= $this->section('content')?>

<h1 class="text-3xl m-3 p-3 text-primary-700 font-bold border-b-2 border-b-neutral-400 mb-10">Dashboard</h1>

<div class="grid grid-cols-3 justify-between w-11/12 md:w-3/4 mx-auto border-b-2 pb-2 border-b-neutral-800">
    <div class="font-bold">Name</div>
    <div class="font-bold">Email</div>
    <div class="font-bold">Action</div>
</div>
<div class="grid grid-cols-3 justify-between w-11/12 md:w-3/4 mx-auto mt-3">

    <div><?=$user['name']?></div>
    <div><?=$user['email']?></div>
    <div><a href="logout" class="btn btn-danger">logout</a></div>

</div>

<section class="m-3 p-3">
    <a href="<?= route_to('register')?>" class="p-1 text-secondary-800 hover:underline hover:text-secondary-900"><h3>Register</h3></a>
    <a href="<?= route_to('login')?>" class="p-1 text-secondary-800 hover:underline hover:text-secondary-900"><h3>Login</h3></a>

</section>

<?= $this->endSection();?>