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

namespace smCore\Modules\smf\Storage;

use smCore\Module\Storage;

class BoardIndex extends Storage
{
    public function main()
    {
        // @todo Make sure user can see the board(s) in question.
        // Get the board index data
        $res = $this->_app['db']->query('SELECT c.*, b.*
            FROM {db_prefix}smf_categories AS c, {db_prefix}smf_boards AS b
            WHERE c.id_category = b.id_category
            ORDER BY b.id_before, c.id_before');
        while ($row = $res->fetchRow())
        {
            if (!isset($data[$row['id_category']]))
            {
                $data[$row['id_category']] = $this->module->getModel('Category');
                $data[$row['id_category']]->setRawData(array('boards' => array()));
            }
            $data[$row['id_category']]['boards'][$row['id_board']] = $this->module->getModel('Board');
            $data[$row['id_category']]['boards'][$row['id_board']]->setRawData($row);
        }
        return $data;
    }
}