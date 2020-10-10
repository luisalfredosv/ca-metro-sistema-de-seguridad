<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
</head>
<body>



    <script src="js/jquery-3.2.1.min.js"></script>

</head>
<body>

<p>Gerencia: 
<select class="Select"></select>

<p>Gerenci2: 
<select class="Select"></select>
  
</body>



<script>
  
 $(".Select").val("");
  $.ajax({
     url:"sql/select_gerencia.php",
     type:'POST',
     dataType:'json',
     success: function(response)
     {
       $('.Select').html(response);
     }
  });


</script>
</html>