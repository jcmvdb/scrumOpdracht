const randomBackgroundArray = [
    "/assets/img/loginBackground/back1.webp",
    "/assets/img/loginBackground/back2.webp",
    "/assets/img/loginBackground/back3.jpg",
    "/assets/img/loginBackground/back4.webp",
    "/assets/img/loginBackground/back5.png",
];

const random = Math.floor(Math.random() * randomBackgroundArray.length);
console.log(random);


document.getElementById("loginScreenWrapper").style.background = 'url('+ randomBackgroundArray[random]+')';
document.getElementById("loginScreenWrapper").style.backgroundSize = "cover";
document.getElementById("loginScreenWrapper").style.backgroundAttachment = "fixed";
