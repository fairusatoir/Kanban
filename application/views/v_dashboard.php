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
?>

<!-- BAR CHART -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Aileron</h3>
    </div>
    <div class="card-body">
        <div class="chart">
            <canvas id="barChart-Aileron" style="height:230px; min-height:230px"></canvas>
        </div>
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