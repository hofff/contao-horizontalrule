<?php

namespace Hofff\Contao\HorizontalRule;

class ContentHorizontalRule extends \TwigContentElement {

	protected $strTemplate = 'ce_horizontal_rule';

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
