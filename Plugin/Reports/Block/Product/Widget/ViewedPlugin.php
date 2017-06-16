<?php

namespace JetITeam\Base\Plugin\Reports\Block\Product\Widget;

use \Magento\Reports\Block\Product\Widget\Viewed;
use \JetITeam\Base\Helper\Data;

/**
 * Config edit plugin.
 *
 * @package JetITeam\Base\Plugin\Block\Product\Viewed
 */
class ViewedPlugin
{
    /**
     * ThemeOptions helper
     *
     * @var helper
     */
    protected $_helper;

    /**
     * Construct
     *
     * @param \JetITeam\Base\Helper\Data $helper
     *
     */
    public function __construct(
        Data $helper
    ) {
        $this->_helper = $helper;
    }

    /**
     * Show/hide Recently Viewed Block
     *
     * @return string
     *
     */
    public function aroundToHtml(Viewed $subject, callable $proceed)
    {
        return $this->_helper->isRecentlyViewed() ? $proceed() : false;
    }

}