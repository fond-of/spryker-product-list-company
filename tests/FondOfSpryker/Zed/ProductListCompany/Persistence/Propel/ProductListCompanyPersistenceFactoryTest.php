<?php

namespace FondOfSpryker\Zed\ProductListCompany\Persistence\Propel;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyPersistenceFactory;
use FondOfSpryker\Zed\ProductListCompany\Persistence\Propel\Mapper\ProductListCompanyMapper;
use FondOfSpryker\Zed\ProductListCompany\ProductListCompanyDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductListCompanyPersistenceFactoryTest extends Unit
{
    /**
     * @var \Spryker\Zed\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $containerMock;

    /**
     * @var \Orm\Zed\ProductList\Persistence\SpyProductListQuery|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $spyProductListQueryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyPersistenceFactory
     */
    protected $productListCompanyPersistenceFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->spyProductListQueryMock = $this->getMockBuilder('\Orm\Zed\ProductList\Persistence\SpyProductListQuery')
            ->disableOriginalConstructor()
            ->getMock();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyPersistenceFactory = new ProductListCompanyPersistenceFactory();
        $this->productListCompanyPersistenceFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testGetProductListQuery(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('offsetGet')
            ->with(ProductListCompanyDependencyProvider::PROPEL_QUERY_PRODUCT_LIST)
            ->willReturn($this->spyProductListQueryMock);

        $productListQuery = $this->productListCompanyPersistenceFactory->getProductListQuery();

        $this->assertEquals($this->spyProductListQueryMock, $productListQuery);
    }

    /**
     * @return void
     */
    public function testCreateProductListCompanyMapper(): void
    {
        $productListCompanyMapper = $this->productListCompanyPersistenceFactory->createProductListCompanyMapper();

        $this->assertInstanceOf(ProductListCompanyMapper::class, $productListCompanyMapper);
    }
}
