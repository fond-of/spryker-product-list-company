<?php

namespace FondOfSpryker\Zed\ProductListCompany;

use Closure;
use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class ProductListCompanyDependencyProviderTest extends Unit
{
    /**
     * @var \Spryker\Zed\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject|null
     */
    protected $containerMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\ProductListCompanyDependencyProvider
     */
    protected $productListCompanyDependencyProvider;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListCompanyDependencyProvider = new ProductListCompanyDependencyProvider();
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return void
     */
    public function testProvidePersistenceLayerDependencies(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('offsetSet')
            ->with(
                ProductListCompanyDependencyProvider::PROPEL_QUERY_PRODUCT_LIST,
                $this->isInstanceOf(Closure::class)
            );

        $this->productListCompanyDependencyProvider->providePersistenceLayerDependencies($this->containerMock);
    }
}
