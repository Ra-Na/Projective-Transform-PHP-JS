<!DOCTYPE html>
<html lang="de">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Unproject me</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <link rel="stylesheet" href="css/style.css">
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<body>
  








<?php

if(($_FILES['image']['type'] != "image/png") 
	&& ($_FILES['image']['type'] != "image/jpeg")
	&& ($_FILES['image']['type'] != "image/jpg")) 
{
    echo "Only PNG or JPG images are allowed!";
    exit;
}


$verifyimg = getimagesize($_FILES['image']['tmp_name']);
list($width, $height, $type, $attr)= $verifyimg;
if(($verifyimg['mime'] != 'image/png') 
	&& ($verifyimg['mime'] != 'image/jpeg') 
	&& ($verifyimg['mime'] != 'image/jpg'))
{
    echo "Only PNG or JPG images are allowed!";
    exit;
}
$nonce=mt_rand();
$uploaddir="";
$uploadfile = $uploaddir . $nonce.basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
//    echo "Image succesfully uploaded.";
} else {
    echo "Image upload failed.";
}

$image = $uploadfile;
// Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($image));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($image).';base64,'.$imageData;

// Echo out a sample image
//echo '<img src="' . $src . '">';
//echo "'.$src.'";
?>








<script type="text/javascript">
function copydata1()
{
	document.pointform.pxl1x.value=document.pointform.form_x.value;
	document.pointform.pxl1y.value=document.pointform.form_y.value;
}
</script>

<script type="text/javascript">
function copydata2()
{
	document.pointform.pxl2x.value=document.pointform.form_x.value;
	document.pointform.pxl2y.value=document.pointform.form_y.value;
}
</script>

<script type="text/javascript">
function copydata3()
{
	document.pointform.pxl3x.value=document.pointform.form_x.value;
	document.pointform.pxl3y.value=document.pointform.form_y.value;
}
</script>

<script type="text/javascript">
function copydata4()
{
	document.pointform.pxl4x.value=document.pointform.form_x.value;
	document.pointform.pxl4y.value=document.pointform.form_y.value;
}
</script>

<script type="text/javascript">
function copydata5()
{
	document.pointform.pxl5x.value=document.pointform.form_x.value;
	document.pointform.pxl5y.value=document.pointform.form_y.value;
}
</script>

<script type="text/javascript">
function copydata6()
{
	document.pointform.pxl6x.value=document.pointform.form_x.value;
	document.pointform.pxl6y.value=document.pointform.form_y.value;
}
</script>




<script language="JavaScript" type="text/javascript">
    function point_it(event) {
        var pos_x = event.offsetX ? (event.offsetX) : event.pageX - document.getElementById("pointer_div").offsetLeft;
        var pos_y = event.offsetY ? (event.offsetY) : event.pageY - document.getElementById("pointer_div").offsetTop;
        document.pointform.form_x.value = pos_x;
	document.pointform.form_y.value = pos_y;

	if (typeof flag1 !== 'undefined') {	 
		var c=document.getElementById("pointer_div");
		var ctx=c.getContext("2d");
		ctx.clearRect(0,0,c.width,c.height);
	};

        drawcircle(pos_x,pos_y,20,2);
        drawcircle(pos_x,pos_y,3,1);
    }
</script>


<script language="JavaScript" type="text/javascript">


function drawline(x1, y1,x2,y2) {

	var jsheight=<?php echo $height;?>;
        var jswidth=<?php echo $width;?>;

	var c=document.getElementById("pointer_div");
	var ctx=c.getContext("2d");
	ctx.beginPath();
        ctx.strokeStyle = '#ff0000';

	var dy=y2-y1;
	var dx=x2-x1;

	if(dx!=0){
		var m=dy/dx;
		var n=(x2*y1-y2*x1)/dx;
		ctx.moveTo(0,n);
		ctx.lineTo(jswidth,m*jswidth+n);
	} else{
		ctx.moveTo(x1,0);
		ctx.lineTo(x2,jsheight);
	}
	ctx.stroke();
		 
	return;   // The function returns the product of p1 and p2
}


function drawcircle(x,y,r,w) {

	var jsheight=<?php echo $height;?>;
        var jswidth=<?php echo $width;?>;

	var c=document.getElementById("pointer_div");
	var ctx=c.getContext("2d");
	ctx.beginPath();
        ctx.strokeStyle = '#ff0000';

        ctx.arc(x,y,r,0,2 * Math.PI,false);
        ctx.lineWidth = w;

	ctx.stroke();
		 
	return;   
}




function maketransform(){
	var p1x=parseFloat(document.pointform.pxl1x.value);
	var p1y=parseFloat(document.pointform.pxl1y.value);
	var c1x=parseFloat(document.pointform.pnt1x.value);
	var c1y=parseFloat(document.pointform.pnt1y.value);
	var p2x=parseFloat(document.pointform.pxl2x.value);
	var p2y=parseFloat(document.pointform.pxl2y.value);
	var c2x=parseFloat(document.pointform.pnt2x.value);
	var c2y=parseFloat(document.pointform.pnt2y.value);
	var p3x=parseFloat(document.pointform.pxl3x.value);
	var p3y=parseFloat(document.pointform.pxl3y.value);
	var c3x=parseFloat(document.pointform.pnt3x.value);
	var c3y=parseFloat(document.pointform.pnt3y.value);
	var p4x=parseFloat(document.pointform.pxl4x.value);
	var p4y=parseFloat(document.pointform.pxl4y.value);
	var c4x=parseFloat(document.pointform.pnt4x.value);
	var c4y=parseFloat(document.pointform.pnt4y.value);

	flag1=7.89;
	 
	C11=(c1x*(-(c3y*c4x) + c2y*(-c3x + c4x) + c2x*(c3y - c4y) + c3x*c4y)*(p2y - p3y)*(-(p2y*p4x) + p1y*(-p2x + p4x) + p1x*(p2y - p4y) + p2x*p4y)*(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y) + c2x*(c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(-p1y + p3y)*(-(p3y*p4x) + p2y*(-p3x + p4x) + p2x*(p3y - p4y) + p3x*p4y)*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y)) + c3x*(c1y*(c2x - c4x) + c2y*c4x - c2x*c4y + c1x*(-c2y + c4y))*(-p1y + p2y)*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/((c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y))*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)));

	C12=(c3x*(c1y*(c2x - c4x) + c2y*c4x - c2x*c4y + c1x*(-c2y + c4y))*(p1x - p2x)*(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y)*(-(p3y*p4x) + p2y*(-p3x + p4x) + p2x*(p3y - p4y) + p3x*p4y) + c1x*(c2y*(c3x - c4x) + c3y*c4x - c3x*c4y + c2x*(-c3y + c4y))*(p2x - p3x)*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y)) + c2x*(c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(p1x - p3x)*(-(p2y*p4x) + p1y*(-p2x + p4x) + p1x*(p2y - p4y) + p2x*p4y)*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/((c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y))*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)));

	C13=((c2x*(c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(p1y*p3x - p1x*p3y))/(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y) + (c3x*(c1y*(c2x - c4x) + c2y*c4x - c2x*c4y + c1x*(-c2y + c4y))*(p1y*p2x - p1x*p2y))/(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y)) + (c1x*(c2y*(c3x - c4x) + c3y*c4x - c3x*c4y + c2x*(-c3y + c4y))*(p2y*p3x - p2x*p3y))/(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/(c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y));

	C21=(c1y*(-(c3y*c4x) + c2y*(-c3x + c4x) + c2x*(c3y - c4y) + c3x*c4y)*(p2y - p3y)*(-(p2y*p4x) + p1y*(-p2x + p4x) + p1x*(p2y - p4y) + p2x*p4y)*(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y) + c2y*(c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(-p1y + p3y)*(-(p3y*p4x) + p2y*(-p3x + p4x) + p2x*(p3y - p4y) + p3x*p4y)*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y)) + c3y*(-(c2y*c4x) + c1y*(-c2x + c4x) + c1x*(c2y - c4y) + c2x*c4y)*(p1y - p2y)*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/((c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y))*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)));

	C22=(c3y*(c1y*(c2x - c4x) + c2y*c4x - c2x*c4y + c1x*(-c2y + c4y))*(p1x - p2x)*(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y)*(-(p3y*p4x) + p2y*(-p3x + p4x) + p2x*(p3y - p4y) + p3x*p4y) + c1y*(c2y*(c3x - c4x) + c3y*c4x - c3x*c4y + c2x*(-c3y + c4y))*(p2x - p3x)*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y)) + c2y*(c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(p1x - p3x)*(-(p2y*p4x) + p1y*(-p2x + p4x) + p1x*(p2y - p4y) + p2x*p4y)*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/((c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y))*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)));

	C23=(c3y*(c1y*(c2x - c4x) + c2y*c4x - c2x*c4y + c1x*(-c2y + c4y))*(p1y*p2x - p1x*p2y)*(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y)*(-(p3y*p4x) + p2y*(-p3x + p4x) + p2x*(p3y - p4y) + p3x*p4y) + c1y*(c2y*(c3x - c4x) + c3y*c4x - c3x*c4y + c2x*(-c3y + c4y))*(p2y*p3x - p2x*p3y)*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y)) + c2y*(c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(p1y*p3x - p1x*p3y)*(-(p2y*p4x) + p1y*(-p2x + p4x) + p1x*(p2y - p4y) + p2x*p4y)*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/((c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y))*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)));

	C31=((-(c3y*c4x) + c2y*(-c3x + c4x) + c2x*(c3y - c4y) + c3x*c4y)*(p2y - p3y)*(-(p2y*p4x) + p1y*(-p2x + p4x) + p1x*(p2y - p4y) + p2x*p4y)*(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y) + (c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(-p1y + p3y)*(-(p3y*p4x) + p2y*(-p3x + p4x) + p2x*(p3y - p4y) + p3x*p4y)*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y)) + (c1y*(c2x - c4x) + c2y*c4x - c2x*c4y + c1x*(-c2y + c4y))*(-p1y + p2y)*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/((c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y))*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)));

	C32=((c1y*(c2x - c4x) + c2y*c4x - c2x*c4y + c1x*(-c2y + c4y))*(p1x - p2x)*(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y)*(-(p3y*p4x) + p2y*(-p3x + p4x) + p2x*(p3y - p4y) + p3x*p4y) + (c2y*(c3x - c4x) + c3y*c4x - c3x*c4y + c2x*(-c3y + c4y))*(p2x - p3x)*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y)) + (c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(p1x - p3x)*(-(p2y*p4x) + p1y*(-p2x + p4x) + p1x*(p2y - p4y) + p2x*p4y)*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/((c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y))*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)));

	C33=((c1y*(c2x - c4x) + c2y*c4x - c2x*c4y + c1x*(-c2y + c4y))*(p1y*p2x - p1x*p2y)*(-(p3y*p4x) + p1y*(-p3x + p4x) + p1x*(p3y - p4y) + p3x*p4y)*(-(p3y*p4x) + p2y*(-p3x + p4x) + p2x*(p3y - p4y) + p3x*p4y) + (c2y*(c3x - c4x) + c3y*c4x - c3x*c4y + c2x*(-c3y + c4y))*(p2y*p3x - p2x*p3y)*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y)) + (c1y*(c3x - c4x) + c3y*c4x - c3x*c4y + c1x*(-c3y + c4y))*(p1y*p3x - p1x*p3y)*(-(p2y*p4x) + p1y*(-p2x + p4x) + p1x*(p2y - p4y) + p2x*p4y)*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)))/((c1y*(c2x - c3x) + c2y*c3x - c2x*c3y + c1x*(-c2y + c3y))*(p1y*(p2x - p4x) + p2y*p4x - p2x*p4y + p1x*(-p2y + p4y))*(p1y*(p3x - p4x) + p3y*p4x - p3x*p4y + p1x*(-p3y + p4y))*(p2y*(p3x - p4x) + p3y*p4x - p3x*p4y + p2x*(-p3y + p4y)));

	alert(C11+C12+C13+C21+C22+C23+C31+C32+C33);

	var c=document.getElementById("pointer_div");
	var ctx=c.getContext("2d");
	ctx.clearRect(0,0,c.width,c.height);
	drawline(p1x,p1y,p2x,p2y);
	drawline(p1x,p1y,p3x,p3y);
	drawline(p1x,p1y,p4x,p4y);
	drawline(p2x,p2y,p3x,p3y);
	drawline(p2x,p2y,p4x,p4y);
	drawline(p3x,p3y,p4x,p4y);

}

function calcdata5()
{
	var p5x=document.pointform.pxl5x.value;
	var p5y=document.pointform.pxl5y.value;

	var xtmp=C11*p5x+C12*p5y+C13;
	var ytmp=C21*p5x+C22*p5y+C23;
	var ztmp=C31*p5x+C32*p5y+C33;

	document.pointform.pnt5x.value=xtmp/ztmp;
	document.pointform.pnt5y.value=ytmp/ztmp;

}


function calcdata6()
{
	var p6x=document.pointform.pxl6x.value;
	var p6y=document.pointform.pxl6y.value;

	var xtmp=C11*p6x+C12*p6y+C13;
	var ytmp=C21*p6x+C22*p6y+C23;
	var ztmp=C31*p6x+C32*p6y+C33;

	document.pointform.pnt6x.value=xtmp/ztmp;
	document.pointform.pnt6y.value=ytmp/ztmp;

        document.pointform.distance.value=Math.sqrt(Math.pow(document.pointform.pnt6x.value-document.pointform.pnt5x.value,2)+Math.pow(document.pointform.pnt6y.value-document.pointform.pnt5y.value,2)); 
}



</script>



<form name="pointform" method="post">
<canvas id="pointer_div" onclick="point_it(event)" width="<?php echo $width;?>" height="<?php echo $height;?>" style="background-image: url('<?php echo $src; ?>'); background-repeat: no-repeat; width: <?php echo $width;?>px; height: <?php echo $height;?>px;">

</canvas><br>
    You clicked at x =
    <input type="text" name="form_x" size="4">
     y =
    <input type="text" name="form_y" size="4"><br>

<table width='500' border='0' cellspacing='1' cellpadding='0'>
<tr><td ></td><td>Pixel x</td><td>Pixel y</td><td>Coord. x</td><td>Coord. y</td></tr>
<tr><td ><input type=button value=Copy onclick="copydata1();"></td><td><input type=text name=pxl1x></td><td><input type=text name=pxl1y></td><td><input type=text name=pnt1x></td><td><input type=text name=pnt1y></td></tr>
<tr><td ><input type=button value=Copy onclick="copydata2();"></td><td><input type=text name=pxl2x></td><td><input type=text name=pxl2y></td><td><input type=text name=pnt2x></td><td><input type=text name=pnt2y></td></tr>
<tr><td ><input type=button value=Copy onclick="copydata3();"></td><td><input type=text name=pxl3x></td><td><input type=text name=pxl3y></td><td><input type=text name=pnt3x></td><td><input type=text name=pnt3y></td></tr>
<tr><td ><input type=button value=Copy onclick="copydata4();"></td><td><input type=text name=pxl4x></td><td><input type=text name=pxl4y></td><td><input type=text name=pnt4x></td><td><input type=text name=pnt4y></td></tr>

<tr><td colspan=1 align=center><input type=button value="Calculate transform" onclick="maketransform();"> </td></tr>

<tr><td><input type=button value=Copy onclick="copydata5();"></td><td><input type=text name=pxl5x></td><td><input type=text name=pxl5y></td></tr>
<tr><td><input type=button value="Calc. coords." onclick="calcdata5();"></td><td><input type=text name=pnt5x></td><td><input type=text name=pnt5y></td></tr>

<tr><td><input type=button value=Copy onclick="copydata6();"></td><td><input type=text name=pxl6x></td><td><input type=text name=pxl6y></td></tr>
<tr><td><input type=button value="Calc. coords. + dist." onclick="calcdata6();"></td><td><input type=text name=pnt6x></td><td><input type=text name=pnt6y></td></tr>
</table>
<br>
Distance: <input type=text name=distance> 
</form>
</body>
</html>
 
