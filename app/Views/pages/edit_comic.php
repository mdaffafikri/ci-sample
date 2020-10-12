<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid mt-4">
    <div class="card text-left col-4">
        <div class="card-body">

            <form action="/pages/comic/update/<?= $comic['id']; ?>" method="post">
                <!-- biar safe pake csrf -->
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control <?= ($validation->hasError('title')) ? "is-invalid" : "" ?>" 
                    id="title" name="title" autofocus
                    value="<?= (old('title')) ? old('title') : $comic['title'] ?>">
                    <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control <?= ($validation->hasError('author')) ? "is-invalid" : "" ?>" 
                    id="author" name="author" value=" <?= (old('author')) ? old('author') : $comic['author'] ?> ">
                    <div class="invalid-feedback"><?= $validation->getError('author'); ?></div>
                </div>
                <input type="hidden" class="form-control" id="sluh" name="slug" value="<?= $comic['slug'] ?> " />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>