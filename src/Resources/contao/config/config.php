<?php

declare(strict_types=1);

use Hofff\Contao\HorizontalRule\ContentHorizontalRule;
use Hofff\Contao\HorizontalRule\FormHorizontalRule;

$GLOBALS['TL_CTE']['texts']['hofff_horizontalrule'] = ContentHorizontalRule::class;
$GLOBALS['TL_FFL']['hofff_horizontalrule']          = FormHorizontalRule::class;
