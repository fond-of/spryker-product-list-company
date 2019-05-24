<?php

namespace FondOfSpryker\Zed\ProductListCompany\Business;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Generated\Shared\Transfer\ProductListCompanyRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\ProductListCompany\Business\ProductListCompanyBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyEntityManagerInterface getEntityManager()
 * @method \FondOfSpryker\Zed\ProductListCompany\Persistence\ProductListCompanyRepositoryInterface getRepository()
 */
class ProductListCompanyFacade extends AbstractFacade implements ProductListCompanyFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFactory()
            ->createCustomerExpander()
            ->expandCustomerTransferWithProductListIds($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCompanyRelationTransfer
     */
    public function saveProductListCompanyRelation(
        ProductListCompanyRelationTransfer $productListCompanyRelationTransfer
    ): ProductListCompanyRelationTransfer {
        return $this->getFactory()->createProductListCompanyRelationWriter()
            ->saveProductListCompanyRelation($productListCompanyRelationTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCompanyRelation(
        ProductListTransfer $productListTransfer
    ): void {
        $this->getFactory()->createProductListCompanyRelationWriter()
            ->deleteProductListCompanyRelation($productListTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function expandProductListTransferWithProductListCompanyRelationTransfer(
        ProductListTransfer $productListTransfer
    ): ProductListTransfer {
        $productListTransfer = $this->getFactory()->createProductListTransferExpander()
            ->expandWithProductListCompanyRelationTransfer($productListTransfer);

        return $productListTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCompanyId(CompanyTransfer $companyTransfer): ProductListCollectionTransfer
    {
        return $this->getFactory()->createProductListReader()->getProductListCollectionByIdCompanyId($companyTransfer);
    }
}
