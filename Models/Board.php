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

class Board extends Model
{
    protected $_data;
    public $topics;
    
    public function setData(array $data)
    {
        
    }
    public function setRawData(array $data)
    {
        
    }
    public function save()
    {
        $this->module->getStorage('Board')->save($this);
    }
}