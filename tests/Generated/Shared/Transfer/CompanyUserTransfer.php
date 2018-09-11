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
class CompanyUserTransfer extends AbstractTransfer
{
    const PRODUCT_LIST_COLLECTION = 'productListCollection';

    const COMPANY_BUSINESS_UNIT = 'companyBusinessUnit';

    const COMPANY = 'company';

    const IS_DEFAULT = 'isDefault';

    const FK_COMPANY_BUSINESS_UNIT = 'fkCompanyBusinessUnit';

    const ID_COMPANY_USER = 'idCompanyUser';

    const COMPANY_ROLE_COLLECTION = 'companyRoleCollection';

    const FK_COMPANY = 'fkCompany';

    const FK_CUSTOMER = 'fkCustomer';

    const CUSTOMER = 'customer';

    /**
     * @var \Generated\Shared\Transfer\CompanyUserProductListCollectionTransfer|null
     */
    protected $productListCollection;

    /**
     * @var \Generated\Shared\Transfer\CompanyBusinessUnitTransfer|null
     */
    protected $companyBusinessUnit;

    /**
     * @var \Generated\Shared\Transfer\CompanyTransfer|null
     */
    protected $company;

    /**
     * @var bool|null
     */
    protected $isDefault;

    /**
     * @var int|null
     */
    protected $fkCompanyBusinessUnit;

    /**
     * @var int|null
     */
    protected $idCompanyUser;

    /**
     * @var \Generated\Shared\Transfer\CompanyRoleCollectionTransfer|null
     */
    protected $companyRoleCollection;

    /**
     * @var int|null
     */
    protected $fkCompany;

    /**
     * @var int|null
     */
    protected $fkCustomer;

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer|null
     */
    protected $customer;

    /**
     * @var array
     */
    protected $transferPropertyNameMap = [
        'product_list_collection' => 'productListCollection',
        'productListCollection' => 'productListCollection',
        'ProductListCollection' => 'productListCollection',
        'company_business_unit' => 'companyBusinessUnit',
        'companyBusinessUnit' => 'companyBusinessUnit',
        'CompanyBusinessUnit' => 'companyBusinessUnit',
        'company' => 'company',
        'Company' => 'company',
        'is_default' => 'isDefault',
        'isDefault' => 'isDefault',
        'IsDefault' => 'isDefault',
        'fk_company_business_unit' => 'fkCompanyBusinessUnit',
        'fkCompanyBusinessUnit' => 'fkCompanyBusinessUnit',
        'FkCompanyBusinessUnit' => 'fkCompanyBusinessUnit',
        'id_company_user' => 'idCompanyUser',
        'idCompanyUser' => 'idCompanyUser',
        'IdCompanyUser' => 'idCompanyUser',
        'company_role_collection' => 'companyRoleCollection',
        'companyRoleCollection' => 'companyRoleCollection',
        'CompanyRoleCollection' => 'companyRoleCollection',
        'fk_company' => 'fkCompany',
        'fkCompany' => 'fkCompany',
        'FkCompany' => 'fkCompany',
        'fk_customer' => 'fkCustomer',
        'fkCustomer' => 'fkCustomer',
        'FkCustomer' => 'fkCustomer',
        'customer' => 'customer',
        'Customer' => 'customer',
    ];

    /**
     * @var array
     */
    protected $transferMetadata = [
        self::PRODUCT_LIST_COLLECTION => [
            'type' => 'Generated\Shared\Transfer\CompanyUserProductListCollectionTransfer',
            'name_underscore' => 'product_list_collection',
            'is_collection' => false,
            'is_transfer' => true,
        ],
        self::COMPANY_BUSINESS_UNIT => [
            'type' => 'Generated\Shared\Transfer\CompanyBusinessUnitTransfer',
            'name_underscore' => 'company_business_unit',
            'is_collection' => false,
            'is_transfer' => true,
        ],
        self::COMPANY => [
            'type' => 'Generated\Shared\Transfer\CompanyTransfer',
            'name_underscore' => 'company',
            'is_collection' => false,
            'is_transfer' => true,
        ],
        self::IS_DEFAULT => [
            'type' => 'bool',
            'name_underscore' => 'is_default',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::FK_COMPANY_BUSINESS_UNIT => [
            'type' => 'int',
            'name_underscore' => 'fk_company_business_unit',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::ID_COMPANY_USER => [
            'type' => 'int',
            'name_underscore' => 'id_company_user',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::COMPANY_ROLE_COLLECTION => [
            'type' => 'Generated\Shared\Transfer\CompanyRoleCollectionTransfer',
            'name_underscore' => 'company_role_collection',
            'is_collection' => false,
            'is_transfer' => true,
        ],
        self::FK_COMPANY => [
            'type' => 'int',
            'name_underscore' => 'fk_company',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::FK_CUSTOMER => [
            'type' => 'int',
            'name_underscore' => 'fk_customer',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::CUSTOMER => [
            'type' => 'Generated\Shared\Transfer\CustomerTransfer',
            'name_underscore' => 'customer',
            'is_collection' => false,
            'is_transfer' => true,
        ],
    ];

    /**
     * @module ProductList
     *
     * @param \Generated\Shared\Transfer\CompanyUserProductListCollectionTransfer|null $productListCollection
     *
     * @return $this
     */
    public function setProductListCollection(CompanyUserProductListCollectionTransfer $productListCollection = null)
    {
        $this->productListCollection = $productListCollection;
        $this->modifiedProperties[self::PRODUCT_LIST_COLLECTION] = true;

        return $this;
    }

    /**
     * @module ProductList
     *
     * @return \Generated\Shared\Transfer\CompanyUserProductListCollectionTransfer|null
     */
    public function getProductListCollection()
    {
        return $this->productListCollection;
    }

    /**
     * @module ProductList
     *
     * @return $this
     */
    public function requireProductListCollection()
    {
        $this->assertPropertyIsSet(self::PRODUCT_LIST_COLLECTION);

        return $this;
    }

    /**
     * @module BusinessOnBehalf|CompanyBusinessUnit
     *
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer|null $companyBusinessUnit
     *
     * @return $this
     */
    public function setCompanyBusinessUnit(CompanyBusinessUnitTransfer $companyBusinessUnit = null)
    {
        $this->companyBusinessUnit = $companyBusinessUnit;
        $this->modifiedProperties[self::COMPANY_BUSINESS_UNIT] = true;

        return $this;
    }

    /**
     * @module BusinessOnBehalf|CompanyBusinessUnit
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer|null
     */
    public function getCompanyBusinessUnit()
    {
        return $this->companyBusinessUnit;
    }

    /**
     * @module BusinessOnBehalf|CompanyBusinessUnit
     *
     * @return $this
     */
    public function requireCompanyBusinessUnit()
    {
        $this->assertPropertyIsSet(self::COMPANY_BUSINESS_UNIT);

        return $this;
    }

    /**
     * @module BusinessOnBehalf|CompanyUser
     *
     * @param \Generated\Shared\Transfer\CompanyTransfer|null $company
     *
     * @return $this
     */
    public function setCompany(CompanyTransfer $company = null)
    {
        $this->company = $company;
        $this->modifiedProperties[self::COMPANY] = true;

        return $this;
    }

    /**
     * @module BusinessOnBehalf|CompanyUser
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @module BusinessOnBehalf|CompanyUser
     *
     * @return $this
     */
    public function requireCompany()
    {
        $this->assertPropertyIsSet(self::COMPANY);

        return $this;
    }

    /**
     * @module BusinessOnBehalf
     *
     * @param bool|null $isDefault
     *
     * @return $this
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
        $this->modifiedProperties[self::IS_DEFAULT] = true;

        return $this;
    }

    /**
     * @module BusinessOnBehalf
     *
     * @return bool|null
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @module BusinessOnBehalf
     *
     * @return $this
     */
    public function requireIsDefault()
    {
        $this->assertPropertyIsSet(self::IS_DEFAULT);

        return $this;
    }

    /**
     * @module CompanyBusinessUnit
     *
     * @param int|null $fkCompanyBusinessUnit
     *
     * @return $this
     */
    public function setFkCompanyBusinessUnit($fkCompanyBusinessUnit)
    {
        $this->fkCompanyBusinessUnit = $fkCompanyBusinessUnit;
        $this->modifiedProperties[self::FK_COMPANY_BUSINESS_UNIT] = true;

        return $this;
    }

    /**
     * @module CompanyBusinessUnit
     *
     * @return int|null
     */
    public function getFkCompanyBusinessUnit()
    {
        return $this->fkCompanyBusinessUnit;
    }

    /**
     * @module CompanyBusinessUnit
     *
     * @return $this
     */
    public function requireFkCompanyBusinessUnit()
    {
        $this->assertPropertyIsSet(self::FK_COMPANY_BUSINESS_UNIT);

        return $this;
    }

    /**
     * @module CompanyRole|CompanyUserInvitation|CompanyUser|PersistentCart|Quote
     *
     * @param int|null $idCompanyUser
     *
     * @return $this
     */
    public function setIdCompanyUser($idCompanyUser)
    {
        $this->idCompanyUser = $idCompanyUser;
        $this->modifiedProperties[self::ID_COMPANY_USER] = true;

        return $this;
    }

    /**
     * @module CompanyRole|CompanyUserInvitation|CompanyUser|PersistentCart|Quote
     *
     * @return int|null
     */
    public function getIdCompanyUser()
    {
        return $this->idCompanyUser;
    }

    /**
     * @module CompanyRole|CompanyUserInvitation|CompanyUser|PersistentCart|Quote
     *
     * @return $this
     */
    public function requireIdCompanyUser()
    {
        $this->assertPropertyIsSet(self::ID_COMPANY_USER);

        return $this;
    }

    /**
     * @module CompanyRole
     *
     * @param \Generated\Shared\Transfer\CompanyRoleCollectionTransfer|null $companyRoleCollection
     *
     * @return $this
     */
    public function setCompanyRoleCollection(CompanyRoleCollectionTransfer $companyRoleCollection = null)
    {
        $this->companyRoleCollection = $companyRoleCollection;
        $this->modifiedProperties[self::COMPANY_ROLE_COLLECTION] = true;

        return $this;
    }

    /**
     * @module CompanyRole
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer|null
     */
    public function getCompanyRoleCollection()
    {
        return $this->companyRoleCollection;
    }

    /**
     * @module CompanyRole
     *
     * @return $this
     */
    public function requireCompanyRoleCollection()
    {
        $this->assertPropertyIsSet(self::COMPANY_ROLE_COLLECTION);

        return $this;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @param int|null $fkCompany
     *
     * @return $this
     */
    public function setFkCompany($fkCompany)
    {
        $this->fkCompany = $fkCompany;
        $this->modifiedProperties[self::FK_COMPANY] = true;

        return $this;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @return int|null
     */
    public function getFkCompany()
    {
        return $this->fkCompany;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @return $this
     */
    public function requireFkCompany()
    {
        $this->assertPropertyIsSet(self::FK_COMPANY);

        return $this;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @param int|null $fkCustomer
     *
     * @return $this
     */
    public function setFkCustomer($fkCustomer)
    {
        $this->fkCustomer = $fkCustomer;
        $this->modifiedProperties[self::FK_CUSTOMER] = true;

        return $this;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @return int|null
     */
    public function getFkCustomer()
    {
        return $this->fkCustomer;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @return $this
     */
    public function requireFkCustomer()
    {
        $this->assertPropertyIsSet(self::FK_CUSTOMER);

        return $this;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer|null $customer
     *
     * @return $this
     */
    public function setCustomer(CustomerTransfer $customer = null)
    {
        $this->customer = $customer;
        $this->modifiedProperties[self::CUSTOMER] = true;

        return $this;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer|null
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @module CompanyUserInvitation|CompanyUser
     *
     * @return $this
     */
    public function requireCustomer()
    {
        $this->assertPropertyIsSet(self::CUSTOMER);

        return $this;
    }
}
