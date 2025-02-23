# 🎵 Danh Sách Bài Hát - PHP & HTML

## 📌 Giới thiệu
Đây là một trang web đơn giản giúp liệt kê các bài hát trong thư mục `songs/` bằng **PHP**, hiển thị danh sách trên giao diện web bằng **HTML** và thêm hiệu ứng đẹp mắt bằng **CSS**. Người dùng có thể **click vào tên bài hát để nghe trực tiếp**. 🚀

## 🛠️ Công nghệ sử dụng
- **PHP**: Quét thư mục và lấy danh sách file nhạc.
- **HTML/CSS**: Hiển thị danh sách bài hát với giao diện đẹp.
- **JavaScript (Fetch API)**: Lấy dữ liệu danh sách bài hát từ PHP và hiển thị trên trang.

## 📂 Cấu trúc thư mục
```
📁 project-folder/
│── 📁 songs/           # Chứa file MP3
│── 📄 index.html       # Trang chính hiển thị danh sách bài hát
│── 📄 style.css        # CSS giúp giao diện đẹp hơn
│── 📄 list_songs.php   # PHP lấy danh sách bài hát từ thư mục songs/
```

## 🚀 Cách chạy dự án
### 1️⃣ Bước 1: Clone repository
```bash
git clone https://github.com/username/repository.git
cd repository
```

### 2️⃣ Bước 2: Chạy trên máy chủ PHP
Bạn có thể dùng **XAMPP**, **MAMP**, hoặc chạy server PHP built-in:
```bash
php -S localhost:8000
```
Sau đó mở trình duyệt và vào **http://localhost:8000/index.html** 🎶

## 📜 Mã nguồn chính
### `list_songs.php` (Lấy danh sách bài hát)
```php
<?php
$song_dir = 'songs/';
$songs = array_values(array_diff(scandir($song_dir), array('..', '.')));
echo json_encode($songs);
?>
```

### `index.html` (Giao diện chính)
```html
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách bài hát</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Danh sách bài hát</h2>
    <ul id="song-list"></ul>
    <script>
        async function fetchSongs() {
            const response = await fetch('list_songs.php');
            const songs = await response.json();
            const songList = document.getElementById('song-list');
            songs.forEach(song => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = `songs/${song}`;
                a.textContent = song;
                a.target = "_blank";
                li.appendChild(a);
                songList.appendChild(li);
            });
        }
        fetchSongs();
    </script>
</body>
</html>
```

### `style.css` (Giao diện đẹp hơn)
```css
body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; }
h2 { color: #333; }
#song-list { list-style: none; padding: 0; }
#song-list li { background: white; padding: 10px; border-radius: 8px; margin: 5px; transition: 0.3s; }
#song-list li:hover { background: #ddd; transform: scale(1.05); }
#song-list a { text-decoration: none; color: blue; font-weight: bold; }
#song-list a:hover { color: darkblue; }
```
## 🎨 Giao diện  
![Music Player UI]([https://via.placeholder.com/600x300?text=Music+Player+Screenshot](https://img.upanh.tv/2025/02/23/imaged9256d35b9b833f5.png))

## 🎧 Kết luận
Dự án này giúp bạn tạo một trang web **danh sách bài hát đơn giản** bằng PHP và HTML, có thể **mở bài hát trực tiếp** từ trình duyệt! 🚀

📌 Nếu bạn thấy dự án này hữu ích, hãy **⭐ Star** repository nhé! 😃
