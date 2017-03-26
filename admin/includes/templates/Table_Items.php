<div class="container showItems">

	<h1 class="text-center">Manage Items</h1>
	<div class="table-responsive">
		<div class="text-right">
			<i class="fa fa-sort"></i> Ordering:
			<a href="item.php?Arrange=ASC">Ascending</a> |
			<a href="item.php?Arrange=DESC">Descending</a>
		</div>
		<table class="table table-striped showUsers mngItem">
			<thead>
				<tr>
					<td>Items Information</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<!-- Start Table body -->
				<?php
					foreach ($rows as $key) {
						echo "<tr class='section'>";
						echo "<td><h2>".$key['Name']."</h2>";
						echo "<p class='description'><b>Description: </b>".$key['Description']."</p>";
						echo "<p class='description'><b>Price: </b>$".$key['Price']."</p>";
						echo "<p class='description'><b>Country: </b>".$key['Country']."</p>";
						echo "<p class='description'><b>Status: </b>".rate($key['Status'])."</p>";
						echo "<p class='description'><b>Rate: </b></p>";
						echo "<p class='description'>".stars($key['Rating'])."</p>";
						echo "<p class='description'><b>Category: </b>".oneRecord("Name", "categories", "ID = ".$key['Cat_ID'])."</p>";
						echo "<p class='description'><b>Vendor: </b>".oneRecord("Username", "users", "UserID = ".$key['Member_ID'])."</p>";
						echo "<hr />";
						$id =  $key['ID'];
						$uid = $key['Member_ID'];
						echo "<a href='comments.php?action=Add&itemID=$id&userID=$uid'>Write a comment</a>";
						echo "<p style='font-size: 12px;'>Added Date: ".$key['addDate']."</p>";


						echo "<td>";
						// Delete button
						echo ' <a href="item.php?action=Delete&id='.$key['ID'].'" class="btn btn-danger btn2"  title="Delete"><span class="glyphicon glyphicon-remove"></span> Delete</a>';

						// Edit button
						echo ' <a href="item.php?action=Edit&id='.$key['ID'].'&catID='.$key['Cat_ID'].'" class="btn btn-success btn1" title="Update"><span class="glyphicon glyphicon-edit"></span> Edit</a>';

						echo "</td>";

						echo "</tr>";
					}
				?>
				<!-- End Table body -->
			</tbody>
		</table>

		<?php
			echo '<a href="item.php?action=Add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add new Item</a>';
		?>
	</div>

</div>
