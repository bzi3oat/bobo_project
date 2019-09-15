<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <!-- materializecss FORM -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- materializecss FORM -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- materializecss ICON -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .sidenav {
            width: 350px !important;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-wrapper #ffb300 amber darken-1">
            <a href="login/login.php" class="brand-logo center"><img src="assets/images/nongkwai.png" width="120"
                    height="120"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="visitor_index.php"><i class="material-icons left">build</i>แจ้งเหตุขัดข้อง</a></li>
                <li><a href="visitor_tracking.php"><i
                            class="material-icons left">work</i>ติดตามสถานะการแจ้งเหตุขัดข้อง</a></li>
            </ul>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="badges.html"><i class="material-icons left">help</i>ช่วยเหลือ</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="visitor_index.php"><i class="material-icons left">build</i>แจ้งเหตุขัดข้อง</a></li>
        <li><a href="visitor_tracking.php"><i class="material-icons left">work</i>ติดตามสถานะการแจ้งเหตุขัดข้อง</a></li>
        <li><a href="badges.html"><i class="material-icons left">help</i>ช่วยเหลือ</a></li>
    </ul>
    <!-- <nav>
    <div class="nav-wrapper #ffb300 amber darken-1">
      
      
      
      <ul id="nav-mobile" class="left hide-on-med-and-down">
      <ul class="right hide-on-med-and-down">
        
        
      </ul>

       
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      
        <li><a href="badges.html"><i class="material-icons right">keyboard_arrow_down</i>ช่วยเหลือ</a></li>
       
      </ul>
    </div>
  </nav> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var elem = document.querySelector('.sidenav');
        var instance = new M.Sidenav(elem);

        // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
        // var collapsibleElem = document.querySelector('.collapsible');
        // var collapsibleInstance = new M.Collapsible(collapsibleElem, options);

        // Or with jQuery

        $(document).ready(function () {
            $('.sidenav').sidenav();
        });
    </script>
</body>

</html>