<?php
$root = '';
$path = 'images/';
 
function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            // checks for gif, jpg, png
            if ( preg_match("/(\.gif|\.jpg|\.jpeg|\.png)$/", $img_file) ) {
                $images[] = $img_file;
            }
        }
        closedir($img_dir);
    }
    return $images;
}

function getRandomFromArray($ar) {
    mt_srand( (double)microtime() * 1000000 ); // php 4.2+ not needed
    $num = array_rand($ar);
    return $ar[$num];
}


// Obtain list of images from directory 
$imgList = getImagesFromDir($root . $path);

$img = getRandomFromArray($imgList);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Random photo for draw</title>
<style type="text/css">
    body {
  background-color: #292929;
}
    /* so linked image won't have border */
    a img { border:none; }
    * {
            padding: 0;
            margin: 0;
        }
        .fit { /* set relative picture size */
            max-width: 100%;
            max-height: 100%;
        }
        .center {
            display: block;
            margin: auto;
        }
</style>
</head>
<body>


<p></p>

<!-- image displays here -->
<?php foreach ($imgList as $img){ ?>
<img class="center fit" src="<?php echo $path . $img ?>"/>
<?php } ?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" language="JavaScript">
    function set_body_height() { // set body height = window height
        $('body').height($(window).height());
    }
    $(document).ready(function() {
        $(window).bind('resize', set_body_height);
        set_body_height();
    });
</script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="myScript.js"></script>

</body>
</html>