<?php
include('header.php');
?>

<body>
    <form action="Ajaxkeyform.php" method="POST" name="simplelogin" id="login_form"><br />
        <label for="username">&nbsp; Username:</label>
        <input type="username" name="username" id="username" size="30" required><br><br>
        <label for="password">&nbsp; Password:</label>
        <input type="password" name="password" id="password" size="30" required><br><br>
        <input class="load_button" type="button" name="submit" id="submit" value="Submit" placeholder="Submit">
        <div class="overlay">
        <div id="loading-img"></div>
        </div>
       
        <div id="success_msg"></div>
   		
   		<div id="#domMessage"></div>
    </form>

<div class="fifty"></div>
</body>
</html>
        <!-- <div id="loading_image"><img src="ajax-loader.gif" id="gif" style="display:none;"> -->