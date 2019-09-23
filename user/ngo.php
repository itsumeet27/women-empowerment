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
                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-left">
                        <label>Provided by: </label> <?=$courses['ngo_name'];?>
                    </div>
                    <div class="float-right">
                        <?php 
                            // Check if user is logged in
                            if(!isset($_SESSION['email'])){
                              echo "<a href='login.php' id='apply' name='apply' class='btn btn-default btn-md'>Apply Now</a>";
                            }else{
                        ?>

                        <a href="ngo.php?apply=<?=$courses['id'];?>" id="apply" name="apply" class="btn btn-default btn-md">Apply Now</a>
                    <?php } ?>
                    </div>                    
                </div>
            </div>
            <br>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
    // Select the user based on logged in email
    $email = $_SESSION['email'];
    $sqlcus = "SELECT * FROM step WHERE email = '$email'";
    $result = $db->query($sqlcus);
    while ($row_pro = mysqli_fetch_array($result)) {
        $step_id = $row_pro['id'];
        $step_firstname = $row_pro['firstname'];
        $step_email = $row_pro['email'];
        $step_address = $row_pro['address'];
        $step_city = $row_pro['city'];
        $step_state = $row_pro['state'];
        $step_zipcode = $row_pro['zipcode'];
        $step_phone = $row_pro['phone'];
    }
?>

<?php
    if(isset($_GET['apply'])){
        $id = sanitize((int)$_GET['apply']);
        $sqlcourse = "SELECT n.id, n.ngo_name, c.course_name FROM courses c INNER JOIN ngo n ON c.ngo_id = n.id WHERE c.deleted = 0 AND c.id = '$id'";
        $courses = $db->query($sqlcourse);
        while ($course = mysqli_fetch_assoc($courses)) {
            $course_name = $course['course_name'];
            $ngo_name = $course['ngo_name'];
            $ngo_id = $course['id'];
        }
        $sql = "SELECT * FROM applications WHERE course_id = '$id'";
        $applications = $db->query($sql);
        while ($application = mysqli_fetch_assoc($applications)) {
            $step_user_id = $application['step_id'];
            $course_user_id = $application['course_id'];
        }
        $insertSql = "INSERT INTO applications (`step_id`,`course_id`,`ngo_id`,`applied`) VALUES ('$step_id','$id','$ngo_id', 1)";
        $insert = $db->query($insertSql);
        if($insert){
        ?>
            <script type="text/javascript">
                alert('Successfully applied for the course!');
            </script>
        <?php
        }else{
            ?>
            <script type="text/javascript">
                alert('Sorry your application could not be added!');
            </script>
        <?php
        }
    }
?>

<?php include 'includes/footer.php';?>