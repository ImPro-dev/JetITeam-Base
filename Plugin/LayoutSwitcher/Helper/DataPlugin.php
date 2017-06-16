<?php

namespace JetITeam\Base\Plugin\LayoutSwitcher\Helper;

use JetITeam\Base\Helper\Data as ThemeOptionsHelper;
use JetITeam\Base\Helper\ColorScheme as ColorSchemeHelper;

/**
 * Class DataPlugin.
 *
 * @package JetITeam\Base\Plugin\ThemeOptions\Helper
 */
class DataPlugin
{
    /**
     * @var ThemeOptionsHelper
     */
    protected $_themeOptionsHelper;

    /**
     * @var ColorSchemeHelper
     */
    protected $_colorSchemeHelper;

    /**
     * DataPlugin constructor.
     *
     * @param ThemeOptionsHelper $themeOptionsHelper
     * @param ColorSchemeHelper  $colorSchemeHelper
     */
    public function __construct(
        ThemeOptionsHelper $themeOptionsHelper,
        ColorSchemeHelper $colorSchemeHelper
    )
    {
        $this->_themeOptionsHelper = $themeOptionsHelper;
        $this->_colorSchemeHelper = $colorSchemeHelper;
    }

    /**
     * After get color schemes method plugin.
     *
     * @param LayoutSwitcherHelper $subject
     * @param array|null           $result
     *
     * @return mixed
     */
    public function afterGetColorSchemes(LayoutSwitcherHelper $subject, $result)
    {
        return $result ?: $this->_colorSchemeHelper->getColorSchemes();
    }

}