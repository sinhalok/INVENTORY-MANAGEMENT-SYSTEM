<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Item</title>
    <style media="screen">
      body{
        background-image: url("Images/Wallpaper.jpg");
      }
      div.container{
        width:100%;
      }
      div.innerBox{
        width:50%;
        height:50%;
        background-color: white;
        border: 2px solid #87CEFA;
        padding: 16px;
        position:absolute;
        margin:auto;
        top:0px;
        bottom:0px;
        right:0px;
        left:0px;
        border-radius: 15px;
        box-shadow: 5px 10px 15px #8888DD;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="innerBox">
        <center>
          <br><br><br><br>
          <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <table>
              <tr>
                <td>Item Name:</td>
                <td>
                  <input type="text" name="name" placeholder="Item Name">
                </td>
              </tr>
              <tr>
                <td>Item Quantity:</td>
                <td>
                  <input type="number" name="quantity" placeholder="Item Quantity">
                </td>
              </tr>
              <tr>
                <td>Item Category:</td>
                <td>
                  <input type="text" name="category" placeholder="Item Category">
                </td>
              </tr>
              <tr>
                <td>Item Price:</td>
                <td>
                  <input type="number" name="price" placeholder="Item Price">
                </td>
              </tr>
              <tr>
                <td>Item ID:</td>
                <td>
                  <input type="number" name="id" placeholder="Item ID">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="submit" name="submit" value="ADD ITEM">
                </td>
              </tr>
            </table>
          </form>
          <?php
            if(isset($_POST['submit'])){
              $conn=mysqli_connect("localhost","root","","inventory");
              $name=$_POST['name'];
              $quantity=$_POST['quantity'];
              $category=$_POST['category'];
              $price=$_POST['price'];
              $id=$_POST['id'];
              $query="insert into items values('$name','$quantity','$price','$category','$id')";
              $send=mysqli_query($conn,$query) or die(mysqli_error($conn));
              echo "Added";
              mysqli_close($conn);
            }
          ?>
          <form class="" action="index.html" method="post">
            <input type="submit" value="Return">
          </form>
        </center>
      </div>
    </div>
  </body>
</html>
