<?php

\System::loadLanguageFile('hofff_horizontalrule');

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][]
	= 'hofff_horizontalrule_addAnchor';

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['hofff_horizontalrule']
	= '{type_legend},type;{hofff_horizontalrule_legend},hofff_horizontalrule_addAnchor;{template_legend:hide},customTpl';

$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['hofff_horizontalrule_addAnchor']
	= 'hofff_horizontalrule_anchor,hofff_horizontalrule_anchorTitle';

$GLOBALS['TL_DCA']['tl_form_field']['fields']['hofff_horizontalrule_addAnchor'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['hofff_horizontalrule']['addAnchor'],
	'inputType'		=> 'checkbox',
	'eval'			=> array(
		'submitOnChange'	=> true,
	),
	'sql'			=> 'char(1) NOT NULL default \'\'',
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['hofff_horizontalrule_anchor'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['hofff_horizontalrule']['anchor'],
	'default'		=> 'top',
	'inputType'		=> 'text',
	'eval'			=> array(
		'mandatory'		=> true,
		'maxlength'		=> 255,
		'tl_class'		=> 'w50',
	),
	'sql'			=> 'varchar(255) NOT NULL default \'\'',
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['hofff_horizontalrule_anchorTitle'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['hofff_horizontalrule']['anchorTitle'],
	'default'		=> $GLOBALS['TL_LANG']['MSC']['backToTop'],
	'inputType'		=> 'text',
	'eval'			=> array(
		'mandatory'		=> true,
		'maxlength'		=> 255,
		'tl_class'		=> 'w50'
	),
	'sql'			=> 'varchar(255) NOT NULL default \'\'',
);
