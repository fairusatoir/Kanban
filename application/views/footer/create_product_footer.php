<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
    document.getElementById("btn-submit").disabled = true;
    var product = $("#product");
    var table = $("#table-component").DataTable({
        ajax: {
            url: "component/get_by_product/" + product.val(),
            dataSrc: function(data) {
                var no = 1;
                return data.map(function(item) {
                    return {
                        no: no++,
                        name: item.alias,
                        id: item.name,
                        stock: item.stock,
                        action: "<button class='btn btn-primary' onClick='add(" + (no - 2) + ")'>Tambah</buttom>"
                    }
                });
            }
        },
        columns: [{
                data: "no"
            },
            {
                data: "name"
            },
            {
                data: "id"
            },
            {
                data: "stock"
            },
            {
                data: "action"
            }
        ]
    });
    var table_cart = $("#table-cart").DataTable({
        data: [],
        columns: [{
                data: "alias"
            },
            {
                data: "name"
            },
            {
                data: "quantity"
            },
            {
                data: "action"
            }
        ]
    });
    product.on("change", function() {
        let id = $(this).val();
        console.log(id);
        requestComponent(id);
    });

    function add(idx) {
        var component = table.ajax.json()[idx];
        component.qty = 0;
        component.quantity = "<input type='number' cid='" + component.id + "' class='form-control component-qty' value='0'>";
        component.action = "<button class='btn btn-danger'>Hapus</buttom>"
        table_cart.row.add(component).draw();

        $(".component-qty").on("change paste keyup", function() {
            let id = $(this).attr("cid");
            let qty = $(this).val();
            for (let i = 0; i < table_cart.data().length; i++) {
                if (table_cart.data()[i].id == id) {
                    table_cart.data()[i].qty = qty;
                }
            }
        });
    }



    $("#table-cart tbody").on("click", "button.btn-danger", function() {
        table_cart.row($(this).parents("tr")).remove().draw();
    })

    function requestComponent(id) {
        table.ajax.url("component/get_by_product/" + id);
        table.ajax.reload();
    }

    var start_date = new Date();
    var end_date = new Date();

    

    $("#btn-submit").on("click", function() {
        var data = [];
        for (let i = 0; i < table_cart.data().length; i++) {
            data.push({
                id: table_cart.data()[i].id,
                qty: table_cart.data()[i].qty
            });
        }
        $(".se-pre-con").fadeIn("fast");
        $.ajax({
            url: "order/component",
            method: "POST",
            data: {
                data: data,
                start_date: start_date.format('YYYY-MM-DD'),
                end_date: end_date.format('YYYY-MM-DD')
            },
            success: function(data) {
                $(".se-pre-con").fadeOut("slow");
                // alert("Berhasil menambahkan data");
                $("#message-modal").modal("show");
            },
            error: function(err) {
                $(".se-pre-con").fadeOut("slow");
                alert("Terjadi kesalahan");
            }
        })

    })
    //Date range picker
    var date_picker = $('#reservation').daterangepicker();
    $('#reservation').on('apply.daterangepicker', function(ev, picker) {
        start_date = picker.startDate;
        end_date = picker.endDate;
        console.log(picker.startDate.format('YYYY-MM-DD'));
        console.log(picker.endDate.format('YYYY-MM-DD'));
        
        document.getElementById("btn-submit").disabled = false;
    });
</script>