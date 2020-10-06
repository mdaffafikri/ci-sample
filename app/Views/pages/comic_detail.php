<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="card text-left col-4">
        <div class="card-body">

            <h4 class="card-title"><?= $comic['title'] ?></h4>
            <p class="card-text">By <?= $comic['author'] ?></p>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>