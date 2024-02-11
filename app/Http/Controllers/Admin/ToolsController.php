<?php

namespace App\Http\Controllers\Admin;

use App\Events\ClearWordpressCaches;
use Illuminate\Http\Request;

class ToolsController
{

    public function clearCache(Request $request)
    {
        ClearWordpressCaches::dispatch();

        session()->flash('success', 'Cache cleared');

        return redirect()->back();
    }
}
