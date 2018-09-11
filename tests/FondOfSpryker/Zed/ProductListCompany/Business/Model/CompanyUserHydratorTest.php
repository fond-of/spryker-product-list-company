<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyUserTransfer;

class CompanyUserHydratorTest extends Unit
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
     * @var \Generated\Shared\Transfer\CompanyUserTransfer
     */
    protected $companyUserTransfer;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\CompanyUserHydratorInterface
     */
    protected $customerExpander;

    /**
     * @var \Generated\Shared\Transfer\CompanyTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $companyMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyMock = $this->getMockBuilder('\Generated\Shared\Transfer\CompanyTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListReaderMock = $this->getMockForAbstractClass(ProductListReaderInterface::class);

        $this->productListsMock = [
            $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
                ->disableOriginalConstructor()
                ->setMethods(['getType', 'getIdProductList'])
                ->getMock(),
            $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
                ->disableOriginalConstructor()
                ->setMethods(['getType', 'getIdProductList'])
                ->getMock(),
        ];

        $this->productListCollectionTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCollectionTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['getProductLists'])
            ->getMock();

        $this->companyUserTransfer = new CompanyUserTransfer();

        $this->companyUserTransfer->setCompany($this->companyMock);

        $this->customerExpander = new CompanyUserHydrator($this->productListReaderMock);
    }

    /**
     * @return void
     */
    public function testHydrateCompanyUserTransferWithProductListIds(): void
    {
        $this->productListReaderMock->expects($this->atLeastOnce())
            ->method('getProductListCollectionByIdCompanyId')
            ->with($this->companyMock)
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

        $this->customerExpander->hydrateCompanyUserTransferWithProductListIds($this->companyUserTransfer);
    }
}
