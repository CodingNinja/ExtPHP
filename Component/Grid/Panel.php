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

namespace ExtPHP\Component\Grid;

use PHPJs\Converter\LiteralConverter;

use ExtPHP\Component;
use ExtPHP\Component\Base;

/**
 * Base Grid Panel
 *
 * Base panel class
 *
 * @package     ExtPHP
 * @subpackage  Manager
 * @author      David Mann <ninja@codingninja.com.au>
 * @copyright   David Mann
 */
class Panel extends Base
{
    
    protected $rowNumbers = false;
    
    protected $rowNumbererConfig = array();
    
    protected $name = 'Ext.grid.GridPanel';
    
    public function render() {
        if(true || $this->rowNumbers) {
            array_unshift($this->options['columns']->value, $this->getRowNumbererComponent());
        }
        
        return parent::render();
    }
    
    /**
     * @return the $rowNumbers
     */
    public function getRowNumbers() {
        return $this->rowNumbers;
    }


	/**
     * @param bool $bool
     */
	public function setRowNumbers($bool) {
        $this->rowNumbers = $bool;
        
        return $this;
    }

	/**
     * @return the $rowNumbererConfig
     */
    public function getRowNumbererConfig() {
        return $this->rowNumbererConfig;
    }

	/**
     * @param field_type $rowNumbererConfig
     */
    public function setRowNumbererConfig(array $rowNumbererConfig) {
        $this->rowNumbererConfig = $rowNumbererConfig;
    }
    
    public function getRowNumbererComponent() {
        return new LiteralConverter(new Component('Ext.grid.RowNumberer', $this->rowNumbererConfig));        
    }
}
