<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>Contact Form</title>
<link href="{{ URL::to('/') }}/css/bootstrap-theme.css" rel="stylesheet">
<link href="{{ URL::to('/') }}/css/Site.css" rel="stylesheet">
 <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js">      </script>

</head>

    <body>





<div id="body">
 <section class="content-wrapper main-content clear-fix">
<h1>Contact Form Example Laravel</h1>

<form role = "form" method="post" enctype="multipart/form-data" action="{{ URL::to('/') }}/send">

   <div class = "form-group">
      <label for = "name">Name*: </label>
      <input type = "text" name="name" class = "form-control" id = "name" maxlength="150">
   </div>
                <div class = "form-group">
      <label for = "name">Surname*:</label>
      <input type = "text" name="surname" class = "form-control" id = "surname" maxlength="700" >
   </div>
      <div class = "form-group">
      <label for = "name">Email*:</label>
      <input type = "text" name="email" class = "form-control" id = "email" placeholder = "Email?">
   </div>

        

 <div class = "form-group">
      <label for = "inputfile">Image: </label>
      <input type = "file"  name="filetoupload" id = "filetoupload">

   </div>

 <div class = "form-group">
      <label for = "name">Message*:</label>
      <input type = "text" name="message" class = "form-control" id = "message" placeholder = "Enter message?">
   </div>

   <button type = "submit" class = "btn btn-default" onClick="return empty()">SEND</button>
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     </div>
</form>
 </div>



