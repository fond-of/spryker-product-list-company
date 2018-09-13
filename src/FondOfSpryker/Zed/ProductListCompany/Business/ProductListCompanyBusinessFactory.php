<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business;

use FondOfSpryker\Zed\ProductListCompany\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\CustomerExpanderInterface;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReader;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReaderInterface;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriter;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriterInterface;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReader;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\ProductListCompanyConfig getConfig()
 * @method \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManagerInterface getEntityManager()
 */
class ProductListCompanyBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReaderInterface
     */
    public function createProductListReader(): ProductListReaderInterface
    {
        return new ProductListReader($this->getRepository());
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCompany\Business\Model\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->createProductListReader());
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriterInterface
     */
    public function createProductListCompanyRelationWriter(): ProductListCompanyRelationWriterInterface
    {
        return new ProductListCompanyRelationWriter(
            $this->getEntityManager(),
            $this->createProductListCompanyRelationReader()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReaderInterface
     */
    public function createProductListCompanyRelationReader(): ProductListCompanyRelationReaderInterface
    {
        return new ProductListCompanyRelationReader($this->getRepository());
    }
}
