<?php
session_start();
require_once 'config.php';
// Access session data
if (isset($_SESSION['formData'])) {
    $formData = $_SESSION['formData'];

    // Access individual elements
    $firstname = $formData['firstname'];
    $lastname = $formData['lastname'];
    $address = $formData['address'];
	$member_id = $formData['memberid'];

} else {
    echo "Session data not found.";
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
  </head>
  <style>
    .container{
      align-items: center;
    }
    
  </style>
  <body>
    <div class="container">
    <h1 class="text-success">Thank You</h1>
    <p><?php  echo "First Name: $firstname"?></p>
    <p><?php  echo "Last Name: $lastname"?></p>
    <p><?php   echo "Address: $address"?></p>
    <table class="table table-striped  table-info w-50">
  <thead>
    <tr>
      <th scope="col">sr.no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
    </tr>
 
	<?php
	  $getProducts = "SELECT product_name, product_price FROM member_orders WHERE member_id = $member_id ";
	  $result = $conn->query($getProducts);
	  $id=0;
	  $totalPrice=0.0;
	  while($row = mysqli_fetch_assoc($result)){
		  $id++;
		  $totalPrice =( $totalPrice + doubleval($row['product_price']));
		echo "  <tr>
					<th>".$id."</th>
					<td>".$row['product_name']."</td>
					<td>".$row['product_price']."</td>
				</tr>"; 
				} 
				
	?>
			<tr>
			<td colspan="2"><h5>Total Price</h5></td>
			<td ><?=number_format($totalPrice,2)?> </td>
			</tr> 

	 
</tbody>
</table>
		<div class=" w-25 ">
			<a class="btn btn-success mx-auto d-block w-50" href="index.php"> Home</a>		
		</div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
  </body>
</html>

