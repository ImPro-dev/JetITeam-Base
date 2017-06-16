<?php

namespace JetITeam\Base\Plugin\Wishlist\Block\Catalog\Product\ProductList\Item\AddTo;

use \Magento\Wishlist\Block\Catalog\Product\ProductList\Item\AddTo\Wishlist;
use \Magento\Framework\View\LayoutInterface;
use \JetITeam\Base\Helper\Data;

/**
 * Config edit plugin.
 *
 * @package JetITeam\Base\Plugin\Wishlist\Block\Catalog\Product\ProductList\Item\AddTo
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
     * LayoutInterface.
     *
     * @var layout
     */
    protected $_layout;

    /**
     * Construct
     *
     * @param \JetITeam\Base\Helper\Data $helper
     *
     */
    public function __construct(
        Data $helper,
        LayoutInterface $layout
    ) {
        $this->_helper = $helper;
        $this->_layout = $layout;
    }

    /**
     * Show/hide Wishlist button
     *
     * @return string
     *
     */
    public function aroundToHtml(Wishlist $subject, callable $proceed)
    {
        $toolbar = $this->_layout->getBlock('product_list_toolbar');
        $currentMode = $toolbar ? $toolbar->getCurrentMode() : false;
        if($currentMode && !$this->_helper->getCategoryShowWishlist($currentMode)){
            return '';
        }
        return $proceed();
    }



}