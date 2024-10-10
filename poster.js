document.getElementById('upload-form').addEventListener('submit', uploadPoster);

let posters = [];
let selectedPoster = null;

// 포스터 업로드 하는 함수
function uploadPoster(e) {
    e.preventDefault();
    
    const fileInput = document.getElementById('poster-file');
    const expiry = parseInt(document.getElementById('poster-expiry').value);

    if (fileInput.files.length === 0) {
        alert('포스터 파일을 선택하세요.');
        return;
    }

    const file = fileInput.files[0];
    const posterId = 'poster-' + Date.now();
    const expiryDate = new Date();
    expiryDate.setDate(expiryDate.getDate() + expiry);

    const reader = new FileReader();
    reader.onload = function(event) {
        const poster = {
            id: posterId,
            category: category,
            content: event.target.result,
            fileType: file.type,
            expiryDate: expiryDate
        };
        posters.push(poster);
        displayPoster(poster);
        savePosters();
    };

    if (file.type.startsWith('image/')) {
        reader.readAsDataURL(file);
    } else if (file.type === 'application/pdf') {
        reader.readAsArrayBuffer(file);
    }
}

// 업로드한 포스터를 띄우는 함수
function displayPoster(poster) {
    const container = document.getElementById('posters-container');
    const posterElem = document.createElement('div');
    posterElem.className = 'poster';
    posterElem.id = poster.id;

    // 포스터를 업로드할 때 무작위로 위치 설정
    const randomX = Math.random() * (container.clientWidth - 200);
    const randomY = Math.random() * (container.clientHeight - 200);
    posterElem.style.left = randomX + 'px';
    posterElem.style.top = randomY + 'px';
    posterElem.style.width = '200px';
    posterElem.style.height = '200px';

    if (poster.fileType.startsWith('image/')) {
        const img = document.createElement('img');
        img.src = poster.content;
        posterElem.appendChild(img);
    } else if (poster.fileType === 'application/pdf') {
        const obj = document.createElement('object');
        const blob = new Blob([new Uint8Array(poster.content)], { type: 'application/pdf' });
        obj.data = URL.createObjectURL(blob);
        obj.type = 'application/pdf';
        obj.width = '100%';
        obj.height = '100%';
        posterElem.appendChild(obj);
    }

    const removeBtn = document.createElement('button');
    removeBtn.className = 'remove-btn';
    removeBtn.innerText = '제거';
    removeBtn.onclick = function() {
        removePoster(poster.id);
    };
    posterElem.appendChild(removeBtn);

    makeDraggable(posterElem);
    container.appendChild(posterElem);

    const expiryTime = poster.expiryDate - new Date();
    setTimeout(() => {
        alert('포스터 "' + poster.id + '"의 부착 기간이 만료되었습니다.');
        removePoster(poster.id);
    }, expiryTime);
}

// 포스터 제거하는 함수
function removePoster(posterId) {
    const posterElem = document.getElementById(posterId);
    if (posterElem) {
        posterElem.remove();
    }
    posters = posters.filter(poster => poster.id !== posterId);
    savePosters();
}

// 
function savePosters() {
    localStorage.setItem('posters', JSON.stringify(posters));
}


function loadPosters(category) {
    const savedPosters = JSON.parse(localStorage.getItem('posters'));
    if (savedPosters) {
        posters = savedPosters.map(poster => ({
            ...poster,
            expiryDate: new Date(poster.expiryDate)
        }));
        posters.filter(poster => poster.category === category).forEach(displayPoster);
    }
}

// 포스터를 움직이는 함수
function makeDraggable(element) {
    let offsetX, offsetY;

    element.onmousedown = function(event) {
        event.preventDefault(); // 기본 동작 방지
        selectedPoster = element;
        offsetX = event.clientX - (element.getBoundingClientRect().left + element.offsetWidth / 2);
        offsetY = event.clientY - (element.getBoundingClientRect().top + element.offsetHeight / 2);

        document.onmousemove = function(event) {
            if (selectedPoster) {
                selectedPoster.style.left = (event.clientX - offsetX) - selectedPoster.offsetWidth / 2 + 'px';
                selectedPoster.style.top = (event.clientY - offsetY) - selectedPoster.offsetHeight / 2 + 'px';
            }
        };

        document.onmouseup = function() {
            selectedPoster = null;
            document.onmousemove = null;
            document.onmouseup = null;
            savePosters();
        };
    };

    element.ondragstart = function() {
        return false;
    };

    // 포스터 크기 조정 기능 설정
    element.onmouseenter = function() {
        element.style.resize = 'both';
    };

    element.onmouseleave = function() {
        if (selectedPoster === null) {
            element.style.resize = 'none';
        }
    };
}
