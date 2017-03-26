<div class="container">

	<h1 class="text-center">Manage Members</h1>
	<div class="table-responsive">
		<table class="table table-striped table-bordered text-center showUsers">
			<thead>
				<tr>
					<td>ID</td>
					<td>Username</td>
					<td>Email</td>
					<td>Fullname</td>
					<td>Register Date</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<!-- Start Table body -->
				<?php
					foreach ($rows as $key) {
						echo "<tr>";
						echo "<td>".$key['UserID']."</td>";
						echo "<td>".$key['Username']."</td>";
						echo "<td>".$key['Email']."</td>";
						echo "<td>".$key['Fullname']."</td>";
						echo "<td>".$key['Date']."</td>";

						if ( isset( $key['RegisterStatus'] ) ) {
							echo "<td>";
							echo ' <a href="members.php?action=Pmembers&id='.$key['UserID'].'" class="btn btn-info" title="Activate"><span class="glyphicon glyphicon-ok"></span> Activate</a>';
							echo "</td>";
						} else{
							echo "<td>";
							echo ' <a href="members.php?action=Edit&id='.$key['UserID'].'" class="btn btn-success" title="Update"><span class="glyphicon glyphicon-edit"></span> Edit</a>';
							echo ' <a href="members.php?action=Delete&id='.$key['UserID'].'" class="btn btn-danger"  title="Delete"><span class="glyphicon glyphicon-remove"></span> Delete</a>';
							echo "</td>";
						}

						echo "</tr>";
					}
				?>
				<!-- End Table body -->
			</tbody>
		</table>

		<?php
			if (!isset($key['RegisterStatus'])) {
				echo '<a href="members.php?action=Add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add new User</a>';
			}
		?>
	</div>

</div>
