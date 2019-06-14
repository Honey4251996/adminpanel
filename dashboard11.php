<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/font-awesome/all.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <style>
    #user{
      text-align: center;
      vertical-align: middle;
    }
  </style>
  <?php
    include 'header.php';
  ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="dashboard.html">LOGO</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-align-justify"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="index.php">
                <i class="fa fa-sign-out-alt text-primary"></i>
                <!-- session destroy -->
                Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User management</h4>
                  <p class="card-description">
                    User edit and delete, etc.
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="user">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            <i class="fa fa-user">
                          </th>
                          <th>
                            <i class="fa fa-lock">
                          </th>
                          <?php if($_SESSION['authority'] > 2){?>
                          <th>
                            <i class="fas fa-pencil-alt">
                          </th>
                          <?php }?>
                          <th>
                            <i class="fab fa-superpowers">
                          </th>
                          <?php if($_SESSION['authority'] > 2){?>
                          <th>
                            <i class="far fa-file">
                          </th>
                          <th>
                            <i class="fa fa-trash">
                          </th>
                          <?php }?>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            djdaksjcm399
                          </td>
                          <td>
                            <button type="button" class="btn btn-info btn-rounded btn-icon edit" data-toggle="modal" data-target="#edit" data-whatever="@mdo">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          </td>
                          <td>
                            normal user
                          </td>
                          <td>
                            <input type="file" value="Choose Profile">
                          </td>
                          <td>
                              <button type="button" class="btn btn-danger btn-rounded btn-icon delete">
                                <i class="fa fa-trash"></i>
                              </button>
                          </td>
                        </tr>
                        <?php $i=0;?>
                        <?php while(mysql_fetch_array($result as $array)){?>
                        <tr>
                          <td>
                            <?php echo $array[$i].id; ?>
                          </td>
                          <td>
                            <?php echo $array[$i].username; ?>
                          </td>
                          <td>
                           <?php echo $array[$i].pwd; ?>
                          </td>
                          <?php if($_SESSION['authority'] > 2){?>
                          <td>
                            <button type="button" class="btn btn-info btn-rounded btn-icon edit" data-toggle="modal" data-target="#edit" data-whatever="@mdo">
                            <i class="fas fa-pencil-alt"></i>
                            </button>
                          </td>
                          <?php }?>
                          <td>
                              <?php if($_SESSION['authority'] >2) echo "admin";  else echo "normal user"; ?>
                          </td>
                          <?php if($_SESSION['authority'] > 2){?>
                          <td>
                            <input type="file" value="Choose Profile">
                          </td>
                          <td>
                              <button type="button" class="btn btn-danger btn-rounded btn-icon delete">
                                <i class="fa fa-trash"></i>
                              </button>
                          </td>
                          <?php }?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- edit modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="username" class="col-form-label">New Username:</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">New Password:</label>
                    <input type="password" class="form-control">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success">Ok</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script>
    var table = $("#user");
      table.on('click', '.delete', function (e) {
        if (confirm("Are you sure to delete this user data ?") == false) {
          return;
        }

        var nRow = $(this).parents('tr')[0];
        // oTable.fnDeleteRow(nRow);
        alert("Deleted successfully!");
    });
  </script>
  <!-- End custom js for this page-->
</body>

</html>
