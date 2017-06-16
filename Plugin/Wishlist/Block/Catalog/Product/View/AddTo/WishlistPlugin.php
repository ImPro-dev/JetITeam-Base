<?php

namespace JetITeam\Base\Plugin\Wishlist\Block\Catalog\Product\View\AddTo;

use \Magento\Wishlist\Block\Catalog\Product\View\AddTo\Wishlist;
use \JetITeam\Base\Helper\Data;

/**
 * Config edit plugin.
 *
 * @package JetITeam\Base\Plugin\Wishlist\Block\Catalog\Product\View\AddTo
 */
class WishlistPlugin
{
    /**
     * ThemeOptions helper.
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
     * Show/hide Wishlist button
     *
     * @return string
     *
     */
    public function aroundToHtml(Wishlist $subject, callable $proceed)
    {
        return $this->_helper->isProductShowWishlist() ? $proceed() : false;
    }



}