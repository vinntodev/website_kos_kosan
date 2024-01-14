<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

        </div>
    </div>
    <div class="col-sm-6">

        <?php foreach ($menu as $pi) : ?>
            <?= form_open_multipart('menu/proses_kamar'); ?>
            <div class="form-group" hidden>
                <label for="formGroupExampleInput">id</label>
                <input type="text" class="form-control" name="id" id="id" value="<?= $pi->id ?>">
            </div>




            <div class="form-group">
                <label for="formGroupExampleInput2">No Kamar</label>
                <input type="text" class="form-control" name="no_kamar" id="no_kamar" value="<?= $pi->no_kamar ?>">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Status</label>
                <input type="text" class="form-control" name="status" id="status" value="<?= $pi->status ?>">
            </div>


            <div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= site_url('menu/kamar') ?>" class="btn btn-danger">Kembali</a>
            </div>

            </form>
        <?php endforeach; ?>


    </div>
</div>
</div>