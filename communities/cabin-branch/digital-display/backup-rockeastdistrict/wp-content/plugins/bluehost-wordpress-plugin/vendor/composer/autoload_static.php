<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2c72d531d1150c242b5160e9eca49d5
{
    public static $files = array (
        '637fa4e5a9fe2956d844ead1daab0f31' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-business-reviews/bootstrap.php',
        '0774e44945781cd5a8d0b0dc32f80615' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-gutenframe/bootstrap.php',
        '0a7ee76a6dd15c6349ed695bd3b2a987' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-loader/module-loader.php',
        '6e09b332987211bb2939025b3ed3c51b' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-sso/bootstrap.php',
        'b62570ec8ed5d9ce1990d98269e51fa3' => __DIR__ . '/..' . '/endurance/wp-module-data/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wpscholar\\' => 10,
        ),
        'W' => 
        array (
            'WP_Forge\\Helpers\\' => 17,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'N' => 
        array (
            'Newfold\\Plugin\\' => 15,
        ),
        'E' => 
        array (
            'Endurance_WP_Plugin_Updater\\' => 28,
            'Endurance\\WP\\Module\\Data\\' => 25,
        ),
        'D' => 
        array (
            'Doctrine\\Inflector\\' => 19,
            'Doctrine\\Common\\Inflector\\' => 26,
        ),
        'B' => 
        array (
            'Bluehost\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wpscholar\\' => 
        array (
            0 => __DIR__ . '/..' . '/wpscholar/collection',
            1 => __DIR__ . '/..' . '/wpscholar/url',
        ),
        'WP_Forge\\Helpers\\' => 
        array (
            0 => __DIR__ . '/..' . '/wp-forge/helpers/includes',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Newfold\\Plugin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Endurance_WP_Plugin_Updater\\' => 
        array (
            0 => __DIR__ . '/..' . '/bluehost/endurance-wp-plugin-updater',
        ),
        'Endurance\\WP\\Module\\Data\\' => 
        array (
            0 => __DIR__ . '/..' . '/endurance/wp-module-data/src',
        ),
        'Doctrine\\Inflector\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector',
        ),
        'Doctrine\\Common\\Inflector\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Common/Inflector',
        ),
        'Bluehost\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static $classMap = array (
        'Bluehost\\AccessToken' => __DIR__ . '/../..' . '/inc/AccessToken.php',
        'Bluehost\\AdminBar' => __DIR__ . '/../..' . '/inc/AdminBar.php',
        'Bluehost\\BuildAssets' => __DIR__ . '/../..' . '/inc/BuildAssets.php',
        'Bluehost\\LoginRedirect' => __DIR__ . '/../..' . '/inc/LoginRedirect.php',
        'Bluehost\\Notifications\\AdminNotices' => __DIR__ . '/../..' . '/inc/Notifications/AdminNotices.php',
        'Bluehost\\Notifications\\Notification' => __DIR__ . '/../..' . '/inc/Notifications/Notification.php',
        'Bluehost\\Notifications\\NotificationsApi' => __DIR__ . '/../..' . '/inc/Notifications/NotificationsApi.php',
        'Bluehost\\Notifications\\NotificationsRepository' => __DIR__ . '/../..' . '/inc/Notifications/NotificationsRepository.php',
        'Bluehost\\ResponseUtilities' => __DIR__ . '/../..' . '/inc/ResponseUtilities.php',
        'Bluehost\\RestApi\\AdminErrorController' => __DIR__ . '/../..' . '/inc/RestApi/AdminErrorController.php',
        'Bluehost\\RestApi\\BluehostBlogController' => __DIR__ . '/../..' . '/inc/RestApi/BluehostBlogController.php',
        'Bluehost\\RestApi\\CachingController' => __DIR__ . '/../..' . '/inc/RestApi/CachingController.php',
        'Bluehost\\RestApi\\MojoItemController' => __DIR__ . '/../..' . '/inc/RestApi/MojoItemController.php',
        'Bluehost\\RestApi\\MojoItemsController' => __DIR__ . '/../..' . '/inc/RestApi/MojoItemsController.php',
        'Bluehost\\RestApi\\MojoPluginsController' => __DIR__ . '/../..' . '/inc/RestApi/MojoPluginsController.php',
        'Bluehost\\RestApi\\MojoServicesController' => __DIR__ . '/../..' . '/inc/RestApi/MojoServicesController.php',
        'Bluehost\\RestApi\\MojoThemesController' => __DIR__ . '/../..' . '/inc/RestApi/MojoThemesController.php',
        'Bluehost\\RestApi\\SettingsController' => __DIR__ . '/../..' . '/inc/RestApi/SettingsController.php',
        'Bluehost\\RestApi\\StagingController' => __DIR__ . '/../..' . '/inc/RestApi/StagingController.php',
        'Bluehost\\SiteMeta' => __DIR__ . '/../..' . '/inc/SiteMeta.php',
        'Bluehost\\Staging' => __DIR__ . '/../..' . '/inc/Staging.php',
        'Bluehost\\UpgradeHandler' => __DIR__ . '/../..' . '/inc/UpgradeHandler.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Doctrine\\Common\\Inflector\\Inflector' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Common/Inflector/Inflector.php',
        'Doctrine\\Inflector\\CachedWordInflector' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/CachedWordInflector.php',
        'Doctrine\\Inflector\\GenericLanguageInflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/GenericLanguageInflectorFactory.php',
        'Doctrine\\Inflector\\Inflector' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Inflector.php',
        'Doctrine\\Inflector\\InflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/InflectorFactory.php',
        'Doctrine\\Inflector\\Language' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Language.php',
        'Doctrine\\Inflector\\LanguageInflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/LanguageInflectorFactory.php',
        'Doctrine\\Inflector\\NoopWordInflector' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/NoopWordInflector.php',
        'Doctrine\\Inflector\\Rules\\English\\Inflectible' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/English/Inflectible.php',
        'Doctrine\\Inflector\\Rules\\English\\InflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/English/InflectorFactory.php',
        'Doctrine\\Inflector\\Rules\\English\\Rules' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/English/Rules.php',
        'Doctrine\\Inflector\\Rules\\English\\Uninflected' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/English/Uninflected.php',
        'Doctrine\\Inflector\\Rules\\French\\Inflectible' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/French/Inflectible.php',
        'Doctrine\\Inflector\\Rules\\French\\InflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/French/InflectorFactory.php',
        'Doctrine\\Inflector\\Rules\\French\\Rules' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/French/Rules.php',
        'Doctrine\\Inflector\\Rules\\French\\Uninflected' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/French/Uninflected.php',
        'Doctrine\\Inflector\\Rules\\NorwegianBokmal\\Inflectible' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/NorwegianBokmal/Inflectible.php',
        'Doctrine\\Inflector\\Rules\\NorwegianBokmal\\InflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/NorwegianBokmal/InflectorFactory.php',
        'Doctrine\\Inflector\\Rules\\NorwegianBokmal\\Rules' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/NorwegianBokmal/Rules.php',
        'Doctrine\\Inflector\\Rules\\NorwegianBokmal\\Uninflected' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/NorwegianBokmal/Uninflected.php',
        'Doctrine\\Inflector\\Rules\\Pattern' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Pattern.php',
        'Doctrine\\Inflector\\Rules\\Patterns' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Patterns.php',
        'Doctrine\\Inflector\\Rules\\Portuguese\\Inflectible' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Portuguese/Inflectible.php',
        'Doctrine\\Inflector\\Rules\\Portuguese\\InflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Portuguese/InflectorFactory.php',
        'Doctrine\\Inflector\\Rules\\Portuguese\\Rules' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Portuguese/Rules.php',
        'Doctrine\\Inflector\\Rules\\Portuguese\\Uninflected' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Portuguese/Uninflected.php',
        'Doctrine\\Inflector\\Rules\\Ruleset' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Ruleset.php',
        'Doctrine\\Inflector\\Rules\\Spanish\\Inflectible' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Spanish/Inflectible.php',
        'Doctrine\\Inflector\\Rules\\Spanish\\InflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Spanish/InflectorFactory.php',
        'Doctrine\\Inflector\\Rules\\Spanish\\Rules' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Spanish/Rules.php',
        'Doctrine\\Inflector\\Rules\\Spanish\\Uninflected' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Spanish/Uninflected.php',
        'Doctrine\\Inflector\\Rules\\Substitution' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Substitution.php',
        'Doctrine\\Inflector\\Rules\\Substitutions' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Substitutions.php',
        'Doctrine\\Inflector\\Rules\\Transformation' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Transformation.php',
        'Doctrine\\Inflector\\Rules\\Transformations' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Transformations.php',
        'Doctrine\\Inflector\\Rules\\Turkish\\Inflectible' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Turkish/Inflectible.php',
        'Doctrine\\Inflector\\Rules\\Turkish\\InflectorFactory' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Turkish/InflectorFactory.php',
        'Doctrine\\Inflector\\Rules\\Turkish\\Rules' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Turkish/Rules.php',
        'Doctrine\\Inflector\\Rules\\Turkish\\Uninflected' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Turkish/Uninflected.php',
        'Doctrine\\Inflector\\Rules\\Word' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/Rules/Word.php',
        'Doctrine\\Inflector\\RulesetInflector' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/RulesetInflector.php',
        'Doctrine\\Inflector\\WordInflector' => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector/WordInflector.php',
        'EIG_Module_Gutenframe' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-gutenframe/src/class-eig-module-gutenframe.php',
        'Endurance\\WP\\Module\\Data\\API\\Events' => __DIR__ . '/..' . '/endurance/wp-module-data/src/API/Events.php',
        'Endurance\\WP\\Module\\Data\\API\\Verify' => __DIR__ . '/..' . '/endurance/wp-module-data/src/API/Verify.php',
        'Endurance\\WP\\Module\\Data\\Data' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Data.php',
        'Endurance\\WP\\Module\\Data\\Encryption' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Encryption.php',
        'Endurance\\WP\\Module\\Data\\Event' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Event.php',
        'Endurance\\WP\\Module\\Data\\EventManager' => __DIR__ . '/..' . '/endurance/wp-module-data/src/EventManager.php',
        'Endurance\\WP\\Module\\Data\\HubConnection' => __DIR__ . '/..' . '/endurance/wp-module-data/src/HubConnection.php',
        'Endurance\\WP\\Module\\Data\\Listeners\\Admin' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Listeners/Admin.php',
        'Endurance\\WP\\Module\\Data\\Listeners\\BHPlugin' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Listeners/BHPlugin.php',
        'Endurance\\WP\\Module\\Data\\Listeners\\Content' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Listeners/Content.php',
        'Endurance\\WP\\Module\\Data\\Listeners\\Cron' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Listeners/Cron.php',
        'Endurance\\WP\\Module\\Data\\Listeners\\Jetpack' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Listeners/Jetpack.php',
        'Endurance\\WP\\Module\\Data\\Listeners\\Listener' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Listeners/Listener.php',
        'Endurance\\WP\\Module\\Data\\Listeners\\Plugin' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Listeners/Plugin.php',
        'Endurance\\WP\\Module\\Data\\Listeners\\Theme' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Listeners/Theme.php',
        'Endurance\\WP\\Module\\Data\\Logger' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Logger.php',
        'Endurance\\WP\\Module\\Data\\SubscriberInterface' => __DIR__ . '/..' . '/endurance/wp-module-data/src/SubscriberInterface.php',
        'Endurance\\WP\\Module\\Data\\Transient' => __DIR__ . '/..' . '/endurance/wp-module-data/src/Transient.php',
        'Endurance_Collection' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-loader/includes/Collection.php',
        'Endurance_ModuleManager' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-loader/includes/ModuleManager.php',
        'Endurance_ModuleRegistry' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-loader/includes/ModuleRegistry.php',
        'Endurance_Options' => __DIR__ . '/..' . '/bluehost/endurance-wp-module-loader/includes/Options.php',
        'Endurance_WP_Plugin_Updater\\Plugin' => __DIR__ . '/..' . '/bluehost/endurance-wp-plugin-updater/Plugin.php',
        'Endurance_WP_Plugin_Updater\\Updater' => __DIR__ . '/..' . '/bluehost/endurance-wp-plugin-updater/Updater.php',
        'Newfold\\Plugin\\DefaultContent\\Pages' => __DIR__ . '/../..' . '/inc/DefaultContent/Pages.php',
        'Newfold\\Plugin\\DefaultContent\\PagesRestController' => __DIR__ . '/../..' . '/inc/DefaultContent/PagesRestController.php',
        'Newfold\\Plugin\\RestApi\\BaseHiiveController' => __DIR__ . '/../..' . '/inc/RestApi/BaseHiiveController.php',
        'Newfold\\Plugin\\Tours\\BlockEditor' => __DIR__ . '/../..' . '/inc/Tours/BlockEditor.php',
        'Newfold\\Plugin\\Tours\\BlockEditorRestController' => __DIR__ . '/../..' . '/inc/Tours/BlockEditorRestController.php',
        'Newfold\\Plugin\\Tours\\Customizer' => __DIR__ . '/../..' . '/inc/Tours/Customizer.php',
        'Newfold\\Plugin\\Tours\\Shared' => __DIR__ . '/../..' . '/inc/Tours/Shared.php',
        'Pimple\\Container' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Container.php',
        'Pimple\\Exception\\ExpectedInvokableException' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Exception/ExpectedInvokableException.php',
        'Pimple\\Exception\\FrozenServiceException' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Exception/FrozenServiceException.php',
        'Pimple\\Exception\\InvalidServiceIdentifierException' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Exception/InvalidServiceIdentifierException.php',
        'Pimple\\Exception\\UnknownIdentifierException' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Exception/UnknownIdentifierException.php',
        'Pimple\\Psr11\\Container' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Psr11/Container.php',
        'Pimple\\Psr11\\ServiceLocator' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Psr11/ServiceLocator.php',
        'Pimple\\ServiceIterator' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/ServiceIterator.php',
        'Pimple\\ServiceProviderInterface' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/ServiceProviderInterface.php',
        'Pimple\\Tests\\Fixtures\\Invokable' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/Fixtures/Invokable.php',
        'Pimple\\Tests\\Fixtures\\NonInvokable' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/Fixtures/NonInvokable.php',
        'Pimple\\Tests\\Fixtures\\PimpleServiceProvider' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/Fixtures/PimpleServiceProvider.php',
        'Pimple\\Tests\\Fixtures\\Service' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/Fixtures/Service.php',
        'Pimple\\Tests\\PimpleServiceProviderInterfaceTest' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/PimpleServiceProviderInterfaceTest.php',
        'Pimple\\Tests\\PimpleTest' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/PimpleTest.php',
        'Pimple\\Tests\\Psr11\\ContainerTest' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/Psr11/ContainerTest.php',
        'Pimple\\Tests\\Psr11\\ServiceLocatorTest' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/Psr11/ServiceLocatorTest.php',
        'Pimple\\Tests\\ServiceIteratorTest' => __DIR__ . '/..' . '/pimple/pimple/src/Pimple/Tests/ServiceIteratorTest.php',
        'Psr\\Container\\ContainerExceptionInterface' => __DIR__ . '/..' . '/psr/container/src/ContainerExceptionInterface.php',
        'Psr\\Container\\ContainerInterface' => __DIR__ . '/..' . '/psr/container/src/ContainerInterface.php',
        'Psr\\Container\\NotFoundExceptionInterface' => __DIR__ . '/..' . '/psr/container/src/NotFoundExceptionInterface.php',
        'WP_Forge\\Helpers\\Arr' => __DIR__ . '/..' . '/wp-forge/helpers/includes/Arr.php',
        'WP_Forge\\Helpers\\Pluralizer' => __DIR__ . '/..' . '/wp-forge/helpers/includes/Pluralizer.php',
        'WP_Forge\\Helpers\\Str' => __DIR__ . '/..' . '/wp-forge/helpers/includes/Str.php',
        'wpscholar\\Collection' => __DIR__ . '/..' . '/wpscholar/collection/Collection.php',
        'wpscholar\\Url' => __DIR__ . '/..' . '/wpscholar/url/Url.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2c72d531d1150c242b5160e9eca49d5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2c72d531d1150c242b5160e9eca49d5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite2c72d531d1150c242b5160e9eca49d5::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite2c72d531d1150c242b5160e9eca49d5::$classMap;

        }, null, ClassLoader::class);
    }
}
