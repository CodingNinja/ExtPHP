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

use ExtPHP\Component\Base;

/**
 * Base Grid JsonStore
 *
 * Base panel class
 *
 * @package     ExtPHP
 * @subpackage  Manager
 * @author      David Mann <ninja@codingninja.com.au>
 * @copyright   David Mann
 */
class HTTPProxy extends Base
{
    protected $name = 'Ext.data.HttpProxy';
    
    public function __construct($uri, $config = array(), $type = self::OBJ) {
        $this->setOption('url', $uri);
        
        return parent::__construct ( $config, $type );
    }
}
