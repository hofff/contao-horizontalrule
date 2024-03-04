<?php

declare(strict_types=1);

namespace Hofff\Contao\HorizontalRule\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Hofff\Contao\HorizontalRule\HofffContaoHorizontalRuleBundle;

final class Plugin implements BundlePluginInterface
{
    /** {@inheritDoc} */
    public function getBundles(ParserInterface $parser): array
    {
        // phpcs:ignore Squiz.Arrays.ArrayDeclaration.MultiLineNotAllowed
        return [
            BundleConfig::create(HofffContaoHorizontalRuleBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['hofff_horizontalrule']),
        ];
    }
}
