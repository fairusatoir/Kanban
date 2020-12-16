<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
var product = $("#product");
    var table = $("#table-component").DataTable({
        ajax: {
            url: "component/get_by_product/" + product.val(),
            dataSrc: function(data) {
                return data.map(function(component) {
                    return {
                        name: component.name,
                        alias: component.alias,
                        stock: component.stock,
                        action: "<button class='btn btn-primary' onClick='updateStock("+component.id+","+component.stock+","+'"'+component.name+'","'+component.alias+'"'+")'>Update Stock</button>"
                    }
                });
            }
        },
        columns: [
            {data: "name"},
            {data: "alias"},
            {data: "stock"},
            {data: "action"}
        ]
    })

    function updateStock(id, stock, name, alias) {
        $("#edit-modal").modal("show");
        $("#component-id").val(id);
        $("#component-name").val(name);
        $("#component-alias").val(alias);
        $("#component-stock").val(stock);
    }

    function confirmUpdate() {
        var id = $("#component-id").val();
        var stock = $("#component-stock").val();
        $(".se-pre-con").fadeIn("fast");
        $.ajax({
            url: "component/update",
            method: "POST",
            data: {
                id: id,
                stock: stock
            },
            success: function() {
                $(".se-pre-con").fadeOut("fast");
                $("#message-modal").modal("show");
                // alert("Success update component stock");
                table.ajax.reload();
            },
            error: function() {
                $(".se-pre-con").fadeOut("fast");
                alert("Failed to update component stock");
            }
        })
    }

    product.on("change", function() {
        let id = product.val();
        requestComponent(id);
    });

    function requestComponent(id) {
        table.ajax.url("component/get_by_product/" + id);
        table.ajax.reload();
    }
</script>