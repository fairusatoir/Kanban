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
    <div class="card-body">
        <div class="chart">
            <?php
            $componentNames = $this->M_Component->getByProductId(1);
            foreach ($componentNames as $componentName) {
                $idName = "barChart-Aileron-" . $componentName->name;
            ?>
                <div class="chart">
                    <canvas id=<?php echo $idName ?> style="height:230px; min-height:230px"></canvas>
                </div>
            <?php
            }
            ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- BAR CHART -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Elevator</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="barChart-Elevator" style="height:230px; min-height:230px"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- BAR CHART -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Rudder</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="barChart-Rudder" style="height:230px; min-height:230px"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->