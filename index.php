<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM transaksi ORDER BY id DESC");
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New Item</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>Item</th> <th>Count</th> <th>Price</th> <th>Paid</th><th>Action</th>
    </tr>
    <?php  
    while($item_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$item_data['item']."</td>";
        echo "<td>".$item_data['count']."</td>";
        echo "<td>".$item_data['price']."</td>";
        echo "<td>".$item_data['paid']."</td>";    
        echo "<td><a href='edit.php?id=$item_data[id]'>Edit</a> | <a href='delete.php?id=$item_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>