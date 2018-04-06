
  <html>
  <head>
  	  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Boostrap Validator</title>
  	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
  <script  type="text/javascript" src="boot.js"></script> 
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js">
   </script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
  <form id="contactForm" method="post" class="form-horizontal">
    <div id="success_msg">User Added succesfully!</div>
    <div class="form-group">
        <label class="col-md-3 control-label">Full name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="fullName" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Email</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="email" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Title</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="title" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Content</label>
        <div class="col-md-6">
            <textarea class="form-control" name="content" rows="5"></textarea>
        </div>
    </div>
    <!-- #messages is where the messages are placed inside -->
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <div id="messages"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" class="btn btn-default">Validate</button>
        </div>
    </div>
    <div class="overlay">
		        <div id="loading-img"></div>
		        </div>
</form>
</body>
</html>
