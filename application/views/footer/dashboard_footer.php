<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

<script>
    //-------------
    //- BAR CHART -
    //-------------



    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }]
        }
    }

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
            console.log(data);
            data.forEach(product => {
                var dataset = [{
                        label: 'Waiting',
                        backgroundColor: '#ffc107',
                        data: []
                    },
                    {
                        label: 'On-Progress',
                        backgroundColor: '#17a2b8',
                        data: []
                    },
                    {
                        label: 'Finish',
                        backgroundColor: '#28a745',
                        data: []
                    }
                ];
                var labels = [];
                product.components.forEach(component => {
                    // Waiting
                    dataset[0].data.push(component.reports.waiting);
                    // On-Progress
                    dataset[1].data.push(component.reports['on-progress']);
                    // Finish
                    dataset[2].data.push(component.reports.finish);
                    labels.push(component.name);
                });
                var barChartCanvas = $('#barChart-' + product.name).get(0).getContext('2d')
                var barChart = new Chart(barChartCanvas, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: dataset
                    },
                    options: barChartOptions
                })
            });
        },
        error: function(err) {
            console.error(err);
        }
    })
</script>