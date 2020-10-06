<?= $this->extend('templates/layout'); ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Comic List</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comic as $record): ?>
            <tr>
            <th scope="row"><?= $record['id'] ?></th>
            <td><?= $record['title'] ?></td>
            <td><?= $record['author'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>