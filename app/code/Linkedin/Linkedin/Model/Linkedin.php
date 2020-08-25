<?php
/**
 * Copyright © Zaharia Petru All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Linkedin\Linkedin\Model;

use Linkedin\Linkedin\Api\Data\LinkedinInterface;
use Linkedin\Linkedin\Api\Data\LinkedinInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Linkedin extends \Magento\Framework\Model\AbstractModel
{

    protected $linkedinDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'linkedin_linkedin_linkedin';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param LinkedinInterfaceFactory $linkedinDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Linkedin\Linkedin\Model\ResourceModel\Linkedin $resource
     * @param \Linkedin\Linkedin\Model\ResourceModel\Linkedin\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        LinkedinInterfaceFactory $linkedinDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Linkedin\Linkedin\Model\ResourceModel\Linkedin $resource,
        \Linkedin\Linkedin\Model\ResourceModel\Linkedin\Collection $resourceCollection,
        array $data = []
    ) {
        $this->linkedinDataFactory = $linkedinDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve linkedin model with linkedin data
     * @return LinkedinInterface
     */
    public function getDataModel()
    {
        $linkedinData = $this->getData();
        
        $linkedinDataObject = $this->linkedinDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $linkedinDataObject,
            $linkedinData,
            LinkedinInterface::class
        );
        
        return $linkedinDataObject;
    }
}

