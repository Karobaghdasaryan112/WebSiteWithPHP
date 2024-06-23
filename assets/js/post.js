let images = document.getElementsByClassName("Post_img_tag");
let left_button = document.querySelector(".Post_left_carousel");
let right_button = document.querySelector(".Post_right_carousel")
let post_images = document.querySelector(".Post_images");
images[0].style.display  = "block";
for(let i=1;i<images.length;i++){
images[i].style.display = "none"
}
let count_images = images.length;
let index = 0;
window.addEventListener("load",function (){
    for(let i=0;i<images.length;i++){
        let naturalwidth =  parseFloat(images[i].naturalWidth);
        let naturalheight = parseFloat(images[i].naturalHeight);
        let widthcontent = 400;
        let heightcontent = 400;
        if(Math.abs(naturalwidth - naturalheight) <100 && naturalwidth+naturalheight<= (widthcontent+heightcontent)+100){
            images[i].style.width = 400 + "px";
            images[i].style.height = 400 + "px";
        }else if(Math.abs(naturalwidth - naturalheight) >=100 && naturalwidth+naturalheight<= (widthcontent+heightcontent)+100){
            images[i].style.width = naturalwidth + "px";
            images[i].style.height = naturalheight + "px"
        }else if(naturalwidth<naturalheight && Math.abs(naturalwidth/naturalheight) >0.75 && naturalwidth+naturalheight > (widthcontent+heightcontent)){
            images[i].style.width = 400 + "px";
            images[i].style.height = 400 + "px";
        }else if(naturalwidth>naturalheight && Math.abs(naturalwidth/naturalheight) <4/3 && naturalwidth+naturalheight > (widthcontent+heightcontent)){
            images[i].style.width = 400 + "px";
            images[i].style.height = 400 + "px";
        }else if(naturalwidth<naturalheight && Math.abs(naturalwidth/naturalheight) <0.75 && naturalwidth+naturalheight > (widthcontent+heightcontent)){
            let split = naturalheight/400;
            images[i].style.width =naturalwidth/split + "px";
            images[i].style.height = naturalheight/split  + "px";
        }else if(naturalwidth>naturalheight && Math.abs(naturalwidth/naturalheight) >4/3 && naturalwidth+naturalheight > (widthcontent+heightcontent)){
            let split = naturalwidth/400;
            images[i].style.width =naturalwidth/split + "px";
            images[i].style.height = naturalheight/split  + "px";
        }
    }
})
window.addEventListener("click",function (event){   
    if(event.target == left_button && index<=count_images-1 && index>0){
        images[index].style.display = "none";
        images[index-1].style.display = "block";
        index--;
    }else if(event.target == right_button && index>=0 && index<count_images-1){
        images[index].style.display = "none";
        images[index+1].style.display = "block";
        index++;
    }
})


