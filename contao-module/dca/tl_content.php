<?php

$GLOBALS['TL_DCA']['tl_content']['metapalettes']['hofff_horizontalrule'] = array(
	'type'				=> array('type'),
	'horizontalRule'	=> array('addAnchor'),
	'protected'			=> array(':hide', 'protected'),
	'expert'			=> array(':hide', 'guests', 'cssID'),
	'invisible'			=> array(':hide', 'invisible', 'start', 'stop'),
);

$GLOBALS['TL_DCA']['tl_content']['metasubpalettes']['addAnchor']
	= array('anchor', 'anchorTitle');

$GLOBALS['TL_DCA']['tl_content']['fields']['addAnchor'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['addAnchor'],
	'inputType'		=> 'checkbox',
	'eval'			=> array(
		'submitOnChange'	=> true,
	),
	'sql'			=> 'char(1) NOT NULL default \'\'',
);

$GLOBALS['TL_DCA']['tl_content']['fields']['anchor'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['anchor'],
	'default'		=> 'top',
	'inputType'		=> 'text',
	'eval'			=> array(
		'mandatory'		=> true,
		'maxlength'		=> 255,
		'tl_class'		=> 'w50',
	),
	'sql'			=> 'varchar(255) NOT NULL default \'\'',
);

$GLOBALS['TL_DCA']['tl_content']['fields']['anchorTitle'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['anchorTitle'],
	'default'		=> $GLOBALS['TL_LANG']['MSC']['backToTop'],
	'inputType'		=> 'text',
	'eval'			=> array(
		'mandatory'		=> true,
		'maxlength'		=> 255,
		'tl_class'		=> 'w50'
	),
	'sql'			=> 'varchar(255) NOT NULL default \'\'',
);
