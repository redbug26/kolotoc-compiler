<?php

function clean($string)
{
    $string = trim($string);
    $string = remove_accents($string);

    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z\-\']/', '', $string); // Removes special chars.
    $string = str_replace('-', ' ', $string); // Replaces all spaces with hyphens.

    $string = strtoupper($string);

    return $string;
}

function remove_accents($string)
{
    if (!preg_match('/[\x80-\xff]/', $string)) {
        return $string;
    }

    $chars = array(
        // Decompositions for Latin-1 Supplement
        chr(195) . chr(128) => 'A',
        chr(195) . chr(129) => 'A',
        chr(195) . chr(130) => 'A',
        chr(195) . chr(131) => 'A',
        chr(195) . chr(132) => 'A',
        chr(195) . chr(133) => 'A',
        chr(195) . chr(135) => 'C',
        chr(195) . chr(136) => 'E',
        chr(195) . chr(137) => 'E',
        chr(195) . chr(138) => 'E',
        chr(195) . chr(139) => 'E',
        chr(195) . chr(140) => 'I',
        chr(195) . chr(141) => 'I',
        chr(195) . chr(142) => 'I',
        chr(195) . chr(143) => 'I',
        chr(195) . chr(145) => 'N',
        chr(195) . chr(146) => 'O',
        chr(195) . chr(147) => 'O',
        chr(195) . chr(148) => 'O',
        chr(195) . chr(149) => 'O',
        chr(195) . chr(150) => 'O',
        chr(195) . chr(153) => 'U',
        chr(195) . chr(154) => 'U',
        chr(195) . chr(155) => 'U',
        chr(195) . chr(156) => 'U',
        chr(195) . chr(157) => 'Y',
        chr(195) . chr(159) => 's',
        chr(195) . chr(160) => 'a',
        chr(195) . chr(161) => 'a',
        chr(195) . chr(162) => 'a',
        chr(195) . chr(163) => 'a',
        chr(195) . chr(164) => 'a',
        chr(195) . chr(165) => 'a',
        chr(195) . chr(167) => 'c',
        chr(195) . chr(168) => 'e',
        chr(195) . chr(169) => 'e',
        chr(195) . chr(170) => 'e',
        chr(195) . chr(171) => 'e',
        chr(195) . chr(172) => 'i',
        chr(195) . chr(173) => 'i',
        chr(195) . chr(174) => 'i',
        chr(195) . chr(175) => 'i',
        chr(195) . chr(177) => 'n',
        chr(195) . chr(178) => 'o',
        chr(195) . chr(179) => 'o',
        chr(195) . chr(180) => 'o',
        chr(195) . chr(181) => 'o',
        chr(195) . chr(182) => 'o',
        chr(195) . chr(182) => 'o',
        chr(195) . chr(185) => 'u',
        chr(195) . chr(186) => 'u',
        chr(195) . chr(187) => 'u',
        chr(195) . chr(188) => 'u',
        chr(195) . chr(189) => 'y',
        chr(195) . chr(191) => 'y',
        // Decompositions for Latin Extended-A
        chr(196) . chr(128) => 'A',
        chr(196) . chr(129) => 'a',
        chr(196) . chr(130) => 'A',
        chr(196) . chr(131) => 'a',
        chr(196) . chr(132) => 'A',
        chr(196) . chr(133) => 'a',
        chr(196) . chr(134) => 'C',
        chr(196) . chr(135) => 'c',
        chr(196) . chr(136) => 'C',
        chr(196) . chr(137) => 'c',
        chr(196) . chr(138) => 'C',
        chr(196) . chr(139) => 'c',
        chr(196) . chr(140) => 'C',
        chr(196) . chr(141) => 'c',
        chr(196) . chr(142) => 'D',
        chr(196) . chr(143) => 'd',
        chr(196) . chr(144) => 'D',
        chr(196) . chr(145) => 'd',
        chr(196) . chr(146) => 'E',
        chr(196) . chr(147) => 'e',
        chr(196) . chr(148) => 'E',
        chr(196) . chr(149) => 'e',
        chr(196) . chr(150) => 'E',
        chr(196) . chr(151) => 'e',
        chr(196) . chr(152) => 'E',
        chr(196) . chr(153) => 'e',
        chr(196) . chr(154) => 'E',
        chr(196) . chr(155) => 'e',
        chr(196) . chr(156) => 'G',
        chr(196) . chr(157) => 'g',
        chr(196) . chr(158) => 'G',
        chr(196) . chr(159) => 'g',
        chr(196) . chr(160) => 'G',
        chr(196) . chr(161) => 'g',
        chr(196) . chr(162) => 'G',
        chr(196) . chr(163) => 'g',
        chr(196) . chr(164) => 'H',
        chr(196) . chr(165) => 'h',
        chr(196) . chr(166) => 'H',
        chr(196) . chr(167) => 'h',
        chr(196) . chr(168) => 'I',
        chr(196) . chr(169) => 'i',
        chr(196) . chr(170) => 'I',
        chr(196) . chr(171) => 'i',
        chr(196) . chr(172) => 'I',
        chr(196) . chr(173) => 'i',
        chr(196) . chr(174) => 'I',
        chr(196) . chr(175) => 'i',
        chr(196) . chr(176) => 'I',
        chr(196) . chr(177) => 'i',
        chr(196) . chr(178) => 'IJ',
        chr(196) . chr(179) => 'ij',
        chr(196) . chr(180) => 'J',
        chr(196) . chr(181) => 'j',
        chr(196) . chr(182) => 'K',
        chr(196) . chr(183) => 'k',
        chr(196) . chr(184) => 'k',
        chr(196) . chr(185) => 'L',
        chr(196) . chr(186) => 'l',
        chr(196) . chr(187) => 'L',
        chr(196) . chr(188) => 'l',
        chr(196) . chr(189) => 'L',
        chr(196) . chr(190) => 'l',
        chr(196) . chr(191) => 'L',
        chr(197) . chr(128) => 'l',
        chr(197) . chr(129) => 'L',
        chr(197) . chr(130) => 'l',
        chr(197) . chr(131) => 'N',
        chr(197) . chr(132) => 'n',
        chr(197) . chr(133) => 'N',
        chr(197) . chr(134) => 'n',
        chr(197) . chr(135) => 'N',
        chr(197) . chr(136) => 'n',
        chr(197) . chr(137) => 'N',
        chr(197) . chr(138) => 'n',
        chr(197) . chr(139) => 'N',
        chr(197) . chr(140) => 'O',
        chr(197) . chr(141) => 'o',
        chr(197) . chr(142) => 'O',
        chr(197) . chr(143) => 'o',
        chr(197) . chr(144) => 'O',
        chr(197) . chr(145) => 'o',
        chr(197) . chr(146) => 'OE',
        chr(197) . chr(147) => 'oe',
        chr(197) . chr(148) => 'R',
        chr(197) . chr(149) => 'r',
        chr(197) . chr(150) => 'R',
        chr(197) . chr(151) => 'r',
        chr(197) . chr(152) => 'R',
        chr(197) . chr(153) => 'r',
        chr(197) . chr(154) => 'S',
        chr(197) . chr(155) => 's',
        chr(197) . chr(156) => 'S',
        chr(197) . chr(157) => 's',
        chr(197) . chr(158) => 'S',
        chr(197) . chr(159) => 's',
        chr(197) . chr(160) => 'S',
        chr(197) . chr(161) => 's',
        chr(197) . chr(162) => 'T',
        chr(197) . chr(163) => 't',
        chr(197) . chr(164) => 'T',
        chr(197) . chr(165) => 't',
        chr(197) . chr(166) => 'T',
        chr(197) . chr(167) => 't',
        chr(197) . chr(168) => 'U',
        chr(197) . chr(169) => 'u',
        chr(197) . chr(170) => 'U',
        chr(197) . chr(171) => 'u',
        chr(197) . chr(172) => 'U',
        chr(197) . chr(173) => 'u',
        chr(197) . chr(174) => 'U',
        chr(197) . chr(175) => 'u',
        chr(197) . chr(176) => 'U',
        chr(197) . chr(177) => 'u',
        chr(197) . chr(178) => 'U',
        chr(197) . chr(179) => 'u',
        chr(197) . chr(180) => 'W',
        chr(197) . chr(181) => 'w',
        chr(197) . chr(182) => 'Y',
        chr(197) . chr(183) => 'y',
        chr(197) . chr(184) => 'Y',
        chr(197) . chr(185) => 'Z',
        chr(197) . chr(186) => 'z',
        chr(197) . chr(187) => 'Z',
        chr(197) . chr(188) => 'z',
        chr(197) . chr(189) => 'Z',
        chr(197) . chr(190) => 'z',
        chr(197) . chr(191) => 's',
    );

    $string = strtr($string, $chars);

    return $string;
}

function convertentry($entry)
{
    $retour = "";

    $words = explode(" ", $entry);

    $line = 0;
    $len = 0;
    $str = "";
    $retour = "";

    for ($n = 0; $n < count($words); $n++) {
        if ($line == 0) {
            $maxchar = 14;
        } else if ($line == 1) {
            $maxchar = 12;
        } else {
            $maxchar = 12;
        }
        // $maxchar = 14 - $line;

        $len += strlen($words[$n]);
        if ($str != "") {
            $len++;
        }
        if ($len > $maxchar) {
            $bef = round(($maxchar - strlen($str)) / 2);
            $aft = ($maxchar - strlen($str) - $bef);
            if (($bef < 0) | ($aft < 0)) {
                echo "(" . $str . ")";
            }
            $str = str_repeat(" ", $bef) . $str . str_repeat(" ", $aft);
            // echo $str . "(" . $line . ") $bef $aft\n";

            $retour .= $str;

            $str = $words[$n];
            $len = strlen($str);
            $line++;
        } else {
            if ($str != "") {
                $str .= " ";
            }
            $str .= $words[$n];
        }

        if ($len > $maxchar) {
            return "";
        }

        // echo $words[$n] . "()";
    }

    if ($str != "") {
        if ($line == 0) {
            $maxchar = 14;
        } else if ($line == 1) {
            $maxchar = 12;
        } else {
            $maxchar = 12;
        }
        // $maxchar = 14 - $line;

        $bef = round(($maxchar - strlen($str)) / 2);
        $aft = ($maxchar - strlen($str) - $bef);
        if (($bef < 0) | ($aft < 0)) {
            echo "(" . $str . ")";
        }
        $str = str_repeat(" ", $bef) . $str . str_repeat(" ", $aft);
        // echo $str . "(" . $line . ") $bef $aft\n";

        $retour .= $str;
    }

    if ($line > 2) {
        return "";
    }

    // echo "\n";

    return $retour;
}

function convert($filename)
{
    $result = array();
    $result["entries"] = array();
    $result["clean"] = array();

    $body = file_get_contents($filename);
    // echo $body;

    // $file = mb_convert_encoding($file, "CP850", "UTF-8");

    $rows = explode("\n", $body);

    $cnt = 0;

    foreach ($rows as $row) {
        $row = clean($row);

        $retour = convertentry($row);
        $retour = rtrim($retour);

        if ($retour != "") {
            $result["entries"][] = $retour;
            $result["clean"][] = $row;
            $cnt++;
        }
    }

    printf("%s: cnt: %d\n", $filename, $cnt);

    return $result;
}

function file_add_string(&$fp, $str)
{
    $fp .= $str; // pack("Z*", $str);
    return strlen($str);
}

function file_add_string_null(&$fp, $str)
{
    $fp .= pack("Z*", $str);
    return strlen($str) + 1;
}

function ascii_code($car)
{
    if ($car == ' ') {
        return 0;
    } else if (($car >= 'A') && ($car <= 'Z')) {
        return (ord($car) - ord('A')) + 1;
    } else if ($car == '\'') {
        return 27;
    }
    return 0;
}

function file_add_title(&$fp, $str)
{
    // $fp .= pack("Z*", $str);
    // return strlen($str) + 1;

    $c = 0;

    $r = 0;

    for ($n = 0; $n < strlen($str); $n++) {
        $u8 = ascii_code(substr($str, $n, 1));
        if ($n == strlen($str) - 1) {
            if ($r != 0) { // 64,32 - 0:0, 32:1, 64:2, 96:3
                $u8 += $r * 32;
            }
            $c++;
            $fp .= pack("c", $u8 + 128);
        } else {
            $u8_next = ascii_code(substr($str, $n + 1, 1));

            if (($u8 != $u8_next) || ($r == 3)) {
                if ($r != 0) { // 64,32 - 0:0, 32:1, 64:2, 96:3
                    $u8 += $r * 32;
                    $r = 0;
                }
                $c++;
                $fp .= pack("c", $u8);
            } else {
                $r++;
            }
        }
    }

    return $c;
}

function file_add_u8(&$fp, $u8)
{
    $fp .= pack("c", $u8);
    return 1;
}

function file_add_u16(&$fp, $u16)
{
    $fp .= pack("v", $u16);
    return 2;
}

function file_replace_u16(&$fp, $pos, $u16)
{
    $fp = substr($fp, 0, $pos) . pack("v", $u16) . substr($fp, $pos + 2);
}

$entries = array();

echo "12345678901234\n";

if ($argc != 2) {
    printf("Usage:\n");
    printf("  php %s <folder>\n\n", $argv[0]);

    $folder = readline("Folder ? ");
    echo "(" . $folder . ")";
    exit;
} else {
    $folder = $argv[1];
}

if ($handle = opendir($folder)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {

            $path_parts = pathinfo($entry);
            if ((isset($path_parts['extension'])) && (strtoupper($path_parts['extension']) == "TXT")) {
                $filename = $path_parts['basename'];
                $filename = str_replace(".txt", "", $filename);
                $filename = clean($filename);

                $bef = round((12 - strlen($filename)) / 2);
                $aft = (12 - strlen($filename) - $bef);
                $filename = str_repeat(" ", $bef) . $filename . str_repeat(" ", $aft);

                $retour = convert($folder . "/" . $entry);

                $entries[$filename] = $retour["entries"];

                sort($retour["clean"]);
                $body = "";
                foreach ($retour["clean"] as $key => $value) {
                    $body .= $value . "\n";
                }
                file_put_contents($folder . "/" . $path_parts['basename'] . ".cleaned", $body);
            }
        }
    }
    closedir($handle);

    // print_r($entries);

    $data = "";
    $len = 0;

    $len += file_add_string($data, "KWF");
    $len += file_add_u8($data, count($entries));

    // 2 bytes: positions du titre
    //  2 bytes: debuts de la liste des phrases

    $next = 4 + 6 * count($entries);

    foreach ($entries as $key => $value) {
        $len += file_add_u16($data, $next);
        $len += file_add_u16($data, 0);
        $len += file_add_u16($data, 0);
        $next += strlen($key) + 1;
    }

    $n = 0;
    foreach ($entries as $key => $value) {
        // = $len
        // file_replace_u16($data, 5 + $n * 4 + 2, $len);
        // printf("set %d at %d\n", $len, 5 + $n * 4 + 2);

        $len += file_add_string_null($data, $key);
        $n++;
    }

    $n = 0;
    foreach ($entries as $entry) {

        $catbeg[$n] = $len;

        file_replace_u16($data, 4 + $n * 6 + 2, $len);
        file_replace_u16($data, 4 + $n * 6 + 4, count($entry));

        foreach ($entry as $key => $value) {
            $len += file_add_u16($data, 0);
        }

        $n++;
    }

    $n = 0;
    foreach ($entries as $entry) {

        // printf("(" . $len . " " . strlen($data) . ")");

        // $next = 4 + 4 * count($entries);

        $m = 0;
        foreach ($entry as $key => $value) {

            file_replace_u16($data, $catbeg[$n] + $m * 2, $len);

            $len += file_add_title($data, $value);
            $m++;
        }

        $n++;
    }

    $fp = fopen("kolo2.bin", "wb");
    fwrite($fp, $data);
    fclose($fp);

    if (1 == 0) { // Generate .h - only used in testcarts.c

        $fp = fopen("carts.h", "wt");
        fprintf($fp, "const u8 carts[%d]={", strlen($data));

        for ($n = 0; $n < strlen($data); $n++) {
            fprintf($fp, "0x%02X", ord(substr($data, $n, 1)));
            if ($n != strlen($data) - 1) {
                fprintf($fp, ", ");
            }
        }
        fprintf($fp, "};");

        fclose($fp);
    }

    // system("hexdump -C carts.bin");
    // system("hexdump -C data01.dat|head");
    // system("hexdump -C data14.dat|head");

}
