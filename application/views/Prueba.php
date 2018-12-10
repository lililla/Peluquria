<!DOCTYPE html>
<html>
<head>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
       
        
</head>
<body>

        





<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>

<script type="text/javascript">
$(document).ready(function(){
    $("button").click(function(){

        $.ajax({success: function(result){
            $("#div1").html("hola");
        }});
    });
});
</script> 



        

</body>


        
</html>




