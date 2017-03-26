<div class="container showItems">

	<h1 class="text-center">Manage Items</h1>
	<div class="table-responsive">
		<div class="text-right">
			<i class="fa fa-sort"></i> Ordering:
			<a href="category.php?Arrange=ASC">Ascending</a> |
			<a href="category.php?Arrange=DESC">Descending</a>
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
						echo "<p class='description'>".$key['Description']."</p>";
						echo yesANDno($key['Visibility'], "Visible");
						echo yesANDno($key['AllowComment'], "Allow Comments");
						echo yesANDno($key['AllowAds'], "Allow Ads");
						echo "<hr />";
						echo "<p style='font-size: 12px;'>".$key['Date']."</p>";

						echo "<td style=''>";
						echo ' <a href="category.php?action=Delete&id='.$key['ID'].'" class="btn btn-danger btn2"  title="Delete"><span class="glyphicon glyphicon-remove"></span> Delete</a>';
						echo ' <a href="category.php?action=Edit&id='.$key['ID'].'" class="btn btn-success btn1" title="Update"><span class="glyphicon glyphicon-edit"></span> Edit</a>';
						echo "</td>";

						echo "</tr>";
					}
				?>
				<!-- End Table body -->
			</tbody>
		</table>

		<?php
			echo '<a href="category.php?action=Add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add new Item</a>';
		?>
	</div>

</div>
