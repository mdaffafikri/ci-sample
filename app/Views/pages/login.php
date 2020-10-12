<?= $this->extend('templates/layout'); ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('fail')) : ?>
    <?= session()->getFlashdata('fail'); ?>
<?php endif ?>

<div class="container mt-5 col-3">
    <!-- <form action="/pages/loginSubmit" method="post"> -->
    <?php echo form_open('/pages/loginSubmit'); ?>
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    <!-- <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
    </div> -->
    <button type="submit" class="btn btn-primary">Login</button>
    <?php echo form_close(); ?>
    <!-- </form> -->
</div>

<?= $this->endSection(); ?>