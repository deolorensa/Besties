const openModalButtons = document.querySelectorAll('[data-modal-target]');
const closeModalButtons = document.querySelectorAll('[data-close-button]');
const overlay = document.getElementById('overlay');
const popup = document.getElementById('popup');

openModalButtons.forEach(button => {
	button.addEventListener("click", (event) => {
		popup.classList.add('active');
		overlay.classList.add('active');
	})
});

closeModalButtons.forEach(button => {
	button.addEventListener("click", (event) => {
		popup.classList.remove('active');
		overlay.classList.remove('active');
	})
});



const button = document.getElementById('lp');
button.addEventListener("click", (event) => {
	alert('Reset Password Akun Anda akan Dikirim ke Akun Anda');
});

// const button = document.getElementById('wa');
// button.addEventListener("click", (event) => {
// 	alert('anda akan ditujukan ke link WA');
// });
