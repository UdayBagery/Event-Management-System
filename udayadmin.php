<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_POST['add']))
{
    $user = 'root';
    $password = 'Rishik@123';
     
    $database = 'uday';
     
    // Server is localhost with
    // port number 3306
    $servername='localhost:3306';
    $mysqli = new mysqli($servername, $user,
                    $password, $database);
     
    // Checking for connections
    if ($mysqli->connect_error) {
        die('Connect Error (' .
        $mysqli->connect_errno . ') '.
        $mysqli->connect_error);
    }
    $name = $_POST['name'];
    $city = $_POST['city'];
    $cate = $_POST['cate'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $stock = $_POST['ticket'];
    $sql = "insert into events(city_name,event_category,event_name,event_date,event_time,seats,price) values('".$city."','".$cate."','".$name."','".$date."','".$time."',".$stock.",".$price.")";
    if ($mysqli->query($sql) === TRUE) {
        echo '<script>alert("Event Added");window.location = "udayadmin.php";</script>';;
      } else {
        echo '<script>alert("Error");window.location = "udayadmin.php";</script>';
      }
    $mysqli->close();
}
?>
<head>
<title>one8 Events</title>
    <style>
        th,tr,td{
            text-align:center;
        }
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(events.jpg);
            color: white;
            padding-top: 50px;
        }
        </style>
</head>
<body>
    <center>
    <h1 style = "font-size: 1.5rem" >ADD EVENTS</h1>
    </center>
<center>
        <form method = "post" action = "udayadmin.php">
        <label>Event Name: </label>
                <input type="text" name = "name" required><br><br>
            <label>Choose City: </label>
                 <select id = "city" name = "city">
            <option value = "Hyderabad">Hyderabad</option>
            <option value = "Chennai">Chennai</option>
            <option value = "Mumbai">Mumbai</option>
            <option value = "Delhi">Delhi</option>
            </select><br><br>
            <label>Choose Category: </label>
                 <select id = "cate" name = "cate">
            <option value = "Music">Music</option>
            <option value = "Dance">Dance</option>
            <option value = "Sports">Sports</option>
            <option value = "Comedy">Comedy</option>
            </select><br><br>
            <label>Event Date: </label>
                <input type="date" name = "date" required><br><br>
                <label>Event Time: </label>
                <input type="time" name = "time" required><br><br>
                <label>Ticket Price: </label>
                <input type="text" name = "price" required><br><br>
                <label>Tickets Available: </label>
                <input type="text" name = "ticket" required><br><br>
            <input type = "submit" name = "add" value = "Add Event">
    </form>
    <center>
    <h1>To Buy Tickets</h1>
    <input type = "submit" name = "buy"value = "Buy" onclick = "window.location.href = 'uday.php'">
    </center>
    <center>
    <h1>LogOut</h1>
    <input type = "submit" name = "logout" value = "LogOut" onclick = "window.location.href = 'logout.php'">
    </center>
</body>

</html>