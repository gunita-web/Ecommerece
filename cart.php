<?php
require('header.php');
session_start();
$status = "";
require('./conn.php');
$objDatabase = new Database();
$conn = $objDatabase->getDbConnection();


$url = 'http://localhost/Php_project_5/cart/getUserCartApi.php';

$email = mysqli_real_escape_string($conn, $_SESSION["current_user"]);

$data = array('email' => $email);
$str = http_build_query($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//        curl_exec($ch);
$output = curl_exec($ch);   //executes the API request
//            echo 'hello @@@@@@@@' . $output;//prints the output in json formay
curl_close($ch);
//echo"<br>new output first <br>" . gettype(json_decode($output));

$newCartArray = json_decode($output);

if (isset($_POST['action']) && $_POST['action'] == "remove") {
    $position = 0;
    foreach ($newCartArray as $value) {
        if ($_POST["code"] == $value->code) {
//                unset($newCartArray[$key]);
            break;
            $status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
        }
        if (empty($_SESSION["shopping_cart"]))
            unset($_SESSION["shopping_cart"]);
        $position++;
    }
//    }
    //removing array item
    unset($newCartArray[$position]);
//    array_splice($newCartArray, $position, $position);
    //setting array items
    $newCartArray = array_values($newCartArray);
//    echo"<br>new output after remove **** <br>" . json_encode($newCartArray);

    $url = 'http://localhost/Php_project_2/products/addAndRemoveCartApi.php';

    $email = mysqli_real_escape_string($conn, $_SESSION["current_user"]);

//        echo 'CURRENT CART'.json_encode($cartArray);

    $data = array('email' => $email, 'cart' => json_encode($newCartArray), 'toUpdate' => true);
    $str = http_build_query($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $str);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);   //executes the API request
    curl_close($ch);
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($newCartArray as &$value) {
        if ($value->code === $_POST["code"]) {
            $value->quantity = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }

//    $_SESSION["shopping_cart"] = $cartArray;
//        $status = "<div class='box'>Product is added to your cart!</div>";

    $url = 'http://localhost/Php_project_2/products/addAndRemoveCartApi.php';

    $email = mysqli_real_escape_string($conn, $_SESSION["current_user"]);

//        echo 'CURRENT CART'.json_encode($cartArray);

    $data = array('email' => $email, 'cart' => json_encode($newCartArray), 'toUpdate' => true);
    $str = http_build_query($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $str);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);   //executes the API request
    curl_close($ch);
//    echo '<br> hello ' . $output;
//    echo"<br>new output 2 " . json_encode($newCartArray);
}
?>
<html>
    <head>
        <style>
            td >img {
                width:50px; height:50px;
            }
            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                padding-top: 10p;
                margin-top: 40px;
                text-align: center;
            }
            .shopping {
                background: #83362580;
            }

        </style>
        <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    </head>
    <body>
        <div class="shopping">
           
            <div class="cart">
                <?php
//                if (isset($_SESSION["shopping_cart"])) {
                if (!empty($newCartArray)) {
                    $total_price = 0;
                    ?>	
                    <table class="table">
                        <tbody>
                            <tr>
                                <td></td>
                                <td>ITEM NAME</td>
                                <td>QUANTITY</td>
                                <td>UNIT PRICE</td>
                                <td>ITEMS TOTAL</td>
                            </tr>	
                            <?php
                            foreach ($newCartArray as $product) {
                                ?>
                                <tr>
                                    <!--<td><img src='<?php echo $product->image; ?>' width="50" height="40" /></td>-->
                                    <td><img src='images/<?php echo $product->image; ?>' width="50" height="40" /></td>
                                    <td><?php echo $product->name; ?><br />
                                        <form method='post' action=''>
                                            <input type='hidden' name='code' value="<?php echo $product->code; ?>" />
                                            <input type='hidden' name='action' value="remove" />
                                            <button type='submit' class='remove'>Remove Item</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method='post' action=''>
                                            <input type='hidden' name='code' value="<?php echo $product->code; ?>" />
                                            <input type='hidden' name='action' value="change" />
                                            <select name='quantity' class='quantity' onChange="this.form.submit()">
                                                <option <?php if ($product->quantity == 1) echo "selected"; ?> value="1">1</option>
                                                <option <?php if ($product->quantity == 2) echo "selected"; ?> value="2">2</option>
                                                <option <?php if ($product->quantity == 3) echo "selected"; ?> value="3">3</option>
                                                <option <?php if ($product->quantity == 4) echo "selected"; ?> value="4">4</option>
                                                <option <?php if ($product->quantity == 5) echo "selected"; ?> value="5">5</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td><?php echo "$" . $product->price; ?></td>
                                    <td><?php echo "$" . $product->price * $product->quantity; ?></td>
                                </tr>
                                <?php
                                $total_price += ($product->price * $product->quantity);}
                            ?>
                            <tr>
                                <td colspan="5" align="right">
                                    <strong>TOTAL: <?php echo "$" . $total_price; ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>		
                    <?php
                } else {
                    echo "<h3>Your cart is empty!</h3>";
                }
                ?>
            </div>

            <div style="clear:both;"></div>

            <div class="message_box" style="margin:10px 0px;">
                <?php echo $status; ?>
            </div>



        </div>
    </body>
</html>