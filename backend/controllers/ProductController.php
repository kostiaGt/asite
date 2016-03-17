<?php namespace backend\controllers;

use Yii;
use common\models\Products;
use common\models\ProductsSearch;
use backend\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Products model.
 */
class ProductController extends AdminController
{

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
                'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        $model->length = 1;
        $model->price = 0;
        $model->code = strtoupper(uniqid());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveCategories($model);
            return $this->redirect([$this->getGoTo(), 'id' => $model->id]);
        } else {
            return $this->render('create', [
                    'model' => $model,
                    'categoryValues' => $this->getCategoriesValue($model)
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $isSave = $this->saveCategories($model);
           
            return $this->redirect([$this->getGoTo(), 'id' => $model->id]);
        } else {
            return $this->render('update', [
                    'model' => $model,
                    'categoryValues' => $this->getCategoriesValue($model)
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function saveCategories(Products $model)
    {
        $categories = Yii::$app->request->post('kv-product');
        \common\models\CategoryProductRelations::deleteAll("productId=:productId", [":productId" => $model->id]);
        if (!empty($categories)) {
            $categoryArray = explode(',', $categories);
            foreach ($categoryArray as $category) {
                $categoryModel = new \common\models\CategoryProductRelations();
                $data = [
                    'CategoryProductRelations' => [
                        'categoryId' => $category,
                        'productId' => $model->id
                    ]
                ];
                $categoryModel->load($data);
                $categoryModel->save();
               
                if (!$categoryModel->load($data) && !$categoryModel->save())
                    return $categoryModel;
            }
        }

        return true;
    }

    protected function getCategoriesValue(Products $product)
    {
        $ret = [];
        if ($product) {
            $model = \common\models\CategoryProductRelations::findAll(["productId" => $product->id]);

            if ($model) {

                foreach ($model as $item) {
                    $ret[] = $item->categoryId;
                }
            }

            return implode(',', $ret);
        }
        return '';
    }
}
