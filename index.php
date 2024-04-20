<?php
session_start();
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
// // Assuming you have a MySQL database 

    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $product = $_POST['product'];
    $price = $_POST['price'];

   
    
    print_r( $_SESSION['formData']);
    
    // Insert data into 'member' table
    $insertMember = "INSERT INTO member (first_name,last_name,address) VALUES 
        ('$firstname','$lastname','$address')";

        if ($conn->query($insertMember) === TRUE) {

            $memberID =$conn->insert_id;
            
            $_SESSION['formData'] = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'address' => $address,
                'product' => $product,
                'price' => $price,
                'memberid' => $memberID
            );

            print_r( $_SESSION['formData']);

            // Insert data into 'member_orders' table with the obtained member ID
            $insertOrder = "INSERT INTO member_orders (product_name,product_price,member_id) VALUES 
            ( '$product', '$price', '$memberID')";

            if ($conn->query($insertOrder) === TRUE) {
                header("Location: UpsellOne.php");
            } else  {
                echo  $conn->error;
            }
        } else  {
            echo $conn->error;
    }

}

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Funnel_test</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous">

            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <style>
            h1{
                text-align: center;
            }

            *{
            color : black;
           
            font-family: Arial, Helvetica, sans-serif;
            margin: 0px;
            padding: 0px;
            }
            
            .container{
                width: 50%;
                height: auto;
                display: flex;
                justify-content: space-around;
                align-items: center;
                flex-direction: column;
            }
            button {
                margin-top: 10px;
            }

            
        </style>
        <body>
            <h1>Checkout Form </h1>
        <div class="container mt-5">
            <form id="submit_form" method="post" onsubmit="submitForm()">
                <div class="row">
                    <div class="col-5">
                        <div>
                            <label for="" class="form-label">First
                                Name <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control"
                                id="firstname" name="firstname" >
                        </div>
                        <p id="ferror" class="text-danger"></p>
                    </div>
                    <div class="col-5">
                        <div>
                            <label for="" class="form-label">Last
                                Name <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control"
                                id="lastname" name="lastname">
                        </div>
                        <p id="lerror" class="text-danger"></p>
                    </div>
                    <div class="col-2">
                        <div class="mt-3">
                    <strong>Your Cart:</strong>
                    <div>
                        Product Name: <span id="productName">Hard Disk</span><br>
                        Total: <span id="totalPrice">$4000</span> USD
                    </div>
                </div>
                    </div>
                </div>
                <div class="row">
                <div class="mb-3 col-10">
                    <label for="" class="form-label">Address <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control"
                        id="address" name="address" placeholder="Enter Full Address">
                        <p id="aerror" class="text-danger"></p>
                </div>
                <div class="row">
            <div class="mb-3 col-4">
                <label for="" class="form-label">Address <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Full Address">
                <p id="aerror" class="text-danger"></p>
            </div>
            <div class="mb-3 col-4">
                <label for="" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country">
            </div>
            <div class="mb-3 col-4">
                <label for="" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="mb-3 col-4">
                <label for="" class="form-label">ZIP Code</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode">
            </div>
        </div>
        <!-- Checkbox for shipping address same as billing address -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="sameAddressCheckbox">
            <label class="form-check-label" for="sameAddressCheckbox">
                Shipping address is the same as my billing address
            </label>
        </div>
        <!-- Checkbox to save address for next time -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="saveAddressCheckbox">
            <label class="form-check-label" for="saveAddressCheckbox">
                Save this address for next time
            </label>
        </div>
                    <div class="col-2">
                        <div>
                            <div class="form-floating mb-3">
                                <!-- <input type="number" class="form-control"id="price" name="price"placeholder="name@example.com"> -->
                                <span for="floatingInput">Price</span>
                                <h6 name="price">4000</h6>
                                <input type="hidden" name="price" value="4000">
                                <p id="przerror"></p>
                            </div>
                        </div>
                    </div>
                </div>
             
             

                                 <hr>
                 <h3>Payment</h3>
                 <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Credit Card
                    </label>
                  </div>
                 <div class="form-check mt-1" >
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Debit Card</label>
                  </div>
                 <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Paypal</label>
                  </div>
                  <div class="row">
                    <div class="col-5 my-2">
                        <div class="mb-3">
                            <label for="" class="form-label">Name of Card</label>
                            <input type="text" class="form-control" id="cardname" placeholder="">
                            <div id="" class="form-text">
                                Full Name as displed on Card
                              </div>
                          </div>
                    </div>
                    <div class="col-5 my-2">
                        <div class="mb-3">
                            <label for="" class="form-label">Credit Card Number</label>
                            <input type="text" class="form-control" id="cardnum" placeholder="">
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="" >
                          </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" >
                          </div>
                    </div>
                  </div>
                  <hr>
                  <div class="d-grid gap-2 ">
                   <button class="btn btn-primary rounded-3  mx-auto" type="button"  onclick="validateAndSubmit()">Continue to Checkout</button>
                  </div>
                  <br>
            </form>
        </div>
        <script src="index.js"></script>
        
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous">

                function submitForm() {
                // Use AJAX to submit the form
                $.ajax({
                    url: "index.php",
                    data: $("#submit_form").serialize(),
                    success: function(response) {
                        console.log(response);
                        
                    }
                });
                }
    </script>
 



</body>
</html>
