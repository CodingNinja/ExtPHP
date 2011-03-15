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

namespace ExtPHP;

use \PHPJs\Component as BaseComponent;

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
class Component extends BaseComponent
{
  /**
   * Constructor
   *
   * Options:
   *  * This class allows you to specify any options without restrictions.
   *
   * @param string $name    The name of the component to create
   * @param array $config   The configuration to use on the component
   * @param constant $type  The render method for the component
   */
  public function __construct($name, $config = array(), $type = self::OBJ)
  {
    foreach($config as $key => $value) {
      $this->addOption($key, null);
    }

    parent::__construct($name, $config, $type);
  }

  public function configure() {
  }
  
  public function setOption($key, $value) {
      if(!isset($this->options[$key])) {
          $this->options[$key] = ''; 
      }
      
     return parent::setOption($key, $value);
  }
}
