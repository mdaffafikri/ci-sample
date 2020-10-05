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
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            </tr>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>