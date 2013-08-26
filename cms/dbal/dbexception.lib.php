<?php 
/**
 * @package pragyan
 * @author mythreya Raj
 * @copyright (c) 2010 Pragyan Team
 * @license http://www.gnu.org/licenses/ GNU Public License
 * For more details, see README
 */

class DatabaseException extends Exception
{
    
    public function __construct($message, $code = 0, Exception $previous = null) {
        // some code
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object , need to cms integration to it.
    public function getMessage() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}
?>