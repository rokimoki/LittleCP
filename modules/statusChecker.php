<?php
/**
 * Code to check if server is online or offline.
 * 
 * NOTE: Improve when possible
 *
 * @author @rokimoki
 */
$loginServer = @fsockopen($server_settings['login_server'], $server_settings['login_port']);
if (is_resource($loginServer)) {
        fclose($loginServer);
        $loginServer = "online";
} else {
        $loginServer = "offline";
}
$charServer = @fsockopen($server_settings['char_server'], $server_settings['char_port']);
if (is_resource($charServer)) {
        fclose($charServer);
        $charServer = "online";
} else {
        $charServer = "offline";
}
$mapServer = @fsockopen($server_settings['map_server'], $server_settings['map_port']);
if (is_resource($mapServer)) {
        fclose($mapServer);
        $mapServer = "online";
} else {
        $mapServer = "offline";
}
$characters = new Char();
$players = $characters->countOnlinePlayers();