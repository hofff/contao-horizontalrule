<?php

namespace Hofff\Contao\HorizontalRule\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Doctrine\DBAL\Connection;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @author Oliver Hoff <oliver@hofff.com>
 */
class HorizontalRuleMigration extends AbstractMigration
{
    private Connection $connection;

    private TranslatorInterface $translator;

    public function __construct(Connection $connection, TranslatorInterface $translator)
    {
        $this->connection = $connection;
        $this->translator = $translator;
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->getSchemaManager();

        if (! $schemaManager->tablesExist('tl_content')) {
            return false;
        }

        $fields = $schemaManager->listTableColumns('tl_content');
        if (isset($fields['anchor']) && ! isset($fields['addanchor'], $fields['anchortitle'])) {
            return true;
        }

        return $this->connection
                ->executeQuery('SELECT count(id) FROM tl_content WHERE type=?', ['horizontalRule'])
                ->fetchOne() > 0;
    }

    public function run(): MigrationResult
    {
        $schemaManager = $this->connection->getSchemaManager();
        $fields        = $schemaManager->listTableColumns('tl_content');

        if (! isset($fields['addachor'])) {
            $this->connection->executeStatement('ALTER TABLE tl_content ADD addAnchor char(1) NOT NULL default \'\'');
            $this->connection->executeStatement('UPDATE tl_content SET addAnchor = IF(LENGTH(anchor) > 0, 1, \'\')');
        }

        if (! isset($fields['anchortitle'])) {
            $this->connection->executeStatement(
                'ALTER TABLE tl_content ADD anchorTitle varchar(255) NOT NULL default ?',
                $this->translator->trans('MSC.backToTop', [], 'contao_default')
            );
        }

        $this->connection->executeStatement(
            'UPDATE tl_content SET `type` = \'hofff_horizontalrule\' WHERE `type` = \'horizontalRule\''
        );

        return $this->createResult(true);
    }
}
