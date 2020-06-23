<?php

namespace FondOfSpryker\Zed\ProductListCompany;

use Orm\Zed\ProductList\Persistence\SpyProductListQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductListCompanyDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROPEL_QUERY_PRODUCT_LIST = 'PROPEL_QUERY_PRODUCT_LIST';
    public const PLUGINS_PRODUCT_LIST_COMPANY_RELATION_POST_SAVE = 'PLUGINS_PRODUCT_LIST_COMPANY_RELATION_POST_SAVE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);
        $container = $this->addProductListPropelQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addProductListCompanyPostSavePlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductListPropelQuery(Container $container): Container
    {
        $container[static::PROPEL_QUERY_PRODUCT_LIST] = static function () {
            return SpyProductListQuery::create();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductListCompanyPostSavePlugins(Container $container): Container
    {
        $self = $this;

        $container[static::PLUGINS_PRODUCT_LIST_COMPANY_RELATION_POST_SAVE] = static function () use ($self) {
            return $self->getProductListCompanyRelationPostSavePlugins();
        };

        return $container;
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCompanyExtension\Dependency\Plugin\ProductListCompanyPostSavePluginInterface[]
     */
    protected function getProductListCompanyRelationPostSavePlugins(): array
    {
        return [];
    }
}
