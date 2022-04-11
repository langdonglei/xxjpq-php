<?php
$token_path = '/.tencentcloudbase/wx/cloudbase_access_token';
if (file_exists($token_path)) {
    echo file_get_contents($token_path);
    return 0;
}
echo 'no token file';
