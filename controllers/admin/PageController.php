<?php

namespace app\controllers\admin;

use app\models\{Page, PageSearch};
use app\traits\{AdminBeforeActionTrait, AccessTrait};
use Itstructure\MFUploader\models\album\Album;
use Itstructure\AdminModule\controllers\CommonAdminController;

/**
 * Class PageController
 * PageController implements the CRUD actions for Page model.
 *
 * @package app\controllers\admin
 */
class PageController extends CommonAdminController
{
    use AdminBeforeActionTrait, AccessTrait;

    /**
     * @return mixed|string
     */
    public function actionIndex()
    {
        if (!$this->checkAccessToIndex()) {
            return $this->accessError();
        }

        return parent::actionIndex();
    }

    /**
     * @param int|string $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        if (!$this->checkAccessToView()) {
            return $this->accessError();
        }

        return parent::actionView($id);
    }

    /**
     * @return mixed|string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (!$this->checkAccessToCreate()) {
            return $this->accessError();
        }

        return parent::actionCreate();
    }

    /**
     * @param int|string $id
     *
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        if (!$this->checkAccessToUpdate()) {
            return $this->accessError();
        }

        return parent::actionUpdate($id);
    }

    /**
     * @param int|string $id
     *
     * @return mixed|\yii\web\Response
     */
    public function actionDelete($id)
    {
        if (!$this->checkAccessToDelete()) {
            return $this->accessError();
        }

        return parent::actionDelete($id);
    }

    /**
     * Get addition fields for the view template.
     * @return array
     */
    protected function getAdditionFields(): array
    {
        if ($this->action->id == 'create' || $this->action->id == 'update') {
            return [
                'pages' => Page::getMenu(),
                'albums' => Album::find()->select([
                    'id', 'title'
                ])->all()
            ];
        }

        return $this->additionFields;
    }

    /**
     * Returns Page model name.
     *
     * @return string
     */
    protected function getModelName():string
    {
        return Page::class;
    }

    /**
     * Returns PageSearch model name.
     *
     * @return string
     */
    protected function getSearchModelName():string
    {
        return PageSearch::class;
    }
}
