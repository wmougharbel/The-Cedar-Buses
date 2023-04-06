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
        <li><a  href="busesTable.php">Buses</a></li>
        <li><a href="driversTable.php">Drivers</a></li>
        <li><a href="schedulesTable.php">Schedules</a></li>
        <li><a class="active" href="messagesTable.php">Messages</a></li>
        <li><a href="admin.php">Sign Out</a>
        
      </ul>
    </nav> 
    <div class="top"><br><br>
      <h2>Inbox</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Message</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
                  <?php 
          $servername= "localhost";
          $username= "root";
          $password= "";
          $db= "cedar_buses";

          //create connection
          $conn = new mysqli($servername, $username, $password, $db);

          //check connection
          if($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
          }

          //read row from database table
          $sql= "SELECT * FROM contact ORDER BY (id) desc";
          $result= $conn->query($sql);

          if(!$result){
            die("Invalid query: ".$conn->error);
          }

          while($row= $result->fetch_assoc()){
            echo "
            <tr>
              <td>$row[name]</td>
              <td>$row[email]</td>
              <td>$row[phone]</td>
              <td>$row[message_date]</td>
              <td>$row[message]</td>
              <td>
                <a class='btn btn-primary btn-sm' href='mailto:$row[email]'>Reply</a>
                <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteMessage.php?id=$row[id]'>Delete</a>
              </td>
            </tr>
            ";
          }

        ?>
        </tbody>
      </table>
    </div>

</body>
</html>
<script type="text/javascript">
  function greet(){
    window.alert("Welcome Admin");
  } 
</script>

