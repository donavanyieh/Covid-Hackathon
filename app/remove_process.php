<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
    <?php

        if (isset($_GET['itemid']) && isset($_GET["username"])){
            $itemid=$_GET["itemid"];
            $username=$_GET["username"];;
        }
    ?>
    <script>
        var itemid = "<?php echo $itemid ?>";
        var username = "<?php echo $username ?>";
        console.log(itemid);
        $(async () => {
            console.log("I am in");
            var serviceURL = "http://localhost:5001/deleteitem";
            try {
                const response = await fetch(
                serviceURL, {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ "itemid": itemid}),
                mode: 'cors'
                });
                data = await response.json();
                //console.log(data['message'])
                console.log(data);
                console.log("done");
                if(data==true){
                    window.location.href = "myposts.php?username=" + username+"&message=success";
                }
            }
            catch (error) {
                console.error(error);
                }
        });
        
    </script>
    </body>

</html>