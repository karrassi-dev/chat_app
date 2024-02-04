const form = document.querySelector(".send form") ;
const input = form.querySelector(".input") ;
const button = form.querySelector("button") ;
const chat = document.querySelector(".chat-center") ;

form.onsubmit = ( (e) => {
    e.preventDefault();
})

button.onclick = () => {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php-send-msg.php', true);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            input.value = "" ;
            scrollToBottom();
            console.log( chat.scrollTop ) ;
            console.log( chat.scrollHeight ) ;
            console.log( chat.clientHeight ) ;
        }
    };
    
    var formData = new FormData(form);
    xhr.send(formData);
}

let autoScrollEnabled = true ;

function scrollToBottom() {
    chat.scrollTop = chat.scrollHeight;
}

chat.onscroll = () => {
    autoScrollEnabled = (chat.scrollTop === chat.scrollHeight - chat.clientHeight);
};


setInterval(() => {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php-chat.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            chat.innerHTML = xhr.response;
            if ( autoScrollEnabled ) {
                scrollToBottom();
            }
        }
    };
    var formData = new FormData(form);
    xhr.send(formData);
}, 200);
