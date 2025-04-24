<?php
namespace app\modules\api\controllers;

use yii\rest\Controller;
use Yii;
use yii\web\Response;
use yii\web\BadRequestHttpException;

class BaseController extends Controller
{

    protected array $jsonBody = [];

    public function behaviors(): array
    {
        $b = parent::behaviors();
        $b['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        return $b;
    }

    public function beforeAction($action): bool
    {
        $raw = Yii::$app->request->getRawBody();
        $this->jsonBody = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new BadRequestHttpException('error JSON: ' . json_last_error_msg());
        }

        return parent::beforeAction($action);
    }

    protected function getJsonBody(): array
    {
        return $this->jsonBody;
    }
}
