<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface;

class ProductListReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyRepositoryMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCollectionTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCollectionTransferMock;

    /**
     * @var \Generated\Shared\Transfer\CompanyTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $companyTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReaderInterface
     */
    protected $productListReader;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListCompanyRepositoryMock = $this->getMockForAbstractClass(ProductListCompanyRepositoryInterface::class);

        $this->companyTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\CompanyTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['requireIdCompany', 'getIdCompany'])
            ->getMock();

        $this->productListCollectionTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCollectionTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListReader = new ProductListReader($this->productListCompanyRepositoryMock);
    }

    /**
     * @return void
     */
    public function testGetProductListCollectionByIdCompanyId(): void
    {
        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('requireIdCompany');

        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('getIdCompany')
            ->willReturn(1);

        $this->productListCompanyRepositoryMock->expects($this->atLeastOnce())
            ->method('getProductListCollectionByIdCompany')
            ->with(1)
            ->willReturn($this->productListCollectionTransferMock);

        $productListCollectionTransfer = $this->productListReader->getProductListCollectionByIdCompanyId($this->companyTransferMock);

        $this->assertEquals($this->productListCollectionTransferMock, $productListCollectionTransfer);
    }
}
