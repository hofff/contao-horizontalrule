<?php

namespace Hofff\Contao\HorizontalRule\Database;

use Contao\Database;
use Contao\System;

/**
 * @author Oliver Hoff <oliver@hofff.com>
 */
class Updater {

	/**
	 * @return void
	 */
	public static function runLegacyUpdate() {
		System::loadLanguageFile('default');

		$db = Database::getInstance();

		if($db->fieldExists('anchor', 'tl_content', false)) {
			if(!$db->fieldExists('addAnchor', 'tl_content', false)) {
				$db->query('ALTER TABLE tl_content ADD addAnchor char(1) NOT NULL default \'\'');
				$db->query('UPDATE tl_content SET addAnchor = IF(LENGTH(anchor) > 0, 1, \'\')');
			}

			if(!$db->fieldExists('anchorTitle', 'tl_content', false)) {
				$sql = 'ALTER TABLE tl_content ADD anchorTitle varchar(255) NOT NULL default ?';
				$db->prepare($sql)->execute($GLOBALS['TL_LANG']['MSC']['backToTop']);
			}

			$db->query('UPDATE tl_content SET `type` = \'horizontalRule\' WHERE `type` = \'spacer\'');
		}

		$db->query('UPDATE tl_content SET `type` = \'hofff_horizontalrule\' WHERE `type` = \'horizontalRule\'');
	}

}
