<?php
    $con = mysqli_connect("localhost", "root", "", "bank");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Records</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <header>
            <div class="logo">
                <a href="index.php">
                    <img width="80px" height="80px" src="images\logo_small.png" alt="logo">
                </a>
            </div>
            <div>
            	<h1 style="color: yellow; text-align: center; padding: 50px;">Spark Bank</h1>
            </div>
        
            <div class="clearfix"></div>
    
        <nav class="menu"><!--navigation-->
            <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="regviewuser.php">View all Customer</a></li>
            <li><a href="transferrecords.php">Transfer Records</a></li>
            </ul>
        </nav>
        </header>
    
        <section class="banner cycle-slideshow"><!--banner-->
            <img src="https://cdn.pixabay.com/photo/2014/10/21/12/28/money-496229_960_720.jpg" alt="banner1">
            <img src="https://cdn.pixabay.com/photo/2015/09/15/15/53/bank-note-941246_960_720.jpg" alt="banner2">
        </section>
        <section class="content-holder"><!--content-->
            <article class="content">
                <main>

                <h3> User Details </h3>

	<table style ="font-size:12px" class="gridtable">
	<tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Current Balance</th>
            <th>&nbsp;</th>
          </tr>
          <?php
        $sql = "SELECT * FROM `customers`";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<form method ='post' action = 'transfermoney.php'>";
            echo "<td>". $row['customer_id'] . "</td>
            <td>". $row['name'] . "</td>
            <td>". $row['email'] . "</td>
            <td>". $row['current_balance'] . "</td>";
           echo "<td> <a href='acustomer.php'><button type='submit' class='btn btn-default' name='user'  id='users1' value= '{$row['name']}' >View Customer</button></a></td>";
            echo "</form>";
           echo  "</tr>";
        }
        ?>
		
	</table>


                </main>
            </article>
            
            <div class="clearfix"></div>
        </section>

        <footer class="main-footer"><!--footer-->
            <div class="footer-box">
                <h3>Footer menu</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="regviewuser.php">View all Customer</a></li>
                        <li><a href="transferrecords.php">Transfer Records</a></li>
                    </ul>
            </div>
            
            <div class="footer-box">
                <h3>Spark Bank</h3>
                    <address>
                        <p>BD190, Isha Appartment, Kestopur, 700101</p>
                        <p>Email:<a href="mailto:utshadhar31@gmail.com">Mail</a></p>
                        <p>Phone:<a href="tel:+8801838262248">Call us</a></p>
                    </address>

            </div>
            <div class="clearfix"></div>
        </footer>
        <div class="copy">
            <p><small>Copyright &copy; 2020 All Rights Reserved.</small></p>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
</body>
</html>