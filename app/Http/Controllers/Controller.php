<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utils\Helper;


class Controller extends BaseController
{
    public $request;
    public $helper;

    /**
     * @return void
     */
    public function __construct(Request $request)
    {   
        $this->request = $request;
        $this->helper = new Helper();
    }
}
