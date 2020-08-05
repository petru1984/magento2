<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\LoginAsCustomerAssistance\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\LoginAsCustomerAssistance\Api\ConfigInterface;

/**
 * @inheritdoc
 */
class Config implements ConfigInterface
{
    /**
     * Extension config path
     */
    private const XML_PATH_SHOPPING_ASSISTANCE_CHECKBOX_TITLE
        = 'login_as_customer/general/shopping_assistance_checkbox_title';
    private const XML_PATH_SHOPPING_ASSISTANCE_CHECKBOX_TOOLTIP
        = 'login_as_customer/general/shopping_assistance_checkbox_tooltip';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheritdoc
     */
    public function getShoppingAssistanceCheckboxTitle(): string
    {
        return (string)$this->scopeConfig->getValue(self::XML_PATH_SHOPPING_ASSISTANCE_CHECKBOX_TITLE);
    }

    /**
     * @inheritdoc
     */
    public function getShoppingAssistanceCheckboxTooltip(): string
    {
        return (string)$this->scopeConfig->getValue(self::XML_PATH_SHOPPING_ASSISTANCE_CHECKBOX_TOOLTIP);
    }
}
