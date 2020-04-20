<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\ProductList;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListCompanyRelationPostSaverPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\ProductList\ProductListCompanyRelationPostSaverPlugin
     */
    protected $productListCompanyRelationPostSaverPlugin;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyFacadeMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyRelationTransferMock;

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

        $this->productListCompanyRelationPostSaverPlugin = new ProductListCompanyRelationPostSaverPlugin();

        $this->productListCompanyRelationPostSaverPlugin->setFacade($this->productListCompanyFacadeMock);
    }

    /**
     * @return void
     */
    public function testPostSaveWithoutProductListCompanyRelation(): void
    {
        $productListId = 1;

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('getProductListCompanyRelation')
            ->willReturn(null);

        $this->productListCompanyRelationTransferMock->expects($this->never())
            ->method('setIdProductList')
            ->with($productListId);

        $this->productListTransferMock->expects($this->never())
            ->method('getIdProductList')
            ->willReturn($productListId);

        $this->productListCompanyFacadeMock->expects($this->never())
            ->method('saveProductListCompanyRelation')
            ->with($this->productListCompanyRelationTransferMock)
            ->willReturn($this->productListCompanyRelationTransferMock);

        $this->productListTransferMock->expects($this->never())
            ->method('setProductListCompanyRelation');

        $productListTransferMock = $this->productListCompanyRelationPostSaverPlugin->postSave($this->productListTransferMock);

        $this->assertEquals($this->productListTransferMock, $productListTransferMock);
    }

    /**
     * @return void
     */
    public function testPostSave(): void
    {
        $productListId = 1;

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('getProductListCompanyRelation')
            ->willReturn($this->productListCompanyRelationTransferMock);

        $this->productListCompanyRelationTransferMock->expects($this->atLeastOnce())
            ->method('setIdProductList')
            ->with($productListId);

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn($productListId);

        $this->productListCompanyFacadeMock->expects($this->atLeastOnce())
            ->method('saveProductListCompanyRelation')
            ->with($this->productListCompanyRelationTransferMock)
            ->willReturn($this->productListCompanyRelationTransferMock);

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('setProductListCompanyRelation');

        $productListTransferMock = $this->productListCompanyRelationPostSaverPlugin->postSave($this->productListTransferMock);

        $this->assertEquals($this->productListTransferMock, $productListTransferMock);
    }
}
