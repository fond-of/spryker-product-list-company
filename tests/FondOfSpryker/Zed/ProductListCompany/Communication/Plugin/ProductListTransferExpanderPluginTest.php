<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade;

class ProductListTransferExpanderPluginTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\CompanyProductListTransferExpanderPlugin
     */
    protected $productListTransferExpanderPlugin;

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

        $this->productListTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyFacade = $this->getMockBuilder(ProductListCompanyFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListTransferExpanderPlugin = new CompanyProductListTransferExpanderPlugin();

        $this->productListTransferExpanderPlugin->setFacade($this->productListCompanyFacade);
    }

    /**
     * @return void
     */
    public function testExpandTransfer(): void
    {
        $this->productListCompanyFacade->expects($this->atLeastOnce())
            ->method('expandProductListTransferWithProductListCompanyRelationTransfer')
            ->with($this->productListTransferMock)
            ->willReturn($this->productListTransferMock);

        $actualProductListTransfer = $this->productListTransferExpanderPlugin
            ->expandTransfer($this->productListTransferMock);

        $this->assertEquals($this->productListTransferMock, $actualProductListTransfer);
    }
}
