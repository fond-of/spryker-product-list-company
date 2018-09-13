<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 */
class CustomerTransfer extends AbstractTransfer
{
    public const CUSTOMER_PRODUCT_LIST_COLLECTION = 'customerProductListCollection';

    public const COMPANY_USER_TRANSFER = 'companyUserTransfer';

    /**
     * @var \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null
     */
    protected $customerProductListCollection;

    /**
     * @var \Generated\Shared\Transfer\CompanyUserTransfer|null
     */
    protected $companyUserTransfer;

    /**
     * @var array
     */
    protected $transferPropertyNameMap = [
        'customer_product_list_collection' => 'customerProductListCollection',
        'customerProductListCollection' => 'customerProductListCollection',
        'CustomerProductListCollection' => 'customerProductListCollection',
        'company_user_transfer' => 'companyUserTransfer',
        'companyUserTransfer' => 'companyUserTransfer',
        'CompanyUserTransfer' => 'companyUserTransfer',
    ];

    /**
     * @var array
     */
    protected $transferMetadata = [
        self::CUSTOMER_PRODUCT_LIST_COLLECTION => [
            'type' => 'Generated\Shared\Transfer\CustomerProductListCollectionTransfer',
            'name_underscore' => 'customer_product_list_collection',
            'is_collection' => false,
            'is_transfer' => true,
        ],
        self::COMPANY_USER_TRANSFER => [
            'type' => 'Generated\Shared\Transfer\CompanyUserTransfer',
            'name_underscore' => 'company_user_transfer',
            'is_collection' => false,
            'is_transfer' => true,
        ],
    ];

    /**
     * @module ProductList
     *
     * @param \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null $customerProductListCollection
     *
     * @return $this
     */
    public function setCustomerProductListCollection(?CustomerProductListCollectionTransfer $customerProductListCollection = null)
    {
        $this->customerProductListCollection = $customerProductListCollection;
        $this->modifiedProperties[self::CUSTOMER_PRODUCT_LIST_COLLECTION] = true;

        return $this;
    }

    /**
     * @module ProductList
     *
     * @return \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null
     */
    public function getCustomerProductListCollection()
    {
        return $this->customerProductListCollection;
    }

    /**
     * @module ProductList
     *
     * @return $this
     */
    public function requireCustomerProductListCollection()
    {
        $this->assertPropertyIsSet(self::CUSTOMER_PRODUCT_LIST_COLLECTION);

        return $this;
    }

    /**
     * @module BusinessOnBehalf|CompanyUserInvitation|CompanyUser|PersistentCart|Quote
     *
     * @param \Generated\Shared\Transfer\CompanyUserTransfer|null $companyUserTransfer
     *
     * @return $this
     */
    public function setCompanyUserTransfer(?CompanyUserTransfer $companyUserTransfer = null)
    {
        $this->companyUserTransfer = $companyUserTransfer;
        $this->modifiedProperties[self::COMPANY_USER_TRANSFER] = true;

        return $this;
    }

    /**
     * @module BusinessOnBehalf|CompanyUserInvitation|CompanyUser|PersistentCart|Quote
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer|null
     */
    public function getCompanyUserTransfer()
    {
        return $this->companyUserTransfer;
    }

    /**
     * @module BusinessOnBehalf|CompanyUserInvitation|CompanyUser|PersistentCart|Quote
     *
     * @return $this
     */
    public function requireCompanyUserTransfer()
    {
        $this->assertPropertyIsSet(self::COMPANY_USER_TRANSFER);

        return $this;
    }
}
