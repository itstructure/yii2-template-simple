<?php

namespace app\traits;

use Yii;
use Itstructure\AdminModule\components\AdminView;

/**
 * Class AdminBeforeActionTrait
 *
 * @property AdminView $view
 *
 * @package app\traits
 */
trait AdminBeforeActionTrait
{
    /**
     * @var array
     */
    private $neighborControllers = [
        'profiles' => 'roles',
        'roles' => 'permissions',
    ];

    /**
     * @param \yii\base\Action $action
     *
     * @return bool
     */
    public function beforeAction($action)
    {
        $this->view->mainMenuConfig = require __DIR__ . '/../config/admin/main-menu.php';

        $this->view->profileLink = '/admin/users/view?id='.Yii::$app->getUser()->id;

        $this->urlPrefix = '/' . $this->module->id . '/' . $action->controller->id . '/';

        if (array_key_exists($action->controller->id, $this->neighborControllers)) {
            $this->urlPrefixNeighbor = '/' . $this->module->id . '/' . $this->neighborControllers[$action->controller->id] . '/';
        }

        return parent::beforeAction($action);
    }
}