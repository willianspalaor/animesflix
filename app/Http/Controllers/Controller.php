<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    public $request;

    /**
     * @return void
     */
    public function __construct(Request $request)
    {   
        $this->request = $request;
    }
}
