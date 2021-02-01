<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shipment Time</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
     
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
             </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
    
    <?php $postZipCode = request('postZipCode');?>
 
<div class="container" style="padding-top:10%">
@if($data == 0)      
  <h5>  <b>No data found for "<?php echo $postZipCode ?>" Zip Code, try again latter! </b> </h5>
  @else
    
<h1> estimated delivery time</h1>
<h3>

<b>{{round($data)}}</b>  days

</h3>
@endif
</div>
<div class="container">
<button class="btn btn-info" onclick="window.history.back()">Back</button>
</div>
</body>
</html>
