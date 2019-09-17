<?php
include("session.php");
?>
<?php
include('connect.php');

	if(trim($_FILES["filUpload"]["tmp_name"]) != "")
             {
		$images = $_FILES["filUpload"]["tmp_name"];
		$new_images = "Thumbnails_".$_FILES["filUpload"]["name"];

                $link_images = "http://icmpsutrang.esy.es/myfile/".$new_images;

		copy($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]);
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


	echo"record Add successful";
	echo "<meta http-equiv='refresh' content='1;url=Prod_edit_frm.php' />";

		//*** Insert Record ***//
		$strSQL = "INSERT INTO products";
		$strSQL .="(Prod_Id,Prod_Name,Prod_O,Prod_SalePrice,Prod_Remark,Prod_type,Prod_img,Prod_ImagePath) VALUES ('".$_POST["NewEID"]."','".$_POST["Prod_Name"]."','".$_POST["Prod_O"]."','".$_POST["Prod_SalePrice"]."','".$_POST["Prod_Remark"]."','".$_POST["select"]."','".$new_images."','".$link_images."')";
		$objQuery = mysql_query($strSQL);		
	}

//////////////////////////////////--------------------------orig--------------------------///////////////////////////////////////////////////////
//	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
//	{
//	echo"record Add successful";
//	echo "<meta http-equiv='refresh' content='1;url=Prod_edit_frm.php' />";
//		//*** Insert Record ***//
//		$strSQL = "INSERT INTO products";
//		$strSQL .="(Prod_Id,Prod_Name,Prod_O,Prod_SalePrice,Prod_Remark,Prod_type,Prod_img) VALUES ('".$_POST["NewEID"]."','".$_POST["Prod_Name"]."','".$_POST["Prod_O"]."','".$_POST["Prod_SalePrice"]."','".$_POST["Prod_Remark"]."','".$_POST["select"]."','".$_FILES["filUpload"]["name"]."')";
//		$objQuery = mysql_query($strSQL);		
//	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
		