<?php
    require '../config.php';
    $query = LFLINK . LASTFM_KEY . "&limit=20&method=user.gettopalbums";
    $resp = simplexml_load_file($query);
    header('Content-Type: application/json');
    $i = 0;
    $total = count($resp->topalbums->album);
    echo '{"TopAlbums":[';
    foreach ($resp->topalbums->album as $albumItem) {
        echo '{"AlbumImage":"'.$albumItem->image[2].'",';
        echo '"AlbumName":"'.$albumItem->name.'",';
        echo '"AlbumArtist":"'.$albumItem->artist->name.'",';
        echo '"AlbumPlayCount":"'.$albumItem->playcount.'"}';#
        $i++;
        if($i != $total){
            echo ',';
        }
    }
    echo ']}';
?>
