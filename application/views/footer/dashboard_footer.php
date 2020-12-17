<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

<script>
    //-------------
    //- BAR CHART -
    //-------------

    // var barChart = new Chart(barChartCanvas, {
    //     type: 'bar', 
    //     data: [],
    //     options: barChartOptions
    // })

    $.ajax({
        url: "order/report",
        method: "GET",
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);
            data.forEach(product => {
                product.components.forEach(components => {
                    var barChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false,
                        title: {
                            display: true,
                            text: components.name
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: 1
                                }
                            }]
                        }
                    }
                    console.log(components)
                    var dataset = [{
                        label: components.name,
                        backgroundColor: ['#f74a4a', '#ffc107', '#22e342'],
                        data: [components.reports.waiting, components.reports['on-progress'], components.reports.finish]
                    }];
                    var barChartCanvas = $('#barChart-' + product.name + '-' + components.name).get(0).getContext('2d')
                    // console.log(barChartCanvas)
                    var barChart = new Chart(barChartCanvas, {
                        type: 'doughnut',
                        data: {
                            labels: ["waiting", "on-progress", "finish"],
                            datasets: dataset,
                        },
                        options: barChartOptions
                    })
                })
            });
        },
        error: function(err) {
            console.error(err);
        }
    })
</script>