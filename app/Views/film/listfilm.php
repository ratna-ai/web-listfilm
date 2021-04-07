<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h1 class="mb-3" style="text-align: center;">List Film</h1>
    <a href="/film/create" class="btn btn-primary mb-2 mt-1">Tambah film</a>
    <div class="row">
        <div class="col-lg-12">
        <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Poster</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($film as $f) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><img src="/img/<?= $f['cover']; ?>" style="width: 100px; height:150px;"></td>
                        <td><?= $f['judul']; ?></td>
                        <td><a href="/film/<?= $f['slug']; ?>" class="btn btn-info">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
   
<?= $this->endSection(); ?>