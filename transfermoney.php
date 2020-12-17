<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"bank");
if(!$con){
    die("Connection failed");

}
$_SESSION['user']=$_POST['user'];
$_SESSION['sender']=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
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
                <div>
<div>
<div>
    <div>
 
    
    <div><h4 style="font-size: xx-large;
    color: darkred;
    margin: revert;
    text-align: center;">Customer Details</h4>
    </div>
        <br><br>
        <div style="
    font-family: sans-serif;
    text-align: center;
    font-weight: 900;
">

        <?php
        if (isset($_SESSION['user']))
        {
          $user=$_SESSION['user'];
          $result=mysqli_query($con,"SELECT * FROM customers WHERE Name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            echo "<p><l>User ID<l> &nbsp;: ".$row['customer_id']."</p><br>";
            echo "<p name='sender'><l'>Name&nbsp;&nbsp;<l>&nbsp;&nbsp;: ".$row['name']."</p><br>";
            echo "<p><l>Email ID<l> : ".$row['email']."</p><br>";
            echo "<p><l>Balance<l>&nbsp; :&nbsp;<b>&#8377;<l> ".$row['current_balance']."</p>";
          }         
        }
      ?>

      </div>
    </div>
    <div>
        <div >
                    <form action="transfer.php" method="POST">
                        
                    
                    <div>
                    <span>Money Transfer</span>
                    </div><br><br>
                    <l>Sender</l> : <span"><input name="sender" disabled type="text" style="width:40%;border:none;" value='<?php echo "$user";?>'></input></span>

                        <br><br><br>
                        <l>Select Reciever:</l>
                <select name="reciever" id="dropdown" style="width: 50%;" required>
                    <option>Select Reciever</option>
                <?php
                $db = mysqli_connect("localhost", "root", "", "bank");
                $res = mysqli_query($db, "SELECT * FROM customers WHERE Name!='$user'");
                while($row = mysqli_fetch_array($res)) {
                    echo("<option> "."  ".$row['name']."</option>");
                }
                ?>
                </select>
                <br><br><br>
                        <l>Amount to be transferred &#8377;:</l>
                        <input name="amount" type="number" style="width: 50%; padding: 10px;" min="100" required>
                        <br><br><br>
                        <button name="transfer"><l>Transfer</l></button>
                        </form>
        </div>
    </div>
</div>
                </main>
            </article>
            
            <div class="clearfix"></div>
        </section>

<body>


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