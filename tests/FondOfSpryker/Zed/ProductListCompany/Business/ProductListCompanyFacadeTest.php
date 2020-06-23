<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriter;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListTransferExpander;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListCompanyFacadeTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\CustomerExpander|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerExpanderMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyBusinessFactory|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyBusinessFactoryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyFacadeInterface
     */
    protected $productListCompanyFacade;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriter|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyRelationWriterMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCompanyRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyRelationTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListTransferExpanderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferExpander;

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

        $this->productListCompanyRelationWriterMock = $this->getMockBuilder(ProductListCompanyRelationWriter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderMock = $this->getMockBuilder(CustomerExpander::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListTransferExpander = $this->getMockBuilder(ProductListTransferExpander::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyBusinessFactoryMock = $this->getMockBuilder(ProductListCompanyBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyFacade = new ProductListCompanyFacade();

        $this->productListCompanyFacade->setFactory($this->productListCompanyBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithProductListIds(): void
    {
        $this->productListCompanyBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderMock);

        $this->customerExpanderMock->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithProductListIds')
            ->willReturn($this->customerTransferMock);

        $actualCustomerTransfer = $this->productListCompanyFacade->expandCustomerTransferWithProductListIds($this->customerTransferMock);

        $this->assertEquals($this->customerTransferMock, $actualCustomerTransfer);
    }

    /**
     * @return void
     */
    public function testSaveProductListCompanyRelation(): void
    {
        $this->productListCompanyBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createProductListCompanyRelationWriter')
            ->willReturn($this->productListCompanyRelationWriterMock);

        $this->productListCompanyRelationWriterMock->expects($this->atLeastOnce())
            ->method('saveProductListCompanyRelation')
            ->with($this->productListCompanyRelationTransferMock)
            ->willReturn($this->productListCompanyRelationTransferMock);

        $productListCompanyRelationTransfer = $this->productListCompanyFacade->saveProductListCompanyRelation($this->productListCompanyRelationTransferMock);

        $this->assertEquals($this->productListCompanyRelationTransferMock, $productListCompanyRelationTransfer);
    }

    /**
     * @return void
     */
    public function testDeleteProductListCompanyRelation(): void
    {
        $this->productListCompanyBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createProductListCompanyRelationWriter')
            ->willReturn($this->productListCompanyRelationWriterMock);

        $this->productListCompanyRelationWriterMock->expects($this->atLeastOnce())
            ->method('deleteProductListCompanyRelation')
            ->with($this->productListTransferMock);

        $this->productListCompanyFacade->deleteProductListCompanyRelation($this->productListTransferMock);
    }

    /**
     * @return void
     */
    public function testExpandProductListTransferWithProductListCompanyRelationTransfer(): void
    {
        $this->productListCompanyBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createProductListTransferExpander')
            ->willReturn($this->productListTransferExpander);

        $this->productListTransferExpander->expects($this->atLeastOnce())
            ->method('expandWithProductListCompanyRelationTransfer')
            ->with($this->productListTransferMock)
            ->willReturn($this->productListTransferMock);

        $actualProductList = $this->productListCompanyFacade
            ->expandProductListTransferWithProductListCompanyRelationTransfer($this->productListTransferMock);

        $this->assertEquals($actualProductList, $this->productListTransferMock);
    }
}
