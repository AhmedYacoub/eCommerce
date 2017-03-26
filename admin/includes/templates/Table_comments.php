<div class="container">

	<h1 class="text-center">Manage Comments</h1>
	<div class="table-responsive">
		<table class="table table-striped table-bordered text-center showUsers">
			<!-- Table head -->
			<thead>
				<tr>
					<td>Comment</td>
					<td>Related User</td>
					<td>Related Item</td>
					<td>Added Date</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<!-- Start Table body -->
				<?php
					foreach ($rows as $key) {
						echo "<tr>";
						echo "<td>".$key['Comment']."</td>";
						echo "<td>".$key['Username']."</td>";	
						echo "<td>".$key['Name']."</td>";		
						echo "<td>".$key['Comment_Date']."</td>";
						echo "<td>";

						// Approve button [shows only if the comment status is 0 (not approved yet)]

						if ( isset( $key['Status'] ) && $key['Status'] == 0) {
							echo ' <a href="comments.php?action=pcom&id='.$key['Comment_ID'].'" class="btn btn-info" title="Approve"><span class="glyphicon glyphicon-ok"></span> Approve</a>';
						}


						// Delete button [shows by default]

						echo ' <a href="comments.php?action=Delete&id='.$key['Comment_ID'].'" class="btn btn-danger" title="Delete"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
						echo "</td>";

						echo "</tr>";
					}
				?>
				<!-- End Table body -->
			</tbody>
		</table>
	</div>

</div>
