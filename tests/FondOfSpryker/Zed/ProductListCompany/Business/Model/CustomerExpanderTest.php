<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer[]|\PHPUnit\Framework\MockObject\MockObject[]
     */
    protected $productListsMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReaderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListReaderMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCollectionTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCollectionTransferMock;

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransfer;

    /**
     * @var \Generated\Shared\Transfer\CompanyUserTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $companyUserTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\CustomerExpanderInterface
     */
    protected $customerExpander;

    /**
     * @var \Generated\Shared\Transfer\CompanyTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $companyTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->customerTransfer = new CustomerTransfer();

        $this->companyUserTransferMock = $this->getMockBuilder(CompanyUserTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListReaderMock = $this->getMockBuilder(ProductListReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListsMock = [
            $this->getMockBuilder(ProductListTransfer::class)
                ->disableOriginalConstructor()
                ->getMock(),
            $this->getMockBuilder(ProductListTransfer::class)
                ->disableOriginalConstructor()
                ->getMock(),
        ];

        $this->productListCollectionTransferMock = $this->getMockBuilder(ProductListCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpander = new CustomerExpander($this->productListReaderMock);
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithProductListIds(): void
    {
        $this->customerTransfer->setCompanyUserTransfer($this->companyUserTransferMock);

        $this->companyUserTransferMock->expects($this->atLeastOnce())
            ->method('getCompany')
            ->willReturn($this->companyTransferMock);

        $this->productListReaderMock->expects($this->atLeastOnce())
            ->method('getProductListCollectionByIdCompanyId')
            ->with($this->companyTransferMock)
            ->willReturn($this->productListCollectionTransferMock);

        $this->productListCollectionTransferMock->expects($this->atLeastOnce())
            ->method('getProductLists')
            ->willReturn($this->productListsMock);

        $this->productListsMock[0]->expects($this->atLeastOnce())
            ->method('getType')
            ->willReturn('whitelist');

        $this->productListsMock[0]->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn(1);

        $this->productListsMock[1]->expects($this->atLeastOnce())
            ->method('getType')
            ->willReturn('blacklist');

        $this->productListsMock[1]->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn(2);

        $this->customerExpander->expandCustomerTransferWithProductListIds($this->customerTransfer);
    }
}
