<?php
// Todo: move updateUser to methods where users can update only users of child roles
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
		
		//$createUser = $auth->createPermission('createUser');
        //$createUser->description = 'Create user.';
        //$auth->add($createUser);
		
		//$updateUser = $auth->createPermission('updateUser');
        //$updateUser->description = 'Update user.';
        //$auth->add($updateUser);
		
		//$deleteUser = $auth->createPermission('deleteUser');
        //$deleteUser->description = 'Delete user.';
        //$auth->add($deleteUser);
		
		//$listUser = $auth->createPermission('listUser');
        //$listUser->description = 'List user.';
        //$auth->add($listUser);
		
		//$indexUser = $auth->createPermission('indexUser');
        //$indexUser->description = 'Index user.';
        //$auth->add($indexUser);
		
		//$viewUser = $auth->createPermission('viewUser');
        //$viewUser->description = 'View user.';
        //$auth->add($viewUser);
		
		//$sadmin = $auth->getRole('super-administrator');
		//$admin = $auth->getRole('administrator');
		//$mod = $auth->getRole('moderator');
		//$user = $auth->getRole('user');
		//$guest = $auth->getRole('guest');
		
		// guest
		
		
		// user
		//$auth->addChild($user, $guest);
		//$auth->addChild($user, $indexUser);
		
		// moderator
		//$auth->addChild($mod, $user);
		//$auth->addChild($mod, $viewUser);
		//$auth->addChild($mod, $listUser);
		//$auth->addChild($mod, $updateUser);
		//$auth->addChild($mod, $createUser);
		
		// admin
		//$auth->addChild($admin, $mod);
		//$auth->addChild($admin, $deleteUser);
		
		// super-admin
		//$auth->addChild($sadmin, $admin);
		
		// add the rule
		//$rule = new \app\modules\ac\rbac\rule\UserRule;
		//$auth->add($rule);
		//$rule = new \app\modules\ac\rbac\rule\UnverifiedUserRule;
		//$auth->add($rule);

		// add the "updateOwnPost" permission and associate the rule with it.
		//$updateOwnUser = $auth->createPermission('updateOwnUser');
		//$updateOwnUser->description = 'Update own user';
		//$updateOwnUser->ruleName = $rule->name;
		//$auth->add($updateOwnUser);

		// "updateOwnPost" will be used from "updatePost"
		//$auth->addChild($updateOwnUser, $updateUser);

		// allow "user" to update their own user
		//$auth->addChild($user, $updateOwnUser);
		

        // add "author" role and give this role the "createPost" permission
        //$author = $auth->createRole('author');
        //$auth->add($author);
        //$auth->addChild($author, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        //$admin = $auth->createRole('user');
        //$auth->add($admin);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 1);
		//$auth->assign($admin, 2);
		//$auth->assign($admin, 3);
    }
}