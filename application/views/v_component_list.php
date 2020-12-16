<?php
	$footer = "component_list_footer.php";
	$products = $this->M_Product->getAll();
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Select Product</h3>
	</div>
	<div class="card-body">
        <div class="form-group">
            <label for="product">Product</label>
            <select name="product" id="product" class="form-control">
                <?php
                    foreach($products as $product) {
                        echo "<option value='$product->id'>$product->name</option>";
                    }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Component List</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered" id="table-component">
                <thead>
                    <tr>
                        <th>Component ID</th>
                        <th>Component Name</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<!-- The Modal -->
<div class="modal" id="edit-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Component Stock</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="text" hidden id="component-id">
        <div class="form-group">
            <label for="component-id">Component ID</label>
            <input type="text" id="component-name" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="component-id">Component Name</label>
            <input type="text" id="component-alias" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="component-qty">Stock</label>
            <input type="number" id="component-stock" class="form-control">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" onClick="confirmUpdate()" data-dismiss="modal">Update</button>
      </div>

    </div>
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
        <p>Success to update component</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
      </div>

    </div>
  </div>
</div>