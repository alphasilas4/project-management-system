<?php ob_start(); ?>
<?php  

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "pms_db";

 foreach ($db as $key => $value) {define(strtoupper($key),$value);}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
 
 ?>



<?php
    /*  ---------------------------------------------------------------------------
     * 	@package	: pms
     *	@author 	: Uriel
     *  @email      : emailurworld.net@gmail.com
     *	@version	: 1.0
     *	@link		: http://www.urnet.com.ng
     *	@copyright	: Copyright (c) 2021, http://www.urnet.com.ng
     *	--------------------------------------------------------------------------- */
?>