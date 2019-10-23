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
      tr:hover{
        background-color: #f1f1f1;
      }
      tr{
        border-bottom: 2px solid black;
        padding-bottom: 10px;
      }
      table{
        width: 80%;
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
                <td>Item Category:</td>
                <td>
                  <input type="text" name="category" placeholder="Item Category">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="submit" name="submit" value="Search ITEM">
                </td>
              </tr>
            </table>
          </form>
          <?php
            if(isset($_POST['submit'])){
              $conn=mysqli_connect("localhost","root","","inventory");
              $name=$_POST['name'];
              $category=$_POST['category'];
              if($name=="" and $category==""){
                $query="select * from items";
              }
              else if ($name!="" and $category=="") {
                $query="select * from items where name='$name'";
              }
              else if ($name=="" and $category!="") {
                $query="select * from items where category='$category'";
              }
              else {
                $query="select * from items where name='$name' and category='$category'";
              }
              $send=mysqli_query($conn,$query) or die(mysqli_error($conn));
              if($send){
                echo "<table>";
                echo "<tr><th>Name</th><th>Price</th><th>Category</th><th>Quantity</th><th>ID</th></tr>";
                while($row=mysqli_fetch_array($send,MYSQLI_ASSOC)){
                  echo "<tr><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['category']}</td><td>{$row['quantity']}</td><td>{$row['id']}</td></tr>";
                }
                echo "</table>";
              }
              else {
                echo "Nothing Found";
              }
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
