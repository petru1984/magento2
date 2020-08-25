<?php
/**
 * Copyright © Zaharia Petru All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Linkedin\Linkedin\Model\ResourceModel\Linkedin;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'linkedin_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Linkedin\Linkedin\Model\Linkedin::class,
            \Linkedin\Linkedin\Model\ResourceModel\Linkedin::class
        );
    }
}

