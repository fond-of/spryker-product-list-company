<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReader;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationWriter;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListReader;
use FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListTransferExpander;
use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManager;
use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepository;
use FondOfSpryker\Zed\ProductListCompany\ProductListCompanyDependencyProvider;
use FondOfSpryker\Zed\ProductListCompanyExtension\Dependency\Plugin\ProductListCompanyPostSavePluginInterface;
use Spryker\Zed\Kernel\Container;

class ProductListCompanyBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyBusinessFactory
     */
    protected $productListCompanyBusinessFactory;

    /**
     * @var \Spryker\Zed\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $containerMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepository|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $repositoryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManager|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $entityManagerMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompanyExtension\Dependency\Plugin\ProductListCompanyPostSavePluginInterface[]|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCompanyPostSavePluginMocks;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->repositoryMock = $this->getMockBuilder(ProductListCompanyRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->entityManagerMock = $this->getMockBuilder(ProductListCompanyEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompanyPostSavePluginMocks = [
            $this->getMockBuilder(ProductListCompanyPostSavePluginInterface::class)
                ->disableOriginalConstructor()
                ->getMock(),
        ];

        $this->productListCompanyBusinessFactory = new ProductListCompanyBusinessFactory();

        $this->productListCompanyBusinessFactory->setRepository($this->repositoryMock);
        $this->productListCompanyBusinessFactory->setEntityManager($this->entityManagerMock);
        $this->productListCompanyBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateProductListReader(): void
    {
        $productListReader = $this->productListCompanyBusinessFactory->createProductListReader();
        $this->assertInstanceOf(ProductListReader::class, $productListReader);
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
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->with(ProductListCompanyDependencyProvider::PLUGINS_PRODUCT_LIST_COMPANY_RELATION_POST_SAVE)
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(ProductListCompanyDependencyProvider::PLUGINS_PRODUCT_LIST_COMPANY_RELATION_POST_SAVE)
            ->willReturn($this->productListCompanyPostSavePluginMocks);

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
