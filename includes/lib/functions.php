<?php
$date = date("Y-m-d");



function returnHomePagebannerPath($id)
{
	
	if($load_home_category_banner_resultset = mysql_query("select * from home_page_banner where id =$id"))
    {
		$load_home_category_banner_path_array = mysql_fetch_array($load_home_category_banner_resultset);
		if(!empty($load_home_category_banner_path_array['image_path']))
		    return $load_home_category_banner_path_array['image_path'];
			
	}
	
		
}


function recursive_remove_directory($directory, $empty=FALSE)
{
	// if the path has a slash at the end we remove it here
	if(substr($directory,-1) == '/')
	{
		$directory = substr($directory,0,-1);
	}

	// if the path is not valid or is not a directory ...
	if(!file_exists($directory) || !is_dir($directory))
	{
		// ... we return false and exit the function
		return FALSE;

	// ... if the path is not readable
	}elseif(!is_readable($directory))
	{
		// ... we return false and exit the function
		return FALSE;

	// ... else if the path is readable
	}else{

		// we open the directory
		$handle = opendir($directory);

		// and scan through the items inside
		while (FALSE !== ($item = readdir($handle)))
		{
			// if the filepointer is not the current directory
			// or the parent directory
			if($item != '.' && $item != '..')
			{
				// we build the new path to delete
				$path = $directory.'/'.$item;

				// if the new path is a directory
				if(is_dir($path)) 
				{
					// we call this function with the new path
					recursive_remove_directory($path);

				// if the new path is a file
				}else{
					// we remove the file
					unlink($path);
				}
			}
		}
		// close the directory
		closedir($handle);

		// if the option to empty is not set to true
		if($empty == FALSE)
		{
			// try to delete the now empty directory
			if(!rmdir($directory))
			{
				// return false if not possible
				return FALSE;
			}
		}
		// return success
		return TRUE;
	}
}




function curPageURL() {
 $categoryURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$categoryURL .= "s";}
 $categoryURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $categoryURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $categoryURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $categoryURL;
}

//======================================Category Part==================================================================================================

function returnCategoryName($category_id)
{
	if($loadCategoryName_resultset = mysql_query("select category_name from category where category_id = $category_id "))
    {
	$loadCategoryName_array = mysql_fetch_array($loadCategoryName_resultset);
	$category_name =  $loadCategoryName_array['category_name'];
	
     }
	 
	 if(empty($category_name))
	    return "N/A";
		else
		return $category_name;
}

function returnCategoryParentId($category_id)
{
	if($loadCategoryName_resultset = mysql_query("select parent_category_id from category where category_id = $category_id "))
    {
	$loadCategoryName_array = mysql_fetch_array($loadCategoryName_resultset);
	$parent_category_id =  $loadCategoryName_array['parent_category_id'];
	
     }
	 
	return $parent_category_id;
}

function checkCategorynameexists($category_name,$parent_category_id)
{
	
	if($loadcategory_resultset  = mysql_query("select category_name from category where category_name = '$category_name' and parent_category_id = $parent_category_id"))
	{
		
		if(mysql_num_rows($loadcategory_resultset)>0)
			return 1;
			else
			return 0;
	}
}

function checkCategorynameexistsupdate($category_name,$category_id,$parent_category_id)
{
	if($loadcategory_resultset  = mysql_query("select category_name from category where category_name = '$category_name' and category_id != $category_id and parent_category_id = $parent_category_id"))
	{
		
		if(mysql_num_rows($loadcategory_resultset)>0)
			return 1;
			else
			return 0;
	}
}
function returnParentCategoryId($category_id)
{
	if($loadcategory_name  = mysql_query("select parent_category_id from category where category_id = $category_id"))
	{
		while($loadcategory_array = mysql_fetch_array($loadcategory_name))
		{
			return $loadcategory_array['parent_category_id'];
		}
	}
}

function returnCategoryIdforname($category_name)
{
	if($loadcategory_name  = mysql_query("select id from ban_category where category = '$category_name'"))
	{
		while($loadcategory_array = mysql_fetch_array($loadcategory_name))
		{
			return $loadcategory_array['id'];
		}
	}
}

function returnCategoryIdfornameandparentid($category_name,$parent_category_id)
{
	if($loadcategory_name  = mysql_query("select category_id from category where category_name = '$category_name' and parent_category_id = $parent_category_id"))
	{
		while($loadcategory_array = mysql_fetch_array($loadcategory_name))
		{
			return $loadcategory_array['category_id'];
		}
	}
}


//======================================Category Part==================================================================================================

//============================================================Product==========================================================================================
function returnproductIdforname($product_name)
{
	if($loadproduct_name  = mysql_query("select id from ban_product where product_name = '$product_name' and status='Active'"))
	{
		while($loadproduct_array = mysql_fetch_array($loadproduct_name))
		{
			return $loadproduct_array['id'];
		}
	}
}













function checkProducttitleexists($products_title,$category_id)
{
	
	if($loadcategory_resultset  = mysql_query("select products_title from products where products_title = '$products_title' and category_id = $category_id "))
	{
		
		if(mysql_num_rows($loadcategory_resultset)>0)
			return 1;
			else
			return 0;
	}
}
function checkProducttitleexistsupdate($products_title,$products_id,$category_id)
{
	if($loadcategory_resultset  = mysql_query("select products_title from products where products_title = '$products_title' and products_id != $products_id and category_id = $category_id "))
	{
		
		if(mysql_num_rows($loadcategory_resultset)>0)
			return 1;
			else
			return 0;
	}
}






function returnProductTitle($products_id)
{
	
	if($loadcategory_resultset  = mysql_query("select products_title from products where products_id = $products_id"))
	{
		
		 while($loadProductCategory_array = mysql_fetch_array($loadcategory_resultset))
	  	 {
		   return $loadProductCategory_array['products_title'];
	 	 }
	}
}

function returnProductIdforProductTitle($products_title)
{
	
	if($loadcategory_resultset  = mysql_query("select products_id from products where products_title = '$products_title'"))
	{
		
		 while($loadProductCategory_array = mysql_fetch_array($loadcategory_resultset))
	  	 {
		   return $loadProductCategory_array['products_id'];
	 	 }
	}
}



function returnCategoryIdforProductId($products_id)
{
	
	if($loadcategory_resultset  = mysql_query("select category_id from products where products_id = $products_id"))
	{
		
		 while($loadProductCategory_array = mysql_fetch_array($loadcategory_resultset))
	  	 {
		   return $loadProductCategory_array['category_id'];
	 	 }
	}
}


function returnProductDetails($products_id,$columnName)
{
	
	if($load_returnProductDetails_resultset = mysql_query("select $columnName from products where products_id =$products_id"))
    {
		$load_returnProductDetails_array = mysql_fetch_array($load_returnProductDetails_resultset);
		    return $load_returnProductDetails_array[$columnName];
			
	}
	
		
}
function returnPackIdforname($package)
{
	if($loadpackage_name  = mysql_query("select id from basu_tour where name = '$package' AND status='Active'"))
	{
		while($loadpackage_array = mysql_fetch_array($loadpackage_name))
		{
			return $loadpackage_array['id'];
		}
	}
}

//============================================================Product==========================================================================================


?>
