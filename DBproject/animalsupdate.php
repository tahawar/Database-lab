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
  <title>Animals </title>
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
            <h2>Update Animals</h2>
            <ul>
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li>
                    <a href="animals.php">Go Back</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
  
<div class="container">
<form method="post" action="animalsupdate.php" >  
  <h2>Please fill the form</h2>

  <div class="form-group">
  <input type="text" name="id" placeholder=" Enter Pet ID*"required >
  </div>

  <div class="form-group"> 
  <input type="text" name="category" placeholder="Enter Category*" required>
  </div>

  <div class="form-group">
  <input type="text" name="breed"  placeholder="Enter Breed*" required>
  </div>

  <div class="form-group">
  <input type="number" step=any name="weight"  placeholder="Enter Weight*" min="1" required>
  </div>
  
  <div class="form-group"> 
  <input type="number" step=any name="height"  placeholder="Enter Height*"  min="15" required>
  </div>

  <div class="form-group">
  <input type="number" name="age"  placeholder="Enter Age*" min="1" required>
  </div>
 
  <div class="form-group">
  <input type="text" name="fur"  placeholder="Enter Fur*" required>
  </div>

  <div class="form-group">
  <input type="number" name="cost"  placeholder="Enter Cost*" min="0" required>
  </div>
  
  <button type="submit" name="submit" value="save">Update</button>
</form> 
</div>
</body>
</html>
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
  $category = $_POST["category"];
  $breed= $_POST["breed"];
  $weight = $_POST["weight"];
  $height = $_POST["height"];
  $age = $_POST["age"];
  $fur= $_POST["fur"];
  $cost = $_POST["cost"];

  $Query2="select count(*) from pets where pet_id='$id'";
  $Execute = mysqli_query($conn,$Query2);
  $count = mysqli_fetch_row($Execute);

  if($count[0]==1)
  {
    $sql = "UPDATE pets SET pet_category='$category' ,cost='$cost' WHERE pet_id='$id';
    UPDATE animals SET breed='$breed',weight='$weight',height='$height',age='$age',fur='$fur' WHERE pet_id='$id'";
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
    <h1 style="color:#f2f2f2;font-size:30px; font-family: "Roboto", sans-serif;margin:auto;">Given pet_id not found</h1>
       </div>';
}


$conn->close();
}

?>