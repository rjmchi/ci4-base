<div>
<?php if (!empty(session()->getFlashdata('fail'))) :?>
        <div class="alert alert-danger"><?=session()->getFlashdata('fail')?></div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('success'))) :?>
        <div class="alert alert-success"><?=session()->getFlashdata('success')?></div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('message'))) :?>
        <div class="alert alert-warning"><?=session()->getFlashdata('message')?></div>
    <?php endif ?>
</div>