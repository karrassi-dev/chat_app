const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');

    setTimeout(() => {
        errorTextOnSignIn.style.display = 'none' ;
    }, 1000);

});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');

    setTimeout(() => {
        errorTextOnSignUp.style.display = 'none' ;
    }, 1000);
});
