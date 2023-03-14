<?php

	$msg="";
	$opr="";
	$id="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
//--------------add data-----------------
if(isset($_POST['btn_sub'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	
$sql_ins=mysql_query("INSERT INTO teacher_tbl 
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$phone',
							'$mail',
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysql_error();
	
}
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];

	$sql_update=mysql_query("UPDATE teacher_tbl SET
							f_name='$f_name' ,
							l_name='$l_name' ,
							phone='$phone' ,
							email='$mail' 
						WHERE teacher_id=$id
	
	");
if($sql_update==true)
	header("location:?tag=view_teachers");
else
	$msg="Update Fail!...";

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
<title>::. Build Bright University .::</title>
</head>

<body>

<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM teacher_tbl WHERE teacher_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<div id="top_style">
        <div id="top_style_text">
        Teachers 
        Update</div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_teachers"><input type="button" name="btn_back" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<!-- for form Upadte-->


<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0">
            	<tr>
                	<td>First Name</td>
                    <td>
                    	<input type="text" name="fnametxt" id="textbox" value="<?php echo $rs_upd['f_name'];?>" />
                    </td>
            	</tr>
                
                <tr>
                	<td>Last Name</td>
                    <td>
                    	<input type="text" name="lnametxt" id="textbox"  value="<?php echo $rs_upd['f_name'];?>"/>
                    </td>
            	</tr>
                
            <tr>
            	<td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_upd" value="Update" id="button-in"  />
                </td>
            </tr>
            </table  >

   </div>
 
	<div>
    	<table border="0" cellpadding="5" cellspacing="0">
               <tr>
               		<td>Phone</td>
                    <td>
                    	<input type="text"  name="phonetxt" id="textbox" value="<?php echo $rs_upd['phone'];?>" />
                    </td>
               </tr>
               
               <tr>
               		<td>E-mail</td>
                    <td>
                    	<input type="text" name="emailtxt" id="textbox" value="<?php echo $rs_upd['email'];?>" />
                    </td>
               </tr>
          	</table>

  </div>
    </form>

</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<div id="top_style">
        <div id="top_style_text">
        Teachers Entry
        </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_teachers"><input type="button" name="btn_view" title="View Teachers" value="View Teachers" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<!-- for form Upadte-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0">
            	<tr>
                	<td>First Name</td>
                    <td>
                    	<input type="text" name="fnametxt" id="textbox" />
                    </td>
            	</tr>
                
                <tr>
                	<td>Last Name</td>
                    <td>
                    	<input type="text" name="lnametxt" id="textbox" />
                    </td>
            	</tr>
            <tr>
            	<td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Register" id="button-in"  />
                </td>
            </tr>
            </table  >

   </div>
 
	<div>
    	<table border="0" cellpadding="5" cellspacing="0">
                
               <tr>
               		<td>Phone</td>
                    <td>
                    	<input type="text"  name="phonetxt" id="textbox"/>
                    </td>
               </tr>
               
               <tr>
               		<td>E-mail</td>
                    <td>
                    	<input type="text" name="emailtxt" id="textbox" />
                    </td>
               </tr>
               
          	</table>

  </div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>