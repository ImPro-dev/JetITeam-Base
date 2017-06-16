<?php

namespace JetITeam\Base\Plugin\Catalog\Block\Product;

use \Magento\Catalog\Block\Product\ListProduct;
use \JetITeam\Base\Helper\Data;

/**
 * Config edit plugin.
 *
 * @package JetITeam\Base\Plugin\Catalog\Block\Product
 */
class ListProductPlugin
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
     * Retrieve product details html
     *
     * @return mixed
     */
    public function aroundGetProductDetailsHtml(ListProduct $subject, callable $proceed, \Magento\Catalog\Model\Product $product)
    {
        return ($this->_helper->getCategoryShowSwatches($subject->getMode()))
            ? $proceed($product) : '';
    }

    /**
     * Get product reviews summary
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return string
     */
    public function aroundGetReviewsSummaryHtml(
        ListProduct $subject,
        callable $proceed,
        \Magento\Catalog\Model\Product $product,
        $templateType = false,
        $displayIfNoReviews = false)
    {
        return $this->_helper->getCategoryShowReviews($subject->getMode())
            ? $proceed($product, $templateType, $displayIfNoReviews)
            : '';
    }
}