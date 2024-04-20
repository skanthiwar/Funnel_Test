 <?php
session_start();
// print_r( $_SESSION['formData']);
require_once 'config.php';
// Access session data
if (isset($_SESSION['formData'])) {
    $formData = $_SESSION['formData'];

    $firstname = $formData['firstname'];
    $lastname = $formData['lastname'];
    $address = $formData['address'];
    $member_id = $formData['memberid'];
    
    // print_r( $_SESSION['formData']);

  }
  if($_SERVER['REQUEST_METHOD'] == 'POST'){        
           
            $productUp = $_POST['product1'];
            $priceUp = $_POST['price1'];
            echo $productUp ." = " . $priceUp;

            $insertNewOrder = "INSERT INTO member_orders (product_name, product_price, member_id) VALUES 
            ( '$productUp', '$priceUp', '$member_id')";

            if ($conn->query($insertNewOrder) === TRUE) {
                header("Location: UpsellTwo.php");
            } else  {
                echo  $conn->error;
            }
        }
     
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upsell One Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous">
      
      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </head>
    <body>
      <center class="mt-5">
        <p><?php  echo "First Name: $firstname"?></p>
        <p><?php  echo "Last Name: $lastname"?></p>
        <p><?php   echo "Address: $address"?></p>
        
        <form id="submit_Upform" method="post">
          <img src="images/cover.jpg" alt width="250px"><br>
          <h5>Hard Disk Cover</h5>
          <input type="hidden" name="product1" value="Hard Disk Cover">
          <h6>INR 500</h6>
          <input type="hidden" name="price1" value="500">
          <button type="submit" class="btn btn-success" onclick = "UpsellSubmit()">Add to my Order</button><br>
          <a href="UpsellTwo.php" style="text-decoration:none">No Thank You</a>
        </form>

        <div class=" w-25 mt-5">
        <a class="btn btn-success mx-auto d-block w-50" href="index.php"> Home</a>		
      </div>
      </center>
      
      <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
      
      <script>
        
        function UpsellSubmit() {
          // Use AJAX to submit the form
          $.ajax({
            url: "UpsellOne.php",
            data: $("#submit_Upform").serialize(),
            success: function(response) {
              // Handle the response if needed
              console.log(response);
              
            }
          });
        }
        </script>

</body>
</html>