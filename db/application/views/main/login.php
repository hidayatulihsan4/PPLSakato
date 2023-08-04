<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
	EraportSMK
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="<?= base_url();?>assets/fonts/fontawesome-5.15.4/css/all.css" rel="stylesheet"/>
  <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url();?>assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="<?= base_url();?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
		<div class="main-panel" id="main-panel">
	  <!-- Navbar -->
	  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
		<div class="container-fluid">
		  
		</div>
	  </nav>

		<!-- Bigger panel header -->
		<div class="panel-header">
			<div class="header text-center">
				<h2 class="title">Eraport-SMK</h2>
				<h4 class="title">Login Form</h4>
				<!-- <p class="category">Describe</p> -->
			</div>
		</div>
	  <div class="content">
			<div class="row">
				<div class="col-md-4 mx-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title"></h5>
            </div>
            <div class="card-body">
              <form method="post" action="<?= base_url().'login/do_login'; ?>">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Username</label>
                      <input name="username" id="username" type="text" class="form-control" placeholder="username">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Password</label>
                      <input name="password" id="password" type="text" class="form-control" placeholder="password">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-info">Login</button>
                      <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
                  
				</div>
			</div>
	  </div>
    <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            Copyright &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>
            <!-- , Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>. -->
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url();?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url();?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?= base_url();?>assets/js/plugins/chartjs.min.js"></script>
  <script src="<?= base_url();?>assets/js/plugins/bootstrap-notify.js"></script>
  <script src="<?= base_url();?>assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <script src="<?= base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      var myTable = $("#x-data-tables").DataTable({
        responsive: true,
        autoWidth:false,
        bInfo:false,
        // lengthChange:false,
        dom:'lrtp',
        // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      });

      $('#mySearch').on( 'keyup', function () {
        myTable.search( this.value ).draw();
      });
      

      $(function(){
        let nav = $('#side-navigator').attr('data-nav');
        $('#'+nav).addClass('active');
      });
    });
  </script>
</body>

</html>
  