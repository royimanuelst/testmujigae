<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $item=$_POST['item'];
    $count=$_POST['count'];
    $price=$_POST['price'];
    $paid=$_POST['paid'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE transaksi SET item='$item',count='$count',price='$price',paid='$paid' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $item = $user_data['item'];
    $count = $user_data['count'];
    $price = $user_data['price'];
    $paid = $user_data['paid'];
}
?>
<html>
<head>  
    <title>Edit Item Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Item</td>
                <td><input type="text" name="item" value=<?php echo $item;?>></td>
            </tr>
            <tr> 
                <td>Count</td>
                <td><input type="int" name="count" value=<?php echo $count;?>></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="int" name="price" value=<?php echo $price;?>></td>
            </tr>
            <tr> 
                <td>Paid</td>
                <td><input type="int" name="paid" value=<?php echo $paid;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>