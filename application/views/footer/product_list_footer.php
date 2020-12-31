<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    var productList = $("#product-list");
    console.log(productList.val());
    var table = $("#table-product").DataTable({
        ajax: {
            url: "order/get_all_by_product/" + productList.val(),
            dataSrc: function(data) {
                // console.table(data);
                return data.map(function(order) {
                    var action = "";
                    var userActive = "<?php echo $this->session->user->role ?>";
                    var statusRedaksional = order.status;
                    if (order.status == "waiting") {
                        action += "<button onClick='edit(" + order.id + ")' class='btn btn-success'>Edit</button> ";
                        action += "<button onClick='deleteComponent(" + order.id + ")' class='btn btn-danger'>Hapus</button> ";
                        // console.log(userActive);
                        if (userActive == "store") {
                            action += "<button onClick='storeStatusDone(" + order.id + ")' class='btn btn-warning'>Done</button>";
                            statusRedaksional = "Release";
                        }
                    }

                    if ((order.status != "waiting") && (userActive == "store")) {
                        statusRedaksional = "finish";
                    }

                    if (userActive != "store") {
                        if (order.status == "finish") {
                            if (order.statusTime == "late") {
                                statusRedaksional = "Finish (late)";
                            } else {
                                statusRedaksional = "Finish (on time)";
                            }
                        } else if (order.status == "on-progress") {
                            if (order.done == "0") {
                                statusRedaksional = "lv " + order.level + " " + statusRedaksional;
                                action += "<button onClick='setDone(" + order.id + ")' class='btn btn-warning'>lv " + order.level + " Done</button>";
                            } else if (order.done == "1") {
                                statusRedaksional = "lv " + order.level + " " + statusRedaksional + " (Done )";
                            }
                        }


                    }

                    console.log(order.start_date);

                    return {
                        id: order.id,
                        // product: order.product,
                        component_id: order.name,
                        partName: order.alias,
                        NHA: "",
                        quantity: order.quantity,
                        start_date: order.start_date,
                        end_date: order.end_date,
                        status: statusRedaksional,
                        action: action
                    };
                });
            }
        },
        columns: [
            // {
            //     data: "product"
            // },
            {
                data: "component_id"
            },
            {
                data: "partName"
            },
            {
                data: "NHA"
            },
            {
                data: "quantity"
            },
            {
                data: "start_date"
            },
            {
                data: "end_date"
            },
            {
                data: "status"
            },
            {
                data: "action"
            }
        ]
    });
    productList.on("change", function() {
        let id = $(this).val();
        // console.log(id);
        requestComponent(id);
    });

    function requestComponent(id) {
        table.ajax.url("order/get_all_by_product/" + id);
        table.ajax.reload();
    }

    function setDone(id) {
        $.ajax({
            url: "order/set_done",
            method: "POST",
            data: {
                id: id
            },
            success: function() {
                location.reload()
            },
            error: function() {
                alert("Terjadi Kesalahan");
            }
        })
    }

    function edit(id) {
        $("#edit-modal").modal("show");
        var order = {};
        for (let i = 0; i < table.ajax.json().length; i++) {
            if (table.ajax.json()[i].id == id) {
                order = table.ajax.json()[i];
                break;
            }
        }
        $("#order-id").val(id);
        $("#product").val(order.product_id);
        $("#component-id").val(order.name);
        $("#component-qty").val(order.quantity);

    }

    function confirmUpdate() {
        var id = $("#order-id").val();
        var qty = $("#component-qty").val();
        $(".se-pre-con").fadeIn("fast");
        $.ajax({
            url: "order/update",
            method: "POST",
            data: {
                id: id,
                quantity: qty
            },
            success: function() {
                $(".se-pre-con").fadeOut("fast");
                // alert("Success update order");
                $("#message").text("Success to update order");
                $("#message-modal").modal("show");
                table.ajax.reload();
            },
            error: function() {
                $(".se-pre-con").fadeOut("fast");
                alert("Failed to update order");
            }
        })
    }

    function deleteComponent(id) {
        if (confirm("Are you sure to delete this component order?")) {
            $(".se-pre-con").fadeIn("fast");
            $.ajax({
                url: "order/delete",
                method: "POST",
                data: {
                    id: id
                },
                success: function() {
                    $(".se-pre-con").fadeOut("fast");
                    // alert("Success delete order");
                    $("#message").text("Success delete order");
                    $("#message-modal").modal("show");
                    table.ajax.reload()
                },
                error: function() {
                    alert("Failed to delete order");
                }
            })
        }
    }

    function storeStatusDone(id) {
        var userActive = "<?php echo $this->session->user->role ?>";
        if (userActive == "store") {
            if (confirm("Are you sure this proses is DONE ?")) {
                $(".se-pre-con").fadeIn("fast");
                $.ajax({
                    url: "order/move",
                    method: "POST",
                    data: {
                        id: id,
                        status: "on-progress",
                        level: 0,
                        user: userActive
                    },
                    success: function() {
                        // console.log("MASUK")

                        $(".se-pre-con").fadeOut("fast");
                        // alert("Success delete order");
                        $("#message").text("Success process data");
                        $("#message-modal").modal("show");
                        table.ajax.reload()
                    },
                    error: function() {
                        alert("Failed process data");
                    }
                })
            }

        } else {
            alert("Failed change Status");
        }
    }
</script>