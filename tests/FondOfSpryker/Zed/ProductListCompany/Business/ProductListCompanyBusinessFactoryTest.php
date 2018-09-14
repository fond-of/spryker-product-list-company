<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReader;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriter;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReaderInterface;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListTransferExpander;
use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManager;
use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepository;

class ProductListCompanyBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyBusinessFactory
     */
    protected $productListCompanyBusinessFactory;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepository|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $repositoryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManager|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $entityManagerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->repositoryMock = $this->getMockBuilder(ProductListCompanyRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->entityManagerMock = $this->getMockBuilder(ProductListCompanyEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyBusinessFactory = new ProductListCompanyBusinessFactory();

        $this->productListCompanyBusinessFactory->setRepository($this->repositoryMock);
        $this->productListCompanyBusinessFactory->setEntityManager($this->entityManagerMock);
    }

    /**
     * @return void
     */
    public function testCreateProductListReader(): void
    {
        $productListReader = $this->productListCompanyBusinessFactory->createProductListReader();
        $this->assertInstanceOf(ProductListReaderInterface::class, $productListReader);
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $customerExpander = $this->productListCompanyBusinessFactory->createCustomerExpander();
        $this->assertInstanceOf(CustomerExpander::class, $customerExpander);
    }

    /**
     * @return void
     */
    public function testCreateProductListTransferExpander(): void
    {
        $customerExpander = $this->productListCompanyBusinessFactory->createProductListTransferExpander();
        $this->assertInstanceOf(ProductListTransferExpander::class, $customerExpander);
    }

    /**
     * @return void
     */
    public function testCreateProductListCompanyRelationWriter(): void
    {
        $productListCompanyRelationWriter = $this->productListCompanyBusinessFactory
            ->createProductListCompanyRelationWriter();
        $this->assertInstanceOf(ProductListCompanyRelationWriter::class, $productListCompanyRelationWriter);
    }

    /**
     * @return void
     */
    public function testCreateProductListCompanyRelationReader(): void
    {
        $productListCompanyRelationReader = $this->productListCompanyBusinessFactory
            ->createProductListCompanyRelationReader();
        $this->assertInstanceOf(ProductListCompanyRelationReader::class, $productListCompanyRelationReader);
    }
}
