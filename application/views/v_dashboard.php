<?php
// $orders = $this->M_Order->getAll();
// $waiting = 0;
// $on_progress = 0;
// $finish = 0;
// foreach($orders as $order) {
//     if($order->status == "waiting") $waiting++;
//     else if($order->status == "on-progress") $on_progress++;
//     else $finish++;
// }
$footer = "dashboard_footer.php";
// $componentNames = $this->M_Component->getAll();
?>

<!-- BAR CHART -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Aileron</h3>
    </div>
    <?php
    $componentNames = $this->M_Component->getByProductId(1);
    foreach ($componentNames as $componentName) {
        $chartName = "barChart-Aileron-" . $componentName->name;
        $tableName = "table-Aileron-" . $componentName->name;
    ?>
        <div class="row">
            <div class="card-body col-md-6">
                <div class="chart">
                    <canvas id=<?php echo $chartName ?> style="height:230px; min-height:230px"></canvas>
                </div>
            </div>
            <div class="card-body col-md-6">
                <table class="table table-bordered" id=<?php echo $tableName ?>>
                    <thead>
                        <tr>
                            <th style="width: 5%;">no</th>
                            <th style="width: 50%;">Status</th>
                            <th>%</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    <?php
    }
    ?>

    <!-- /.card-body -->
</div>

<!-- /.card -->
<br>
<!-- BAR CHART -->
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Elevator</h3>
    </div>
    <?php
    $componentNames = $this->M_Component->getByProductId(3);
    foreach ($componentNames as $componentName) {
        $chartName = "barChart-Elevator-" . $componentName->name;
        $tableName = "table-Elevator-" . $componentName->name;
    ?>
        <div class="row">
            <div class="card-body col-md-6">
                <div class="chart">
                    <canvas id=<?php echo $chartName ?> style="height:230px; min-height:230px"></canvas>
                </div>
            </div>
            <div class="card-body col-md-6">
                <table class="table table-bordered" id=<?php echo $tableName ?>>
                    <thead>
                        <tr>
                            <th style="width: 50%;">Status</th>
                            <th>Perces</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    <?php
    }
    ?>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<br>
<!-- BAR CHART -->
<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Rudder</h3>
    </div>
    <?php
    $componentNames = $this->M_Component->getByProductId(2);
    foreach ($componentNames as $componentName) {
        $chartName = "barChart-Rudder-" . $componentName->name;
        $tableName = "table-Rudder-" . $componentName->name;
    ?>
        <div class="row">
            <div class="card-body col-md-6">
                <div class="chart">
                    <canvas id=<?php echo $chartName ?> style="height:230px; min-height:230px"></canvas>
                </div>
            </div>
            <div class="card-body col-md-6">
                <table class="table table-bordered" id=<?php echo $tableName ?>>
                    <thead>
                        <tr>
                            <th style="width: 50%;">Status</th>
                            <th>Perces</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    <?php
    }
    ?>
    <!-- /.card-body -->
</div>
<br>
<!-- /.card -->