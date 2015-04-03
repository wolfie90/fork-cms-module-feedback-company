<?php

namespace Backend\Modules\Catalog\Installer;

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Feedback Company Reviews module
 *
 * @author Bart Lagerweij <bart@webleads.nl>
 * @author Tim van Wolfswinkel <tim@webleads.nl>
 */
class Installer extends ModuleInstaller
{
    /**
     * Install the module into Fork CMS
     *
     */
    public function install()
	{
		// install the module in the database
		$this->addModule('FeedbackCompanyReviews');

		// install the locale, this is set here because we need the module for this
		$this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

		$this->setModuleRights(1, 'FeedbackCompanyReviews');

        // settings navigation
        $navigationSettingsId = $this->setNavigation(null, 'Settings');
        $navigationModulesId = $this->setNavigation($navigationSettingsId, 'Modules');
        $this->setNavigation($navigationModulesId, 'FeedbackCompanyReviews', 'feedback_company_reviews/settings');

        // add widget
        $this->insertExtra('FeedbackCompanyReviews', 'block', 'FeedbackCompanyReviews');
        $this->insertExtra('FeedbackCompanyReviews', 'widget', 'FeedbackCompanyScoreBoard', 'score_board', null, 'N', 1000);
    }
}
