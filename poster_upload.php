<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>디지털 홍보물 플랫폼</title>
    <link rel="stylesheet" href="style.css">
    <base href="http://localhost/SSUPOSTER/poster_upload.php">
</head>
<body>
    <header>
        <div style="display:inline;">
            <h2>포스터 업로드</h2>
        </div>    
    </header>
    <main>
        <section id="upload-section">
            <form id="upload-form" action="poster_upload_server.php" method="post" enctype="multipart/form-data">
                <div style="display:inline;">
                    <label for="poster-file">포스터 파일:&ensp; &ensp; </label>
                    <input type="file" id="poster-file" name="poster_file" accept="image/*,.pdf" required>
                </div>
                <div style="display:inline;">
                    <label for="poster-expiry">부착 기간 (일): &ensp; &ensp; </label>
                    <input type="number" id="poster-expiry" name="poster_expiry" min="1" required>
                </div>
                <div style="display:inline;">
                    <label for="poster-category">카테고리 선택: &ensp; &ensp; </label>
                    <select id="poster-category" name="poster_category" required>
                        <option value="IT대학">IT대학</option>
                        <option value="인문대학">인문대학</option>
                        <option value="경영대학">경영대학</option>
                        <option value="공과대학">공과대학</option>
                    </select>
                </div>
                <div style="display:inline;">
                    <label for="poster-subfile">첨부 파일: &ensp; &ensp; </label>
                    <input type="file" id="poster-subfile" name="poster_subfile" accept="image/*,.pdf" required>
                    <textarea name="poster_details" id="poster-detail" cols="50" rows="10" placeholder="세부사항을 입력해주세요"></textarea>
                </div>
                <button type="submit">업로드</button>
            </form>
        </section>
    </main>
</body>
</html>
