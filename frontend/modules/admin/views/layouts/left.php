<?php
    use Yii;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl() ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => Yii::t('app', 'Menu'), 'options' => ['class' => 'header']],
                    ['label' => Yii::t('app', 'Admin Panel'), 'icon' => 'home', 'url' => ['/admin/main/index']],
	                ['label' => Yii::t('app', 'Productions'), 'icon' => 'calculator', 'url' => ['/admin/category/index']],
                    ['label' => Yii::t('app', 'Gallery'), 'icon' => 'file-image-o', 'url' => ['/admin/gallery/index']],
                    ['label' => Yii::t('app', 'Articles'), 'icon' => 'dashboard', 'url' => ['/admin/article/index']],
//                    ['label' => 'Orders', 'icon' => 'user', 'url' => ['/admin/order/index'], 'visible' => Yii::$app->user->can("admin")],
                    ['label' => Yii::t('app', 'Requests'), 'icon' => 'envelope', 'url' => ['/admin/request/index']],
	                ['label' => Yii::t('app', 'For dealers'), 'icon' => 'address-card-o', 'url' => ['/admin/dealers/index']],
                    ['label' => Yii::t('app', 'Users'), 'icon' => 'user', 'url' => ['/admin/users/index'], 'visible' => Yii::$app->user->can("admin")],
                    [
                        'label' => Yii::t('app', 'Shop'),
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app', 'Product'), 'icon' => 'file-code-o', 'url' => ['/admin/product/index'],],
                            ['label' => Yii::t('app', 'Orders'), 'icon' => 'dashboard', 'url' => ['/admin/order/index'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
