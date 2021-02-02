<!DOCTYPE html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="menu.css">
  </head>
  <body>
    <header>
      <img class="logo" src="image/books.svg" alt="logo" width= "50" height="50">
      <nav>
          <ul class="nav_links">
          <li><a href="admin_index.php">Home</a></li>
              <li><a href="Admin_add-user_html.php">Add Account</a></li>
              <li><a href="Admin_view-user.php">Edit Account</a></li>
              <li><a href="Admin_delete-user.php">Delete Account</a></li>
              <li><a href="Admin_record.php">Record</a></li>
          </ul>
      </nav>
      <?php

      session_start();
             //if not logged in, display "Login" hyperlink
             if(!isset($_SESSION['user']))
             { ?>


              <a class="cta" href="login.html"><button class="button1">Log In</button></a>
             </li>
             <?php }
             //if logged in, display "Logout" hyperlink
             else
             { ?>

              <a class="cta" href="logout.php"><button class="button1">Logout</button></a>
             </li>

             <?php } ?>

  </header>
<style>
.title{
    margin-left:30px;
    margin-top:15px;
    width:140px;
    font-size:25px;
    font-weight: 700;
}
.center {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  margin: auto;
  width: 50%;
  padding: 10px;
}

.button{
    padding: 10px 24px;
    background-color: rgb(238, 159, 150);
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;

}
.button:hover {
background-color: rgb(218, 122, 112);
}
.add {
	background-color: MediumSeaGreen;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  color: white;
  padding: 12px 24px;
}

.reset {
	background-color: Red;
}


</style>
  <div class="center">
  <form action="Admin_add-user.php" method="post">
    <table style="width: 100%">
      <tr>
        <td class="title" style="text-align:center;background:#fff; font-size:4em;font-family: 'Pacifico', cursive;">Add User</td>
        </tr>
    </table>
      <table style="width: 100%">
        <tr>
    		  <td style="width: 255px" class="title">User Role:</td>
    		  <td><select class ="mybox" id="user_role"  name="user_role" onchange="role()" required="required">
          <option value="blank" selected="selected"></option>
    		  <option value="Admin">Admin</option>
    		  <option value="Student">student</option>
    		  <option value="Librarian">Librarian</option>
    		  	</select></td>
    			</tr>
      </table>

      <table style="width: 100%">
          <td style="width: 227px">&nbsp;</td>
      <tr>
	      <td style="width: 227px" class="title">Username :</td>
        <td style="width: 25px"> <a style="background:white; color:black;" id="student"></a></td>
	      <td><input id="username" name="username" disabled type="text" required="required"></td>
        <td style="width: 300px" style="align:center"><a style="background:white; color:black;" id="admin"></a></td>
		</tr>
    </table>

    <table style="width: 100%">
	   <tr><td style="width: 227px">&nbsp;</td></tr>
		<tr>
		  <td style="width: 227px; height: 28px;" class="title">Password :</td>
      <td style="width: 25px"></td>
		  <td style="height: 28px"> &nbsp;<input name="password" id="password" disabled type="password" required="required"></td>
      <td style="width: 100px"></td>
		</tr>
		 <tr><td style="width: 227px">&nbsp;</td></tr>
		<tr>
		  <td style="width: 227px" class="title">Confirm Password :</td>
      <td style="width: 25px"></td>
		  <td> &nbsp;<input name="confirm_password" id="confirm_password" disabled type="password" required="required">
      <td style="width: 100px"></td>
		  </td>
		</tr>
    <tr><td style="width: 227px">&nbsp;</td></tr>
		<tr>
      <td style="width: 227px">&nbsp;</td>
      <td style="width: 25px"></td>
		  <td><input id="submitbtn" onclick="isNumberKey()" type="submit" value="Add" class="button add" >&nbsp;&nbsp;&nbsp;<a class="button reset" onclick="reset()" value="Reset">Reset</td>
      <td style="width: 100px"></td>
    </tr>
		  </table>

</form>
</div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <script type="text/javascript">
		  var password = document.getElementById("password");
		  var confirm_password = document.getElementById("confirm_password");
		  var username = document.getElementById("username");

		  function validatePassword()
		  {
		  if(password.value != confirm_password.value)
		  	{
		  	confirm_password.setCustomValidity("Passwords Don't Match");
		  	}
		  		else
		  			{
		  			confirm_password.setCustomValidity('');
		  			}
		  }
      password.onchange = validatePassword;
		  confirm_password.onkeyup = validatePassword;

      function role()
      {
        var role = document.getElementById("user_role").value;
        document.getElementById("username").disabled= false;
        document.getElementById("password").disabled= false;
        document.getElementById("confirm_password").disabled= false;
       if (role=="Admin")
       {
          document.getElementById("admin").innerHTML = "@admin";
          document.getElementById("student").innerHTML = "";
       }
       else if (role=="Librarian")
       {
         document.getElementById("admin").innerHTML = "@lib";
         document.getElementById("student").innerHTML = "";
       }
       else if (role=="Student")
       {
         document.getElementById("admin").innerHTML = "";
         document.getElementById("student").innerHTML = "TP";

       }
      }

      function reset()
      {
        document.getElementById("user_role").value = "blank";
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
        document.getElementById("confirm_password").value = "";
        document.getElementById("username").disabled= true;
        document.getElementById("password").disabled= true;
        document.getElementById("confirm_password").disabled= true;
        document.getElementById("student").innerHTML = "";
        document.getElementById("admin").innerHTML = "";
      }

  function isNumberKey()
  {
    var role = document.getElementById("user_role").value;
    if (role=="Student")
    {
      if(isNaN(username.value) || username.value>99999)
        {
        username.setCustomValidity("Can only accept numbers and accept up to 6 digit");
        }
          else
            {
            username.setCustomValidity('');
            }
      }
      else if (role=="Admin")
      {
          username.setCustomValidity('');
        }
        else if (role=="Librarian")
        {
            username.setCustomValidity('');
        }
    }


	</script>





  </body>
</html>
