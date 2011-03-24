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

namespace ExtPHP\Component\Panel;

use ExtPHP\Component\Base;

/**
 * Base Panel Class
 *
 * Base panel class
 *
 * @package     ExtPHP
 * @subpackage  Manager
 * @author      David Mann <ninja@codingninja.com.au>
 * @copyright   David Mann
 */
class Tab extends Base
{
    protected $name = 'Ext.TabPanel';
    protected function getDefaults() {
        return array_merge(parent::getDefaults(), array('active' => 0));
    }
}
