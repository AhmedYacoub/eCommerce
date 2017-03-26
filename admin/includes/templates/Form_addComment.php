<div class="container">
	<form class="add" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		
		<div class="form-group">
		<label for="comments">Write your comment:</label>
		<textarea class="form-control" rows="5" id="comments" name="comment" required=""></textarea>
		</div>
		<!-- Start Submit button -->
		<div class="form-group">
			<button type="Submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-plus"></i> <?php echo $header; ?></button>
		</div>
		<!-- End Submit button -->
	</form>
</div>
