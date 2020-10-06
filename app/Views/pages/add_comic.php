<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Add Comic</h1>
    <form action="/pages/comic/save" method="post">
    <!-- biar safe pake csrf -->
    <?= csrf_field(); ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" autofocus> 
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author">            
        </div>        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection(); ?>