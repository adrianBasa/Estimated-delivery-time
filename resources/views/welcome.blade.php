<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Delivery Time</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!-- Styles -->
        <script>
	function success() {
	 if(document.getElementById("postZipCode").value==="") { 
            document.getElementById('disabledBtn').disabled = true; 
        } else { 
            document.getElementById('disabledBtn').disabled = false;
        }
    }
  
</script>
       
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
    <div class="container" style="padding-top:5%">
    <form action="shipment" method="get">
         <h3>Type your Zip Code to see estimated delivery time</h3>
              
                <input type="text" id="postZipCode"   onkeyup="success()"  class="form-control" name="postZipCode"  placeholder="Type in Zip Code" > 
                
                  <span class="input-group" style="padding-top:2%"> 
                  <input type="date" id="range" name="range">
                  <!-- block range2 whne 1 month or 3 months selected -->
                <input type="date" id="range2" name="range2">                
                <select name="monthrange" >
                <option value="0">No range</option>
                <option value="30">last 1 month</option>
                <option value="90">last 3 months</option>              
                 </select>
                    <button onclick=validate() type="submit" id="disabledBtn" disabled class="btn btn-info"> Search
                    </button>
                  </span>
              
          </form>
    </div>    
    </body>
</html>
