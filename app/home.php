<!DOCTYPE html>
<html lang="en">

  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Code for Covid</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->
    <style>
#whatwedo{
    font-size:250%;
    padding-left:15px;
}
#explain{
    font-size:150%;
    padding-left:15px;
}

.btnLightBlue {
  background: #5DC8CD;
}
.btnFade.btnLightBlue:hover {
  background: #01939A;
}
#submitbutton {
  display: block;
  position: relative;
  float: left;
  width: 120px;
  padding: 0;
  margin: 10px 30px 20px 15px;
  font-weight: 600;
  text-align: center;
  line-height: 50px;
  color: #FFF;
  border-radius: 5px;
  transition: all 0.2s ;
}

.main-button{
    color:white;
}

    </style>
  </head>

  <body>
    
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>Circuit Breaker lasts till 1 June 2020! Till then, stay strong! #SGunited</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/sgunitedshare.jpg" alt="sgunited"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <script>
      console.log("username here");
      var username = sessionStorage.getItem("username");
      console.log(username);
      function func1(){
        window.location.href = "post.php?username=" + username;
      }
      function func2(){
        window.location.href = "myposts.php?username=" + username;
      }
    </script>
<!-- Banner Starts Here -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="caption">
              <h2>Post an item here</h2>
              <div class="line-dec"></div>
              <p>Post an item to share with your follow block mates :)
                <br/><br/>
                Click POST AN ITEM to share something and/or MY POSTS to see what you shared and remove any items.
              <br>
              <div class="main-button">
                <a onclick="func1();" >Post an Item</a>
                &nbsp&nbsp&nbsp&nbsp&nbsp
            <a onclick="func2();" >My Posts</a>
            </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->



    <!-- Featured Starts Here -->
    <!-- <script>

        $(async () => {
            console.log("I am in");
            var serviceURL = "http://localhost:5011/retrieveitem";
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
                if(count>2){
                    var actual_count = count;
                    count = 2;
                }
                console.log(data.items[0]);
                // console.log(data.items[0]["itemdescription"]);
                console.log(jQuery.isEmptyObject(data));
            }
            catch (error) {
                console.error(error);
                }

            if(Object.keys(data.items).length==0){
                $("#featured").append("<h4>No items posted. Be the first! :)</h4>");
            }
            else{
                for(var i = 0; i<count; i++){
                    console.log(data.items[i]);
                    // $("#coolfeatures").append("<a href='single-product.html'>");
                    // $("#coolfeatures").append("<div class='featured-item'>");
                    // $("#featured").append("<div class = 'column'>");
                    // $("#featured").append("<div class='card'>");
                    // $("#featured")
                    $("#featured").append("<aside class='currentDiv'>");
                    $("#featured").append("<h4>Item Name: "+data.items[i]["itemname"]+"</h4>");
                    $("#featured").append("<h5>Item Description: "+data.items[i]["itemdescription"]+"</h5>");
                    $("#featured").append("<h6>From: "+data.items[i]["username"]+"</h6>");
                    $("#featured").append("<h6>Unit number: "+data.items[i]["unit"]+"</h6>");
                    $("#featured").append("</aside>");
                    $("#featured").append("</br>");
                }
            }
        }); -->
        <!-- // <a href="single-product.html">
        //         <div class="featured-item">
        //           <h4>Proin vel ligula</h4>
        //           <h6>$15.00</h6>
        //         </div>
        //       </a> -->
    </script>

    <div class="featured-items">
      <!-- <div class="container"> -->
        <!-- <div class="row"> -->
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1 id='whatwedo'>WHAT WE DO</h1>
            </div>
            <h2 id='explain'>FOOD-BLOC groups together people living in the same estate by postal code, allowing neighbours to share food or any commodities needed.<br/><br/>
            Click the button below to see all items shared in your residence.<br/>
            </h2>
            <?php
    if(isset($_GET['username'])){
        $username = $_GET["username"];
        echo "<form action='allitems.php' method='GET'>";
        echo "<input type='hidden' name='username' value=$username>";
        echo "&nbsp&nbsp&nbsp&nbsp<input type='submit' id='submitbutton' class='button btnFade btnLightBlue' value='See all items'/>";
        echo "</form>";
    }
?>
          </div>
                
              <!-- <a href="single-product.html">
                <div class="featured-item">
                  <h4>Item Name</h4>
                  <h5>Item description</h5>
                  <h6>username</h6>
                  <h6>unit</h6>
                </div>
              </a> -->

<!-- 
              <a href="single-product.html">
                <div class="featured-item">
                  <h4>Erat odio rhoncus</h4>
                  <h6>$25.00</h6>
                </div>
              </a>

              <a href="single-product.html">
                <div class="featured-item">
                  <h4>Integer vel turpis</h4>
                  <h6>$35.00</h6>
                </div>
              </a>

              <a href="single-product.html">
                <div class="featured-item">
                  <h4>Sed purus quam</h4>
                  <h6>$45.00</h6>
                </div>
              </a>

              <a href="single-product.html">
                <div class="featured-item">
                  <h4>Morbi aliquet</h4>
                  <h6>$55.00</h6>
                </div>
              </a>

              <a href="single-product.html">
                <div class="featured-item">
                  <h4>Urna ac diam</h4>
                  <h6>$65.00</h6>
                </div>
              </a>

              <a href="single-product.html">
                <div class="featured-item">
                  <h4>Proin eget imperdiet</h4>
                  <h6>$75.00</h6>
                </div>
              </a>

              <a href="single-product.html">
                <div class="featured-item">
                  <h4>Nullam risus nisl</h4>
                  <h6>$85.00</h6>
                </div>
              </a>

              <a href="single-product.html">
                <div class="featured-item">
                  <h4>Cras tempus</h4>
                  <h6>$95.00</h6>
                </div>
              </a> -->

          </div>
        <!-- </div> -->
      <!-- </div> -->

    </div>

    <!-- Featured Ends Here -->



    <!-- Subscribe Form Starts Here -->
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe to FOOD-BLOC now!</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>Subscribe to us to receive updates on our services and any new initiatives we undertake.</p>
              <div class="container">
                <form id="subscribe" action="" method="get">
                  <div class="row">
                    <div class="col-md-7">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" 
                        onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                    	onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                    	value="Your Email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-5">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe Form Ends Here -->


    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="assets/images/header-logo.png" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How It Works ?</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; 2020 FOOD-BLOC 
                
                - Design: <a rel="nofollow" href="https://www.facebook.com/tooplate">Tooplate</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
