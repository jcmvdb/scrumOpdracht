const randomBackgroundArray = [
    "https://www.brandweer.nl/wp-content/smush-webp/2021/08/Header-brand-winkelstraat-1600x800.jpg.webp",
    "https://www.brandweer.nl/wp-content/smush-webp/2021/08/brandweerauto-kopieren-1600x800.jpg.webp",
    "https://www.brandweer.nl/wp-content/uploads/2021/08/headerfoto-post-Cuijk.jpg",
    "https://www.brandweer.nl/wp-content/smush-webp/2021/08/Flevoland-Nieuwe-brandweervoertuigen-1-1600x800.jpg.webp",
];

const random = Math.floor(Math.random() * randomBackgroundArray.length);
console.log(random);


document.getElementById("loginScreenWrapper").style.background = 'url('+ randomBackgroundArray[random]+')';
document.getElementById("loginScreenWrapper").style.backgroundSize = "cover";
document.getElementById("loginScreenWrapper").style.backgroundAttachment = "fixed";
