<?php

namespace FondOfSpryker\Zed\ProductListCompany\Persistence;

use FondOfSpryker\Zed\ProductListCompany\Persistence\Propel\Mapper\ProductListCompanyMapper;
use FondOfSpryker\Zed\ProductListCompany\Persistence\Propel\Mapper\ProductListCompanyMapperInterface;
use FondOfSpryker\Zed\ProductListCompany\ProductListCompanyDependencyProvider;
use Orm\Zed\ProductList\Persistence\SpyProductListCompanyQuery;
use Orm\Zed\ProductList\Persistence\SpyProductListQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\ProductListCompanyConfig getConfig()
 */
class ProductListCompanyPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\ProductList\Persistence\SpyProductListQuery
     */
    public function getProductListQuery(): SpyProductListQuery
    {
        return $this->getProvidedDependency(ProductListCompanyDependencyProvider::PROPEL_QUERY_PRODUCT_LIST);
    }

    /**
     * @return \Orm\Zed\ProductList\Persistence\SpyProductListCompanyQuery
     */
    public function createProductListCompanyQuery(): SpyProductListCompanyQuery
    {
        return SpyProductListCompanyQuery::create();
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCompany\Persistence\Propel\Mapper\ProductListCompanyMapperInterface
     */
    public function createProductListCompanyMapper(): ProductListCompanyMapperInterface
    {
        return new ProductListCompanyMapper();
    }
}
