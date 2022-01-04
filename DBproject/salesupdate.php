<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<!doctype html>
<html>
  <head>
  <title>Add Products</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <style>
      :root{
        --light-color: #f3f3f3;
        --dark-color: #333;
        --max-width: 1100px;
        }
      body {
  margin: 0;
  font-family: 'Lato', sans-serif;
  background: #eee;
  }

button:hover {
        /* 
          Hover background color for button is #37a08e
        */
        opacity: 0.9;
      }



.container {
        /* 
        -Remember, margin: auto on left and right will center a block element 
        -I would also set a "max-width" for responsiveness
        -May want to add some padding
        */
        margin:  auto;
        max-width: 400px;
        background: #fff;
        padding: 20px;
        
      }


button {
        /* 
          Button should wrap accross 100% and display as block
          Background color for button is #49c1a2
        */
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background: #1A374D;
        color: #fff;
        cursor: pointer;
        border: none;
        border-radius: 5px;
      }

.form-group {
  /* 
    Each label, input is wrapped in .form-group
  */
  margin-top: 15px;
  
}
.form-group input {
        /* 
          Inputs should reach accross the .form-wrap 100% and have some padding
        */
        width: 90%;
        padding: 10px;
        border: #ddd 1px solid;
        border-radius: 5px;
      }
      

      a{
            color: #333;
            text-decoration: none;
        }

        ul{
            list-style: none;
        }
        .nav-container{
        max-width: var(--max-width);
        padding: 0 2rem;
        margin: auto;
        overflow: hidden;
        }
        #main-nav{
            background: #1A374D;
            color: #eee;
            position: sticky;
            z-index: 2;
            top: 0;
            margin-bottom: 20px;
        }

        #main-nav .nav-container{
            display: grid;
            grid-template-columns: 6fr 3fr ;
            align-items: center;
        }
        #main-nav ul{
    display: flex;
    justify-content:center;
    }

#main-nav ul li a{
    padding: 0.75rem;
    color: #eee;
}


#main-nav ul li a:hover{
    background: var(--light-color);
    color: var(--dark-color);
}

      </style>
</head>
<body>
<nav id="main-nav">
        <div class="nav-container">
            <h2>Update Details</h2>
            <ul>
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li>
                    <a href="sales.php">Go Back</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
  
<div class="container">
<form method="post" action="salesupdate.php" >  
  <h2>Please fill the form</h2>

  <div class="form-group">
  <input type="text" name="id" placeholder=" Enter Sales ID*"required >
  </div>

  <div class="form-group"> 
  <input type="text" name="csid" placeholder="Enter Customer Name*" required>
  </div>

  <div class="form-group">
  <input type="date" name="date"  placeholder="Enter Date*" required>
  </div>

  <div class="form-group">
  <input type="number" name="total"  placeholder="Enter Total Amount*" required>
  </div>
  
  
  <button type="submit" name="submit" value="save">Update</button>
</form> 
</div>
</body>
</html>
<!-- <div class="topnav">
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="sales.php">Sales details</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
            </div>
          </div>
<form>
<button type="submit" formaction="sales.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid #e69500;background-color: rgba(249, 105, 14, 1);color:#f2f2f2;font-size:15px;">back</button>
</form>
<form method="post" action="salesupdate.php">

  <fieldset>
  
    <input type="text"  id ="sd" name="id" placeholder="Enter the sales id" style="width:100%;height:30px;
    border: 2px solid rgba(249, 105, 14, 1); border-radius:5px;" required>
   <br><br>
   <input type="text" name="csid" placeholder="Enter the customer id" style="width:100%;height:30px;
    border: 2px solid rgba(249, 105, 14, 1);border-radius:5px; " required>
  <br><br>
   <input type="date" name="date" style="width:100%;height:30px;
   border: 2px solid rgba(249, 105, 14, 1);border-radius:5px;" required>
  <br><br>
  <input type="number" name="total" min="0" style="width:100%;height:30px;
   border: 2px solid rgba(249, 105, 14, 1);border-radius:5px;" required placeholder="Enter total amount">
  <br><br>
  <input type="submit" name="submit" value="update" style="width:100%;height:30px;border-radius:5px;
  border: 2px solid rgba(249, 105, 14, 1); cursor:pointer;background-color: rgba(249, 105, 14, 1)">&ensp; 
</fieldset> 

</form> 
</body>
</html> -->
<?php
if(isset($_POST["submit"]))
{
  // define variables and set to empty values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Petshop_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "  CONNECTION ESTABLISHED \r\n";
//echo "  INSERTION IN PROCESS";
$id = $_POST["id"];
  $cs_id = $_POST["csid"];
  $date= $_POST["date"];
  $total = $_POST["total"];
 
  $Query2="select count(*) from sales_details WHERE sd_id='$id'";
  $Execute = mysqli_query($conn,$Query2);
  $count = mysqli_fetch_row($Execute);
  if($count[0]==1)
  {
    $sql = "UPDATE sales_details SET cs_id='$cs_id' ,date='$date' ,total='$total' where sd_id='$id'";
    if ($conn->multi_query($sql) == TRUE) {
      echo'<div>
      <h1 style="color:#f2f2f2;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">'
      .$id. ' updated successfully</h1>
         </div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else{
    echo '<div>
    <h1 style="color:#f2f2f2;font-size:30px; font-family: "Roboto", sans-serif;margin:auto;">Given sales_id not found</h1>
       </div>';
}




$conn->close();
}


?>