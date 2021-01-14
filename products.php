

<?php
   
require('header.php');
require './conn.php';
session_start();
include('db.php');
$status="";

$objDatabase=new Database();
$conn = $objDatabase->getDbConnection();

if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
//$image = "<img src='images/".$row['image']."' >";

$cartArray = array(
	array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(true) {
//	$_SESSION["shopping_cart"] = $cartArray;
//	$status = "<div class='box'>Product is added to your cart!</div>";
      $url = 'http://localhost/Php_project_5/products/addAndRemoveCartApi.php';

        $email = mysqli_real_escape_string($conn, $_SESSION["current_user"]);

//        echo 'CURRENT CART'.json_encode($cartArray);

        $data = array('email' => $email, 'cart' => json_encode($cartArray));
        $str = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $str);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);   //executes the API request
        curl_close($ch);
//        echo $output;
        $response = json_decode($output, true);

        $resultStatus = $response['status'];
        $resultMessage = $response['message'];

        if ($resultStatus == "1") {
            $status = "<div class='box'> $resultMessage</div>";
        } else {
            $status = "<div class='box'> $resultMessage</div>";
        }
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<style>
body {
    font-family: "Open Sans", sans-serif;
    color: #444444;
    background: #83362580;
}
.product_wrapper .buy {
	text-transform: uppercase;
    background: #d91530 !important;
    border: 1px solid #d91530!important;
    cursor: pointer;
    color: #fff;
    padding: 8px 40px;
    margin-top: 10px;
}

.image img {
    height: 220px;
    width: 170px;
}
.cart_div {
    margin-top: 90px;
}
.name {
    text-align: center;
    font-weight: 700;
    padding-top: 10px;
}

.product_wrapper {
    border-radius: 4px;
    background: #ede6e6;
    display: inline-flex;
    padding: 20px;
    margin-left: 50px;
	box-shadow: 10px 2px #7e7c97;
	margin-top: 70px;
}

.price {
    text-align: center;
    font-weight: 700;
}
a {
    color: #221f1e;
}
</style>

</head></header>
<body>
    
<div class="container">
<div class="col-md-12">

  
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
    
      

    <?php
if (strcmp($_SESSION['IS_LOGIN'], 'yes')==1)
{
echo ('<a href="cart.php"><img src="cart-icon.png" /></a>');
echo $cart_count;
//echo "******".$_SESSION['IS_LOGIN'];
}
else
{
//echo "******".$_SESSION['IS_LOGIN'];
 
echo ('<a href="login/login.php"><img src="cart-icon.png" /></a>');
echo $cart_count;
}
}
?>
    
</div>

<?php


$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
//		echo "<div class='product_wrapper'>
//			  <form method='post' action=''>
//			  <input type='hidden' name='code' value=".$row['code']." />
//			  <div class='image'><img src='images/".$row['image']."' /> </div>
//			  <div class='name'>".$row['name']."</div>
//		   	  <div class='price'>$".$row['price']."</div>
//			  <button type='submit' class='buy'>Buy Now</button>
//			  </form>
//		   	  </div>";
        }
mysqli_close($con);



$url = 'http://localhost/Php_project_5/products/productsapi.php';

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);

                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $output = curl_exec($ch);   //executes the API request
                curl_close($ch);
                $response = json_decode($output, true); //returns the array

                $resultStatus = $response['data'];
                $i = 0;
                while ($i < sizeof($resultStatus)) {

//                    echo '<br>';
//                    echo $resultStatus[$i]['image'];

                    echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=" . $resultStatus[$i]['code'] . " />
			  <div class='image'><img src='images/" . $resultStatus[$i]['image'] . "' /></div>

			  <div class='name'>" . $resultStatus[$i]['name'] . "</div>
		   	  <div class='price'>$" . $resultStatus[$i]['price'] . "</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
                    $i++;
                }
                ?>


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>

      

    


</div>
</div>
</div>
</div>
</body>
<?php include ('footer.php');?>
</html>