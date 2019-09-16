<?php include 'includes/header.php';?>

<div id="ngo-step" class="p-3">
    <h2 class="h2-responsive text-center p-3">Training Courses provided by NGO's</h2>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" *ngFor="let x of courses">
            <div class="card">
                <div class="card-header">
                    <h4 class="h4-responsive text-center p-2">Provided by: </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Course ID: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Course Name: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Duration: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Description: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Location: </th>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<?php include 'includes/footer.php';?>