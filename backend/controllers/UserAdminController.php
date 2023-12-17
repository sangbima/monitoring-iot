<?php

namespace backend\controllers;

use Yii;
use backend\models\UserAdmin;
use backend\models\search\UserAdminSearch;
use yii\base\UserException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserAdminController implements the CRUD actions for UserAdmin model.
 */
class UserAdminController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all UserAdmin models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserAdminSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserAdmin model.
     * @param string $id UUID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserAdmin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserAdmin();
        $model->scenario = UserAdmin::SCENARIO_CREATE;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->setPassword($model->password_hash);
                $model->generateAuthKey();

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'User created');
                    return $this->redirect(['view', 'id' => $model->uuid]);
                } else {
                    Yii::$app->session->setFlash('warning', 'Something wrong with data submission');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserAdmin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id UUID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            if (!empty($model->password_hash)) {
                $model->setPassword($model->password_hash);
            } else {
                $model->password_hash = (string) $model->getOldAttribute('password_hash');
            }
            $model->generateAuthKey();
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'User updated');
                return $this->redirect(['view', 'id' => $model->uuid]);
            }

        }

        $model->password_hash = '';
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserAdmin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id UUID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->softDelete();
        Yii::$app->session->setFlash('success', 'User deleted');
        return $this->redirect(['index']);
    }

    /**
     * Finds the UserAdmin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id UUID
     * @return UserAdmin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserAdmin::findOne(['uuid' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
