  <?php
  $cookie_name = "user";
  $cookie_value = "John Doe";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  ?>
  <!DOCTYPE html>
  <html>
      <head>
          <title>CUSTOMER DETAILS</title>
          <link rel="stylesheet" type="text/css" href="style.css">
      </head>
      <body onload="checkCookie()">
      <p id="user"></p>
          <div class="container">
              <h2>CUSTOMER DETAILS</h2>
              <div class="panel">
                  <form action="connect.php" method="POST">

                      <label for="id">Customer ID</label>
                      <input type="number" name="id"  required placeholder="Enter Customer ID">

                      <label for="firstname">First Name</label>
                      <input type="text" name="firstname"  required placeholder="Enter First Name">

                      <label for="lastname">Last Name</label>
                      <input type="text" name="lastname" required placeholder="Enter Last Name">


                      

                      <label for="contact">Contact</label>
                      <input type="number" name="contact"  required placeholder="Enter Phone Number" maxlength="10">

                      <label for="email">Email</label>
                      <input type="text" name="email"  required placeholder="Enter Email Address" >

                      
                      
                    


                      

                      <input type="submit" name="insert" value="INSERT">
                      <input type="submit" name="display" value="DISPLAY">
                      


                      
                  
                  </form>
              </div>
          </div>
          <script>
  function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
      alert("Welcome again " + user);
    } else {
      user = prompt("Please enter your name:","");
      if (user != "" && user != null) {
        setCookie("username", user, 30);
      }
    }
    document.getelementbyID("user").innerHTML = "Welcome User" + user;
  }
  </script>
      </body>
  </html>