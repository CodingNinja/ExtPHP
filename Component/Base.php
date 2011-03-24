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

use ExtPHP\Component;

/**
 * Base Concrete({@see \ExtPHP\Component\Viewport} Component class
 *
 * Base class for all concrete components
 *
 * @package     ExtPHP
 * @subpackage  Component
 * @author      David Mann <ninja@codingninja.com.au>
 * @copyright   David Mann
 */
abstract class Base extends Component
{

    protected static $components = array();

    /**
     * Constructor
     *
     * Options:
     * * This class allows you to specify any options without restrictions.
     *
     * @param array $config   The configuration to use on the component
     * @param constant $type  The render method for the component
     */
    public function __construct($config = array(), $type = self::OBJ) {
        if(!$this->name) {
            throw new \InvalidArgumentException('Concrete component classes require a pre-defined name.');
        }

        if(isset($config['id'])) {
            $id = $config['id'];
            if(isset(self::$components[$config['id']])) {
                throw new \OutOfBoundsException(sprintf('Component with id "%s" already registered', $id));
            }
            self::$components[$id] = $this;
        }

        parent::__construct ( $this->name, $config, $type );
    }

    public function setOption($key, $value) {
        if($key === 'id') {
            self::$components[$value] = $this;
        }
        return parent::setOption($key, $value);
    }

    public static function getComponent($id) {
        return isset(self::$components[$id]) ? self::$components[$id] : null;
    }
}
