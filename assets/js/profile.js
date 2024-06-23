
let sloy = document.querySelector(".second_sloy");
let changeimg = document.querySelector(".Profile_change_img");
let profileview = document.querySelector(".Profile_view");
let profileimg = document.querySelector(".Profile_header_img");
let choosen = document.querySelector(".button_change_img_file");
let index = 0;
let sync = document.querySelector(".Profile_change_img_sync");
let form = document.querySelector(".form_Profile_img");
let addpost = document.querySelector(".Profile_menu-add");
let postsubmit = document.querySelector(".Profile_add_post_div");
let postsubmitall = document.querySelector(".Profile_add_post_div_all");
let buttonotmen = document.querySelector(".button_change_img");
buttonotmen.onclick = function (){
    changeimg.style.display = "none";
    sloy.style.display = "none";
}
window.onclick = function (event){
    if(event.target !=profileimg && event.target !=changeimg && event.target !=choosen){
        changeimg.style.display = "none";
        sloy.style.display = "none";
    }
}
profileimg.onclick = function (){
    changeimg.style.display = "block";
    sloy.style.display = "block";
    profileview.style.zIndex = "1"
    changeimg.style.display = "flex";
    changeimg.style.flexDirection ="column"
    changeimg.style.alignItems = "center";
}
choosen.onclick = function (){
    choosen.type = "file";
    choosen.name = "file";
    let submit = document.createElement("input");
    submit.type = "submit";
    submit.id = "button_change_img";
    submit.name = "otpravit";
    submit.value = "OK";
    form.appendChild(submit)
    submit.style.position = "relative";
    submit.style.bottom = "120px"
    submit.style.background = "white";
    submit.style.color = "blue";
}
let create = document.querySelector(".Profile_menu-add");
create.onclick = function (){
    sloy.style.display = "block";
    sloy.style.width = "100%"
    sloy.style.height = "100vh";
    sloy.style.position = "absolute";
    sloy.style.background = "#3d3c3c";
    sloy.style.zIndex = "2";
    profileview.style.zIndex = "1"
    sloy.style.opacity = "0.6";
    profileview.background = "#3d3c3c";
}
let postall = document.querySelector(".Profile_post_add_all");
postall.style.width = "0px"
let profilemenuadd = document.querySelector(".Profile_menu-add");
let sloypost = document.querySelector(".Profile_post_add_sloy");
let post = document.querySelector(".Profile_add_post");
let icon  = document.querySelector(".Profile_addpost_icon");
icon.style.width ="0px";
icon.style.height = "0px";
profilemenuadd.onclick = function (){
    post.style.display = "block";
    sloypost.style.display = "block";
    postall.style.display = "block";
    sloypost.style.width = "100%"
    sloypost.style.height = "100vh";
    sloypost.style.zIndex = "2";
    profileview.style.zIndex = "1"
    postall.style.width = "100%"
    postall.style.height = "100vh";
    postall.style.zIndex = "3";
    post.style.width ="500px";
    post.style.height = "550px"
    post.style.zIndex = "3";
    post.style.background = "white";
    sloypost.style.position = "absolute";
    postall.style.position = "absolute";
    post.style.position = "absolute";
    sloypost.style.background = "#3d3c3c";
    sloypost.style.opacity = "0.6";
    postall.style.display = "flex";
    postall.style.justifyContent = "centre"
    icon.style.width ="100px";
    icon.style.height = "100px";
    document.querySelector(".Profile_addpost_icon").style.display = "block"
}
let exitadd = document.querySelector('#addpost_submit');
window.onclick = function (event){
    if(event.target == exitadd){
        console.log(exitadd)
        document.querySelector(".Profile_addpost_icon").style.display = "none"
        icon.style.width ="0px";
        icon.style.height = "0px";
        post.style.display = "none";
        sloypost.style.display = "none";
        postall.style.display = "none";
    }
}
let choosenadd = document.querySelector('#addpost_submit_choosen')
choosenadd.onclick = function (){
    choosenadd.type = "file";
    choosenadd.name = "file_post[]";
    document.querySelector('#addpost_submit_ok').style.display = 'block';
}
let posts_div_img = document.getElementsByClassName("Global_posts_div_img");
let posts_div = document.getElementsByClassName("Global_posts_div_img_div");
let count = 0;
let arrayspan = document.getElementsByClassName("Profile_posts_like_count");

for(let i=0;i<arrayspan.length;i++){

    for(let j=0;j<posts_div[i].children.length;j++){
        console.log(posts_div[i])
        arrayspan[i].onclick = function (){
            console.log("loasd")
            if(posts_div[i].children.length !==1 ) {
                posts_div[i].children[j].style.zIndex = "-1"
                count++;
                if (count == posts_div[i].children.length) {
                    for (let j = 0; j < posts_div[i].children.length; j++) {
                        posts_div[i].children[j].style.zIndex = "1"
                    }
                    count = 0;
                }
            }
        }
    }
}
