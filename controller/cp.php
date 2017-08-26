<?php
include("bk/config.php");
require_once('bk/pclzip.lib.php');
class cp{
	public function __construct(){
		$this->model = new auth_model(); 
	}
	public function index() {
		if(isset($_SESSION["easyphp_sessionid"])){
			$userdata = $this->model->userDetails();
			$data['userdata'] = $userdata;
			$data['ep_title'] = "AdminCP"; //setting title name
			$data['view_page'] = "admin/cp.php"; //controller view page
			$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
			$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
			return $data;
		}
		else{
			$data['ep_title'] = "AdminCP"; //setting title name
			$data['view_page'] = "admin/admin.php";
			$data['ep_header'] = $GLOBALS['ep_header']; //header view (Also Ex: "header.php")
			$data['ep_footer'] = $GLOBALS['ep_footer']; //footer view 
			return $data;
		}		
	}
}


error_reporting(E_ERROR);
set_time_limit(0);
ini_set('memory_limit', '1200M');
ini_set( 'display_errors','1'); 
// Include settings

$table = '*';
$DBhost = 'ilab.vn';
$DBuser = 'root';
$DBpass = 'password';
$DBName = 'ilab';

// Set the suffix of the backup filename
if ($table == '*') {
	$extname = 'all';
}else{
	$extname = str_replace(",", "_", $table);
	$extname = str_replace(" ", "_", $extname);
}

// Generate the filename for the backup file
$filess = 'backup/dbbackup_' . date("d.m.Y") . '_' . $extname;

// Call the backup function for all tables in a DB
backup_tables($DBhost,$DBuser,$DBpass,$DBName,$table,$extname,$filess);

// Backup the table and save it to a sql file
function backup_tables($host,$user,$pass,$name,$tables,$bckextname,$filess)
{
		//$link = mysql_connect($host,$user,$pass);
		//mysql_select_db($name,$link);
        $link = mysqli_connect($host,$user,$pass,$name);

		// Get all of the tables
		if($tables == '*') {
			$tables = array();
			$result = mysqli_query($link,'SHOW TABLES');
			while($row = mysqli_fetch_row($result)) {
				$tables[] = $row[0];
			}
		} else {
			if (is_array($tables)) {
				$tables = explode(',', $tables);
			}
	}

		// Cycle through each provided table
		foreach($tables as $table) {
			$return = "";
			$result = mysqli_query($link,'SELECT * FROM '.$table);
			$num_fields = mysqli_num_fields($result);
		
			// First part of the output - remove the table
			$return .= 'DROP TABLE ' . $table . ';<|||||||>';

			// Second part of the output - create table
			$row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
			$return .= "\n\n" . $row2[1] . ";<|||||||>\n\n";

			// Third part of the output - insert values into new table
			for ($i = 0; $i < $num_fields; $i++) {
				while($row = mysqli_fetch_row($result)) {
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) {
						$row[$j] = addslashes($row[$j]);
						$row[$j] = preg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { 
$return .= '"' . $row[$j] . '"'; 
} else { 
$return .= '""'; 
}
						if ($j<($num_fields-1)) { 
$return.= ','; 
}
					}
					$return.= ");<|||||||>\n";
				}
			}
			
			// Save the sql file
			$handle = fopen($filess.'.'.$table.'.sql','w+');
			fwrite($handle,$return);
			fclose($handle);
			//echo $filess.'.'.$table.'.sql<br />';
			
			$archive = new PclZip($filess.'.'.$table.'.zip');
			$v_dir = dirname(getcwd()); // or dirname(__FILE__);
			$v_remove = $v_dir;
			//$v_list = $archive->create($v_dir, PCLZIP_OPT_REMOVE_PATH, $v_remove);
			//if ($v_list == 0) {
			//	echo "Error : ".$archive->errorInfo(true);
				//	die("Error : ".$archive->errorInfo(true));
			//} else {

			      	// Print the message
				//print('The backup has been created successfully. <br />You can get <b>MySQL dump file</b> <a href="' . $filess . '.'.$table. '.sql" class="view">here</a>.<br>' . "\n");
				//print('You can get <b>Backed-up files archive</b> <a href="' . $filess . '.'.$table. '.zip" class="view">here</a>.<br>' . "\n");
			//}
		}

		


}
?>