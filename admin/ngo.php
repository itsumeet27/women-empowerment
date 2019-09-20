<?php 
	include 'includes/header.php';
?>

<?php
	$sql = "SELECT * FROM ngo";
    $result = $db->query($sql);
?>

<h2 class="h2-responsive text-center p-3">List of registered NGO(s)</h2>
<div class="container-fluid">
		<div class="card-body table-responsive">
			<table class="table table-bordered">
				<thead>
					<th></th>
					<th><b>Name</b></th>
					<th><b>Headed By</b></th>
					<th><b>Description</b></th>
					<th><b>Email</b></th>
					<th><b>Phone</b></th>
					<th><b>Address</b></th>
					<th><b>City</b></th>
					<th><b>State</b></th>
					<th><b>Zipcode</b></th>
					<th><b>Organization Type</b></th>
					<th><b>Date of Registration</b></th>
				</thead>
				<tbody>
					<?php while($ngo = mysqli_fetch_array($result)): ?>
						<tr>
							<td><a href="ngo.php?delete=<?=$ngo['id'];?>"><i class="fas fa-trash"></i></a></td>
							<td><?=$ngo['ngo_name'];?></td>
							<td><?=$ngo['ngo_head'];?></td>
							<td><?=$ngo['ngo_description'];?></td>
							<td><?=$ngo['email'];?></td>
							<td><?=$ngo['phone'];?></td>
							<td><?=$ngo['ngo_address'];?></td>
							<td><?=$ngo['city'];?></td>
							<td><?=$ngo['state'];?></td>
							<td><?=$ngo['zipcode'];?></td>
							<td><?=$ngo['organization_type'];?></td>
							<td><?=$ngo['date'];?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
</div>

<?php include 'includes/footer.php';?>