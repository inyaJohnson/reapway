const  navSlide = () =>{
    const navToggle = document.querySelector('.custom-menu-btn');
    const navMenu = document.querySelector('.nav-menu');
    const navItem = document.querySelectorAll('.nav-item');

    navToggle.addEventListener('click', () => {

        navMenu.classList.toggle('nav-active');     //nav toggle

        navItem.forEach((link, index)=>{
            if(link.style.animation){
                link.style.animation = '';
            }else {
                link.style.animation = `nav-menu-fadeIn 0.5s ease forwards ${index / 7 + 0.3}s`
            }
        })    // Nav animation

        navToggle.classList.toggle('toggle'); // custom-menu-btn
    })

}

navSlide();