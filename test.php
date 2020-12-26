<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div align="center" style="padding:50px">
                <i class="fa fa-star fa-2x" data-index="0"></i>
                <i class="fa fa-star fa-2x" data-index="1"></i>
                <i class="fa fa-star fa-2x" data-index="2"></i>
                <i class="fa fa-star fa-2x" data-index="3"></i>
                <i class="fa fa-star fa-2x" data-index="4"></i>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>


var ratedIndex = -1;

$(document).ready(function(){
    resetStarColor();

    $('.fa-star').on('click',function(){
        ratedIndex = parseInt($(this).data('index'));
    });

    $('.fa-star').mouseover(function(){
        resetStarColor();

        var currentIndex = parseInt($(this).data('index'));

                for(var i=0; i <= currentIndex; i++)
                {
                    $('.fa-star:eq('+i+')').css('color','orange');
                }
    });
    $('.fa-star').mouseleave(function(){
        resetStarColor();
        if(ratedIndex != -1)
                {
                    for(var i=0; i <= ratedIndex;i++)
                {
                    $('.fa-star:eq('+i+')').css('color','orange');
                }
                }
    });
});
function resetStarColor()
    {
        $('.fa-star').css('color','purple');
    }
</script>
</body>
</html>