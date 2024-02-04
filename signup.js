const signUpForm = document.querySelector('.sign-up-container form');
const signUpFormButton = signUpForm.querySelector('button');
const errorTextOnSignUp = document.querySelector('.sign-up-container form .errorTextOnSignUp');



signUpForm.onsubmit = ( (e) => {
    e.preventDefault();
	console.log("clicked...")
})

signUpFormButton.onclick = () => {

    errorTextOnSignIn.style.display = 'none' ;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'signUp.php', true);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if( xhr.response == "success" ) {
                setTimeout(() => {
                    signInButton.click() ;
                    document.querySelector("input[name='username']").value = '' ;
                    document.querySelector("input[name='email']").value = '' ;
                    document.querySelector("input[name='password']").value = '' ;
                    document.querySelector("input[name='image']").value = '' ;
                }, 700);            
            } else {
                errorTextOnSignUp.textContent = xhr.response ;
                errorTextOnSignUp.style.display = 'block' ;
            }
        }
    };
    
    var formData = new FormData(signUpForm);
    xhr.send(formData);

};
