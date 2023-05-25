<?php 

function base_url($uri)
{
    return 'http://localhost/pendataan/' . $uri;
}

function month(Int $month)
{
    $m = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    return $m[$month];
}

?>