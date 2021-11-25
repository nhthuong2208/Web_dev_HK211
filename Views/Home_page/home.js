const swiper1 = new Swiper(".slider-1", {
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    grabCursor: true,
    effect: "fade",
    loop: true,
    navigation: {
      nextEl: ".swiper-next",
      prevEl: ".swiper-prev",
    },
  });
  
  const swiper2 = new Swiper(".slider-2", {
    // loop: true,
    grabCursor: true,
    spaceBetween: 30,
    navigation: {
      nextEl: ".custom-next",
      prevEl: ".custom-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });
  
  const swiper3 = new Swiper(".slider-3", {
    loop: true,
    grabCursor: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    spaceBetween: 30,
    slidesPerView: 2,
    breakpoints: {
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 5,
      },
    },
  });

var user = document.getElementsByClassName("featured")[0].getElementsByTagName("span")[0].innerText;
document.getElementsByClassName("featured")[0].getElementsByTagName("span")[0].remove();
console.log(user);
for (let index = 0; index < document.getElementsByClassName("addToCart").length; index++) {
  document.getElementsByClassName("addToCart")[index].value = document.getElementsByClassName("addToCart")[index].getElementsByTagName("span")[0].innerText;
  document.getElementsByClassName("addToCart")[index].getElementsByTagName("span")[0].remove();
}

for (let index = 0; index < document.getElementsByClassName("addToCart").length; index++) {
  console.log(document.getElementsByClassName("addToCart")[index].value);
}
function add_Product(element){
  if(user == "customer"){
    window.location.href = "?url=Home/Login/";
  }
  else{
    var day_str = new Date();
    var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        console.log(this.responseText);
      }
	  };
    xmlhttp.open("GET", "?url=Home/create_cart/" + day_str.getFullYear() + "-" + String(day_str.getMonth() + 1) + "-" + String(day_str.getDate()) + "/" + element.value + "/" + 1 + "/", true);
    xmlhttp.send();
  }
}