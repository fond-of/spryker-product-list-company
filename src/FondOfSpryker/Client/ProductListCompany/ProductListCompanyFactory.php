<?php

namespace FondOfSpryker\Client\ProductListCompany;

use FondOfSpryker\Client\ProductListCompany\Dependency\Client\ProductListCompanyToZedRequestClientInterface;
use FondOfSpryker\Client\ProductListCompany\Zed\ProductListCompanyStub;
use FondOfSpryker\Client\ProductListCompany\Zed\ProductListCompanyStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class ProductListCompanyFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\ProductListCompany\Zed\ProductListCompanyStubInterface
     */
    public function createZedProductListCompanyStub(): ProductListCompanyStubInterface
    {
        return new ProductListCompanyStub($this->getZedRequestClient());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Client\ProductListCompany\Dependency\Client\ProductListCompanyToZedRequestClientInterface
     */
    protected function getZedRequestClient(): ProductListCompanyToZedRequestClientInterface
    {
        return $this->getProvidedDependency(ProductListCompanyDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
