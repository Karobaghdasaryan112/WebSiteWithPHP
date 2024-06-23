let logincarousel = document.querySelector("#login_carousel");
let atr = logincarousel.getAttribute("src");
let value = 0;
let index = 1;
var interval = 2500;
let letterarray =
    [
        "a","s","d","f","g","h",
        "j","k","l","q","w","e",
        "r","t","y","u","i",
        "o","p","z","x","c",
        "v","b","n","m"
    ];
let dog = "@";
setInterval(function (){
    logincarousel.style.transition = "1.5s";
    logincarousel.style.opacity = "0.1"
    index++;
    if (index == 4) {
        index = 1;
    }
    setTimeout(function (){
        logincarousel.style.transition = "1.6s";
        logincarousel.style.opacity = "1"
    },1500)
    setTimeout(function (){

        logincarousel.setAttribute("src", `../assets/img/screenshot${index}.png`);
    },1500)
},4500)
let username = document.querySelector(".login_input_username");
let submit = document.querySelector(".login_input_submit");
submit.onclick = function (){
    let index = 0;
    let userarray = username.value.split("");
    if(userarray.length==0){
        userarray.type = "email";
        userarray.name = "email";
    }
    if(userarray.length>0) {
        userarray.forEach(function (value) {
            if (value == dog) {
                index++;
            }
        })
        if (index > 0) {
            username.type = "email";
            username.name = "email";
        } else {
            index = 0;
            userarray.forEach(function (value) {
                letterarray.forEach(function (letterindex) {
                    if (value == letterindex){
                        index++;
                    }
                })
            })
            if (index == 0){
                username.type = "number";
                username.name = "phone";
            }
            if(index >0){
                username.type = "username";
                username.name = "username";
            }
        }
    }
}

