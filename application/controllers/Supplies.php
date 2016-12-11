<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 09/12/16
 * Time: 2:50 PM
 */

require APPPATH . '/third_party/restful/libraries/Rest_controller.php';

class Supplies extends Rest_controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index_get()
    {
        $key = $this->get('id');
        if(!$key)
        {
            $this->response($this->Receiving->all(), 200);
        } else {
            $result = $this->Receiving->get($key);
            if($result != null)
            {
                $this->response($result, 200);
            } else {
                $this->response(array('error' => 'Receiving item not found!'), 404);
            }
        }
    }

    // Handle an incoming GET to return 1
    function item_get()
    {
        $key = $this->get('id');
        $result = $this->Receiving->get($key);
        if ($result != null)
            $this->response($result, 200);
        else
            $this->response(array('error' => 'Receiving item not found!'), 404);
    }

    // Handle an incoming POST - add a new menu item
    function index_post()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        $this->Receiving->add($record);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming POST - add a new menu item
    function item_post()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        $this->Receiving->add($record);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming PUT - update a menu item
    function index_put()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $this->_put_args);
        $this->Receiving->update($record);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming DELETE - delete a menu item
    function item_delete()
    {
        $key = $this->get('id');
        $this->Receivings->delete($key);
        $this->response(array('ok'), 200);
    }
}