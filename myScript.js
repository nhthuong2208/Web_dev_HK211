function click_Checkbox() {
    if(window.innerWidth <= 880 ||  screen.width <= 880)
        if(document.getElementById('check').checked ==  true) {
            document.getElementById('main').style.left = '0%';
        }
        else{
            document.getElementById('main').style.left = '-100%';
        }
    else{
        if(document.getElementById('check').checked ==  true) 
            document.getElementById('mid_nav').style.left = '0%';
        else
            document.getElementById('mid_nav').style.left = '-100%';
    }

}

