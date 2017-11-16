<?php
namespace App\versions\v1\usersPost\controllers;

use App\Services\Controller\BaseController;

class UsersPostController extends BaseController
{
    /**
     * Get users post by users id and posts id.
     * @param integer $user_id
     * @param integer $post_id
     */
    public function index(integer $user_id = false, integer $post_id = false)
    {
        $this->send(['good']);
    }

    /**
     * Delete users post by users id and posts id.
     * @param integer $user_id
     * @param integer $post_id
     */
    public function delete(integer $user_id = false, integer $post_id = false)
    {
        $this->send(['delete']);

    }
}
