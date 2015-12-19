<?php

namespace Hofff\Contao\HorizontalRule;

class ContentHorizontalRule extends \ContentElement {

	protected $strTemplate = 'ce_hofff_horizontalrule';

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
