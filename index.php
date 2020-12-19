<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db = "student";

$conn = new mysqli($servername,$user,$pass,$db);

if($conn->error){
    echo "DB error ".$conn->error."";
}
else{
    echo "Connection successful";
}

//inserting data into our database
// isset_POST['submit']

if(isset($_POST['save'])){
    echo "<br>";
    
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $phone = $_POST['Phonenumber'];

    $sql = "insert into bscs (Firstname,Lastname,Phonenumber) values ('$first','$last','$phone')";

    if($conn->query($sql)){
        echo "USER INSERTED SUCCESSFULLY!!!!";
    }
    else{
        echo "Error is here: ".$conn->error;
    }

}

if(isset($_POST['show'])){


    $sql = "select * from bscs";

    $myquery = $conn->query($sql);
    
    while($result = $myquery->fetch_assoc()){
        echo "<br>";
        echo $result['Firstname']." ".$result['Lastname']." ".$result['Phonenumber'];
        echo "<br>";
    }

    // echo "<br>";
    // echo "Showing data";
}

?>

<!DOCTYPE html>

<html>

<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<title>ABOUT ME</title>

</head>

<body>
<div class= "container">
<img  src="IMG_0908.jpg" alt="Moi">

<div class = "about">  
<h1>MY NAME</h1>
<p> ISYAGI ABRAHAM</p>
</div>

<div class= "course">
<h2>COURSE & YEAR OF STUDY</h2>
<p>BACHELOR'S OF SCIENCE IN COMPUTER SCIENCE YEAR 2</p>
</div>

<div class = "language">
<h3>PROGRAMMING LANGUAGES</h3>
<ul>
<li>C</li>
<li>JAVA</li>
</ul>
</div>

<div class="interest">
<h4>INTERESTS & HOBBIES</h4>
<ul>
  <li>Basketball</li>
  <li>Watching Movies</li>
  <li>Eating Food</li>
  <li>Cooking</li>
<li>****</li>
</ul>

</div>

<h1>Contact Me</h1>
    <form action = "./index.php" method = "POST">

      Firstname 
      <input type="text" name="firstname" />
      <br>
      Lastname
      <input type="text" name="lastname" />
    <br>
      <input type="text" name="Phonenumber" />
      <br>
    <input type="submit" name="save" value="INSERT"/> 
    <input type="submit" name="show" value="DISPLAY"/>
    </form>





</div>
</body>


</html>
