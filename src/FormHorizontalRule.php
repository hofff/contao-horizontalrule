<?php

declare(strict_types=1);

namespace Hofff\Contao\HorizontalRule;

use Contao\ContentModel;
use Contao\Widget;

/**
 * @property string|bool $hofff_horizontalrule_addAnchor
 * @property string      $hofff_horizontalrule_anchor
 * @property string      $hofff_horizontalrule_anchorTitle
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FormHorizontalRule extends Widget
{
    /** @var string */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    protected $strTemplate = 'form_hofff_horizontalrule';

    /** @var string */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    protected $strPrefix = 'widget widget-hr';

    public function validate(): void
    {
    }

    public function generate(): string
    {
        $row              = new ContentModel();
        $row->type        = 'hofff_horizontalrule';
        $row->addAnchor   = $this->hofff_horizontalrule_addAnchor;
        $row->anchor      = $this->hofff_horizontalrule_anchor;
        $row->anchorTitle = $this->hofff_horizontalrule_anchorTitle;
        $row->cssID       = ['', $this->class];

        return (new ContentHorizontalRule($row))->generate();
    }
}
