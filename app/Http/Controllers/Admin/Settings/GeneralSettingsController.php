<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\GeneralSettingsRequest;
use App\Settings\GeneralSettings;
use Illuminate\Http\RedirectResponse;

class GeneralSettingsController extends Controller
{
    public function index(GeneralSettings $settings)
    {
        return view('admin.settings.settings', array_merge(
            $settings->toArray(),
            ['group' => 'general']
        ));
    }

    /**
     * @param GeneralSettings $settings
     * @param GeneralSettingsRequest $request
     * @return RedirectResponse
     */
    public function save(GeneralSettings $settings, GeneralSettingsRequest $request)
    {
        $settings->fill($request->validated());
        $settings->save();

        session()->flash('success', 'Settings saved');

        return redirect()->back();
    }
}
