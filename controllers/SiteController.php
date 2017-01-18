<?php

namespace app\controllers;

use app\models\SearchRepo;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionSearch()
    {
        $searchRepo = new SearchRepo();
        $searchRepo->load(\Yii::$app->request->post());
        if (is_null($searchRepo->q)) {
            $searchRepo->q = '';
        }

        $searchResult = $this->getCurlResult('https://api.github.com/search/repositories?q=' . urlencode($searchRepo->q));
        if (empty($searchResult->errors)) {
            $reposData = $searchResult->items;
        } else {
            throw new BadRequestHttpException('We cannot search by empty string :/');
        }

        return $this->render('search', ['searchTerm' => $searchRepo->q, 'reposData' => $reposData]);
    }

    public function actionView($repoName = 'yiisoft/yii')
    {
        //get repo by name
        $searchResults = $this->getCurlResult('https://api.github.com/search/repositories?q=' . urlencode($repoName) . '+in:full_name');
        if ($searchResults->total_count == 0) {
            throw new NotFoundHttpException('No repository was found by this request!');
        }
        //get best match only
        $repoData = $searchResults->items[0];

        //get repos contributors
        //get 10 (at max) first contributors
        $repoContributors = array_slice($this->getCurlResult($repoData->contributors_url), 0, 10);

        return $this->render('view', ['repoData' => $repoData, 'repoContributors' => $repoContributors]);
    }

    public function actionUser($username = '')
    {
        ///users/:username
        $userData = $this->getCurlResult('https://api.github.com/users/' . urlencode($username));
        if (!isset($userData->login)) {
            throw new NotFoundHttpException('No user found with such name: ' . $username . '!');
        }
        return $this->render('user', ['userData' => $userData]);
    }

    private function getCurlResult($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'GitHubBrowserBot');
        $result = json_decode(curl_exec($ch));
        curl_close($ch);

        return $result;
    }
}
