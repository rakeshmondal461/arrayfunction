<?php

function duplicate_check($sql)
{
	include("config.php");
	$a=mysqli_query($conn,$sql) or die (mysqli_error());
	$z=mysqli_num_rows($a);
	return $z;
}
function insert_samaun($sql)
{
	include("config.php");
	$a=mysqli_query($conn,$sql) or die (mysqli_error());
	return "Submitted Successfully";
}

function insert_test($aa,$tblnm)
{
	include("config.php");
	$fld="";
	$val="";
	
	foreach($aa as $x=>$x_value)
	{
	  if($fld==""){$fld=$x;}else{ $fld=$fld.','.$x; }
	  if($val==""){$val="'".$x_value."'";}else{$val=$val.","."'".$x_value."'";}
	}
	$sql="insert into $tblnm ($fld) values ($val)";
	$a=mysqli_query($conn,$sql) or die (mysqli_error());
	return "Submitted Successfully";
	
}

function fetch_data_multiple($sql)
{
	include("config.php");
	$a=mysqli_query($conn,$sql) or die (mysqli_error());
	$data_array=array();
	while ($row = mysqli_fetch_assoc($a)) 
	{
		array_push($data_array,$row);
	}
	mysqli_free_result($a);
	return $data_array;
}
function fetch_data_single_samaun($sql)
{
	include("config.php");
	$a=mysqli_query($conn,$sql) or die (mysqli_error());
	$row = mysqli_fetch_assoc($a);
	return $data_array;
}

function update_qry($aa,$tblnm,$unqfld,$unqfldval)
{
	include("config.php");
	$fld="";
	$val="";
	
	foreach($aa as $x=>$x_value)
	{
	  if($fld==""){$fld=$x."='".$x_value."'";}else{ $fld=$fld.','.$x."='".$x_value."'"; }
	}
	$sql="update $tblnm set $fld where $unqfld='$unqfldval'";
	$a=mysqli_query($conn,$sql) or die (mysqli_error());
	return "Updated Successfully";
	
}
function update_qry1($aa,$tblnm,$unqfld,$unqfldval,$unqfld2,$unqfldval2)
{
	include("config.php");
	$fld="";
	$val="";
	
	foreach($aa as $x=>$x_value)
	{
	  if($fld==""){$fld=$x."='".$x_value."'";}else{ $fld=$fld.','.$x."='".$x_value."'"; }
	}
	$sql="update $tblnm set $fld where $unqfld='$unqfldval' and $unqfld2='$unqfldval2'";
	$a=mysqli_query($conn,$sql) or die (mysqli_error());
	if($a)
	{
		return "true";
	}
	else
	{
		return "false";
	}
	
	
}

function getdata_SCHAK($tablnm,$fldvl,$chkvl,$val)
{
	include("config.php");
	$pp="select * from $tablnm where $fldvl='$chkvl'";
	$MP=mysqli_query($conn,$pp)or die (mysql_error());
	while($aar=mysqli_fetch_assoc($MP))
	{
		$val=$aar[$val];
	}
	return $val;
}

?>
