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

class Display extends Controller
{
    public function main()
    {
        // Get the topic we're in
        $id_topic = (int) $this->_app['router']->getMatch('id_topic');
        // Get the page we're on
        $id_page = (int) ($this->_app['router']->getMatch('id_page') ?: 0);
        // @todo
        
        $data = $this->module->getStorage('Topics')->main($id_topic, $id_page);
        // @todo
        
        return $this->module->render('Display', array(
                'topic' => $data,
            ));
    }
}