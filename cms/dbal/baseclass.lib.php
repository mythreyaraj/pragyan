<?php 
if(!defined('__PRAGYAN_CMS'))
{ 
	header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden');
	echo "<h1>403 Forbidden</h1><h4>You are not authorized to access the page.</h4>";
	echo '<hr/>'.$_SERVER['SERVER_SIGNATURE'];
	exit(1);
}
/**
 * @package pragyan
 * @author mythreya Raj
 * @copyright (c) 2010 Pragyan Team
 * @license http://www.gnu.org/licenses/ GNU Public License
 * For more details, see README
 */
	class Database
	{
	    public $link;
	    private $conn_str; 
	    private static $_instance;
	    private $dbtype = "mysql"; //need to handle these varialbles in a better way
	    private $dbhost = "localhost";
	    private $dbname = "pragyan";
	    private $dbuser = "root";
	    private $dbpass = "password";
	    
	    private function __construct() {} 
	    
	    /**
	     * This function Connects to database, need to debate of PDOs or not
	     * @param nothing
	     * @return the database connection object.
	     */
	    protected function connect(){              
            try{
                    return $conn_str = new PDO($this->dbtype.":host=".$this->dbhost.";dbname=".$this->dbname, $this->dbuser,$this->dbpass);
            }
            catch(DatabaseException $e){
                echo $e->getMessage();
            }       
	    }
	    
	    /**
	     * This function Implements singleton pattern to ensure there is only on instance of db connection
	     * @param nothing
	     * @return the database connection object.
	     */
	    public static function Instance(){       
            if(!self::$_instance){
                self::$_instance=new Database;
                return self::$_instance->connect();
            }
            else{
            	return self::$_instance->connect(); 
            }
	    }
	}
?>