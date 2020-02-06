<?php
	 function db_select($sql, $keyfield = '')
	{
	     $array = array();
	     $result = mysql_query($sql);
	     while($r = mysql_fetch_assoc($result))
	    {
	         if($keyfield)
	        {
	             $key = $r[$keyfield];
	             $array[$key] = $r;
	             }
	        else
	            {
	             $array[] = $r;
	             }
	         }
	     mysql_free_result($result);
	     return $array;
	     }

?>
