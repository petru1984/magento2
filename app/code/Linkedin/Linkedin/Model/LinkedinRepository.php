<?php
/**
 * Copyright © Zaharia Petru All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Linkedin\Linkedin\Model;

use Linkedin\Linkedin\Api\Data\LinkedinInterfaceFactory;
use Linkedin\Linkedin\Api\Data\LinkedinSearchResultsInterfaceFactory;
use Linkedin\Linkedin\Api\LinkedinRepositoryInterface;
use Linkedin\Linkedin\Model\ResourceModel\Linkedin as ResourceLinkedin;
use Linkedin\Linkedin\Model\ResourceModel\Linkedin\CollectionFactory as LinkedinCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class LinkedinRepository implements LinkedinRepositoryInterface
{

    protected $resource;

    protected $linkedinFactory;

    protected $linkedinCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataLinkedinFactory;

    protected $extensionAttributesJoinProcessor;

    private $storeManager;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceLinkedin $resource
     * @param LinkedinFactory $linkedinFactory
     * @param LinkedinInterfaceFactory $dataLinkedinFactory
     * @param LinkedinCollectionFactory $linkedinCollectionFactory
     * @param LinkedinSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceLinkedin $resource,
        LinkedinFactory $linkedinFactory,
        LinkedinInterfaceFactory $dataLinkedinFactory,
        LinkedinCollectionFactory $linkedinCollectionFactory,
        LinkedinSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->linkedinFactory = $linkedinFactory;
        $this->linkedinCollectionFactory = $linkedinCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataLinkedinFactory = $dataLinkedinFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Linkedin\Linkedin\Api\Data\LinkedinInterface $linkedin
    ) {
        /* if (empty($linkedin->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $linkedin->setStoreId($storeId);
        } */
        
        $linkedinData = $this->extensibleDataObjectConverter->toNestedArray(
            $linkedin,
            [],
            \Linkedin\Linkedin\Api\Data\LinkedinInterface::class
        );
        
        $linkedinModel = $this->linkedinFactory->create()->setData($linkedinData);
        
        try {
            $this->resource->save($linkedinModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the linkedin: %1',
                $exception->getMessage()
            ));
        }
        return $linkedinModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($linkedinId)
    {
        $linkedin = $this->linkedinFactory->create();
        $this->resource->load($linkedin, $linkedinId);
        if (!$linkedin->getId()) {
            throw new NoSuchEntityException(__('linkedin with id "%1" does not exist.', $linkedinId));
        }
        return $linkedin->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->linkedinCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Linkedin\Linkedin\Api\Data\LinkedinInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Linkedin\Linkedin\Api\Data\LinkedinInterface $linkedin
    ) {
        try {
            $linkedinModel = $this->linkedinFactory->create();
            $this->resource->load($linkedinModel, $linkedin->getLinkedinId());
            $this->resource->delete($linkedinModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the linkedin: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($linkedinId)
    {
        return $this->delete($this->get($linkedinId));
    }
}

