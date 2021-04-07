<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <form action="/film/update/<?= $film['id']; ?>" method="post">
            <?php csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $film['slug']; ?>">
                <div class="form-group">
                    <label for="InputJudul">Judul Film</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="InputJudul" name="judul" value="<?= $film['judul']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="InputSutradara">Sutradara</label>
                    <input type="text" class="form-control <?= ($validation->hasError('sutradara')) ? 'is-invalid' : ''; ?>" id="InputSutradara" name="sutradara" value="<?= $film['sutradara']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('sutradara'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputSynopsis">Sinopsis</label>
                    <input type="text" class="form-control <?= ($validation->hasError('synopsis')) ? 'is-invalid' : ''; ?>" id="InputSynopsis" name="synopsis" value="<?= $film['synopsis']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('synopsis'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputCover">Cover</label>
                    <input type="text" class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="InputCover" name="cover" value="<?= $film['cover']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('cover'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
   
<?= $this->endSection(); ?>