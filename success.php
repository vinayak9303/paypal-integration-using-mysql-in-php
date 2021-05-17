<?php
include_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>

    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link rel="stylesheet" href="style.css">

</head>
<body>
<main id="cart-main" style="display: none;">

    <div class="site-title text-center">
        <div><img src="./assets/checked.png" alt=""></div>
        <h1 class="font-title">Payment Done Successfully...!</h1>
    </div>
<div id="result"></div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    if (typeof(Storage) !== "undefined") {
  id= sessionStorage.getItem("id");
  amount= sessionStorage.getItem("amount");
  $.ajax({
        url: "./confirmpayment.php",
        type: "POST",
        dataType: "json",
        data: {
          id:id,
          amount:amount
        },
        success : function(data){
          if(data['success'] == 1){
           $("#cart-main").show();
          }
          else if(data['success'] == 0){
            alert('some thing went wrong please try again later!');
          }
        }
      });
} else {
  document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
}
</script>
</body>
</html>
