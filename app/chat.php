<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
/* baseColor: #398B93; */
/* borderRadius: 10px; */
/* $imageBig: 100px; */
/* $imageSmall: 60px; */
/* $padding: 10px; */

*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    font-size: 90%;
}
#enterchat{
    padding-left:80px;
    font-size:120%;
}
#chat{
    font-size:60%;
}
#backbutton{
    left:200px;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: #E0FFFF;
}

h2.header{
    text-align: center;
    padding-top: 50px;
    font-family: "Palatino";
    font-size:200%;
}
/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: large;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 100%;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 100%;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
        </style>
    </head>
    <body>
    <?php
        $username=$_GET['username'];
        $otherusername=$_GET["otherusername"];
    ?>
    <script>
    var username = "<?php echo $username ?>";
    var otherusername = "<?php echo $otherusername ?>";
    console.log(username);
    console.log(otherusername);
    $(async () => {
            console.log("I am in");
            var serviceURL = "http://localhost:5005/getchat";
            try {
                const response = await fetch(
                serviceURL, {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ "otherusername": otherusername}),
                mode: 'cors'
                });
                data = await response.json();
                //console.log(data['message'])
                console.log(data.chat);
                console.log(Object.keys(data.chat).length);
                var count = Object.keys(data.chat).length;
                // if(count>2){
                //     var actual_count = count;
                //     count = 2;
                // }
                console.log("down");
                console.log(data.chat[0]["otherusername"]);
                // console.log(data.items[0]["itemdescription"]);
                console.log(jQuery.isEmptyObject(data));
            }
            catch (error) {
                console.error(error);
                }

            if(Object.keys(data.chat).length==0){
                $("#itemtable").append("<tr><th>No chat history</th></tr>");
            }
            else{
                $("#itemtable").append("<thead><tr><th>Name</th><th>Chat Message</th></tr></thead><tbody>");
                for(var i = 0; i<count; i++){
                    console.log(data.chat[i]);
                    // $("#coolfeatures").append("<a href='single-product.html'>");
                    // $("#coolfeatures").append("<div class='featured-item'>");
                    // $("#featured").append("<div class = 'column'>");
                    // $("#featured").append("<div class='card'>");
                    // $("#featured")
                    if(data.chat[i]["otherusername"]==otherusername){
                        $("#itemtable").append("<tr>"+"<td>"+data.chat[i]["otherusername"]+"</td>"+"<td>"+data.chat[i]["chatmessage"]+"</td></tr>");
                    }
                    // $("#itemtable").append("<form action='chat.php method='GET'><input type='hidden' name="+username+"><input type='hidden' name='otheruser' value="+data.items[i]["username"]+"><input type='submit' value='Chat'></form>");
                    // $("#itemtable").append("<td>"+data.items[i]["itemdescription"]+"</td>");
                    // $("#itemtable").append("<td>"+data.items[i]["username"]+"</td>");
                    // $("#itemtable").append("<td>"+data.items[i]["unit"]+"</td>");
                    // $("#itemtable").append("</tr>");
                }
                $("#itemtable").append("</tbody>");
            }
        });
    </script>
    <h2 class="header">Chat History</h2>
    <div class="table-wrapper">
        <table class="fl-table" id='itemtable'></table>

    </div>
    <div id='enterchat'>
    <?php
        $username=$_GET['username'];
        $otherusername=$_GET["otherusername"];
        echo "<form action='chatprocess.php' method='get'>";
        echo "Enter Chat:&nbsp<input type='text' name='chatmessage'>";
        echo "<input type='hidden' name='username' value=$username>";
        echo "<input type='hidden' name='otherusername' value=$otherusername>";
        echo "<input type='submit' value='enter'>";
        echo "</form>";
    ?>
    </div>
    <script>
        function goBack() {
            var username = "<?php echo $username ?>";
            window.location.href = "./myposts.php?username="+username;
        }
    </script>
    <button id='backbutton' onclick="goBack()">&laquo; Go back</button>
    </body>

</html>