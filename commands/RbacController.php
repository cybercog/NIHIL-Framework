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
		
		$sadmin = $auth->getRole('super-administrator');
		$admin = $auth->getRole('administrator');
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
		
		
		
		
		//
		$acAuthKeysIndex = $auth->createPermission('acAuthKeysIndex');
        $acAuthKeysIndex->description = 'AC AuthKeys Index.';
        $auth->add($acAuthKeysIndex);
		
		$acAuthKeysView = $auth->createPermission('acAuthKeysView');
        $acAuthKeysView->description = 'AC AuthKeys View.';
        $auth->add($acAuthKeysView);
		
		$acAuthKeysUpdate = $auth->createPermission('acAuthKeysUpdate');
        $acAuthKeysUpdate->description = 'AC AuthKeys Update.';
        $auth->add($acAuthKeysUpdate);
		
		$acAuthKeysDelete = $auth->createPermission('acAuthKeysDelete');
        $acAuthKeysDelete->description = 'AC AuthKeys Delete.';
        $auth->add($acAuthKeysDelete);
		
		$acAuthKeysList = $auth->createPermission('acAuthKeysList');
        $acAuthKeysList->description = 'AC AuthKeys List.';
        $auth->add($acAuthKeysList);
		
		//
		$acPasswordChangesIndex = $auth->createPermission('acPasswordChangesIndex');
        $acPasswordChangesIndex->description = 'AC PasswordChanges Index.';
        $auth->add($acPasswordChangesIndex);
		
		$acPasswordChangesView = $auth->createPermission('acPasswordChangesView');
        $acPasswordChangesView->description = 'AC PasswordChanges View.';
        $auth->add($acPasswordChangesView);
		
		$acPasswordChangesUpdate = $auth->createPermission('acPasswordChangesUpdate');
        $acPasswordChangesUpdate->description = 'AC PasswordChanges Update.';
        $auth->add($acPasswordChangesUpdate);
		
		$acPasswordChangesDelete = $auth->createPermission('acPasswordChangesDelete');
        $acPasswordChangesDelete->description = 'AC PasswordChanges Delete.';
        $auth->add($acPasswordChangesDelete);
		
		$acPasswordChangesList = $auth->createPermission('acPasswordChangesList');
        $acPasswordChangesList->description = 'AC PasswordChanges List.';
        $auth->add($acPasswordChangesList);
		
		// //
		// $acEmailChangesIndex = $auth->createPermission('acEmailChangesIndex');
        // $acEmailChangesIndex->description = 'AC EmailChanges Index.';
        // $auth->add($acEmailChangesIndex);
		
		// $acEmailChangesView = $auth->createPermission('acEmailChangesView');
        // $acEmailChangesView->description = 'AC EmailChanges View.';
        // $auth->add($acEmailChangesView);
		
		// $acEmailChangesUpdate = $auth->createPermission('acEmailChangesUpdate');
        // $acEmailChangesUpdate->description = 'AC EmailChanges Update.';
        // $auth->add($acEmailChangesUpdate);
		
		// $acEmailChangesDelete = $auth->createPermission('acEmailChangesDelete');
        // $acEmailChangesDelete->description = 'AC EmailChanges Delete.';
        // $auth->add($acEmailChangesDelete);
		
		// $acEmailChangesList = $auth->createPermission('acEmailChangesList');
        // $acEmailChangesList->description = 'AC EmailChanges List.';
        // $auth->add($acEmailChangesList);
		
		// //
		// $acSessionLogsIndex = $auth->createPermission('acSessionLogsIndex');
        // $acSessionLogsIndex->description = 'AC SessionLogs Index.';
        // $auth->add($acSessionLogsIndex);
		
		// $acSessionLogsView = $auth->createPermission('acSessionLogsView');
        // $acSessionLogsView->description = 'AC SessionLogs View.';
        // $auth->add($acSessionLogsView);
		
		// $acSessionLogsUpdate = $auth->createPermission('acSessionLogsUpdate');
        // $acSessionLogsUpdate->description = 'AC SessionLogs Update.';
        // $auth->add($acSessionLogsUpdate);
		
		// $acSessionLogsDelete = $auth->createPermission('acSessionLogsDelete');
        // $acSessionLogsDelete->description = 'AC SessionLogs Delete.';
        // $auth->add($acSessionLogsDelete);
		
		// $acSessionLogsList = $auth->createPermission('acSessionLogsList');
        // $acSessionLogsList->description = 'AC SessionLogs List.';
        // $auth->add($acSessionLogsList);
		
		// $auth->addChild($admin, $acAuthKeysIndex);
		// $auth->addChild($admin, $acAuthKeysView);
		// $auth->addChild($admin, $acAuthKeysUpdate);
		// $auth->addChild($admin, $acAuthKeysList);
		// $auth->addChild($sadmin, $acAuthKeysDelete);
		
		// $auth->addChild($admin, $acPasswordChangesIndex);
		// $auth->addChild($admin, $acPasswordChangesView);
		// $auth->addChild($admin, $acPasswordChangesUpdate);
		// $auth->addChild($admin, $acPasswordChangesList);
		// $auth->addChild($sadmin, $acPasswordChangesDelete);
		
		// $auth->addChild($admin, $acEmailChangesIndex);
		// $auth->addChild($admin, $acEmailChangesView);
		// $auth->addChild($admin, $acEmailChangesUpdate);
		// $auth->addChild($admin, $acEmailChangesList);
		// $auth->addChild($sadmin, $acEmailChangesDelete);
		
		// $auth->addChild($admin, $acSessionLogsIndex);
		// $auth->addChild($admin, $acSessionLogsView);
		// $auth->addChild($admin, $acSessionLogsUpdate);
		// $auth->addChild($admin, $acSessionLogsList);
		// $auth->addChild($sadmin, $acSessionLogsDelete);
    }
}