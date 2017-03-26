<div class="container">
	<form class="add" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<h2 class="text-center"><?php echo $header; ?></h2>
		<!-- Start Category name input -->
		<div class="form-group">
			<label for="name">Name</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-tag"></i></span>
				<input type="text" name="name" class="form-control" placeholder="Enter Category's name..." required="" autocomplete="off"
					value="<?php if (isset($itemInputs['name'])) echo $itemInputs['name']; ?>" />
					<span class="alert-danger center-block" id="error"><?php if (isset($error)) echo $error[0] ?></span>
			</div>
		</div>
		<!-- End Category name input -->

		<!-- Start Description input -->
		<div class="form-group">
			<label for="description">Description</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="text" name="description" class="form-control" placeholder="Enter Category's description..." autocomplete="off"
					value="<?php if (isset($itemInputs['description'])) echo $itemInputs['description']; ?>" />
				<span class="alert-danger center-block" id="error"><?php if (isset($error)) echo $error[1] ?></span>
			</div>
		</div>
		<!-- End Description input -->

		<!-- Start Arrange input -->
		<div class="form-group">
			<label for="arrange">Arrange</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
				<input type="number" name="arrange" class="form-control" placeholder="Enter Arrange value..." autocomplete="off"
					value="<?php if (isset($itemInputs['arrange'])) echo $itemInputs['arrange']; ?>" />
				<span class="alert-danger center-block" id="error"><?php if (isset($error)) echo $error[2] ?></span>
			</div>
		</div>
		<!-- End Arrange input -->

		<!-- Start Visibility input -->
    <div class="form-group">
      <div class="col-sm-4">
        <p><i class="fa fa-eye"></i> Would you like to make this item visible?</p>
      </div>
			<?php if(isset($itemInputs['visible']) && $itemInputs['visible'] == '0') {$check1 = "checked"; $check2="";} else {$check1=""; $check2="checked";} ?>
  		<lable class="radio-inline">
        <input type="radio" name="visible" value="0" <?php echo $check1;?>  /> Yes
      </lable>
  		<label class="radio-inline">
        <input type="radio" name="visible" value="1" <?php echo $check2; ?> /> No
      </lable>
    </div>
		<!-- End Email input -->

		<!-- Start Comments input -->
    <div class="form-group">
      <div class="col-sm-4">
        <p><i class="fa fa-comment"></i> Would you like to allow comments for this item?</p>
      </div>
			<?php if(isset($itemInputs['comment']) && $itemInputs['comment'] == '0') {$check1 = "checked"; $check2="";} else {$check1=""; $check2="checked";} ?>
  		<lable class="radio-inline">
        <input type="radio" name="comment" value="0" <?php echo $check1;?> /> Yes
      </lable>
  		<label class="radio-inline">
        <input type="radio" name="comment" value="1" <?php echo $check2; ?> /> No
      </lable>
    </div>
		<!-- End Comments input -->

    <!-- Start Comments input -->
    <div class="form-group">
      <div class="col-sm-4">
        <p><i class="fa fa-tv"></i> Would you like to allow Advertising for this item?</p>
      </div>
			<?php if(isset($itemInputs['ads']) && $itemInputs['ads'] == '0') {$check1 = "checked"; $check2="";} else {$check1=""; $check2="checked";} ?>
  		<lable class="radio-inline">
        <input type="radio" name="ads" value="0" <?php echo $check1;?> /> Yes
      </lable>
  		<label class="radio-inline">
        <input type="radio" name="ads" value="1" <?php echo $check2; ?> /> No
      </lable>
    </div>
		<!-- End Comments input -->

		<!-- Start Submit button -->
		<div class="form-group">
			<button type="Submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-plus"></i> <?php echo $header; ?></button>
		</div>
		<!-- End Submit button -->
	</form>
</div>
