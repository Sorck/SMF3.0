<?php

/**
 * Simple Machines Forum (SMF)
 *
 * @package SMF
 * @author Simple Machines http://www.simplemachines.org
 * @copyright 2013 Simple Machines
 * @license http://www.simplemachines.org/about/smf/license.php BSD
 *
 * @version 3.0 Alpha 1
 * 
 * @todo Implement iterator
 */

namespace smCore\Modules\smf\Storage;

use smCore\Module\Model;
use ArrayAccess;

class Board extends Model implements ArrayAccess
{
    protected $_data = array();
    public $topics = array();
    
    public function setData(array $data)
    {
        
    }
    
    public function setRawData(array $data)
    {
		foreach ($data as $key => $value)
		{
			$this->_data[$key] = $value;
		}
	}
    
    public function save()
    {
        $this->module->getStorage('Board')->save($this);
    }
    
    /**
     * ArrayAccess - implementation for empty/isset/array_key_exists/etc.
	 *
	 * @param mixed $offset
	 *
	 * @return boolean
	 */
	public function offsetExists($offset)
	{
		return isset($this->_data[$offset]);
	}

	/**
	 * ArrayAccess - implementation for getting data via array syntax
	 *
	 * @param mixed $offset Name of the key, usually a string
	 *
	 * @return boolean
	 */
	public function offsetGet($offset)
	{
		if (array_key_exists($offset, $this->_data))
		{
			return $this->_data[$offset];
		}

		return false;
	}

	/**
	 * ArrayAccess - implementation for setting data via array syntax
	 *
	 * @param mixed $offset Name of the key, usually a string
	 * @param mixed $value  
	 */
	public function offsetSet($offset, $value)
	{
		if ('password' === $offset)
		{
			throw new Exception('User passwords cannot be set via array access.');
		}

		$this->_data[$offset] = $value;
	}

	/**
	 * ArrayAccess - implementation for unsetting data via array syntax
	 *
	 * @param mixed $offset Name of the key, usually a string
	 */
	public function offsetUnset($offset)
	{
		unset($this->_data[$offset]);
	}
}