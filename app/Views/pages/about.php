<?= $this->extend('templates/layout'); ?>

<?= $this->section('content'); ?>

<div class="container mt-2">
    <h1>About</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum blanditiis consectetur voluptatem quos adipisci repellat aliquid, porro ullam recusandae mollitia velit ducimus, excepturi aut error iusto? Sequi accusamus velit unde!</p>        
    <?php foreach($biografi as $list) : ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <?= $list['name'] ?></li>
            <li class="breadcrumb-item"> <?= $list['alamat'] ?></li>            
        </ol>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>
