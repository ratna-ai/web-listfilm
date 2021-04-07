<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="/film" class="btn btn-primary mt-3">Back to the list</a>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a href="/film/edit/<?= $film['slug']; ?>" class="btn btn-warning">Edit</a>
            <form action="/film/<?= $film['id']; ?>" method="post" class="d-inline">
                <?php csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <div class="col-md-12">
            <h3 class="mt-3 mb-3" style="text-align: center;"><?= $film['judul']; ?></h3>
            <div class="col-md-12 text-center">
                <img class="card-img-top" src="/img/<?= $film['cover']; ?>" style="width: 200px; height: 300px; text-align: center;">
            </div>
            <div class="col-md-6 d-inline">
                <table class="table">
                    <tr>
                        <th>Judul</th>
                        <th>:</th>
                        <td><?= $film['judul']; ?></td>
                    </tr>
                    <tr>
                        <th>Sutradara</th>
                        <th>:</th>
                        <td><?= $film['sutradara']; ?></td>
                    </tr>
                    <tr>
                        <th>Sinopsis</th>
                        <th>:</th>
                        <td><?= $film['synopsis']; ?></td>
                    </tr>
                </table>
            </div>
        </div>  
    </div>
</div>

<?= $this->endSection(); ?>