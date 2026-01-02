<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
{
    if (!$request->hasFile('upload')) {
        return;
    }

    $file = $request->file('upload');

    $filename = time().'_'.preg_replace(
        '/\s+/',
        '_',
        $file->getClientOriginalName()
    );

    $path = public_path('storage/ckeditor/images');
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    $file->move($path, $filename);

    $url = asset('storage/ckeditor/images/'.$filename);

    // 🔴 CKEDITOR 4 CALLBACK (THIS INSERTS THE IMAGE)
    $funcNum = $request->input('CKEditorFuncNum');

    return response(
        "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '');</script>",
        200
    )->header('Content-Type', 'text/html');
}
}
