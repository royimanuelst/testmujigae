<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Item</td>
                <td><input type="text" name="item"></td>
            </tr>
            <tr> 
                <td>Count</td>
                <td><input type="int" name="count"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="int" name="price"></td>
            </tr>
            <tr> 
                <td>Paid</td>
                <td><input type="int" name="paid"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    //Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $item = $_POST['item'];
        $count = $_POST['count'];
        $price = $_POST['price'];
        $paid = $_POST['paid'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO transaksi(item,count,price,paid) VALUES('$item','$count','$price','$paid')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>