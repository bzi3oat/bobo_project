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
</head>
<body>
    
<nav>
    <div class="nav-wrapper #ffb300 amber darken-1">
      <a href="login/login.php"><img src="../img/logo.png" class="brand-logo center" width="120" height="120"></a>
      
      
      <ul id="nav-mobile" class="left hide-on-med-and-down">
      <ul class="right hide-on-med-and-down">
        <li><a href="visitor_index.php"><i class="material-icons left">build</i>แจ้งเหตุขัดข้อง</a></li>
        <li><a href="visitor_tracking.php">ติดตามสถานะการแจ้งเหตุขัดข้อง</a></li>
        
      </ul>

       
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      
        <li><a href="badges.html"><i class="material-icons right">keyboard_arrow_down</i>ช่วยเหลือ</a></li>
       
      </ul>
    </div>
  </nav>


 



  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>
</html>



