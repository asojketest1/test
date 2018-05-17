<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>QR</title>
</head>

<body>
<img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=https://allabout.co.jp/" alt="QRコード">
<?php 
require_once("Image/QRCode.php"); 

$qr = new Image_QRCode(); 
$option = array(
	"module_size"=>2,     //サイズ=>1〜19で指定
	"image_type"=>"jpeg",   //画像形式=>jpegかpngを指定
	"output_type"=>"display",  //出力方法=>displayかreturnで指定 returnの場合makeCodeで画像リソースが返される
	"error_correct"=>"H"     //クオリティ(L<M<Q<H)を指定
);
$qr->makeCode("Hello, world",$option); 
?>
</body>

</html>

