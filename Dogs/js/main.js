/*================== MOBILE NAV ================*/
const mobileNavButton = document.querySelector('.mobile-nav-button');
const mobileNavIcon = document.querySelector('.mobile-nav-button__icon');
const mobileNav = document.querySelector('.mobile-nav');
const body = document.querySelector('body');
const mobileNavList=document.querySelector('.mobile-nav__list');
mobileNavButton.addEventListener('click', function () {
   mobileNavIcon.classList.toggle('active');
   mobileNav.classList.toggle('active');
   //Body.classList.toggle('no-scroll');
   document.body.classList.toggle('no-scroll');
}
);
mobileNavList.querySelectorAll('.mobile-nav__link').forEach(link=>{
   link.addEventListener('click', ()=>{
      mobileNavIcon.classList.toggle('active');
      mobileNav.classList.remove('active');
      //Body.classList.toggle('no-scroll');
      document.body.classList.remove('no-scroll');
   })
})
//---Плавный скролл---------------
const anchors=document.querySelectorAll('a[href*="#"]');
anchors.forEach(anchor =>{
   anchor.addEventListener('click',event=>{
      event.preventDefault();
      const sectionID=anchor.getAttribute('href').substring(1);
      document.getElementById(sectionID).scrollIntoView({
         behavior:'smooth',
         block:'start'
      })
   })
})









