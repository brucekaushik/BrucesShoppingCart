<?php

// ----------------------------------------------------------------------------------------------
// general bad input validation functions
// ----------------------------------------------------------------------------------------------

function validate_string($in_str){

	/*
	(string) -> string

	strips $in_str off any characters that are not a-z A-Z 0-9 _ - & whitespace
	check the length of the new string
	if its not equal, return the string
	otherwise, return a string "bad input.
	*/

	$str = preg_replace("/[^a-zA-Z0-9_\- ]/", "", $in_str);
	if(strlen($str) != 0){
		return $str;
	}else{
		return "bad input";
	}

}

function validate_price($in_price) {
	$price = $in_price;
	settype($price,'double');
	$price = floor($price*100.0)/100.0;
	return $price;
}

// ----------------------------------------------------------------------------------------------
// specialized validation functions
// ----------------------------------------------------------------------------------------------

// validate sku
function validate_sku($array,$sku){
	
	foreach ($array as $x){
		if ($x["sku"] == $sku) {
			return "sku already exists";
		}
	}
	
	return $sku;
	
}

// validate edited sku
function validate_edited_sku($array,$sku,$product_id){

	foreach ($array as $x){
		if ($x["sku"] == $sku) {
			if($x["product_id"] != $product_id){
				return "sku already exists";
			}
		}
	}

	return $sku;

}

// validate image url
function validate_imgurl($in_url){

	$str = preg_replace("/[^a-zA-Z0-9_\-\/\. ]/", "", $in_url);
	if(strlen($str) != 0){
		return $str;
	}else{
		return "bad input";
	}

}

?>