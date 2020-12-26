<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/img/favicon.png" rel="icon">
  <!-- Latest compiled and minified CSS -->
<!-- CSS only -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
</head>
<body>
    <div class="m-5 p-5"  >
   <h1> star here</h1>
            <i class="fa fa-star fa-2x" data-index="0"></i>
            <i class="fa fa-star fa-2x" data-index="1"></i>
            <i class="fa fa-star fa-2x" data-index="2"></i>
            <i class="fa fa-star fa-2x" data-index="3"></i>
            <i class="fa fa-star fa-2x" data-index="4"></i>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

  <script>
  var ratedIndex=-1;
    $(document).ready(function()
    {
        resetStarColors();
        $('.fa-star').mouseover(function()
            {
                resetStarColors();
                var currentIndex=parseInt($(this).data('index'));

                for(var i=1; i <= currentIndex;i++)
                {
                    $('.fa-star:eq('+i+')').css('color','yellow');
                }
            });

            $('.fa-star').mouseleave(function()
            {
                resetStarColors();
                if(ratedIndex != -1)
                {
                    for(var i=1; i <= ratedtIndex;i++)
                {
                    $('.fa-star:eq('+i+')').css('color','yellow');
                }
                }
            });
    });

    function resetStarColor()
    {
        $('.fa-star').css('color','blue');
    }

!-- Latest compiled and minified JavaScript -->

</body>
</html>