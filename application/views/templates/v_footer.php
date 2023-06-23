<!-- Footer -->
</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span><b>Sistem Informasi Presensi Mahasiswa</b> &copy; EgoWinasis 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/sb-admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/sb-admin/js/sb-admin-2.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/sb-admin/vendor/fontawesome-free/js/all.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="<?= base_url() ?>assets/vendor/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Function to handle the delete action
    function deleteItem(id) {
        // Display the confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, make an Ajax request to delete the item
                window.location.href = "<?= base_url()?>mahasiswa/delete/"+id
            }
        });
    }

    $('#refreshBtn').click(function() {
        location.reload();
    });
    $(document).ready(function() {
        $('#tablePresensi').DataTable();
    });
</script>
</body>

</html>