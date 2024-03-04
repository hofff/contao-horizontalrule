<?php

declare(strict_types=1);

namespace Hofff\Contao\HorizontalRule;

use Contao\ContentElement;
use Contao\Environment;

/**
 * @property string|bool $addAnchor
 * @property string      $anchor
 * @property string      $anchorTitle
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ContentHorizontalRule extends ContentElement
{
    /** @var string */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    protected $strTemplate = 'ce_hofff_horizontalrule';

    /** @psalm-suppress UndefinedThisPropertyFetch */
    protected function compile(): void
    {
        $this->Template->request = Environment::get('request');

        if ((bool) $this->addAnchor) {
            $this->Template->anchor      = $this->anchor;
            $this->Template->anchorTitle = $this->anchorTitle;
        } else {
            $this->Template->anchor      = false;
            $this->Template->anchorTitle = '';
        }
    }
}
