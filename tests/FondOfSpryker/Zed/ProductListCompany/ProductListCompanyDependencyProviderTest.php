<?php

namespace FondOfSpryker\Zed\ProductListCompany;

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
            ->setMethodsExcept(['factory', 'set', 'offsetSet', 'get', 'offsetGet'])
            ->getMock();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $container = $this->productListCompanyDependencyProvider->provideBusinessLayerDependencies($this->containerMock);

        $this->assertEquals($this->containerMock, $container);
        $this->assertIsArray($container[ProductListCompanyDependencyProvider::PLUGINS_PRODUCT_LIST_COMPANY_RELATION_POST_SAVE]);
        $this->assertCount(0, $container[ProductListCompanyDependencyProvider::PLUGINS_PRODUCT_LIST_COMPANY_RELATION_POST_SAVE]);
    }
}
