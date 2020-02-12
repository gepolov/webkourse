<?php
function Scan($dir)
{
    static $fnames = array();
    if($d=opendir($dir))
    {
        while(false !== ($file = readdir($d)))
        {
            if ($file == '.' || $file == '..')
                continue;
            if(is_dir($dir . DIRECTORY_SEPARATOR . $file))
                Scan($dir . DIRECTORY_SEPARATOR . $file);
            else
                if (pathinfo( $file, PATHINFO_EXTENSION )==='php')

                $fnames[] = $file;
        }
        closedir($d);
    }
    return $fnames;
}

echo '<pre>';
var_dump(Scan('dir'));