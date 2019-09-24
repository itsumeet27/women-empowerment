<?php 
    session_start();
    include 'includes/header.php';
    include '../core/init.php';
?>

<?php 
    $selCourses = "SELECT c.id, c.course_name, c.course_duration, c.course_category, n.ngo_name, n.email, n.phone, n.ngo_head FROM courses c INNER JOIN ngo n ON c.ngo_id = n.id";
    $resultCourses = $db->query($selCourses);
?>

<div class="container-fluid" id="background">
    <h2 class="text-center p-3">Courses provided by NGO(s)</h2>
    <div class="row">
        <?php while($courses = mysqli_fetch_array($resultCourses)): ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="text-center"><?=$courses['course_name'];?></h4>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Course Duration</th>
                            <td><?=$courses['course_duration'];?></td>
                        </tr>
                        <tr>
                            <th>Course Category</th>
                            <td><?=$courses['course_category'];?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?=$courses['email'];?></td>
                        </tr>
                        <tr>
                            <th>Contact No</th>
                            <td>+91 <?=$courses['phone'];?></td>
                        </tr>
                        <tr>
                            <th>Headed by</th>
                            <td><?=$courses['ngo_head'];?></td>
                        </tr>
                        <tfoot>
                            <label>Provided by: </label> <?=$courses['ngo_name'];?>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-left">
                        
                    </div>
                    <div class="float-right">
                        <a href="courses.php?course=<?=$courses['id'];?>" id="apply" name="apply" class="btn btn-default btn-md">View Details</a>
                    </div>                    
                </div>
            </div>
            <br>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php';?>