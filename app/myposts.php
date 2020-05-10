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
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: #E0FFFF;
}
#backbutton{
    margin-left: 75px;
    font-size:20px;
}

.removebutton{
    font-size:30px;
}

h2.header{
    text-align: center;
    padding-top: 50px;
    font-size:30px;
    font-family: "Palatino";
}
/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

#noitems{
    text-align:center;
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
    ?>
    <script>
    var username = "<?php echo $username ?>";
    console.log(username);
    $(async () => {
            console.log("I am in");
            var serviceURL = "http://localhost:5001/getitems";
            try {
                const response = await fetch(
                serviceURL, {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ "username": username}),
                mode: 'cors'
                });
                data = await response.json();
                //console.log(data['message'])
                console.log(data.items);
                console.log(Object.keys(data.items).length);
                var count = Object.keys(data.items).length;
                // if(count>2){
                //     var actual_count = count;
                //     count = 2;
                // }
                console.log(data.items[0]);
                // console.log(data.items[0]["itemdescription"]);
                console.log(jQuery.isEmptyObject(data));
            }
            catch (error) {
                console.error(error);
                }

            if(Object.keys(data.items).length==0){
                $("#itemtable").append("<tr><th id='noitems'>No items posted. Don't be afraid to share! :)</th></tr>");
            }
            else{
                $("#itemtable").append("<thead><tr><th>Item Name</th><th>Item Description</th><th>Remove</th><th>Chat</th></thead><tbody>");
                for(var i = 0; i<count; i++){
                    console.log(data.items[i]);
                    // $("#coolfeatures").append("<a href='single-product.html'>");
                    // $("#coolfeatures").append("<div class='featured-item'>");
                    // $("#featured").append("<div class = 'column'>");
                    // $("#featured").append("<div class='card'>");
                    // $("#featured")
                    $("#itemtable").append("<tr>"+"<td>"+data.items[i]["itemname"]+"</td>"+"<td>"+data.items[i]["itemdescription"]+"</td>"+"<td class='removebutton'>"+"<form action='remove_process.php' method='get'>"+"<input type='hidden' name='itemid' value="+data.items[i]["itemid"]+">"+"<input type='hidden' name='username' value="+data.items[i]["username"]+">"+"<input type='submit' value='Click to remove'></form>"+"</td>"+"<td class='removebutton'><form action='chat.php' method='GET'><input type='hidden' name='username' value="+username+"><input type='hidden' name='otherusername' value="+data.items[i]["username"]+"><input type='submit' value='Chat'></form></td>"+"</tr>");
                    // $("#itemtable").append("<td>"+data.items[i]["itemname"]+"</td>");
                    // $("#itemtable").append("<td>"+data.items[i]["itemdescription"]+"</td>");
                    // $("#itemtable").append("<td>"+"<form action='remove_process.php' method='get'><input type='submit' value='Click to remove'></form>"+"</td>");
                    // $("#itemtable").append("</tr>");
                }
                $("#itemtable").append("</tbody>");
            }
        });
    </script>
    <h2 class="header">Table below shows your items</h2>
    <div class="table-wrapper">
        <table class="fl-table" id='itemtable'></table>
    </div>

    <script>
        function goBack() {
            var username = "<?php echo $username ?>";
            window.location.href = "./home.php?username="+username;
        }
    </script>
    <button id='backbutton' onclick="goBack()">&laquo; Go back</button>
    </body>

</html>