<?php

namespace app\modules\admin\controllers;

class DefaultController extends AppAdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSendChat()
    {
        if (!empty($_POST)) {
            echo \sintret\chat\ChatRoom::sendChat($_POST);
        }
    }
}
