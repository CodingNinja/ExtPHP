<?php

/*
 * ExtPHP - ExtJS PHP Wrapper
 * 
 * (c) David Mann <ninja@codingninja.com.au>
 *
 * This file is part of the ExtPHP library.
 * For the full license. Please see the license file bundled
 * with the source code
 */

namespace ExtPHP\Component\Data;

use ExtPHP\Component\Data\Store;

/**
 * Base Grid Grouping
 *
 * Base panel class
 *
 * @package     ExtPHP
 * @subpackage  Manager
 * @author      David Mann <ninja@codingninja.com.au>
 * @copyright   David Mann
 */
class GroupingStore extends Store
{
    protected $name = 'Ext.data.GroupingStore';
    
    public function getDefaults() {
        return array('groupTextTpl' => '{text} ({[values.rs.length]} {[values.rs.length > 1 ? "Items" : "Item"]})');
    }
}
