<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;

class ScreenshotController extends Controller
{
     public function showForm()
    {
        return view('screenshot');
    }

    public function screenshot(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->url;
        $name = Str::slug($url, '-') . '.png';
        $path = 'screenshots/' . $name;

        // Ensure directory exists
        Storage::makeDirectory('screenshots');

        // Use Browsershot to take a screenshot
        Browsershot::url($url)
            ->windowSize(1280, 768)
            ->waitUntilNetworkIdle()
            ->setScreenshotType('png')
            ->save(storage_path('app/public/' . $path));

        return redirect('/screenshot')->with('screenshotPath', $path);
    }
}
