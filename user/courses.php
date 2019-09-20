<?php 
    include 'includes/header.php';
    include '../core/init.php';
?>

<?php 
    $selCourses = "SELECT * FROM courses WHERE deleted = 0";
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
                            <th>Course Description</th>
                            <td><?=nl2br($courses['course_description']);?></td>
                        </tr>
                        <tr>
                            <th>Course Objective</th>
                            <td><?=nl2br($courses['course_objective']);?></td>
                        </tr>
                        <tr>
                            <th>Course Duration</th>
                            <td><?=$courses['course_duration'];?></td>
                        </tr>
                        <tr>
                            <th>Course Category</th>
                            <td><?=$courses['course_category'];?></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="courses.php?apply=<?=$courses['id'];?>" id="apply" name="apply" class="btn btn-default btn-md">Apply Now</a>
                </div>
            </div>
            <br>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php';?>