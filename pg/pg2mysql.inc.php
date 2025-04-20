<?php
/*
This file is part of the 'Pg2MySQL' converter project
http://www.lightbox.org/pg2mysql.php

Updated for PHP 8.x compatibility
*/

error_reporting(E_ALL);
define('PRODUCT', "pg2mysql");
define('VERSION', "2.0");
define('COPYRIGHT', "Lightbox Technologies Inc. http://www.lightbox.ca");

$config['engine'] = "InnoDB"; // Updated default engine

function getfieldname($l)
{
    if (preg_match("/`(.*)`/", $l, $regs)) {
        return $regs[1] ?? null;
    } elseif (preg_match("/([^\s]*)/", trim($l), $regs)) {
        return $regs[1] ?? null;
    }
    return null;
}

function formatsize($s)
{
    if ($s < pow(2, 14)) return "{$s}B";
    if ($s < pow(2, 20)) return sprintf("%.1fK", $s / 1024);
    if ($s < pow(2, 30)) return sprintf("%.1fM", $s / (1024 * 1024));
    return sprintf("%.1fG", $s / (1024 * 1024 * 1024));
}

function pg2mysql_large($infilename, $outfilename)
{
    $fs = filesize($infilename);
    $infp = fopen($infilename, "r");
    $outfp = fopen($outfilename, "w");

    $pgsqlchunk = [];
    $chunkcount = 1;
    $linenum = 0;
    $inquotes = false;
    $first = true;
    echo "Filesize: " . formatsize($fs) . "\n";

    while ($instr = fgets($infp)) {
        $linenum++;
        $memusage = round(memory_get_usage(true) / (1024 * 1024));
        $pgsqlchunk[] = $instr;
        $c = substr_count($instr, "'");
        $inquotes = ($c % 2 !== 0) ? !$inquotes : $inquotes;

        if ($linenum % 10000 == 0) {
            $currentpos = ftell($infp);
            printf("Progress: %3d%%  Line: %9d  Chunks: %9d  Mem: %4dM\r", 
                   round($currentpos / $fs * 100), $linenum, $chunkcount, $memusage);
        }

        if (preg_match("/\);\n$/", $instr) && !$inquotes) {
            $chunkcount++;
            $mysqlchunk = pg2mysql($pgsqlchunk, $first);
            fwrite($outfp, $mysqlchunk);
            $first = false;
            $pgsqlchunk = [];
        }
    }
    echo "\nCompleted! Lines: {$linenum}, Chunks: {$chunkcount}\n";
    fclose($infp);
    fclose($outfp);
}

function pg2mysql($input, $header = true)
{
    global $config;
    $lines = is_array($input) ? $input : explode("\n", $input);
    $output = $header ? "# Converted with " . PRODUCT . "-" . VERSION . "\n" : "";
    
    foreach ($lines as $line) {
        // Skip PostgreSQL-specific settings
        if (stripos($line, "SET statement_timeout") !== false || 
            stripos($line, "SET lock_timeout") !== false || 
            stripos($line, "SET idle_in_transaction_session_timeout") !== false || 
            stripos($line, "SET client_encoding") !== false || 
            stripos($line, "SET standard_conforming_strings") !== false || 
            stripos($line, "SET check_function_bodies") !== false || 
            stripos($line, "SET xmloption") !== false || 
            stripos($line, "SET client_min_messages") !== false) {
            continue; // Skip these lines
        }
        
        // Skip PostgreSQL-specific functions
        if (stripos($line, "pg_catalog.set_config") !== false) {
            continue; // Skip this line
        }
        
        $line = str_replace([" integer", " boolean"], [" int(11)", " bool"], $line);
        $line = preg_replace("/ character varying\((\d+)\)/", " varchar($1)", $line);
        $line = preg_replace("/ DEFAULT nextval\(.*\)/", " auto_increment", $line);
        $line = preg_replace("/::.*[ ,]/", ",", $line);
        $line = preg_replace("/::.*$/", "\n", $line);
        $output .= $line;
    }
    return $output;
}
