<?php include 'includes/header.php';?>

<?php
    $sql = "SELECT * FROM ngo";
    $result = $db->query($sql);
?>

<div class="container-fluid" id="registration-step">
    <h2 class="text-center h2-responsive p-3">List of organizations registered with us are: </h2>
    <div class="row container-fluid">
        <?php while($ngo = mysqli_fetch_array($result)): ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="h4-responsive p-2 text-center"><?=$ngo['ngo_name'];?></h4>
                    </div>
                    <div class="card-body table-bordered">
                        <table class="table table-striped">
                            <tr>
                                <th>Organization Type</th>
                                <td><?=$ngo['organization_type'];?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?=$ngo['ngo_address'];?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?=$ngo['email'];?></td>
                            </tr>
                            <tr>
                                <th>Contact No</th>
                                <td><?=$ngo['phone'];?></td>
                            </tr>

                        </table>
                    </div>
                    <div class="card-footer">
                        <p class="text-center p-2 lead"><b>Headed by:</b> <?=$ngo['ngo_head'];?></p>
                    </div>
                </div>
                <br>
            
        </div>
        <?php endwhile; ?>
    </div>
</div>
<br>

<?php include 'includes/footer.php';?>