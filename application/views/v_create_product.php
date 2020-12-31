<?php
$footer = "create_product_footer.php";
$products = $this->M_Product->getAll();
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Select Component / Part</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="product">Product</label>
            <select name="product" id="product" class="form-control">
                <?php
                foreach ($products as $product) {
                    echo "<option value='$product->id'>$product->name</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <table class="table table-bordered" id="table-component">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Part Number</th>
                        <th>Stock</th>
                        <th>Destination</th>
                        <th>Material type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Part List</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered" id="table-cart">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Part ID</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="form-group">
            <label>Duration Plan</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control float-right" id="reservation">
            </div>
            <!-- /.input group -->
        </div>
        <button class="btn btn-primary" id="btn-submit">Submit</button>
    </div>

</div>
<!-- The Modal -->
<div class="modal" id="message-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>Success to order your component</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>

        </div>
    </div>
</div>