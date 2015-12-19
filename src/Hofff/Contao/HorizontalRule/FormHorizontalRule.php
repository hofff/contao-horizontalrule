<?php

namespace Hofff\Contao\HorizontalRule;

class FormHorizontalRule extends \Widget {

	protected $strTemplate = 'form_hofff_horizontalrule';

	protected $strPrefix = 'widget widget-hr';

	public function validate() {
		return;
	}

	public function generate() {
		$row = new \ContentModel;
		$row->type = 'hofff_horizontalrule';
		$row->addAnchor = $this->hofff_horizontalrule_addAnchor;
		$row->anchor = $this->hofff_horizontalrule_anchor;
		$row->anchorTitle = $this->hofff_horizontalrule_anchorTitle;
		$row->cssID = array('', $this->class);
		$hr = new ContentHorizontalRule($row);
		return $hr->generate();
	}

}
