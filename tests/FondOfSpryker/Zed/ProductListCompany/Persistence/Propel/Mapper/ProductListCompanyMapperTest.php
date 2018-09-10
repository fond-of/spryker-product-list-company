<?php

namespace FondOfSpryker\Zed\ProductListCompany\Persistence\Mapper;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Persistence\Propel\Mapper\ProductListCompanyMapper;

class ProductListCompanyMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\Propel\Mapper\ProductListCompanyMapper
     */
    protected $productListCompanyMapper;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \Orm\Zed\ProductList\Persistence\SpyProductList|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $spyProductListTransfer;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListCompanyMapper = new ProductListCompanyMapper();

        $this->productListTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['fromArray'])
            ->getMock();

        $this->spyProductListTransfer = $this->getMockBuilder('\Orm\Zed\ProductList\Persistence\SpyProductList')
            ->disableOriginalConstructor()
            ->setMethods(['toArray'])
            ->getMock();
    }

    /**
     * @return void
     */
    public function testMapProductList(): void
    {
        $toArrayResult = [];

        $this->spyProductListTransfer->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn($toArrayResult);

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('fromArray')
            ->with($toArrayResult, true)
            ->willReturn($this->productListTransferMock);

        $productListTransfer = $this->productListCompanyMapper->mapProductList(
            $this->spyProductListTransfer,
            $this->productListTransferMock
        );

        $this->assertEquals($this->productListTransferMock, $productListTransfer);
    }
}
