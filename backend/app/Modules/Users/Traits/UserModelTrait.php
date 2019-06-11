<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 21/08/2017
 * Time: 05:10
 */

namespace App\Modules\Users\Traits;


use App\Modules\Users\Models\User;

trait UserModelTrait
{
    protected $abortFlag = true;
    protected $loggedInUser;

    /**
     * Get logged in user
     *
     * @return User
     */
    protected function getLoggedInUser()
    {
        if (!isset($this->loggedInUser)) {
            $this->loggedInUser = request()->user;
        }
        if ($this->loggedInUser instanceof User) {
            return $this->loggedInUser;
        }
    }

    /**
     * Get department ids of the user
     *
     * @param $user
     * @return mixed
     */
    protected function getUserGroupIds($user)
    {
        return $user->groups()->get()->pluck('id');
    }

    /**
     * Check if logged user has type Admin
     *
     * @return $this
     */
    protected function isAdmin()
    {
        $user = $this->getLoggedInUser();
        if ($user->getIsAdminAttribute()) {
            $this->abortFlag = false;
        }
        return $this;
    }

    /**
     * Check if logged user has type User
     *
     * @return $this
     */


    /**
     * Check if logged user has type User
     *
     * @return $this
     */


    /**
     * Check if logged user is the same as the one from
     * parameter
     *
     * @param $userId
     * @return $this
     */
    protected function isSameAsLogged($userId)
    {
        //don't die if the $userId is null/not valid
        try {
            $loggedUser = $this->getLoggedInUser();
            if ($userId == $loggedUser->id) {
                $this->abortFlag = false;
            }
        } catch (\Exception $e) {

        }

        return $this;
    }

    /**
     * Closure function after checking for user type
     *
     * @return $this
     */
    protected function doAbort()
    {
        if ($this->abortFlag === true) {
            abort(401, 'You don\'t have permission to do this!');
        }
        $this->abortFlag = -1;

        return $this;
    }

    /**
     * Used in case instead of aborting you want to
     * do something else
     *
     * @return bool
     */
    protected function getAbortFlag()
    {
        return $this->abortFlag;
    }
}