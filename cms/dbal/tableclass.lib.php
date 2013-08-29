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
        private $columnProperty=array();
        private $dbAdaptor;
        
        /**
	     * This function contructs the class table
	     * @param $param1 table name
	     * @return nothing
	    */
        public function __construct($tableName){
        	$this->dbAdaptor=Database::Instance();
            $this->tablename=$tableName;

            foreach($this->dbAdaptor->query("DESCRIBE ".$this->tablename) as $row) {
                print_r($row); echo "<br/>";
                $this->column[]=$row['Field'];
                if($row['Extra']=='auto_increment')
                    $this->columnProperty[]=array('NULL' => $row['Null'],'KEY' => $row['Key'],'DEFAULT' => $row['Default'],'AI' => true);
                else
                    $this->columnProperty[]=array('NULL' => $row['Null'],'KEY' => $row['Key'],'DEFAULT' => $row['Default'],'AI' => false);
            }
    	}

        /**
         * This function inserts single/multiple data into a table
         * @param $param1 mutliDimensional Data array with each array element as the array of values for a single row.
         * @param $param2 Optional Parameter , Give the set of the fields for the which only the data must be inserted. 
         * Even auto-increament fields must be specified
         * @return nothing
        */
        public function insert($data,$cols=null){
            $cols = isset($cols) ? $cols : $this->column;

            $sql="INSERT INTO {$this->tablename} (";

            foreach ($cols as $key => $value) 
               $sql.= $key==sizeof($cols)-1 ? " `{$value}`) " : " `{$value}`,";

            $sql.='VALUES ';

            for($i=0;$i<sizeof($data);$i++){
                $sql.=' ( ';

                for($j=0;$j<sizeof($cols);$j++)
                    $sql.= $j==sizeof($cols)-1 ? " ? " : " ?, ";    

                $sql.= $i==sizeof($data)-1 ? " ) ;" : " ) ,";
            }
            try{  
                $stmt=$this->dbAdaptor->prepare($sql);
                $BindValueCount=1;
                for($i=0;$i<sizeof($data);$i++)
                    for($j=0;$j<=sizeof($i);$j++){
                          $stmt->bindValue($BindValueCount++,$data[$i][$j]);
                          echo $BindValueCount."<br/>";
                    }
                //duplicate rows not detected  
                $stmt->execute();
            }
            catch (DatabaseException $e){
                //do something
            }
        }

        public function find(){

        }

        public function find_by($array,$data){

        }

        public function find_where($where,$values){

        }

        public function update($find,$data){

        }

        public function update_where($where,$values,$data){

        }

        public function delete($find){

        }

        public function delete_where($where,$values,$data){

        }
    }
?>