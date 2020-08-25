<?php
/**
 * Copyright © Zaharia Petru All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Linkedin\Linkedin\Api\Data;

interface LinkedinInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const LINKEDIN = 'linkedin';
    const LINKEDIN_ID = 'linkedin_id';

    /**
     * Get linkedin_id
     * @return string|null
     */
    public function getLinkedinId();

    /**
     * Set linkedin_id
     * @param string $linkedinId
     * @return \Linkedin\Linkedin\Api\Data\LinkedinInterface
     */
    public function setLinkedinId($linkedinId);

    /**
     * Get linkedin
     * @return string|null
     */
    public function getLinkedin();

    /**
     * Set linkedin
     * @param string $linkedin
     * @return \Linkedin\Linkedin\Api\Data\LinkedinInterface
     */
    public function setLinkedin($linkedin);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Linkedin\Linkedin\Api\Data\LinkedinExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Linkedin\Linkedin\Api\Data\LinkedinExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Linkedin\Linkedin\Api\Data\LinkedinExtensionInterface $extensionAttributes
    );
}

