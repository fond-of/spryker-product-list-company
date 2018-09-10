<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface;

class ProductListCompanyRelationReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyRepositoryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReader
     */
    protected $productListCompanyRelationReader;

    /**
     * @var \Generated\Shared\Transfer\ProductListCompanyRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyRelationTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListCompanyRelationTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCompanyRelationTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['requireIdProductList', 'getIdProductList', 'setCompanyIds'])
            ->getMock();

        $this->productListCompanyRepositoryMock = $this->getMockForAbstractClass(ProductListCompanyRepositoryInterface::class);

        $this->productListCompanyRelationReader = new ProductListCompanyRelationReader($this->productListCompanyRepositoryMock);
    }

    /**
     * @return void
     */
    public function testGetProductListCompanyRelation(): void
    {
        $idProductList = 1;
        $companyIds = [1, 2, 3];

        $this->productListCompanyRelationTransferMock->expects($this->atLeastOnce())
            ->method('requireIdProductList');

        $this->productListCompanyRelationTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn($idProductList);

        $this->productListCompanyRelationTransferMock->expects($this->atLeastOnce())
            ->method('setCompanyIds')
            ->with($companyIds);

        $this->productListCompanyRepositoryMock->expects($this->atLeastOnce())
            ->method('getRelatedCompanyIdsByIdProductList')
            ->with($idProductList)
            ->willReturn($companyIds);

        $this->productListCompanyRelationReader->getProductListCompanyRelation($this->productListCompanyRelationTransferMock);
    }
}
