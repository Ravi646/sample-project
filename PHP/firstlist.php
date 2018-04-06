<!DOCTYPE html>
<html>
<body>
<p id='demo'></p>
<form >
  Title :<br>
  <input type="text" name="title" >
  <br>
  Decription:<br>
  <input type="text" name="decription" >
  <br><br>
  <button type="button" onclick="document.getElementById('demo').innerhtml= successfully">Submit</button>
<input type="reset" name="cancel">
</form>
<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>