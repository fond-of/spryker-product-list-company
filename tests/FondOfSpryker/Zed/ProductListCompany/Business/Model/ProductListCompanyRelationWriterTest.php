<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManagerInterface;
use FondOfSpryker\Zed\ProductListCompanyExtension\Dependency\Plugin\ProductListCompanyPostSavePluginInterface;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use ReflectionClass;
use ReflectionException;

class ProductListCompanyRelationWriterTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriter
     */
    protected $productListCompanyRelationWriter;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReaderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyRelationReaderMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManagerInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyEntityManagerMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCompanyRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyRelationTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCompanyRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $currentProductListCompanyRelationTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompanyExtension\Dependency\Plugin\ProductListCompanyPostSavePluginInterface[]|\PHPUnit\Framework\MockObject\MockObject[]
     */
    protected $productListCompanyPostSavePluginMocks;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListCompanyEntityManagerMock = $this->getMockBuilder(ProductListCompanyEntityManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyRelationReaderMock = $this->getMockBuilder(ProductListCompanyRelationReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyPostSavePluginMocks = [
            $this->getMockBuilder(ProductListCompanyPostSavePluginInterface::class)
                ->disableOriginalConstructor()
                ->getMock(),
        ];

        $this->productListTransferMock = $this->getMockBuilder(ProductListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyRelationTransferMock = $this->getMockBuilder(ProductListCompanyRelationTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->currentProductListCompanyRelationTransferMock = $this->getMockBuilder(ProductListCompanyRelationTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyRelationWriter = new ProductListCompanyRelationWriter(
            $this->productListCompanyEntityManagerMock,
            $this->productListCompanyRelationReaderMock,
            $this->productListCompanyPostSavePluginMocks
        );
    }

    /**
     * @return void
     */
    public function testDeleteProductListCompanyRelation(): void
    {
        $this->productListCompanyEntityManagerMock->expects($this->atLeastOnce())
            ->method('deleteProductListCompanyRelations')
            ->with($this->productListTransferMock);

        $this->productListCompanyRelationWriter->deleteProductListCompanyRelation($this->productListTransferMock);
    }

    /**
     * @return void
     */
    public function testExecuteSaveProductListCompanyRelationTransaction(): void
    {
        $productListId = 1;

        $relatedCompanyIds = [1, 2, 3];
        $requestedCompanyIds = [1, 3, 4];
        $saveCompanyIds = [2 => 4];
        $deleteCompanyIds = [1 => 2];
        $companyIds = [1, 3, 4];

        $this->productListCompanyRelationTransferMock->expects($this->atLeastOnce())
            ->method('requireIdProductList');

        $this->productListCompanyRelationTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn($productListId);

        $this->productListCompanyRelationReaderMock->expects($this->atLeastOnce())
            ->method('getProductListCompanyRelation')
            ->with($this->productListCompanyRelationTransferMock)
            ->willReturn($this->currentProductListCompanyRelationTransferMock);

        $this->currentProductListCompanyRelationTransferMock->expects($this->at(0))
            ->method('getCompanyIds')
            ->willReturn($relatedCompanyIds);

        $this->currentProductListCompanyRelationTransferMock->expects($this->at(1))
            ->method('getCompanyIds')
            ->willReturn($companyIds);

        $this->productListCompanyRelationTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyIds')
            ->willReturn($requestedCompanyIds);

        $this->productListCompanyEntityManagerMock->expects($this->atLeastOnce())
            ->method('addCompanyRelations')
            ->with($productListId, $saveCompanyIds);

        $this->productListCompanyEntityManagerMock->expects($this->atLeastOnce())
            ->method('removeCompanyRelations')
            ->with($productListId, $deleteCompanyIds);

        $this->productListCompanyRelationTransferMock->expects($this->atLeastOnce())
            ->method('setCompanyIds')
            ->with($companyIds)
            ->willReturn($this->productListCompanyRelationTransferMock);

        $this->productListCompanyPostSavePluginMocks[0]->expects($this->atLeastOnce())
            ->method('postSave')
            ->with($this->productListCompanyRelationTransferMock)
            ->willReturn($this->productListCompanyRelationTransferMock);

        try {
            $reflection = new ReflectionClass(get_class($this->productListCompanyRelationWriter));

            $method = $reflection->getMethod('executeSaveProductListCompanyRelationTransaction');
            $method->setAccessible(true);

            $method->invokeArgs($this->productListCompanyRelationWriter, [$this->productListCompanyRelationTransferMock]);
        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }
}
