<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListCompanyRelationPreDeleterPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\ProductListCompanyRelationPreDeleterPlugin
     */
    protected $productListCompanyRelationPreDeleterPlugin;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyFacadeMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListTransferMock = $this->getMockBuilder(ProductListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyRelationTransferMock = $this->getMockBuilder(ProductListCompanyRelationTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyFacadeMock = $this->getMockBuilder(ProductListCompanyFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyRelationPreDeleterPlugin = new ProductListCompanyRelationPreDeleterPlugin();

        $this->productListCompanyRelationPreDeleterPlugin->setFacade($this->productListCompanyFacadeMock);
    }

    /**
     * @return void
     */
    public function testPreDelete(): void
    {
        $this->productListCompanyFacadeMock->expects($this->atLeastOnce())
            ->method('deleteProductListCompanyRelation')
            ->with($this->productListTransferMock);

        $this->productListCompanyRelationPreDeleterPlugin->preDelete($this->productListTransferMock);
    }
}
