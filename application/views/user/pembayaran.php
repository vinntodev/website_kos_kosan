<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No HP</th>
                        <th scope="col">No KTP</th>
                        <th scope="col">Nomor Kamar</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Jatuh Tempo</th>
                        <th scope="col">Jumlah Tagihan</th>
                        <th scope="col">Bukti Pembayaran</th>
                        <th scope="ocl">Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pembayaran as $p) : ?>

                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $p['name']; ?></td>
                            <td><?= $p['no_hp']; ?></td>
                            <td><?= $p['no_ktp']; ?></td>
                            <td><?= $p['nomor_kamar']; ?></td>
                            <td><?= $p['tanggal_masuk']; ?></td>
                            <td><?= $p['jatuh_tempo']; ?></td>
                            <td>Rp. <?= number_format($p['jumlah_tagihan']); ?></td>
                            <td><img width="60px" src="<?= base_url('assets/img/profile/') . $p['bukti_pembayaran']; ?>" alt=""></td>
                            <td>
                                <a href="<?= base_url('admin/konfirmasiClient/') ?>" class="badge badge-success"><?= $p['status']; ?></a>

                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>



        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>