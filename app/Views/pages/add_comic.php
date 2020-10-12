<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Add Comic</h1>

    <!-- validation list error -->
    <?= $validation->listErrors(); ?>

    <form action="/pages/comic/save" method="post">
        <!-- biar safe pake csrf -->
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control <?= ($validation->hasError('title')) ? "is-invalid" : "" ?>" id="title" name="title" autofocus>
            <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control <?= ($validation->hasError('author')) ? "is-invalid" : "" ?>" id="author" name="author">
            <div class="invalid-feedback"><?= $validation->getError('author'); ?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection(); ?>