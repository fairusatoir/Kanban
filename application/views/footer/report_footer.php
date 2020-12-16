<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<<script>
    var table = $("#table-report").DataTable({
        ajax: {
            url: "order/get_all",
            dataSrc: ''
        },
        columns: [
            {data: "product"},
            {data: "name"},
            {data: "quantity"},
            {data: "status"},
            {data: "start_date"},
            {data: "end_date"},
            {data: "actual_start"},
            {data: "actual_finish"}
        ],
        dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    })
</script>