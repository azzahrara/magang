<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer fixed-bottom">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Balai Penelitian Agroklimat dan Hidrologi 2022 </span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<link rel="stylesheet" href="https://unpkg.com/@tabler/icons@latest/iconfont/tabler-icons.min.css">
<!-- plugins:js -->
<script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url() ?>assets/vendors/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.select.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendors/select2/select2.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url() ?>assets/js/off-canvas.js"></script>
<script src="<?= base_url() ?>assets/js/hoverable-collapse.js"></script>
<script src="<?= base_url() ?>assets/js/template.js"></script>
<script src="<?= base_url() ?>assets/js/settings.js"></script>
<script src="<?= base_url() ?>assets/js/todolist.js"></script>
<script src="<?= base_url('assets/'); ?>js/select2.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url() ?>assets/js/dashboard.js"></script>
<script src="<?= base_url() ?>assets/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/addons/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#peg_penugasan').DataTable({
            lengthMenu: [25, 50, 75, 100],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });
        $('#peg_pes').DataTable({
            lengthMenu: [25, 50, 75, 100],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });
        $('#peg_laporan').DataTable({
            lengthMenu: [25, 50, 75, 100],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });
        $('#pes_lap').DataTable({
            lengthMenu: [25, 50, 75, 100],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });
        $('#pes_penugasan').DataTable({
            lengthMenu: [25, 50, 75, 100],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $('#peg_pes').DataTable({
            lengthMenu: [25, 50, 75, 100]
        });

    });
</script> -->
<script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<script>
    function addrev() {
        var x = document.getElementById("crev");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function showttgspm() {
        var x = document.getElementById("ttgspm");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function shownp() {
        var x = document.getElementById("np");
        var y = document.getElementById("nl");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function shownl() {
        var y = document.getElementById("np");
        var x = document.getElementById("nl");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function showlap() {
        var x = document.getElementById("tlap");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function showdetpm() {
        var x = document.getElementById("detpm");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#jenis').on('change', function() {
            var jns = $(this).val();
            if (jns == 'Mandiri') {
                $('#test').prop('hidden', true);
                $('#test1').prop('hidden', true);
            } else {
                $('#test').prop('hidden', false);
                $('#test1').prop('hidden', false);

            }
        });
    });
</script>
</body>

</html> -->