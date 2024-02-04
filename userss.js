const usersBottom = document.querySelector(".users .users-bottom") ;
const search = document.querySelector('.users-top .search input');
const activeNow = document.querySelector('.active-now .img');

search.onkeyup = () => {
    let searchValue = search.value ;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php-search.php', true);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            usersBottom.innerHTML = xhr.response ;
            if( search != "" ) {
                search.classList.add("active") ;
            } else {
                search.classList.remove("active") ;
            }
            // console.log(xhr.response) ;
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/X-www-form-urlencoded');
    xhr.send("searchValue=" + searchValue);
}

setInterval( () => {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'php-users.php', true);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if ( !search.classList.contains("active") ) {
                usersBottom.innerHTML = xhr.response ;
            }
        }
    };
    xhr.send();
}, 500 )

setInterval( () => {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'php-active.php', true);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            activeNow.innerHTML = xhr.response ;
        }
    };
    xhr.send();
}, 500 )


