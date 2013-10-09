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

namespace Bit\Contao\HorizontalRule\Runonce;

/**
 * Update database action.
 *
 * @copyright  bit3 UG 2013
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @package    HorizontalRule
 */
class UpdateDatabase
{
	/**
	 * Run the runonce action.
	 *
	 * @return void
	 */
	static public function run()
	{
		$database = \Database::getInstance();

		if ($database->fieldExists('anchor', 'tl_content', false)) {
			if (!$database->fieldExists('addAnchor', 'tl_content', false)) {
				// add field addAnchor
				$database->query("ALTER TABLE tl_content ADD addAnchor char(1) NOT NULL default ''");

				// update field addAnchor
				$database->query("UPDATE tl_content SET addAnchor = IF(LENGTH(anchor)>0, 1, '')");
			}

			if (!$database->fieldExists('anchorTitle', 'tl_content', false)) {
				// add field anchorTitle
				$database
					->prepare("ALTER TABLE tl_content ADD anchorTitle varchar(255) NOT NULL default ?")
					->execute($GLOBALS['TL_LANG']['MSC']['backToTop']);
			}

			// change content type
			$database
				->query("UPDATE tl_content SET `type`='horizontalRule' WHERE `type`='spacer'");
		}
	}
}

UpdateDatabase::run();
