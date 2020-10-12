<?= $this->extend('templates/layout'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-between">
        <h1>Comic List</h1>
        <a href="/pages/comic/add" type="button" class="btn btn-primary mt-2">Add Comic</a>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?= session()->getFlashdata('pesan'); ?></strong> You should check in on some of those fields below.
        </div>
    <?php endif; ?>

    <script>
        // $(".alert").alert();
    </script>

    <div class="table-area">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Act</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                foreach ($comic as $record) :
                ?>
                    <tr>
                        <th scope="row"> <?= $number ?> </th>

                        <td>
                            <a href="comic/detail/<?= $record['slug'] ?>">
                                <?= $record['title'] ?>
                            </a>
                        </td>

                        <td><?= $record['author'] ?></td>

                        <td>
                            <a href="comic/edit/<?= $record['slug'] ?>">Edit</a>
                            <form action="/comic/delete/ <?= $record['id']; ?>" method="post" class="d-inline"> <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn text-danger pt-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php $number++;
                endforeach;
                ?>
            </tbody>
        </table>
        <!-- table area limit -->
    </div> 
        <?= $pager->links('custompaginate', 'custom_pager'); ?>    
</div>

<?= $this->endSection(); ?>