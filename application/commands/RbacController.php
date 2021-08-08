<?php

namespace app\commands;

use app\models\User;
use Yii;
use yii\console\Controller;

/**
 * Class RbacController.
 * @package app\commands
 */
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update a post';
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update a post';
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = 'Delete a post';
        $readPost = $auth->createPermission('readPost');
        $readPost->description = 'Read a post';

        $authorRule = new \app\rbac\AuthorRule();
        // add permissions
        $auth->add($createPost);
        $auth->add($updatePost);
        $auth->add($deletePost);
        $auth->add($readPost);
        $auth->add($authorRule);

        // add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $authorRule->name;
        $auth->add($updateOwnPost);
        $auth->addChild($updateOwnPost, $updatePost);

        // create Author role
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $updateOwnPost);
        $auth->addChild($author, $readPost);
        // create Admin role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $deletePost);
        $auth->addChild($admin, $author);
        // assign roles
        $auth->assign($admin, User::findByUsername('admin')->id);
        $auth->assign($author, User:: findByUsername('demo')->id);
        echo "Done!\n";
    }

    public function actionInitShort()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);


        // добавляем роль "author" и даём роли разрешение "createPost"
        $author = $auth->createRole('author');
        $auth->add($author); // добавили запись в таблицу auth_item
        $auth->addChild($author, $createPost);


        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($author, 2);

    }

    public function actionInitRule()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost); // добавили запись в таблицу auth_item.(updatePost)

        // добавляем роль "author" и даём роли разрешение "createPost"
        $author = $auth->createRole('author');
        $auth->add($author); // добавили запись в таблицу auth_item. (author) и в таблицу auth_roles
               

        // add the rule
        $rule = new \app\rbac\AuthorRule;
        $auth->add($rule); //вставка

        // добавляем разрешение "updateOwnPost" и привязываем к нему правило.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

        // "updateOwnPost" будет использоваться из "updatePost"
        $auth->addChild($updateOwnPost, $updatePost);

        // разрешаем "автору" обновлять его посты
        $auth->addChild($author, $updateOwnPost);
    }

}