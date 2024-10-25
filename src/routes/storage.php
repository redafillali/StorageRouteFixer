<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


Route::get('/storage/{any}', function ($any) {
  $path = storage_path('app/public/' . $any);
  
  // Debugging: Uncomment to see the path

  if (!File::exists($path)) {
      abort(404);
  }

  $file = File::get($path);
  $type = File::mimeType($path);

  return response($file, 200)->header("Content-Type", $type);
})->where('any', '.*'); // This allows for any characters in the filename including slashes
