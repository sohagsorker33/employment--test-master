<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper {
    // File or Image Upload
    public static function fileUpload($file, string $folder, string $name): ?string {

        $imageName = Str::slug($name) . '.' . $file->extension();
        $path      = public_path('uploads/' . $folder);
        $file->move($path, $imageName);
        return 'uploads/' . $folder . '/' . $imageName;
    }
}
