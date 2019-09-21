<?php include 'includes/header.php';?>

<?php
	$sql = "SELECT * FROM step";
    $result = $db->query($sql);
?>

<h2 class="h2-responsive text-center p-3">List of registered women(s)</h2>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<th></th>
				<th><b>First Name</b></th>
				<th><b>Last Name</b></th>
				<th><b>Email</b></th>
				<th><b>Phone</b></th>
				<th><b>Address</b></th>
				<th><b>City</b></th>
				<th><b>State</b></th>
				<th><b>Zipcode</b></th>
				<th><b>No. of Family Members</b></th>
				<th><b>No. of Childred</b></th>
				<th><b>Income</b></th>
				<th><b>Date of Registration</b></th>
			</thead>
			<tbody>
				<?php while($user = mysqli_fetch_array($result)): ?>
					<tr>
						<td><a href="users.php?delete=<?=$user['id'];?>"><i class="fas fa-trash"></i></a></td>
						<td><?=$user['firstname'];?></td>
						<td><?=$user['lastname'];?></td>
						<td><?=$user['email'];?></td>
						<td><?=$user['phone'];?></td>
						<td><?=$user['address'];?></td>
						<td><?=$user['city'];?></td>
						<td><?=$user['state'];?></td>
						<td><?=$user['zipcode'];?></td>
						<td><?=$user['noOfMembers'];?></td>
						<td><?=$user['noOfChildren'];?></td>
						<td><?=$user['income'];?></td>
						<td><?=$user['dateOfRegistration'];?></td>
					</tr>
				<?php endwhile;?>
			</tbody>
		</table>
	</div>
</div>

<?php include 'includes/footer.php';?>