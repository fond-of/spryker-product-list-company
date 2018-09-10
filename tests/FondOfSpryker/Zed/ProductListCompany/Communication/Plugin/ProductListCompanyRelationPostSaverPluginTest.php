<?php

namespace FondOfSpryker\Zed\ProductListCompany\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacade;

class ProductListCompanyRelationPostSaverPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Communication\Plugin\ProductListCompanyRelationPostSaverPlugin
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

        $this->productListTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['getProductListCompanyRelation', 'getIdProductList', 'setProductListCompanyRelation'])
            ->getMock();

        $this->productListCompanyRelationTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCompanyRelationTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['setIdProductList'])
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
            ->method('setProductListCompanyRelationTransferMock');

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
            ->method('setProductListCompanyRelationTransferMock');

        $productListTransferMock = $this->productListCompanyRelationPostSaverPlugin->postSave($this->productListTransferMock);

        $this->assertEquals($this->productListTransferMock, $productListTransferMock);
    }
}
