<?php

/**
 * Created by PhpStorm.
 * User: Joan Künzler
 * Date: 03.12.2016
 * Time: 16:26
 */
class FileHelper
{
    public static function deleteFile($fileUri)
    {
        $file = parse_url($fileUri);
        if (isset($file["host"])) {
            if ($file["host"] == EnvironmentHelper::getServerHost()) {
                chdir(dirname(__FILE__));
                chdir("../..");

                $filePathOnServer = $file["path"];
                $entirePath = getcwd() . $filePathOnServer;
                if (file_exists($entirePath)) {
                    unlink($entirePath);
                }
            }
        }
    }

    public static function setUserThumbnail($files)
    {
        $pathToFile = SERVER_PROTOCOL . "://" . EnvironmentHelper::getServerHost() . "/api/files/images/";
        if (!empty($files['thumbnail'])) {
            /** @var Slim\Http\UploadedFile $thumbnail */
            $thumbnail = $files['thumbnail'];
            preg_match("/(.*)\\/(.*)/", $thumbnail->getClientMediaType(), $fileMediaType);
            if ($fileMediaType[1] === "image") {
                if ($thumbnail->getError() === UPLOAD_ERR_OK) {
                    $uploadFileName = uniqid() . "." . $fileMediaType[2];
                    $thumbnail->moveTo("../files/images/$uploadFileName");
                    $pathToFile .= $uploadFileName;
                }
            }
        }
        return $pathToFile;
    }

    public static function fileExists($path)
    {
        chdir(dirname(__FILE__));
        chdir("../..");
        $entirePath = getcwd() . $path;
        return file_exists($entirePath);
    }
}