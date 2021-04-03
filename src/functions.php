<?php
//functions used to validate form data and prevent SQL injections


function validateFormData( $formData ) {
  $formData = trim( stripslashes( htmlspecialchars( strip_tags( str_replace ( array('(',')' ),'', $formData )), ENT_QUOTES ) ) );
  return $formData;
}

function deleteStudent($id){
  echo "$id";
}
?>