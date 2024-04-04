<!DOCTYPE html>
<html>
	<head>
        <?php
            require('dbConnection.php');

            $connresult = db_connect();
            session_start();
            $id = $_GET['id'];
            
            if (substr($id, 0, 1) == "d") {
                $item = $connresult->query("select * from drinks where d_id = '".$id."'");
                while($row=$item->fetch_assoc()) {
                    $name = $row['d_name'];
                    $price = $row['d_price'];
                    $image = $row['d_image'];
                    $type = "";
                }
            }
            else {
                $item = $connresult->query("select * from pizza where p_id = '".$id."'");
                while($row=$item->fetch_assoc()) {
                    $name = $row['p_name'];
                    $price = $row['p_price'];
                    $image = $row['p_image'];
                    $type = $row['p_type'];
                }
            }

        ?>
        <script>
			console.log = function(){ }
			function myInitFunction() {
				$('#spinner').fadeOut(200);
			}
			
		</script>

		<script>
			window.addEventListener("load", myInitFunction)
		</script>
		<!-- <script src="./js/form-validation.js"></script> -->
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Brothers Pizza</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	</head>
	<body>

		<div class="spinners" id="spinner">
			<div class="spinner-border spinner-border-sm" style="width: 3rem; height: 3rem;color: var(--primary)" role="status">
				<span class="sr-only"></span>
			</div>
		</div>

        <?php include 'navbar.php'?>
        <?php include 'cart.php'?>

        <div class="pizza-detail-outer">
            <div class="pizza-detail-inner">
                <div class="top-section">
                    <img src="<?php echo $image?>">
                    <div class="pizza-details">
                        <h2><?php echo $name?></h2>
                        <h4 style="color: var(--secondary); margin: 20px 0 30px 0">₹<?php echo $price?></h4>
                        <?php 
                            if ($type != "") {
                                if ($type == "Non Veg") {
                                    echo "<p style='color: red'><span style='color: black; padding: 2px 10px; background: rgba(0,0,0,0.1);border-radius: 50px; margin-right: 10px'>Type</span>".$type."</p>";
                                }
                                else if ($type == "Veg") {
                                    echo "<p style='color: green'><span style='color: black; padding: 2px 10px; background: rgba(0,0,0,0.1);border-radius: 50px; margin-right: 10px'>Type</span>".$type."</p>";
                                }
                            }
                        ?>
                        <button class="order-button" id="cart-button">
                            <!-- <i class="bi bi-cart-plus"></i> Add to cart -->
                        </button>
                    </div>
                </div>
            </div>
        </div>
		
	</body>
</html>

<script src="./js/cart.js"></script>
<script src="./js/script.js"></script>

<script>
    var id = "<?php echo $id?>";
    // console.log(id)
        if (cart.find(obj => obj.id === id) == undefined) {
            $('#cart-button').html("<i class='bi bi-cart-plus'></i> Add to cart");
        }
        else {
            $('#cart-button').html("<i class='bi bi-trash'></i> Remove From Cart");
        }

        $('#cart-button').click(function() {
            if (cart.find(obj => obj.id === id) == undefined) {
                addToCart(id);
                $('#cart-button').html("<i class='bi bi-trash'></i> Remove From Cart");
            }
            else {
                removeFromCart(id);
                $('#cart-button').html("<i class='bi bi-cart-plus'></i> Add to cart");
            }
            //alert('clicked');
        });
</script>