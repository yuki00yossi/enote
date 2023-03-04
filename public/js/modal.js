const openModalBtn = document.getElementsByClassName('openModal');

for(let i = 0; i < openModalBtn.length; i++) {
    openModalBtn[i].addEventListener('click', (e) => {
        const targetModal = e.currentTarget.dataset.modal;
        document.getElementById(targetModal).classList.add('show');
        const bg = document.getElementById('bgModal');
        bg.classList.add('show');
        bg.addEventListener('click', (e) => {
            document.getElementById(targetModal).classList.remove('show');
            e.currentTarget.classList.remove('show');
        })
    });
}

