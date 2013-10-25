<?php


class FqntQuantityController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";
    public $scope = "crud";

public function filters()
{
return array(
'accessControl',
);
}

public function accessRules()
{
return array(
array(
'allow',
'actions' => array('create', 'editableSaver', 'update', 'delete', 'admin', 'view'),
'roles' => array('Finv.FqntQuantity.*'),
),
array(
'deny',
'users' => array('*'),
),
);
}

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }
        return true;
    }

    public function actionView($fqnt_id)
    {
        $model = $this->loadModel($fqnt_id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new FqntQuantity;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'fqnt-quantity-form');

        if (isset($_POST['FqntQuantity'])) {
            $model->attributes = $_POST['FqntQuantity'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'fqnt_id' => $model->fqnt_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('fqnt_id', $e->getMessage());
            }
        } elseif (isset($_GET['FqntQuantity'])) {
            $model->attributes = $_GET['FqntQuantity'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($fqnt_id)
    {
        $model = $this->loadModel($fqnt_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'fqnt-quantity-form');

        if (isset($_POST['FqntQuantity'])) {
            $model->attributes = $_POST['FqntQuantity'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'fqnt_id' => $model->fqnt_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('fqnt_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('FqntQuantity'); // classname of model to be updated
        $es->update();
    }

    public function actionDelete($fqnt_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($fqnt_id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!isset($_GET['ajax'])) {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        } else {
            throw new CHttpException(400, Yii::t('FinvModule.crud_static', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionAdmin()
    {
        $model = new FqntQuantity('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['FqntQuantity'])) {
            $model->attributes = $_GET['FqntQuantity'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = FqntQuantity::model();
        // apply scope, if available
        $scopes = $m->scopes();
        if (isset($scopes[$this->scope])) {
            $m->{$this->scope}();
        }
        $model = $m->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('FinvModule.crud_static', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'fqnt-quantity-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
