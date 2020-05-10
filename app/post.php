<html>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  font-family:"verdana";

}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

#backbutton {
  background-color: #f1f1f1;
  color: black;
  font-size:large;
}

#submitbutton{
    font-size:large;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
    </head>
    <body>
    <?php
        if(isset($_GET["username"])){
            $username = $_GET["username"];
        }
        if (isset($_POST['itemdescription']) && isset($_POST['itemname'])){

            var_dump($_POST["username"]);
            var_dump($_POST["itemname"]);
            var_dump($_POST["itemdescription"]);
        }
    ?>


<h2>Post your item below!</h2>
<!-- <p>Key in item name and item description<br/>e.g. Item Name: Nasi Lemak<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspItem Description: Halal, enough for around 3 pax, collect by 8pm</p> -->

<div class="container">
  <form method='POST' action='process.php'>
  <input type="hidden" name="username" value=<?php echo $username; ?>>
    <div class="row">
      <div class="col-25">
        <label for="fname">Item Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="itemname" placeholder="Item Name">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Item Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="itemdescription" placeholder="Give a brief description of your item..." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" id='submitbutton' value="Post">
    </div>
  </form>
  <script>
        function goBack() {
            var username = "<?php echo $username ?>";
            window.location.href = "./home.php?username="+username;
        }
    </script>
    <button id='backbutton' onclick="goBack()">&laquo; Go back</button>
</div>

        <!-- <h1>Post an Item</h1>
        <form method='POST' action='process.php'>
            <input type="hidden" name="username" value=<?php echo $username; ?>>
            <table>
                <tr>
                    <td>Item Name</td>
                    <td>
                        <input name='itemname' type="text" placeholder="Item Name" />
                    </td>
                </tr>
                <tr>
                    <td>Item Description</td>
                    <td>
                        <textarea rows="4" cols="50" name='itemdescription'></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name='submit' type='submit' value='Post'/>
                    </td>
                </tr>
            </table>             
        </form> -->

        <!-- <script>
        function goBack() {
            var username = "<?php echo $username ?>";
            window.location.href = "./home.php?username="+username;
        }
    </script>
    <button id='backbutton' onclick="goBack()">Go Back</button> -->
    <?php
        echo "<br/>";
        echo "<br/>";
        if(isset($_GET["message"])){
            echo "<ul><li class='successmessage'>";
            echo "Item successfully posted";
            echo "</li></ul>";
        }

    ?>
    </body>

</html>