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

class Category extends Model implements ArrayAccess
{
    public function setData(array $data)
    {
        // @todo
    }
    
    public function save()
    {
        $this->module->getStorage('Category')->save($this);
    }
}