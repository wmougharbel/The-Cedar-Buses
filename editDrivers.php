<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $db="cedar_buses";

    $conn=new mysqli($servername, $username, $password, $db);

    $id="";
    $name="";
    $driver_id="";
    $phone="";
    $email="";
    $pwd="";
    $errorMessage="";
    $successMessage="";
    $result="";

    if($_SERVER['REQUEST_METHOD']=='GET'){
      if(!isset($_GET['id'])){
        header("location:/The Cedar Buses PHP/busesTable.php");
        exit;
      }
      $id=$_GET['id'];
      $sql = "SELECT * FROM drivers WHERE id=$id";
      $result= $conn->query($sql);
      $row= $result->fetch_assoc();

      if(!$row){
        header("location:/The Cedar Buses PHP/driversTable.php");
        exit;
      }
      $name= $row['name'];
      $driver_id= $row['driver_id'];
      $phone= $row['phone'];
      $email= $row['email'];
      $pwd= $row['pwd'];
    }
    else{
      $id= $_POST['id'];
      $name= $_POST['name'];
      $driver_id= $_POST['driver_id'];
      $phone= $_POST['phone'];
      $email= $_POST['email'];
      $pwd= $_POST['pwd'];

      do{
        if(empty($id) || empty($name) || empty($driver_id) || empty($phone) || empty($email) || empty($pwd)){
          $errorMessage="All fields are required";
          break;
        }
        $sql="UPDATE drivers SET name='$name', driver_id='$driver_id', phone='$phone', email='$email', pwd='$pwd' WHERE id='$id'";

        $result= $conn->query($sql);
        if(!$result){
          $errorMessage="Invalid query: ".$conn->error;
          break;
        }
        $successMessage="Updated Successfully";
        header("location:/The Cedar Buses PHP/driversTable.php");
      }while(false);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">

    .btn-outline-primary{
      background-color: black;
      color: white;
      border-color: black;
    }

    .btn-primary{
      background-color: green;
      outline: none;
      border-color: green;
    }

    .btn-primary:hover{
      background-color: #33cc00;
      border-color: #33cc00;
    }

    .btn-danger:hover{
      background-color: red;
      border-color: red;
    }
        .btn-outline-primary:hover{
      background-color: white;
      color: black;
      border-color: black;
      font-weight: bold;
      cursor: pointer;
    }

  </style>
</head>
<body>
		<nav>
      <div class="logo"><img class="busmap" src="bus.png" ></div><div class="logo">Track<font color="#33cc00
"> Cedar</font> Buses</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul> 
        <li><a class="active" href="busesTable.php">Buses</a></li>
        <li><a href="driversTable.php">Drivers</a></li>
        <li><a href="schedulesTable.php">Schedules</a></li>
        <li><a href="messagesTable.php">Messages</a></li>
        <li><a href="adminSignin.php">Sign Out</a>
        
      </ul>
    </nav> 

    <div class="top">
      <div class="container my-5">
        <h2>Update Drivers</h2>
        <?php 
        if(!empty($errorMessage)){
          echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
          ";
        }
        ?>
        <form method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
          </div>
          <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Driver Id</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="driver_id" value="<?php echo $driver_id; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Phone Number</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="pwd" value="<?php echo $pwd; ?>">
        </div>
      </div>
      
      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
          <a class="btn btn-outline-primary" href="/The Cedar Buses PHP/driversTable.php" role="button">Cancel</a>
        </div>
      </div>
        </form>
        <?php
          if(!empty($successMessage)){
            echo "
              <div class='row mb-3'>
              <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>$successMessage</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
              </div>
            </div>
            ";
          }
         ?>

</div>

</body>
</html>