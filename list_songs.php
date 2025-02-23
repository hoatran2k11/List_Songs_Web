<?php
$song_dir = "songs/"; // Thư mục chứa file MP3
$songs = array();

// Quét thư mục và lấy danh sách file MP3
if (is_dir($song_dir)) {
    if ($dh = opendir($song_dir)) {
        while (($file = readdir($dh)) !== false) {
            if (pathinfo($file, PATHINFO_EXTENSION) === "mp3") {
                $songs[] = $file;
            }
        }
        closedir($dh);
    }
}

// Trả về danh sách dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($songs);
?>