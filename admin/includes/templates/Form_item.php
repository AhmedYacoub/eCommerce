<div class="container add-item">
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<h2 class="text-center"><?php echo $header; ?></h2>
		<!-- Start Category name input [text, name: name] -->
		<div class="form-group">
			<label for="name">Item Name</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-tag"></i></span>
				<input type="text" name="name" class="form-control" placeholder="Enter Item's name..." required="" autocomplete="off"
					value="<?php if (isset($itemInputs['name'])) echo $itemInputs['name']; ?>" />
					<span class="alert-danger center-block" id="error"><?php if (isset($error)) echo $error[0] ?></span>
			</div>
		</div>
		<!-- End Category name input -->

		<!-- Start Description input [text, name: description] -->
		<div class="form-group">
			<label for="description">Item Description</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="text" name="description" class="form-control" placeholder="Enter Category's description..." autocomplete="off"
					value="<?php if (isset($itemInputs['description'])) echo $itemInputs['description']; ?>" required />
				<span class="alert-danger center-block" id="error"><?php if (isset($error)) echo $error[1] ?></span>
			</div>
		</div>
		<!-- End Description input [number, name: price] -->

		<!-- Start Price input -->
		<div class="form-group">
			<label for="price">Price (in USD)</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-usd"></i></span>
				<input type="number" name="price" class="form-control" placeholder="Enter price..." autocomplete="off"
					value="<?php if (isset($itemInputs['price'])) echo $itemInputs['price']; ?>" required />
				<span class="alert-danger center-block" id="error"><?php if (isset($error)) echo $error[2] ?></span>
			</div>
		</div>
		<!-- End Price input -->

	    <!-- Start Country input [text, name: country] -->
	    <div class="form-group">
	      <label for="country">Country (full name)</label>
	      <div class="input-group">
	        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
	        <input type="text" name="country" class="form-control" placeholder="Enter Manufacturer's country..." autocomplete="off"
	          value="<?php if (isset($itemInputs['country'])) echo $itemInputs['country']; ?>" required />
	        <span class="alert-danger center-block" id="error"><?php if (isset($error)) echo $error[3] ?></span>
	      </div>
	    </div>
	    <!-- End Country input -->

	    <!-- Start Status input [selectbox, name: status] -->
		<div class="form-group">
			<label for="status">Item Status (current status)</label>
			<?php 
			if(isset($itemInputs['status'])) {
				$check = $itemInputs['status']; 
				if($check == 0) {$check0 = "selected";} 
				if($check == 1) {$check1 = "selected";} 
				if($check == 2) {$check2 = "selected";} 
				if($check == 3) {$check3 = "selected";} 
			}
			?>	
	        <div class="input-group">
	        	<span class="input-group-addon"><i class="fa fa-question"></i></span>
	        	<select class="form-control" name="status">
			        <option value="0" <?php if(isset($check0))  echo $check0; ?> >New</option>
			        <option value="1" <?php if(isset($check1))  echo $check1; ?> >Like New</option>
			        <option value="2" <?php if(isset($check2))  echo $check2; ?> >Used</option>
			        <option value="3" <?php if(isset($check3))  echo $check3; ?> >Very Old</option>
	        	</select>
	        </div>
		</div>
		<!-- End Status input -->

	    <!-- Start Rating input [selectbox, name: rating] -->
	    <div class="form-group">
			<label for="rating">Rating</label>
			<?php 
			if(isset($itemInputs['rating'])) {
				$check = $itemInputs['rating']; 
				if($check == 1) {$check1 = "selected";} 
				if($check == 2) {$check2 = "selected";} 
				if($check == 3) {$check3 = "selected";} 
				if($check == 4) {$check4 = "selected";} 
				if($check == 5) {$check5 = "selected";} 
			}
			?>
	        <div class="input-group">
		        <span class="input-group-addon"><i class="fa fa-star"></i></span>
			    <select class="form-control" name="rating">
			      <option value="1"<?php if(isset($check1))  echo $check1; ?> >1 Stars</option>
			      <option value="2"<?php if(isset($check2))  echo $check2; ?> >2 Stars</option>
			      <option value="3"<?php if(isset($check3))  echo $check3; ?> >3 Stars</option>
			      <option value="4"<?php if(isset($check4))  echo $check4; ?> >4 Stars</option>
			      <option value="5"<?php if(isset($check5))  echo $check5; ?> >5 Stars</option>
			    </select>
	        </div>
		</div>
		<!-- End Rating input -->

		<!-- Start Category ID input [selectbox, name: catID] -->
	    <div class="form-group">
			<label for="rating">Related Category</label>
	        <div class="input-group">
		        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
			    <select class="form-control" name="catID">
			      <?php
			      	foreach ($cat as $key) {
			      		echo '<option value="'.$key['ID'].'"';
			      		if(isset($_GET['catID']) && $key['ID'] == $_GET['catID']) {echo "selected";}
			      		echo '>'.$key['Name'].'</option>';
			      	}
			      ?>
			    </select>
	        </div>
		</div>
		<!-- End Rating input -->

		<!-- Start Member ID input [selectbox, name: memID] -->
	    <div class="form-group">
			<label for="rating">Related Member</label>
	        <div class="input-group">
		        <span class="input-group-addon"><i class="fa fa-user"></i></span>
			    <select class="form-control" name="memID">
			      <?php
			      	foreach ($users as $key) {
			      		echo '<option value="'.$key['UserID'].'">'.$key['Username'].'</option>';
			      	}
			      ?>
			    </select>
	        </div>
		</div>
		<!-- End Rating input -->

		<!-- Start Submit button -->
		<div class="form-group">
			<button type="Submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-plus"></i> <?php echo $header; ?> </button>
		</div>
		<!-- End Submit button -->
	</form>
</div>