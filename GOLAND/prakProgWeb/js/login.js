email = document.getElementsByName("email")[0];
pass = document.getElementsByName("password")[0];
login = document.getElementsByName("submit")[0];

email.removeAttribute("class");
pass.removeAttribute("class");
message = document.getElementsByTagName("p")[0];
message.innerHTML = "";

login.onclick = function cek(){
    if(email.value === ""){
        message.innerHTML += "- email belum terisi<br>";
        email.setAttribute("class", "warning");
    }
    if(pass.value === ""){
        message.innerHTML += "- password belum terisi<br>";
        pass.setAttribute("class", "warning");
    }
}