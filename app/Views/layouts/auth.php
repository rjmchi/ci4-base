<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title)? 'Title | ' . $title: 'title' ?></title>
    <link href="./css/app.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <?= $this->include('partials/messages') ?>

    <section id="content" role="main">
        <?=$this->renderSection('content') ?>
    </section>

</div><!-- container -->

<footer class="m-4 text-center">
    <p class="text-sm text-neutral-500">&copy; <?= date('Y') ?> Robert J. Milanowski </p>
</footer>
</body>
</html>