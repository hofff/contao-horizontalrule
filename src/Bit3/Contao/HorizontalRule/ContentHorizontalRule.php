<?php

/**
 * Horizontal rule content element for Contao Open Source CMS
 * Copyright (C) 2013 Tristan Lins
 *
 * PHP version 5
 *
 * @copyright  bit3 UG 2013
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @package    HorizontalRule
 * @license    LGPL-3.0+
 * @filesource
 */

namespace Bit3\Contao\HorizontalRule;

/**
 * Horizontal rule content element.
 *
 * @copyright  bit3 UG 2013
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @package    HorizontalRule
 */
class ContentHorizontalRule extends \TwigContentElement
{
	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'ce_horizontal_rule';

	/**
	 * @see ContentElement::compile()
	 * @return void
	 */
	protected function compile()
	{
		if ($this->addAnchor) {
			$this->Template->anchor      = $this->anchor;
			$this->Template->anchorTitle = $this->anchorTitle;
		}
		else {
			$this->Template->anchor      = false;
			$this->Template->anchorTitle = '';
		}
	}

}
