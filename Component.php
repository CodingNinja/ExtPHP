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

use PHPJs\Converter;

use PHPJs\Component as BaseComponent;

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

    protected $canHaveChildren = true;

    /**
     * Constructor
     *
     * Options:
     * * This class allows you to specify any options without restrictions.
     *
     * @param string $name    The name of the component to create
     * @param array $config   The configuration to use on the component
     * @param constant $type  The render method for the component
     */
    public function __construct($name, $config = array(), $type = self::OBJ) {
        foreach ( $config as $key => $value ) {
            $this->addOption ( $key, null );
        }
        if(Component::JSON === $type) {
            $this->addOption('xtype', $name);
            $name = null;
        }

        parent::__construct ( $name, $config, $type );
    }

    /**
     * Add a new option
     *
     * Add a option to the component.
     * Available Options:
     * 	* This method allows you to add any option you want.
     *
     * @return string The object hash
     */
    public function setOption($key, $value) {
        if (! isset ( $this->options [$key] )) {
            $this->options [$key] = '';
        }

        return parent::setOption ( $key, $value );
    }

    /**
     * Render as an hash with XType
     *
     * Render's the curernt component as a JavascriptHash with the xtype key included.
     *
     * @return string The object hash
     */
    public function renderForXtype() {
        return $this->renderForJson ( true );
    }

    /**
     * Add a single child
     *
     * Add's a single child to the stack of children
     *
     * @param unknown_type $child
     * @throws \BadMethodCallException
     * @return \ExtPHP\Component
     */
    public function addChild($child) {
        if($this->canHaveChildren) {
            $curr = $this->getOption('items', array());
            if($curr instanceof Converter) {
                $curr = $curr->getValue();
            }
            $this->setOption('items', array_merge($curr, array($child)));

            return $this;
        }

        throw new \BadMethodCallException(sprintf('Component %s does not support child items', get_class($this)));
    }

    /**
     * Add Children
     *
     * Add's multiple children to the current component
     *
     * @param array $children An array of child items.
     * @throws \BadMethodCallException Thrown when the component does not support rendering children
     * @return \ExtPHP\Component self for fluent interfaace
     */
    public function addChildren(array $children) {
        if($this->canHaveChildren) {
            $this->setOption('items', array_merge($this->getOption('items', array()), $children));

            return $this;
        }

        throw new \BadMethodCallException(sprintf('Component %s does not support child items', get_class($this)));
    }
}
