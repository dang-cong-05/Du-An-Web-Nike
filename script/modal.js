const container = document.getElementById('modal');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('signIn');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
})
loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
})

function openModal() {
    document.querySelector('.modal-container').style.display = 'flex';
}

function closeModal() {
    document.querySelector('.modal-container').style.display = 'none';
}