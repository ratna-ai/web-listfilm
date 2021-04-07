<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <form action="/film/save" method="post">
            <?php csrf_field(); ?>
                <div class="form-group">
                    <label for="InputFilm">Judul Film</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="InputFilm" placeholder="Masukkan Judul Film" name="judul">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="InputSutradara">Sutradara</label>
                    <input type="text" class="form-control <?= ($validation->hasError('sutradara')) ? 'is-invalid' : ''; ?>" id="InputSutradara" placeholder="Masukkan Sutradara" name="sutradara">
                    <div class="invalid-feedback">
                        <?= $validation->getError('sutradara'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputSynopsis">Sinopsis</label>
                    <input type="text" class="form-control <?= ($validation->hasError('synopsis')) ? 'is-invalid' : ''; ?>" id="InputSynopsis" placeholder="Masukkan Sinopsis Film" name="synopsis">
                    <div class="invalid-feedback">
                        <?= $validation->getError('synopsis'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputCover">Cover</label>
                    <input type="text" class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="InputCover" placeholder="Nama File Cover" name="cover">
                    <div class="invalid-feedback">
                        <?= $validation->getError('cover'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
   
<?= $this->endSection(); ?>