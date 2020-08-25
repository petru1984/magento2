<?php
/**
 * Copyright © Zaharia Petru All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Linkedin\Linkedin\Model\Data;

use Linkedin\Linkedin\Api\Data\LinkedinInterface;

class Linkedin extends \Magento\Framework\Api\AbstractExtensibleObject implements LinkedinInterface
{

    /**
     * Get linkedin_id
     * @return string|null
     */
    public function getLinkedinId()
    {
        return $this->_get(self::LINKEDIN_ID);
    }

    /**
     * Set linkedin_id
     * @param string $linkedinId
     * @return \Linkedin\Linkedin\Api\Data\LinkedinInterface
     */
    public function setLinkedinId($linkedinId)
    {
        return $this->setData(self::LINKEDIN_ID, $linkedinId);
    }

    /**
     * Get linkedin
     * @return string|null
     */
    public function getLinkedin()
    {
        return $this->_get(self::LINKEDIN);
    }

    /**
     * Set linkedin
     * @param string $linkedin
     * @return \Linkedin\Linkedin\Api\Data\LinkedinInterface
     */
    public function setLinkedin($linkedin)
    {
        return $this->setData(self::LINKEDIN, $linkedin);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Linkedin\Linkedin\Api\Data\LinkedinExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Linkedin\Linkedin\Api\Data\LinkedinExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Linkedin\Linkedin\Api\Data\LinkedinExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}

