<?php

declare(strict_types=1);

use Contao\System;

System::loadLanguageFile('default');
System::loadLanguageFile('hofff_horizontalrule');

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'addAnchor';

$GLOBALS['TL_DCA']['tl_content']['palettes']['hofff_horizontalrule'] = '{type_legend},type'
    . ';{hofff_horizontalrule_legend},addAnchor'
    . ';{protected_legend},protected'
    . ';{expert_legend},guests,cssID'
    . ';{invisible_legend},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addAnchor'] = 'anchor,anchorTitle';

$GLOBALS['TL_DCA']['tl_content']['fields']['addAnchor'] = [
    'label'     => &$GLOBALS['TL_LANG']['hofff_horizontalrule']['addAnchor'],
    'inputType' => 'checkbox',
    'eval'      => ['submitOnChange' => true],
    'sql'       => 'char(1) NOT NULL default \'\'',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['anchor'] = [
    'label'     => &$GLOBALS['TL_LANG']['hofff_horizontalrule']['anchor'],
    'default'   => 'top',
    'inputType' => 'text',
    'eval'      => [
        'mandatory' => true,
        'maxlength' => 255,
        'tl_class'  => 'w50',
    ],
    'sql'       => 'varchar(255) NOT NULL default \'\'',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['anchorTitle'] = [
    'label'     => &$GLOBALS['TL_LANG']['hofff_horizontalrule']['anchorTitle'],
    'default'   => $GLOBALS['TL_LANG']['MSC']['backToTop'],
    'inputType' => 'text',
    'eval'      => [
        'mandatory' => true,
        'maxlength' => 255,
        'tl_class'  => 'w50',
    ],
    'sql'       => 'varchar(255) NOT NULL default \'\'',
];
