<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\LoginAsCustomerAssistance\Api;

/**
 * Get 'assistance_allowed' attribute from Customer.
 *
 * @api
 */
interface IsAssistanceEnabledInterface
{
    /**
     * Get 'assistance_allowed' attribute from Customer by id.
     *
     * @param int $customerId
     * @return bool
     */
    public function execute(int $customerId): bool;
}
