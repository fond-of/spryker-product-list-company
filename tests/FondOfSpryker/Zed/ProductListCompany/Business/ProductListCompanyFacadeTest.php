<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\CompanyUserHydrator;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriter;

class ProductListCompanyFacadeTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\CompanyUserTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $companyUserTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\CompanyUserHydrator|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $companyUserHydratorMock;

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
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyRelationTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCompanyRelationTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyRelationWriterMock = $this->getMockBuilder(ProductListCompanyRelationWriter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\CompanyUserTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserHydratorMock = $this->getMockBuilder(CompanyUserHydrator::class)
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
    public function testHydrateCompanyUserWithProductListIds(): void
    {
        $this->productListCompanyBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyExpander')
            ->willReturn($this->companyUserHydratorMock);

        $this->companyUserHydratorMock->expects($this->atLeastOnce())
            ->method('expandCompanyTransferWithProductListIds')
            ->willReturn($this->companyUserTransferMock);

        $actualCompanyTransfer = $this->productListCompanyFacade->hydrateCompanyUserWithProductListIds($this->companyUserTransferMock);

        $this->assertEquals($this->companyUserTransferMock, $actualCompanyTransfer);
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
}
