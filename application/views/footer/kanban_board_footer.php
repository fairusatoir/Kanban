<!-- jquery-ui -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.js"></script>

<script>
    var userActive = "<?php echo $this->session->user->role ?>";
    if (userActive == "fabrication") {
        document.getElementById("custom-tabs-three-profile-tab").style.visibility = "hidden";
        document.getElementById("custom-tabs-three-messages-tab").style.visibility = "hidden";
        document.getElementById("custom-tabs-three-settings-tab").style.visibility = "hidden";
    }

    var todo = {
        Elevator: [],
        Aileron: [],
        Rudder: [],
        all: []
    };
    var doing = {
        Elevator: [],
        Aileron: [],
        Rudder: [],
        all: []
    };
    var done = {
        Elevator: [],
        Aileron: [],
        Rudder: [],
        all: []
    };

    loadAll();

    $('ul[id^="sort"]').sortable({
        connectWith: '.sortable',
        receive: function(e, ui) {
            var status_id = $(ui.item).parent(".sortable").data("status");
            var level;
            var userActive = "<?php echo $this->session->user->role ?>";
            if (status_id == "on-progress") {
                level = $(ui.item).parent(".sortable").data('level');
            }
            var task_id = $(ui.item).data("task-id");
            console.log({
                action: 'move',
                status: status_id,
                id: task_id,
                level: level
            });
            $.ajax({
                url: "order/move",
                method: "POST",
                data: {
                    id: task_id,
                    status: status_id,
                    level: level,
                    user: userActive
                },
                success: function(data) {
                    console.log(data);
                    loadAll();
                },
                error: function(err) {
                    alert('Gagal memindahkan kartu');
                }
            })
        }
    }).disableSelection();

    function loadAll() {
        todo = {
            Elevator: [],
            Aileron: [],
            Rudder: [],
            all: []
        };
        doing = {
            Elevator: [],
            Aileron: [],
            Rudder: [],
            all: []
        };
        done = {
            Elevator: [],
            Aileron: [],
            Rudder: [],
            all: []
        };
        if (userActive !== "fabrication") {
            $.ajax({
                url: "order/get_all",
                method: "GET",
                success: function(data) {
                    data = $.parseJSON(data);
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].status == 'waiting') {
                            todo[data[i].product].push(data[i]);
                            todo.all.push(data[i]);
                        } else if (data[i].status == 'on-progress') {
                            doing[data[i].product].push(data[i]);
                            doing.all.push(data[i]);
                        } else {
                            done[data[i].product].push(data[i]);
                            done.all.push(data[i]);
                        }
                    }
                    populateData();
                }
            });
        } else {
            $.ajax({
                url: "order/get_all_order_fabrication",
                method: "GET",
                success: function(data) {
                    data = $.parseJSON(data);
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].status == 'waiting') {
                            todo[data[i].product].push(data[i]);
                            todo.all.push(data[i]);
                        } else if (data[i].status == 'on-progress') {
                            doing[data[i].product].push(data[i]);
                            doing.all.push(data[i]);
                        } else {
                            done[data[i].product].push(data[i]);
                            done.all.push(data[i]);
                        }
                    }
                    populateData();
                }
            });
        }
    }

    function createCard(data) {
        if (data.visible == 0) {
            return "";
        }
        var color = "orange";
        var background = 'bg-danger';
        if (data.status == "on-progress") {
            color = "blue";
            background = 'bg-warning';
        } else if (data.status == 'finish') {
            color = "green";
            background = 'bg-success';
        }
        var level = "";
        var str = '<li class="text-row ui-sortable-handle ' + background + '" data-task-id="' + data.id + '">';
        if (data.status == "finish") {
            str += '<button type="button" onClick="hide(' + data.id + ')" class="close" >&times;</button>';
        } else if (data.status == "on-progress") {
            level = " (" + data.level + ")";
            if (data.done == 0) {
                str += '<button type="button" onClick="setDone(' + data.id + ')" class="close" >&check;</button>';
            }
        }
        str += "<ul>";
        str += "<li>" + data.product + "</li>";
        str += "<li>" + data.name + "</li>";
        // str    +=        "<li>"+data.alias+"</li>";
        str += "<li>" + data.quantity + "</li>";
        if (userActive !== "fabrication") {
            str += "<li>" + data.start_date + "</li>";
            str += "<li>" + data.end_date + "</li>";
        }
        str += '<li style="text-align: right; color: ' + color + ';">' + data.status + level + '</li>';
        // if (data.stock < data.quantity && data.status == 'waiting') {
        //     str += '<li style="text-align: right; color: yellow">' + (data.stock - data.quantity) + '</li>';
        // }
        str += "</ul>";
        str += "</li>";
        return str;
    }

    function populateData() {
        populateCard("all", "todo", todo.all);
        populateCard("all", "doing", doing.all);
        populateCard("all", "done", done.all);

        populateCard("aileron", "todo", todo.Aileron);
        populateCard("aileron", "doing", doing.Aileron);
        populateCard("aileron", "done", done.Aileron);

        populateCard("elevator", "todo", todo.Elevator);
        populateCard("elevator", "doing", doing.Elevator);
        populateCard("elevator", "done", done.Elevator);

        populateCard("rudder", "todo", todo.Rudder);
        populateCard("rudder", "doing", doing.Rudder);
        populateCard("rudder", "done", done.Rudder);
    }

    function populateCard(name, status, data) {
        // console.log(data)
        if (status == "doing" && name != "all") {
            $("ul[id*=sort-" + name + "-" + status + "-]").empty();
        } else {
            $("#sort-" + name + "-" + status).empty();
        }

        data.forEach(function(order) {
            var card = createCard(order);
            // console.log(order)
            var level = "";
            if (status == "doing" && name != "all") {
                level = "-" + order.level;
            }
            $("#sort-" + name + "-" + status + level).append(card);
        });
    }

    function hide(id) {
        $.ajax({
            url: "order/hide",
            method: "POST",
            data: {
                id: id
            },
            success: function() {
                loadAll();
            },
            error: function() {
                alert("Terjadi kesalahan");
            }
        })
    }

    function setDone(id) {
        $.ajax({
            url: "order/set_done",
            method: "POST",
            data: {
                id: id
            },
            success: function() {
                loadAll();
            },
            error: function() {
                alert("Terjadi Kesalahan");
            }
        })
    }
</script>