<?php

namespace JetITeam\Base\Plugin\Catalog\Block\Product\ProductList\Item\AddTo;

use \Magento\Catalog\Block\Product\ProductList\Item\AddTo\Compare;
use \Magento\Framework\View\LayoutInterface;
use \JetITeam\Base\Helper\Data;

/**
 * Config edit plugin.
 *
 * @package JetITeam\Base\Plugin\Catalog\Block\Product\ProductList\Item\AddTo
 */
class ComparePlugin
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
     * Show/hide Compare button
     *
     * @return string
     *
     */
    public function aroundToHtml(Compare $subject, callable $proceed)
    {
        $toolbar = $this->_layout->getBlock('product_list_toolbar');
        $currentMode = $toolbar ? $toolbar->getCurrentMode() : false;
        if($currentMode && !$this->_helper->getCategoryShowCompare($currentMode)){
            return '';
        }
        return $proceed();
    }



}