<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade;

class ProductListCustomerTransferExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\ProductListCustomerTransferExpanderPlugin
     */
    protected $productListCustomerTransferExpander;

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyFacade;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->customerTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\CustomerTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyFacade = $this->getMockBuilder(ProductListCompanyFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerTransferExpander = new ProductListCustomerTransferExpanderPlugin();

        $this->productListCustomerTransferExpander->setFacade($this->productListCompanyFacade);
    }

    /**
     * @return void
     */
    public function testExpandTransfer(): void
    {
        $this->productListCompanyFacade->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithProductListIds')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $customerTransfer = $this->productListCustomerTransferExpander->expandTransfer($this->customerTransferMock);

        $this->assertEquals($this->customerTransferMock, $customerTransfer);
    }
}
