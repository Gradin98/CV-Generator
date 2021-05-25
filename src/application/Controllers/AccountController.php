<?php

namespace App\Controllers;


use App\App;

class AccountController extends App
{
    /***
     * @param $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public function login($request, $response, $args)
    {
        return $this->view->render($response, "account/login.twig");
    }

    /***
     * @param $request
     * @param $response
     * @param $args
     */
    public function actionLogin($request, $response, $args)
    {

    }

    /***
     * @param $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public function register($request, $response, $args)
    {
        return $this->view->render($response, "account/register.twig");
    }

    /***
     * @param $request
     * @param $response
     * @param $args
     */
    public function actionRegister($request, $response, $args)
    {

    }
}