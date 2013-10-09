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

/**
 * Table tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['metapalettes']['horizontalRule'] = array(
	'type'           => array('type'),
	'horizontalRule' => array('addAnchor'),
	'protected'      => array(':hide', 'protected'),
	'expert'         => array(':hide', 'guests', 'cssID'),
	'invisible'      => array(':hide', 'invisible', 'start', 'stop')
);

$GLOBALS['TL_DCA']['tl_content']['metasubpalettes']['addAnchor'] = array('anchor', 'anchorTitle');

$GLOBALS['TL_DCA']['tl_content']['fields']['addAnchor'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['addAnchor'],
	'default'   => '1',
	'inputType' => 'checkbox',
	'eval'      => array('submitOnChange' => true),
	'sql'       => 'char(1) NOT NULL default \'\'',
);

$GLOBALS['TL_DCA']['tl_content']['fields']['anchor'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['anchor'],
	'default'   => 'top',
	'inputType' => 'text',
	'eval'      => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
	'sql'       => 'varchar(255) NOT NULL default \'\'',
);

$GLOBALS['TL_DCA']['tl_content']['fields']['anchorTitle'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['anchorTitle'],
	'default'   => $GLOBALS['TL_LANG']['MSC']['backToTop'],
	'inputType' => 'text',
	'eval'      => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
	'sql'       => 'varchar(255) NOT NULL default \'\'',
);
