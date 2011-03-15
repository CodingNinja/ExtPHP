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

namespace ExtPHP\Manager;

use \ExtPHP\Component;
use \PHPJs\Manager;
use \PHPJs\Converter\MethodCall;

/**
 * Generic Output Manager
 *
 * This class is used to genericly manage the dependencies of all registered
 * components. It also manages how the code is returned (Flat, compressed output)
 *
 * Example usage:
 * <code>
 *  $component = \PHPJs\Manager\Generic::componentFromXtype('panel', $config);
 *  $manager = \PHPJs\Manager\Generic::dashboard()->register($component);
 *  $manaer->getOutput();
 * </code>
 *
 * @package     PHPJs
 * @subpackage  Manager
 * @author      David Mann <ninja@codingninja.com.au>
 * @copyright   David Mann
 */
class Generic extends Manager
{

  protected $outputWrapper = "%s\n\nExt.onReady(function() {\n%s%s%s\n});";

  /**
   * Render a manager
   *
   * Render the manager instance
   *
   * @param string $prefix Code to place before the rendered javascript
   * @param string $suffix Code to place after the rendered javascript
   * @return string The rendered manager instance
   */
  public function render($prefix = '', $suffix = '')
  {
    $output = '';

    foreach ($this->components as $component)
    {
      $output .= $this->renderItem($component);
    }

    return sprintf($this->getOutputWrapper(), $this->getAllVarNames(), ($prefix ? $prefix .
      "\n" : ''), $output, ($suffix ? $suffix . "\n" : ''));
  }

  public function renderItem($component)
  {
    $output = '';
    if($component instanceof Component) {
      $output .= $this->renderDependencies($component);
      $output .= $this->renderComponent($component);
    }elseif($component instanceof MethodCall) {
      $output .= $this->renderDependencies($component->getObject());
    }

    return $output;
  }

  /**
   * Get all var names
   *
   * Get's all the variable names that are contained within this manager
   *
   * @throws InvalidMethodCallException Thrown when the current manager has not been rendered
   * @return string Variable containing all the variable names
   */
  public function getAllVarNames()
  {
    if (!sizeof($this->rendered))
    {
      throw new \BadMethodCallException('Manager must be rendered to retrieve variable names');
    }

    return 'var ' . implode(",\n", array_keys($this->rendered)) . ';';
  }

  /**
   * Render the dependencies
   *
   * Simple dependency loader which get's the dependencies of a component and
   * render's them (if they are not already rendered)
   *
   * @param Component $component The component to use
   * @return string The rendered dependencies
   */
  public function renderDependencies(Component $component)
  {
    $dependencies = '';
    foreach ($component->getDependencies() as $dependency)
    {
      if ($dependency->hasDependencies())
      {
        $dependencies .= $this->loadDependencies($dependency);
      }

      $dependencies .= $this->renderComponent($dependency);
    }

    return $dependencies;
  }

  public function getComponentClassFor($class) {
    return '\\ExtPHP\\Component';
  }

  public function methodCall()
  {

  }
}