<html ng-app="social-app">
  <head>
    <meta charset="utf-8">
          <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>TopShelf</title>

     <link href="https://code.ionicframework.com/1.0.0-beta.1/css/ionic.min.css" rel="stylesheet">
    <script src="https://code.ionicframework.com/1.0.0-beta.1/js/ionic.bundle.min.js"></script>
    <script src="./js/payment.js"></script>

  </head>
  <body ng-app="social-app" ng-controller="paymentCtrl">
    <ion-pane>
      <ion-header-bar class="bar bar-header bar-stable">
        <div class="buttons">
          <button class="button icon-left ion-ios7-arrow-back button-clear button-dark ion-myclass" style="font-size:150%;" onclick="location.href = './invoice.php';"></button>
        </div>
        <h1 class="title">Payment Information</h1>

      </ion-header-bar>
      <ion-content header-shrink scroll-event-interval="5">         
        <!--Credit Card Information-->
        <h4 style="padding:0.5em;">Credit card</h4>
        
        <div class="list">
          <label class="item item-input">
            <i class="ion-ios7-person" style="padding-right:0.5em;"></i>
            <input type="text" placeholder="Full name">
          </label>
          <label class="item item-input">
            <i class="icon ion-card" style="padding-right:0.5em;"></i>
            <input type="text" placeholder="Card number" >
              
          </label>
          
          <div class="row" style="padding:0;">
            <div class="col" style="padding:0;">
              <label class="item item-input">
                <input type="text" placeholder="Expiration date">
              </label>
            </div>
            <div class="col" style="padding:0;">
              <label class="item item-input" >
                <input type="text" placeholder="CVV">
              </label>
            </div>                
          </div>
           <!--Billing info-->
            <div style="height: 1em;"></div>
              <span class="input-label" style="padding:0.5em;">Billing ZIP code</span>
               <label class="item item-input">
                 <input type="text" placeholder="Zip">
               </label>
            </div>             
        <div class="list">
          <a class="item item-avatar" href="#">
            <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg">
            <h2>PayPal</h2>
          <p class="subdude">Pay with PayPal</p>
          </a>
      </div>
          
      </ion-content>
      	<div class="bar bar-footer my-footer bar-positive" ng-click="payNow()">
          <div class="title" style="font-size:120%; font-weight:bold;">
            Pay Now              
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ngoDB";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
                                

            $res = "SELECT * FROM active WHERE Now = 'Now'";

            $uname1 = $conn->query($res);
            $uname2 = $uname1->fetch_assoc();

            $uname = $uname2["user"];

            $mon = "SELECT * from donation WHERE uname = '$uname'";
            $mon0 = $conn->query($mon);
            $mon1 = $mon0->fetch_assoc();

            $ut = $mon1["utility"];
            $cl = $mon1["clothes"];
            $mo = $mon1["cash"];

            $to = $ut + $cl ;

            $tocash = $ut*200 + $cl*100 + $mo;

            echo "₹ $tocash";

            ?>
          </div>
	    </div>
              
<script id="new-task.html" type="text/ng-template">
  <div class="modal">

    <!-- Modal header bar -->
    <ion-header-bar class="bar-secondary">
      <h1 class="title">Thank You</h1>
      <button class="button button-clear button-positive" ng-click="closeCart()">Done</button>
    </ion-header-bar>

    <!-- Modal content area -->
    <ion-content>
           <div class="title-left" style="padding:1em 0 0 1.5em; font-size:1.5em;">
            Thankyou for helping
          </div>
      <form ng-submit="done(task)">       
        <!--Pickup and location-->
        <div class="card">          
        <div>
          
          
        </div><!--End pickup and location--> 
        </div> <!-- End of card-->
         <div class="row" style="Padding:0 0 0 0;">
            <div class="col" style="Padding:0 0 0 1.75em; font-size:0.75em;">PAYMENT METHOD</div>
            <div class="col" style="Padding:0 0 0 0; font-size:0.75em;">CONFIRMATION #</div>
          </div>
          <div class="row" style="Padding:0 0 1.5em 0;">
            <div class="col" style="Padding:0 0 0 1.25em;">VISA 3345{{paymentMethod.cardNumber}}</div>
            <div class="col" style="Padding:0 0 0 0;">G-SFO-9876-91{{confirmationNumber.confirmationNumber}}</div>
          </div>
        
        <!-- Receipt-->

           
           <!-- Button-->
         <div class="padding">
          <button type="submit" class="button button-block button-positive" >Continue Helping</button>
        </div>
      </form>
    </ion-content>

</script>
</ion-pane>

  </body>
</html>
