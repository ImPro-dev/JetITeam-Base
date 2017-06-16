<?php

namespace JetITeam\Base\Controller\Adminhtml;

use Magento\Backend\App\Action;

/**
 * Class Settings
 *
 * @package JetITeam\Base\Controller\Adminhtml
 */
abstract class Settings extends Action
{
    /**
     * @inheritdoc
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('JetITeam_Base::theme_options_config');
    }
}