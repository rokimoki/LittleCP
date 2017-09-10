<?php
/**
 * Configuration file with constants to tell a desired behaviour.
 *
 * @author @rokimoki
 */
// MySQL Settings
$mysql_settings = array ("host" => "localhost",     // ragnarok db ip
                         "port" => "3306",          // port of mysql/mariadb
                         "db" => "ragnarok",        // database of ragnarok emulator
                         "user" => "ragnarok",      // user to access database
                         "password" => "ragnarok");   // password using for accessing

// LittleCP behaviour
$cp_settings = array ("name" => "OverflowSchool RO",        // Your server name
                      "type" => "Mid Rates",                // Put server type, for server description meta tag (PK Server, Mid Rates, Pre-Renewall Mid... whatever you want)
                      "useMD5" => 1,                        // Use md5 for password encryption, 1 true and 0 false
                      "contact" => "alejandro@alsnet.es");  // Mail of contact for CP errors (server admin mail address)

// This is just to show information
$server_settings = array ("exp_rate" => "500x",             // Base Exp rate gained in the server
                          "job_rate" => "500x",             // Job Exp rate gained in the server
                          "drop_rate" => "500x",            // Drop rate in the server
                          "mvp_rate" => "5x",               // MvP drop rate
                          "isRenewall" => 0,                // If renewall put 1, if Pre-RE put 0   
                          "login_server" => "localhost",    // login-server IP, if same of website stay localhost
                          "login_port" => 6900,             // Port of login-server
                          "char_server" => "localhost",     // char-server IP, if same of website stay localhost
                          "char_port" => 6121,              // Port of char-server
                          "map_server" => "localhost",      // map-server IP, if same of website stay localhost
                          "map_port" => 5121);              // Port of map-server
