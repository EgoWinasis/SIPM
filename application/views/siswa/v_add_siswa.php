<div class="container-fluid">
<?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <?php $this->session->set_userdata('pesan', null); ?>
    <div class="card">

        <div class="card-header">
            Tambah Data

        </div>
        <div class="card-body">
            <form action="<?= base_url() ?>mahasiswa/store" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim">
                </div>
                <div class="mb-3">
                    <label for="id-card" class="form-label">ID Card</label>
                    <input type="text" class="form-control" id="id-card" name="id_card">
                </div>

                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>