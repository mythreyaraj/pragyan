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
        // Need to add default messages
        parent::__construct($message, $code, $previous);
    }

    /**
     * This is incomplete
     * This function returns the error code and message 
     * @param nothing
     * @return string representation of error code and messages -> need to change this
     */
    public function getErrorMessage() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}
?>