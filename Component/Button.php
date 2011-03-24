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

namespace ExtPHP\Component;

use ExtPHP\Component\Base;

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
class Button extends Base
{
    protected $name = 'Ext.Button';
    
    public function __construct($text, $config = array(), $type = self::OBJ) {
        $config['text'] = $text;
        parent::__construct ( $config, $type );
    }
}
