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

namespace ExtPHP\Component\Toolbar;

use PHPJs\Renderable;

use ExtPHP\Component\Toolbar;

/**
 * Generic Component Class
 *
 * Generic component class which allows any "option" value. Not just pre-defined ones.
 *
 * @package     ExtPHP
 * @subpackage  Manager
 * @author      David Mann <ninja@codingninja.com.au>
 * @copyright   David Mann
 */
class Paging extends Toolbar
{
    protected $name = 'Ext.PagingToolbar';
    
    public function __construct($store, $config = array(), $type = self::OBJ) {
        $this->setOption('store', $store);
             
        return parent::__construct($config, $type);
    }
}
