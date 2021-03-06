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
 */

namespace smCore\Modules\smf\Controllers;

use smCore\Module\Controller;

class BoardIndex extends Controller
{
    public function main()
    {
        $data = $this->module->getStorage('BoardIndex')->main();
        // @todo
        
        return $this->module->render('BoardIndex', array(
                'categories' => $data,
            ));
    }
}