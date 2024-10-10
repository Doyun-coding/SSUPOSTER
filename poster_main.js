function goBack() {
    window.location.href = "http://localhost/SSUPOSTER/poster_view.php";
}

function load() {
    var popUrl = "http://localhost/SSUPOSTER/poster_upload.php";
    var popOption = "top=150%, left=100%, width=500px, height=600px";
    window.open(popUrl, '_blank', popOption);
}

function savePosterSize(poster) {
    const posterId = poster.getAttribute('data-id');
    const width = poster.style.width.replace('px', '');
    const height = poster.style.height.replace('px', '');

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'poster_save_size.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`id=${posterId}&width=${width}&height=${height}`);
}

function savePosterPosition(poster) {
    const posterId = poster.getAttribute('data-id');
    const posX = poster.style.left.replace('px', '');
    const posY = poster.style.top.replace('px', '');

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'poster_save_position.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`id=${posterId}&pos_x=${posX}&pos_y=${posY}`);
}

document.addEventListener('DOMContentLoaded', function () {
    const posters = document.querySelectorAll('.poster');
    let resizing = false;

    posters.forEach(poster => {
        const img = poster.querySelector('img');
        const resizeHandle = poster.querySelector('.poster-resize');

        // 포스터 클릭 이벤트
        poster.onclick = function () {
            if (!resizing) {
                const posterId = poster.getAttribute('data-id');
                var popOption = "top=150%, left=100%, width=800px, height=800px";
                window.open('poster_details.php?id=' + posterId, '_blank', popOption);
            }else{
                resizing = false;
            }
        };


        // Drag functionality
        img.onmousedown = function (event) {
            event.preventDefault();
            let shiftX = event.clientX - poster.getBoundingClientRect().left;
            let shiftY = event.clientY - poster.getBoundingClientRect().top;

            function moveAt(pageX, pageY) {
                poster.style.left = pageX - shiftX + 'px';
                poster.style.top = pageY - shiftY + 'px';
            }

            function onMouseMove(event) {
                moveAt(event.pageX, event.pageY);
            }

            document.addEventListener('mousemove', onMouseMove);

            document.onmouseup = function () {
                document.removeEventListener('mousemove', onMouseMove);
                document.onmouseup = null;
                savePosterPosition(poster);
            };
        };

        img.ondragstart = function () {
            return false;
        };

        // Resize functionality
        resizeHandle.onmousedown = function (event) {
            event.preventDefault();
            resizing = true;

            let initialX = event.clientX; // 마우스 x좌표
            let initialY = event.clientY; // 마우스 y좌표
            let initialWidth = img.offsetWidth; // 이미지 초기 너비
            let initialHeight = img.offsetHeight; // 이미지 초기 높이

            function onMouseMove(event) {
                // 새로운 너비 = 이미지 초기 너비 + (x의 증가)
                let newWidth = initialWidth + (event.clientX - initialX);
                //새로운 너비 = 이미지 초기 너비 + (x의 증가)
                let newHeight = initialHeight + (event.clientY - initialY);

                if (newWidth > 50) {
                    poster.style.width = newWidth + 'px';
                    img.style.width = newWidth + 'px';
                }
                if (newHeight > 50) {
                    poster.style.height = newHeight + 'px';
                    img.style.height = newHeight + 'px';
                }
            }

            document.addEventListener('mousemove', onMouseMove);

            document.onmouseup = function () {
                document.removeEventListener('mousemove', onMouseMove);
                document.onmouseup = null;
                savePosterSize(poster);
            };
        };

        resizeHandle.ondragstart = function () {
            return false;
        };
    });
});
// function savePosterPosition(poster) {
//     const posterId = poster.getAttribute('data-id');
//     const posX = poster.style.left.replace('px', '');
//     const posY = poster.style.top.replace('px', '');

//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', 'poster_save_position.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.send(`id=${posterId}&pos_x=${posX}&pos_y=${posY}`);
// }

// function savePosterSize(poster) {
//     const posterId = poster.getAttribute('data-id');
//     const width = poster.style.width.replace('px', '');
//     const height = poster.style.height.replace('px', '');

//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', 'poster_save_size.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.send(`id=${posterId}&width=${width}&height=${height}`);
// }