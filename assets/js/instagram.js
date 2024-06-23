 let post_images = document.getElementsByClassName("Instagram_post_images");
 let post_images_all = document.getElementsByClassName("Instagram_post_images");
 let images = post_images_all;
 let Instagram_post_comment_like = document.getElementsByClassName("Instagram_post_comment_like");
 console.log(Instagram_post_comment_like)
 window.addEventListener("load",function (){
     for(let i=0;i<images.length;i++){
         for(let j=0;j<images[i].children.length;j++) {
             let naturalwidth = parseFloat(images[i].children[j].naturalWidth);
             let naturalheight = parseFloat(images[i].children[j].naturalHeight);
             let widthcontent = 550;
             let heightcontent = 550;
             if (Math.abs(naturalwidth - naturalheight) < 100 && naturalwidth + naturalheight <= (widthcontent + heightcontent) + 100) {
                 images[i].children[j].style.width = 550 + "px";
                 images[i].children[j].style.height = 550 + "px";
             } else if (Math.abs(naturalwidth - naturalheight) >= 100 && naturalwidth + naturalheight <= (widthcontent + heightcontent) + 100) {
                 images[i].children[j].style.width = naturalwidth + "px";
                 images[i].children[j].style.height = naturalheight + "px"
             } else if (naturalwidth < naturalheight && Math.abs(naturalwidth / naturalheight) > 0.75 && naturalwidth + naturalheight > (widthcontent + heightcontent)) {
                 images[i].children[j].style.width = 550 + "px";
                 images[i].children[j].style.height = 550 + "px";
             } else if (naturalwidth > naturalheight && Math.abs(naturalwidth / naturalheight) < 4 / 3 && naturalwidth + naturalheight > (widthcontent + heightcontent)) {
                 images[i].children[j].style.width = 550 + "px";
                 images[i].children[j].style.height = 550 + "px";

             } else if (naturalwidth < naturalheight && Math.abs(naturalwidth / naturalheight) < 0.75 && naturalwidth + naturalheight > (widthcontent + heightcontent)) {
                 let split = naturalheight / 550;
                 images[i].children[j].style.width = naturalwidth / split + "px";
                 images[i].children[j].style.height = naturalheight / split + "px";

             } else if (naturalwidth > naturalheight && Math.abs(naturalwidth / naturalheight) > 4 / 3 && naturalwidth + naturalheight > (widthcontent + heightcontent)) {
                 let split = naturalwidth / 550;
                 images[i].children[j].style.width = naturalwidth / split + "px";
                 images[i].children[j].style.height = naturalheight / split + "px";
             }
         }
     }
 })

for(let i=0;i<post_images_all.length;i++){
    for(let j=1;j<post_images_all[i].children.length;j++){
        post_images_all[i].children[j].style.display = "none"
    }
}
function post_like(post_id,user_id,e){
    const url = "../actions/instagramAction.php"
    const data = new URLSearchParams()
    data.append("status",e.target.checked ? `like` : `dislike`)
    data.append("post_id",post_id)
    data.append("user_id",user_id)
    fetch(url,{
        method: "POST",
        body: data,
        headers:{
            "Content-Type": 'application/x-www-form-urlencoded'
        }
    }).then(res => res.text())
        .then(res => {
            let like = document.querySelector(`.Instagram_post_like_count${post_id}`);
            if(e.target.checked){
                like.innerHTML = +like.innerHTML + 1;
            }else{
                like.innerHTML = +like.innerHTML - 1;
            }
        })
}
let index = 0;
 let left_button = document.querySelector(".Post_left_carousel");
 let right_button = document.querySelector(".Post_right_carousel")
 for(let i=0;i<images.length;i++) {
     window.addEventListener("click", function (event) {
         let count_images = images[i].children.length;
         if (event.target == left_button && index <= count_images - 1 && index > 0) {
             images[i].children[index].style.display = "none";
             images[i].children[index-1].style.display = "block";
             index--;
         } else if (event.target == right_button && index >= 0 && index < count_images - 1) {
             images[i].children[index].style.display = "none";
             images[i].children[index+1].style.display = "block";
             index++;
         }
     })
 }
 function add_comment(post_id,user,avatar){
     const url = "../actions/instagramAction.php"
     const data = new URLSearchParams()
    let comment = document.querySelector(`#Instagram_comment${post_id}`)
     let view_comment = document.createElement(`div`)
     view_comment.className = "posts_comment_and_username";
     let div = document.querySelector(`#Instagram_view_comment${post_id}`).appendChild(view_comment);
     let useravatar = document.createElement("img");
     useravatar.setAttribute("src",avatar)
     useravatar.style.width = "40px"
     useravatar.style.height = "40px"
     useravatar.style.borderRadius = "50%";
     if(comment.value != "") {
         data.append("post_id", post_id)
         data.append("comment", comment.value)
         fetch(url, {
             method: "POST",
             body: data,
             headers: {
                 "Content-Type": 'application/x-www-form-urlencoded'
             }
         })
             .then(res => res.text())
             .then(res => {
                 let add_view = document.querySelector(`#Instagram_add_comment_view${post_id}`);
                 add_view.innerHTML = comment.value;
                 let span = document.createElement("span");
                 let span_user =  document.createElement("span");
                 let input = document.createElement("input");
                 input.className = "input";
                 input.type = "checkbox"
;                 span_user.className = "span_username"
                 span_user.innerHTML = user;
                 span.innerHTML = comment.value;
                 view_comment.appendChild(useravatar)
                 view_comment.appendChild(span_user)
                 view_comment.appendChild(span)
                 view_comment.appendChild(input)
                 input.style.position = "relative";
                 input.style.left = "231.5px"
                 comment.value = "";
                 let comment_count = document.querySelector(`#view_all_comments_count${post_id}`);
                 comment_count.innerHTML  = +comment_count.innerHTML + 1;
             })
         }
    }

function view_comment(post_id){
    let all_view =  document.querySelector(`#Instagram_view_comment${post_id}`)
     let post_all = document.querySelector(`.Instagram_post_all_flex${post_id}`)
     let post = document.querySelector(`#Instagram_post${post_id}`);
     post.style.width = "50%"
    post_all.style.display = "flex"
     let view_comment = document.querySelector(`#Instagram_view_comment${post_id}`);
     view_comment.style.display = "block";
     view_comment.style.display = "flex"
    all_view.style.display = "flex"
    all_view.style.flexDirection = "column"
}
 function close_comment(post_id){
     let view_comment = document.querySelector(`#Instagram_view_comment${post_id}`);
     view_comment.style.display = "none";
     let post = document.querySelector(`#Instagram_post${post_id}`);
     post.style.width = "100%"
     post.style.display = "block";
     post.style.display = "flex"
     post.style.flexDirection = "column"
     post.style.justifyContent = "center";
     post.style.alignItems = "center"
 }