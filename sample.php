<?php
        require 'db_config.php';
        
        session_start();
        if(!isset($_SESSION['user_id'])){
            header("location: Signin.php");
        }
?>


<html>
<head>
  

  <meta charset="UTF-8">
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    * {
      font-family: 'Work Sans', sans-serif;
    }
    body {
        background-color: #fafafa;
      background-image: url("https://d1qhuz9ahqnrhh.cloudfront.net/wp-content/uploads/2016/05/instagram_gradient_wallpaper_by_jasonzigrino-da28exh.png");
      background-size: cover;
      font-family: 'Work Sans', sans-serif;

    /*  */
    }
    

    label {
      display: block;
      color: #fff;
    }

    .input {
      width: 75%;
      margin: 0.5em 0;
      padding: 1em ;
      border: 1px solid #b5b5b5;
      outline: none;
      color: #333333;
      border-radius: 4px;
      background: #fafafa;
      position: center;
      
          
    }
    .date
    {
      padding: 1em 5em 1em 2em;
    }
    .error {
      padding: 1em 1em;
      color: #988e8e;}
    sup{
      font-size: 12px;
    }
  
    .tlang{
   color: #999;
    font-size: 12px;
    height: 36px;
    left: 8px;
    line-height: 36px;
    overflow: hidden;
    pointer-events: none;
    
    right: 0;
    text-overflow: ellipsis;
    
    transform-origin: left;
    
      
    
    user-select: none;
    white-space: nowrap;
    }

    .h1s{
  font-style: lavanga;
      margin: 24px auto 12px;
    background-repeat: no-repeat;
    background-position: -98px -264px;
    height: 51px;
    width: 175px;
    margin-left: 20%;
    margin-top: .01%;
  
    }
    .pimage{
         padding: 3em 8em 4em 50em;
    }

   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 10px;
    height: 150px; 
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
   }
   * Add a black background color to the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #e9e9e9;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Style the "active" element to highlight the current page */
.topnav a.active {
    background-color: #2196F3;
    color: white;
}

/* Style the search box inside the navigation bar */
.topnav input[type=text] {
    float: right;
    padding: 6px;
    border: none;
    margin-top: 8px;
    margin-right: 16px;
    font-size: 17px;
}

/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
@media screen and (max-width: 600px) {
    .topnav a, .topnav input[type=text] {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
    }
    .topnav input[type=text] {
        border: 1px solid #ccc;
    }
}

  



</style>
  </style>

</head>




<body>

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="yourprofile.php">  <img src = "https://blog.inkjetwholesale.com.au/wp-content/uploads/2017/09/instagram-challenges.png" style="width:250px;height:40px;"></a>
    </div>
    <ul class="nav navbar-nav">
       <li><a href="feed.php">Feed</a></li>
      <li class="active"><a href="edit.php">Edit</a></li>
      <li><a href="logout.php">Sign out</a></li>
      
    </ul>
    <div class="topnav">
  <div class="search-container">
    <form action="search.php">
      
      <input name="search" type="search" autofocus>
  <button>Submit</button>

  <?php


if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];
  $sql ="SELECT * from grams where Uname like '%".$search."%'";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['Uname'];
  }
}
else{
    echo "No employee Found<br><br>";
  }

}


?>
    </form>
  </div>
</div>

  </div>
  
     
</nav>
<?php

            $user_id = $_REQUEST['user'];

            $sql = "SELECT * FROM grams WHERE user_id='$user_id'";
            $result = $conn->query($sql);

            if($result === FALSE) {
              echo "Error: " . $sql . "<br>" . $conn->connect_error;
            } else {
              if ($result->num_rows > 0) {
                $rws = $result->fetch_assoc();
              }
            }
          
           
        ?>
        <h1 class="text">PROFILE</h1>

          
 <ul> <img src="<?php echo $rws['Pimage'];?>" class="img-circle" alt="Cinque Terre" width="200" height="200"> </ul>
  <ul> <h1 class="h1s"><?php echo $rws['Uname'];?></h1></ul>
 <ul> <h2 class="h1s"><?php echo $rws['fname'];?></h2></ul>
 

        
<div id="content">

  <?php
  if($rws['active'] == FALSE) {
  	$sql = "SELECT * FROM images INNER JOIN grams ON images.user_id = grams.user_id WHERE images.user_id = '$user_id' ORDER BY id DESC";

	    $result = $conn->query($sql);

	    if($result === FALSE ) {
	      echo "Error: " . $sql . "<br>" . $conn->connect_error;
	    } else {
	      while ( $row = $result->fetch_assoc() ) {
	        echo "<div id='img_div'>";
	        echo "<img src='images/".$row['image']."' >";
	        echo "<p>".$row['image_text']."</p>";
	        echo "<p>".  $row['fname'] . "</p>";
	        echo "</div>";
	      }  
	    }
   } else {
   	echo "<h1>This account is private</h1>";
   }

    
  ?>
</div>
</div>
</body>
</html>
