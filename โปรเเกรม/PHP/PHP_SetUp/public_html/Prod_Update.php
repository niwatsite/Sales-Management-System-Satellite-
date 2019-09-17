<?
include('connect.php');

$strSQL = "UPDATE products SET ";
$strSQL .="Prod_Id = '".$_POST["Prod_Id"]."' ";
$strSQL .=",Prod_Name = '".$_POST["Prod_Name"]."' ";
$strSQL .=",Prod_O = '".$_POST["Prod_O"]."' ";
$strSQL .=",Prod_SalePrice = '".$_POST["Prod_SalePrice"]."' ";
$strSQL .=",Prod_Remark = '".$_POST["Prod_Remark"]."' ";
$strSQL .=",Prod_type= '".$_POST["Prod_type"]."' ";
$strSQL .="WHERE Prod_Id = '".$_POST["Prod_Id"]."' ";

$objQuery = mysql_query($strSQL);	

	if(trim($_FILES["filUpload"]["tmp_name"]) != "")
             {
		$images = $_FILES["filUpload"]["tmp_name"];
		$new_images = "Thumbnails_".$_FILES["filUpload"]["name"];
		copy($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]);

                $link_images = "http://icmpsutrang.esy.es/myfile/".$new_images;

		$width=500; //*** Fix Width & Heigh (Autu caculate) ***//
		$size=GetimageSize($images);
		$height=round($width*$size[1]/$size[0]);
		$images_orig = ImageCreateFromJPEG($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,"myfile/".$new_images);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);

			//*** Delete Old File ***//			
			@unlink("myfile/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE products";
			$strSQL .=" SET Prod_img = '".$new_images."',Prod_ImagePath= '".$link_images."' WHERE Prod_Id = '".$_POST["Prod_Id"]."' ";
			$objQuery = mysql_query($strSQL);		

			echo "Copy/Upload successful.";
	                echo "<meta http-equiv='refresh' content='1;url=Prod_edit_frm.php' />";
	}
echo "Save successful don't Copy/Upload .";
echo "<meta http-equiv='refresh' content='1;url=Prod_edit_frm.php' />";
mysql_close();
?>