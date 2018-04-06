<?php include('header.php');?> 
<body onload="loadingAjax('myDiv');">
    <div id="myDiv">
        <img id="loading-image" src="ajax-loader.gif" style="display:none;"/>
    </div>
</body>
<form method="post" name="form">
<ul><li>
<input id="name" name="name" type="text" />
</li><li>
<input id="username" name="username" type="text" />
</li><li>
<input id="password" name="password" type="password" />
</li><li>
<select id="gender" name="gender"> 
<option value="">Gender</option>
<option value="1">Male</option>
<option value="2">Female</option>
</select>
</li></ul>
<div >
<input type="submit" value="Submit" class="submit"/>
<span class="error" style="display:none"> Please Enter Valid Data</span>
<span class="success" style="display:none"> Registration Successfully</span>
</div>
</form>
</body>