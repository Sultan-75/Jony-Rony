<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

if (Session::get('Role') == '1') {
    echo "<script> window.location='dashboard.php';</script> ";
}

if (isset($_GET['delusr'])) {
    $delusr = $_GET['delusr'];
    $usr->usrDeleteById($delusr);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users & User List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                User
            </li>
        </ol>
    </div>
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
                Add User
            </button>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-1 mb-4">
        </div>
        <div class="col-md-10 mb-4">
            <div class="card">
                <h3 class="text-center pt-3 font-weight-bold">User List</h3>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>S.N</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getUser = $usr->AllUser();
                                if ($getUser) {
                                    $i = 0;
                                    while ($result = $getUser->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['user_name']; ?></td>
                                            <td><?php echo $result['user_email']; ?></td>
                                            <td class="text-center">
                                                <a onclick="return confirm('Are You Sure To Delete !');" href="?delusr=<?php echo $result['User_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 mb-4">
        </div>

    </div>
    <!--Row-->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card">
                            <div style="display: none;" id="r1" class="alert alert-danger" role="alert">
                                <span class="r_empty text-center" id="r_empty" style="display: none;">Fields Must Not Empty</span>
                            </div>
                            <div style="display: none;" id="r2" class="alert alert-danger" role="alert">
                                <span class="r_email_error text-center" id="r_email_error" style="display: none;">Enter Valid Email</span>
                            </div>
                            <div style="display: none;" id="r3" class="alert alert-danger" role="alert">
                                <span class="r_user_exsit text-center" id="r_user_exsit" style="display: none;">User Already Exsit</span>
                            </div>
                            <div style="display: none;" id="r4" class="alert alert-success" role="alert">
                                <span class="r_msg text-center" id="r_msg" style="display: none;">Registration Successfull</span>
                            </div>
                            <h3 class="text-center pt-3">Add User</h3>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="user_name" class="font-weight-bold">User Name</label>
                                                <input type="text" autocomplete="off" name="user_name" class="form-control" id="user_name">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="role" class="font-weight-bold">User Role</label>
                                                <select class="form-control" name="role" id="role">
                                                    <option>Select Role</option>
                                                    <option value="0">Admin</option>
                                                    <option value="1">User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="user_email" class="font-weight-bold">User Email</label>
                                                <input type="email" autocomplete="off" name="user_email" class="form-control" id="user_email">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="user_pass" class="font-weight-bold">Password</label>
                                                <input type="password" autocomplete="off" name="user_pass" class="form-control" id="user_pass">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                                        <button type="submit" id="userSubmit" class="btn btn-success b">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>