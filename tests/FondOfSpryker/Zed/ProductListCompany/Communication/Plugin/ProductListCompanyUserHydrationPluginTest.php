<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade;

class ProductListCompanyUserHydrationPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\ProductListCompanyUserHydrationPlugin
     */
    protected $productListCompanyUserHydrationPlugin;

    /**
     * @var \Generated\Shared\Transfer\CompanyUserTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $companyUserTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyFacade;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyUserTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\CompanyUserTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyFacade = $this->getMockBuilder(ProductListCompanyFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyUserHydrationPlugin = new ProductListCompanyUserHydrationPlugin();

        $this->productListCompanyUserHydrationPlugin->setFacade($this->productListCompanyFacade);
    }

    /**
     * @return void
     */
    public function testHydrateTransfer(): void
    {
        $this->productListCompanyFacade->expects($this->atLeastOnce())
            ->method('hydrateCompanyUserWithProductListIds')
            ->with($this->companyUserTransferMock)
            ->willReturn($this->companyUserTransferMock);

        $companyUserTransfer = $this->productListCompanyUserHydrationPlugin->hydrate($this->companyUserTransferMock);

        $this->assertEquals($this->companyUserTransferMock, $companyUserTransfer);
    }
}
