<?php
/**
 * Copyright © Zaharia Petru All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Linkedin\Linkedin\Api\Data;

interface LinkedinSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get linkedin list.
     * @return \Linkedin\Linkedin\Api\Data\LinkedinInterface[]
     */
    public function getItems();

    /**
     * Set linkedin list.
     * @param \Linkedin\Linkedin\Api\Data\LinkedinInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

