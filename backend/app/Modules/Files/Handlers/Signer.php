<?php

namespace App\Modules\Files\Handlers;

use App\Modules\Files\Models\File;
use garethp\ews\Mail\MailAPI;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Signer
{
    private static function prepareStamp($file, $reference)
    {
        $stampFile = resource_path('other/stamp.png');
        $font = resource_path('other/arial.ttf');

        $im = imagecreatefrompng($stampFile);
        $textColor = imagecolorallocate($im, 255, 129, 192);
        setlocale(LC_TIME, "ro_RO");

        imagettftext($im, 20, 0, 73, 99, $textColor, $font, $reference . ' / ' . date("d-M-Y", strtotime($file->created_at)));

        $path = storage_path('app/tmp/' . str_random(16) . '.png');
        imagepng($im, $path);
        imagedestroy($im);
        return $path;
    }

    public static function signFile($file, $reference)
    {

        if ($file->extension != 'pdf') {
            return $file;
        };
        $outFileName = str_random(16);
        $inFile = storage_path('app/files') . '/' . $file->path;
        $outFile = storage_path('app/files') . '/' . $outFileName . '.' . $file->extension;
        $stampFile = self::prepareStamp($file, $reference);
        $cmd = "java -jar " . base_path() . "/lib/pdf.jar " . $inFile . " " . $outFile . " "
            . $stampFile . " " . $file->barcode;
        exec($cmd, $out);

        $signedFile = File::create([
            'name' => $file->name,
            'path' => $outFileName . '.' . $file->extension,
            'extension' => $file->extension,
            'checksum' => md5_file($outFile),
            'barcode' => $file->barcode + 1,
            'reference' => $file->reference,
            'parent_id' => $file->id,
            'signed' => true
        ]);

        return $signedFile;
    }
}
