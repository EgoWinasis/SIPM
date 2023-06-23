<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
    <?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <?php $this->session->set_userdata('pesan', null); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <a href="<?= base_url('mahasiswa/add') ?>" type="button" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableMahasiswa" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>ID Card</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $isi) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $isi['nama'] ?></td>
                                <td><?= $isi['nim'] ?></td>
                                <td><?= $isi['id_card'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('mahasiswa/edit/'.$isi['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <button onclick="deleteItem(<?php echo $isi['id'] ?>)" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>