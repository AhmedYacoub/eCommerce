<div class="container">
	<form class="add" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<h2 class="text-center">Add User</h2>
		<!-- Start Username input -->
		<div class="form-group">
			<label for="username">Username</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="newUserUsername" class="form-control" placeholder="Enter Username..." required="" autocomplete="off"
					value="<?php if (isset($newUserUsername)) echo $newUserUsername; ?>" />
					<span class="alert-danger center-block" id="error"><?php if (isset($addNewUserArray)) echo $addNewUserArray[0] ?></span>
			</div>
		</div>
		<!-- End Username input -->

		<!-- Start Password input -->
		<div class="form-group">
			<label for="password">Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="newUserPassword" class="form-control" placeholder="Enter Password..." autocomplete="new-password" />
				<span class="alert-danger center-block" id="error"><?php if (isset($addNewUserArray)) echo $addNewUserArray[1] ?></span>
			</div>
		</div>
		<!-- End Password input -->

		<!-- Start retype Password input -->
		<div class="form-group">
			<label for="rePassword">Retype Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="newUserRePassword" class="form-control" placeholder="Re-Enter your Password..." autocomplete="new-password" />
				<span class="alert-danger center-block" id="error"><?php if (isset($addNewUserArray)) echo $addNewUserArray[2] ?></span>
			</div>
		</div>
		<!-- End retype Password input -->

		<!-- Start Email input -->
		<div class="form-group">
			<label for="email">Email</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="email" name="newUserEmail" class="form-control" placeholder="Enter Email..." required="" autocomplete="off"
					value="<?php if (isset($newUserEmail)) echo $newUserEmail; ?>" />
			</div>
		</div>
		<!-- End Email input -->

		<!-- Start Fullname input -->
		<div class="form-group">
			<label for="fullname">Fullname</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
				<input type="text" name="newUserFullname" class="form-control" placeholder="Enter Fullname..." required="" autocomplete="off"
				 	value="<?php if (isset($newUserFullname)) echo $newUserFullname; ?>" />
					<span class="alert-danger center-block" id="error"><?php if (isset($addNewUserArray)) echo $addNewUserArray[3] ?></span>
			</div>
		</div>
		<!-- End Fullname input -->

		<!-- Start Submit button -->
		<div class="form-group">
			<button type="Submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-plus"></i> Add User</button>
		</div>
		<!-- End Submit button -->
	</form>
</div>
