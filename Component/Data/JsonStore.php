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
 * Base Grid JsonStore
 *
 * Base panel class
 *
 * @package     ExtPHP
 * @subpackage  Manager
 * @author      David Mann <ninja@codingninja.com.au>
 * @copyright   David Mann
 */
class JsonStore extends Store
{
    protected $name = 'Ext.data.JsonStore';
}
