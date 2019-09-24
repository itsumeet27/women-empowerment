<?php 
    session_start();
    include 'includes/header.php';
    include '../core/init.php';
?>

<?php 

    if(isset($_GET['course'])){
        $id = sanitize((int)$_GET['course']);
        $sql = "SELECT c.course_name, c.course_description, c.course_duration, c.course_objective, c.course_category, n.ngo_name FROM courses c INNER JOIN ngo n ON c.ngo_id = n.id WHERE c.id = '$id'";
        $sqlResult = $db->query($sql);
        $courseCount = mysqli_num_rows($sqlResult);
        if($courseCount > 0){
            while ($row = mysqli_fetch_array($sqlResult)) {
                $course_name = $row['course_name'];
                $course_duration = $row['course_duration'];
                $course_description = $row['course_description'];
                $course_objective = $row['course_objective'];
                $course_category = $row['course_category'];
                $ngo_name = $row['ngo_name'];
            }
        }else{
          echo "<script>alert('Course does not exist')</script>";
          exit();
        }
    }else{
        echo "<script>alert('Data is missing, please select the course for details')</script>";
        exit();
    }
?>

<div class="container-fluid" id="background">
    <h2 class="text-center p-2"><?=$course_name;?></h2>
    <h4 class="p-2"><b>Provided by: </b><?=$ngo_name?></h4>

    <div class="text-justify py-2">
        <div class="aboutCourse">
            <h4 class="h4-responsive">About Course</h4>
            <p class="py-2"><?=nl2br($course_description);?></p>
        </div>
        <div class="courseObjective">
            <h4 class="h4-responsive">Objectives of the Course</h4>
            <p class="py-2"><?=nl2br($course_objective);?></p>
        </div>
        <div class="courseCategory">
            <h4 class="h4-responsive">Category of the Course</h4>
            <p class="py-2"><?=$course_category;?></p>
        </div>
        <div class="courseDuration">
            <h4 class="h4-responsive">Duration of the Course</h4>
            <p class="py-2"><?=$course_duration;?></p>
        </div>
    </div>
    <?php
        if(!isset($_SESSION['email'])){
            echo "<a href='login.php' class='btn btn-default waves-effect z-depth-0' name='apply'>Apply Now</a>";
        }else{
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

            $sql = "SELECT * FROM applications WHERE course_id = '$id' AND step_id = '$step_id'";
            $applications = $db->query($sql);
            while ($application = mysqli_fetch_assoc($applications)) {
                $app_id = $application['id'];
                $step_app_id = $application['step_id'];
                $course_app_id = $application['course_id'];
                $ngo_app_id = $application['ngo_id'];
                $applied = $application['applied'];
            }

            if($step_app_id == $step_id){              
              echo "<a href='#' class='btn btn-success waves-effect z-depth-0' name='applied'>Applied</a>";
            }else{
    ?>

    <a href="application.php?apply=<?=$id;?>" class="btn btn-default waves-effect z-depth-0" name="apply">Apply Now</a>

    <?php } } ?>
</div>

<?php include 'includes/footer.php';?>