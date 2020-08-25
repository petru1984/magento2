<?php
/**
 * Copyright © Zaharia Petru All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Linkedin\Linkedin\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface LinkedinRepositoryInterface
{

    /**
     * Save linkedin
     * @param \Linkedin\Linkedin\Api\Data\LinkedinInterface $linkedin
     * @return \Linkedin\Linkedin\Api\Data\LinkedinInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Linkedin\Linkedin\Api\Data\LinkedinInterface $linkedin
    );

    /**
     * Retrieve linkedin
     * @param string $linkedinId
     * @return \Linkedin\Linkedin\Api\Data\LinkedinInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($linkedinId);

    /**
     * Retrieve linkedin matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Linkedin\Linkedin\Api\Data\LinkedinSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete linkedin
     * @param \Linkedin\Linkedin\Api\Data\LinkedinInterface $linkedin
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Linkedin\Linkedin\Api\Data\LinkedinInterface $linkedin
    );

    /**
     * Delete linkedin by ID
     * @param string $linkedinId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($linkedinId);
}

