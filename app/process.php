<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  margin:auto;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
#waittext{
    color:#3498db;
    text-align:center;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
    </head>
    <body>
    <h1 id='waittext'>Loading... Please wait</h1>
    <div class="loader"></div>
    <?php

        if (isset($_POST['itemdescription']) && isset($_POST['itemname'])){

            $username = $_POST["username"];
            $itemname = $_POST["itemname"];
            $itemdescription = $_POST["itemdescription"];
        }
    ?>
    <script>
        var username = "<?php echo $username ?>";
        var itemname = "<?php echo $itemname ?>";
        var itemdescription = "<?php echo $itemdescription ?>";
        console.log(username);
        console.log(itemname);
        console.log(itemdescription);
        $(async () => {
            console.log("I am in");
            var serviceURL = "http://localhost:5010/postitem";
            try {
                const response = await fetch(
                serviceURL, {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ "username": username, 
                "itemname": itemname,"itemdescription":itemdescription}),
                mode: 'cors'
                });
                data = await response.json();
                //console.log(data['message'])
                console.log(data);
                console.log("done");
                if(data==true){
                    window.location.href = "post.php?username=" + username+"&message=success";
                }
            }
            catch (error) {
                console.error(error);
                }
        });
        
    </script>
    </body>

</html>