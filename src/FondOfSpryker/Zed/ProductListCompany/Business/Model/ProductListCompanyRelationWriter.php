<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business\Model;

use FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManagerInterface;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Persistence\EntityManager\TransactionTrait;

class ProductListCompanyRelationWriter implements ProductListCompanyRelationWriterInterface
{
    use TransactionTrait;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManagerInterface
     */
    protected $productListCompanyEntityManager;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompanyExtension\Dependency\Plugin\ProductListCompanyPostSavePluginInterface[]
     */
    protected $productListCompanyRelationsPostSavePlugins;

    /**
     * @var \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReaderInterface
     */
    protected $productListCompanyRelationReader;

    /**
     * @param \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManagerInterface $productListCompanyEntityManager
     * @param \FondOfSpryker\Zed\ProductListCompany\Business\Model\ProductListCompanyRelationReaderInterface $productListCompanyRelationReader
     * @param \FondOfSpryker\Zed\ProductListCompanyExtension\Dependency\Plugin\ProductListCompanyPostSavePluginInterface[] $productListCompanyRelationsPostSavePlugins
     */
    public function __construct(
        ProductListCompanyEntityManagerInterface $productListCompanyEntityManager,
        ProductListCompanyRelationReaderInterface $productListCompanyRelationReader,
        array $productListCompanyRelationsPostSavePlugins
    ) {
        $this->productListCompanyEntityManager = $productListCompanyEntityManager;
        $this->productListCompanyRelationReader = $productListCompanyRelationReader;
        $this->productListCompanyRelationsPostSavePlugins = $productListCompanyRelationsPostSavePlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    public function saveProductListCompanyRelation(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer {
        return $this->getTransactionHandler()->handleTransaction(
            function () use ($productListCompanyRelationTransfer) {
                return $this->executeSaveProductListCompanyRelationTransaction($productListCompanyRelationTransfer);
            }
        );
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    protected function executeSaveProductListCompanyRelationTransaction(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer {
        $productListCompanyRelationTransfer->requireIdProductList();
        $idProductList = $productListCompanyRelationTransfer->getIdProductList();

        $requestedCompanyIds = $this->getRequestedCompanyIds($productListCompanyRelationTransfer);
        $relatedCompanyIds = $this->getRelatedCompanyIds($productListCompanyRelationTransfer);

        $saveCompanyIds = array_diff($requestedCompanyIds, $relatedCompanyIds);
        $deleteCompanyIds = array_diff($relatedCompanyIds, $requestedCompanyIds);

        $this->productListCompanyEntityManager->addCompanyRelations($idProductList, $saveCompanyIds);
        $this->productListCompanyEntityManager->removeCompanyRelations($idProductList, $deleteCompanyIds);

        $productListCompanyRelationTransfer->setCompanyIds(
            $this->getRelatedCompanyIds($productListCompanyRelationTransfer)
        );

        $productListCompanyRelationTransfer = $this->executeProductListCompanyPostSavePlugins($productListCompanyRelationTransfer);

        return $productListCompanyRelationTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return int[]
     */
    protected function getRelatedCompanyIds(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): array {
        $currentProductListCompanyRelationTransfer = $this->productListCompanyRelationReader
            ->getProductListCompanyRelation($productListCompanyRelationTransfer);

        return $currentProductListCompanyRelationTransfer->getCompanyIds();
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return int[]
     */
    protected function getRequestedCompanyIds(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): array {
        return $productListCompanyRelationTransfer->getCompanyIds();
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCompanyRelation(ProductListTransfer $productListTransfer): void
    {
        $this->productListCompanyEntityManager->deleteProductListCompanyRelations($productListTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    protected function executeProductListCompanyPostSavePlugins(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer {

        foreach ($this->productListCompanyRelationsPostSavePlugins as $productListCompanyPostSavePlugin) {
            $productListCompanyRelationTransfer = $productListCompanyPostSavePlugin->postSave($productListCompanyRelationTransfer);
        }

        return $productListCompanyRelationTransfer;
    }
}
