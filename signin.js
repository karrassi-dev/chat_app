const signInForm = document.querySelector('.sign-in-container form');
const signInFormButton = signInForm.querySelector('button');
const errorTextOnSignIn = document.querySelector('.sign-in-container form .errorTextOnSignIn');



signInForm.onsubmit = ( (e) => {
    e.preventDefault();
	console.log("clicked...")
})

signInFormButton.onclick = () => {

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'signin.php', true);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if( xhr.response == "success" ) {
                window.location.href = 'home.php';
            } else {
                errorTextOnSignIn.textContent = xhr.response ;
                errorTextOnSignIn.style.display = 'block' ;
            }
        }
    };
    
    var formData = new FormData(signInForm);
    xhr.send(formData);

};


