<?php include 'includes/header.php';?>

<?php
	$sql = "SELECT s.firstname, s.lastname, s.email, s.phone, c.course_name, c.course_category, n.ngo_name, a.date FROM applications a INNER JOIN step s ON a.step_id = s.id INNER JOIN courses c ON a.course_id = c.id INNER JOIN ngo n ON a.ngo_id = n.id WHERE a.applied = 1";
	$result = $db->query($sql);
?>

  <h2 class="h2-responsive text-center p-2">List of women(s) applied for training</h2>
  <div class="container-fluid">
  	<table class="table table-bordered">
  		<thead>
			<th><b>First Name</b></th>
			<th><b>Last Name</b></th>
			<th><b>Email</b></th>
			<th><b>Phone</b></th>
			<th><b>Course Name</b></th>
			<th><b>Course Category</b></th>
			<th><b>Provided By</b></th>
			<th><b>Date of Registration</b></th>
		</thead>
		<tbody>
			<?php while($applications = mysqli_fetch_array($result)): ?>
				<tr>
					<td><?=$applications['firstname'];?></td>
					<td><?=$applications['lastname'];?></td>
					<td><?=$applications['email'];?></td>
					<td><?=$applications['phone'];?></td>
					<td><?=$applications['course_name'];?></td>
					<td><?=$applications['course_category'];?></td>
					<td><?=$applications['ngo_name'];?></td>
					<td><?=$applications['date'];?></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
  	</table>
  </div>

<?php include 'includes/footer.php';?>  