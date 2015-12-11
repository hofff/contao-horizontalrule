<?php

namespace Bit\Contao\HorizontalRule\Runonce;

class UpdateDatabase {

	public static function run() {
		$database = \Database::getInstance();

		if($database->fieldExists('anchor', 'tl_content', false)) {
			if(!$database->fieldExists('addAnchor', 'tl_content', false)) {
				$database->query("ALTER TABLE tl_content ADD addAnchor char(1) NOT NULL default ''");
				$database->query("UPDATE tl_content SET addAnchor = IF(LENGTH(anchor) > 0, 1, '')");
			}

			if(!$database->fieldExists('anchorTitle', 'tl_content', false)) {
				$database
					->prepare("ALTER TABLE tl_content ADD anchorTitle varchar(255) NOT NULL default ?")
					->execute($GLOBALS['TL_LANG']['MSC']['backToTop']);
			}

			$database->query("UPDATE tl_content SET `type` = 'horizontalRule' WHERE `type` = 'spacer'");
		}

		$database->query("UPDATE tl_content SET `type` = 'hofff_horizontalrule' WHERE `type` = 'horizontalRule'");
	}
}

UpdateDatabase::run();
