<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    //-------------
    //- BAR CHART -
    //-------------

    // var barChart = new Chart(barChartCanvas, {
    //     type: 'bar', 
    //     data: [],
    //     options: barChartOptions
    // })

    var nameProduct = "";
    var nameComponen = ""
    var dataSetTable = []

    $.ajax({
        url: "order/report",
        method: "GET",
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            data.forEach(product => {
                // console.log(product.components);
                nameProduct = product.name;
                product.components.forEach(components => {
                    // console.log(components);

                    nameComponen = components.name
                    // console.log(components)
                    var label = ["waiting", "on-progress", "finish"];
                    var jum = components.reports.waiting + components.reports['on-progress'] + components.reports.finish
                    // console.log(typeof(jum));
                    var dataChart = [components.reports.waiting, components.reports['on-progress'], components.reports.finish];

                    // if (jum > 0) {
                    // console.log(nameComponen);
                    var barChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false,
                        title: {
                            display: true,
                            text: nameComponen
                        }
                    }

                    var dataset = [{
                        label: nameComponen,
                        backgroundColor: ['#f74a4a', '#ffc107', '#22e342'],
                        data: dataChart
                    }];

                    var barChartCanvas = $('#barChart-' + nameProduct + '-' + nameComponen).get(0).getContext('2d')
                    var barChart = new Chart(barChartCanvas, {
                        type: 'doughnut',
                        data: {
                            labels: label,
                            datasets: dataset,
                        },
                        options: barChartOptions
                    })



                    var waiting = (components.reports.waiting / jum) * 100;
                    var onProgress = (components.reports['on-progress'] / jum) * 100;
                    var finish = (components.reports.finish / jum) * 100;

                    dataSetTable = [{
                            order: 1,
                            status: 'Waiting',
                            percen: waiting.toFixed(2),
                            total: components.reports.waiting
                        },
                        {
                            order: 2,
                            status: 'On-Progress',
                            percen: onProgress.toFixed(2),
                            total: components.reports['on-progress']
                        },
                        {
                            order: 3,
                            status: 'Finish',
                            percen: finish.toFixed(2),
                            total: components.reports.finish
                        },
                    ]

                    // console.log(dataSetTable)

                    var table = $('#table-' + nameProduct + '-' + nameComponen).DataTable({
                        data: dataSetTable,
                        columns: [{
                                data: "order"
                            },
                            {
                                data: "status"
                            },
                            {
                                data: "percen"
                            },
                            {
                                data: "total"
                            }
                        ]
                    })
                    // }
                })
            });
        },
        error: function(err) {
            console.error(err);
        }
    })
</script>