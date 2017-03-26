<div class="container" style="margin-top: 100px;">
	<form class="edit" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<h2 class="text-center">Edit User</h2>
		<!-- Start Username input -->
		<div class="form-group">
			<label for="username">New Username</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="username" class="form-control" placeholder="New Username..." required="" autocomplete="off" 
				value="<?php echo $oldUsername; ?>" />
			</div>
			<span class="alert-danger center-block" id="error"><?php if (isset($formError)) echo $formError[0] ?></span>
		</div>
		<!-- End Username input -->

		<!-- Start Password input -->
		<div class="form-group">
			<label for="password">New Password</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="password" class="form-control" placeholder="New Password..." autocomplete="new-password" />
			</div>
		</div>
		<!-- End Password input -->

		<!-- Start Email input -->
		<div class="form-group">
			<label for="email">New Email</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="email" name="email" class="form-control" placeholder="New Email..." required="" autocomplete="off"
					value="<?php echo $oldEmail; ?>" />
			</div>
			<span class="alert-danger center-block" id="error"><?php if (isset($formError)) echo $formError[1] ?></span>
		</div>
		<!-- End Email input -->

		<!-- Start Fullname input -->
		<div class="form-group">
			<label for="fullname">New Fullname</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
				<input type="text" name="fullname" class="form-control" placeholder="New Fullname..." required="" autocomplete="off"
					value="<?php echo $oldFullname; ?>" />
			</div>
			<span class="alert-danger center-block" id="error"><?php if (isset($formError)) echo $formError[2] ?></span>
		</div>
		<!-- End Fullname input -->

		<!-- Start Submit button -->
		<div class="form-group">
			<button type="Submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-send"></i> Update User</button>
		</div>
		<!-- End Submit button -->
	</form>
</div>