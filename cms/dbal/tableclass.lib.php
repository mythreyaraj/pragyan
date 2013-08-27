<?php 
/**
 * @package pragyan
 * @author mythreya Raj
 * @copyright (c) 2010 Pragyan Team
 * @license http://www.gnu.org/licenses/ GNU Public License
 * For more details, see README
 */
	require_once("baseclass.lib.php");
        class Table
        {
                
            private $tablename;
            private $column;
            private $columnProperty;
            private $dbAdaptor;
            
            /**
		     * This function contructs the class table
		     * @param database table name
		     * @return nothing
		    */
            public function __construct($tableName){
            	$this->dbAdaptor=Database::Instance();
                $this->tablename=$tableName;
                
        	}
        }
?>