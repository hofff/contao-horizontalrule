<?php

namespace Hofff\Contao\HorizontalRule;

use Contao\ContentElement;

/**
 * @author Oliver Hoff <oliver@hofff.com>
 */
class ContentHorizontalRule extends ContentElement {

	/**
	 * @var string
	 */
	protected $strTemplate = 'ce_hofff_horizontalrule';

	/**
	 * @see \Contao\ContentElement::compile()
	 */
	protected function compile() {
		if($this->addAnchor) {
			$this->Template->anchor			= $this->anchor;
			$this->Template->anchorTitle	= $this->anchorTitle;
		} else {
			$this->Template->anchor			= false;
			$this->Template->anchorTitle	= '';
		}
	}

}
