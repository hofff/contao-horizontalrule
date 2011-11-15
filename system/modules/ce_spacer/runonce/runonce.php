<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Content Spacer
 * Copyright (C) 2011 Tristan Lins
 *
 * Extension for:
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  InfinitySoft 2010,2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    ContentSpacer
 * @license    LGPL
 * @filesource
 */


/**
 * Runonce action.
 *
 * @copyright  Tristan Lins 2010
 * @author     Tristan Lins <info@infinitysoft.de>
 * @package    ContentSpacer
 */
class CeSpacerRunonce extends System
{
	/**
	 * @var Database
	 */
	protected $Database;

	/**
	 * Run the runonce action.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->import('Database');
		
		if ($this->Database->fieldExists('anchor', 'tl_content', false))
		{
			if (!$this->Database->fieldExists('addAnchor', 'tl_content', false))
			{
				// add field addAnchor
				$this->Database->execute("ALTER TABLE tl_content ADD addAnchor char(1) NOT NULL default '';");

				// update field addAnchor
				$this->Database->execute("UPDATE tl_content SET addAnchor = IF(LENGTH(anchor)>0, 1, '');");
			}

			if (!$this->Database->fieldExists('anchorTitle', 'tl_content', false))
			{
				// add field anchorTitle
				$this->Database
					->prepare("ALTER TABLE tl_content ADD anchorTitle varchar(255) NOT NULL default ?;")
					->execute($GLOBALS['TL_LANG']['MSC']['backToTop']);
			}
		}
	}
}

$objRunonce = new CeSpacerRunonce();
$objRunonce->run();
