<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Setting;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $settings;

    public function __construct()
    {
        $settings = Setting::pluck('setting', 'name');
        foreach ($settings as $key => $val) {
            View::share( $key, $val );
        }

    }

    public function setreferid($referid = null) {
        if ($referid !== null) {
            if (!Session::has('referid')) {
                Session::set('referid', $referid);
            }
        }
    }

}
