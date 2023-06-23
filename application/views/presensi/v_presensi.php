<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Presensi Mahasiswa</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class=" m-0 text-right">
                <button class="btn btn-success" id="refreshBtn"><i class="fas fa-sync-alt"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tablePresensi" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>ID CARD</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($presensi as $isi) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $isi['nama'] ?></td>
                                <td><?= $isi['nim'] ?></td>
                                <td><?= $isi['id_card'] ?></td>
                                <td><?= $isi['timestamp'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>