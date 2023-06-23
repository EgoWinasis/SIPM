<div class="container-fluid">
<?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <?php $this->session->set_userdata('pesan', null); ?>
    <div class="card">

        <div class="card-header">
            Edit Data

        </div>
        <div class="card-body">
            <form action="<?= base_url() ?>mahasiswa/update" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?=$user[0]['nama']?>">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?=$user[0]['nim']?>">
                </div>
                <div class="mb-3">
                    <label for="id-card" class="form-label">ID Card</label>
                    <input type="text" class="form-control" id="id-card" name="id_card" value="<?=$user[0]['id_card']?>">
                    <input type="hidden" name="id" value="<?=$user[0]['id']?>">
                </div>

                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>