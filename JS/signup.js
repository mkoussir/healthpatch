import '../js_lib/three.js-master/build/three.js';
import '../js_lib/three.js-master/examples/js/libs/fflate.min.js';
import '../js_lib/three.js-master/examples/js/loaders/GLTFLoader.js';
 import '../js_lib/three.js-master/examples/js/controls/OrbitControls.js';
import '../js_lib/three.js/examples/js/WebGL.js';
import '../js_lib/three.js-master/examples/js/libs/stats.min.js';
import '../js_lib/node_modules/jquery/dist/jquery.min.js';
// import '../js_lib/node_modules/cleave.js/dist/cleave.min.js';



//%%%%%%%%%%%%%%%%%%%%%%%%%%% about fade wihen appear in view  %%%%%%%%%%%%%%%%%

//     const faders = document.querySelectorAll('.about');
//     const options={};
    
//     const appear= new IntersectionObserver (function(entries,appear){
//         entries.forEach(entry =>{
//             if(!entry.isIntersecting){
//                 return;
//             }else{
//                 entry.target.classList.add("appear");
//                 appear.unobserve(entry.target);
//             }
            
//         }); 
//     },options);
    
//     faders.forEach(fader => {
//         appear.observe(fader);
//     });
    
// //%%%%%%%%%%%%%%%%%%%%%%%%%%% about fade wihen appear in view  %%%%%%%%%%%%%%%%%

//     const upper = document.querySelector(".upper");
//     const navbar = document.querySelector(".nav_bar");
//     const nav_options = { rootMargin:"-300px 0px 0px 0px"};
//     const background_nav = new IntersectionObserver (function(entries,background_nav){
//         entries.forEach(entry =>{
//             if(!entry.isIntersecting){
//                 navbar.classList.add('nav_bar_scroll');
//             }else{
//                 navbar.classList.remove('nav_bar_scroll');
//             }
            
//         }); 
//     },nav_options);
    
//   background_nav.observe(upper);
    
    
// //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%ù hover on grid content %%%%%%%%%%%%%%%%%%%%%%%// 

// const content_background = document.querySelectorAll(".content-background");


// content_background.forEach(content =>{
// content.addEventListener("mouseover",function(event){
//      event.target.style.backgroundImage='url(/Media/grey.png)';
       
//        });
//       content.addEventListener("mouseleave",function(event){
//      event.target.style.backgroundImage ='url(/Media/galaxy.jpeg)';
       
//        });
//  });

// //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%ù hover on upper paragraphe %%%%%%%%%%%%%%%%%%%%%%%// 

// const technology = document.getElementById("technology");
// const big_title = document.getElementById("big-title");

// big_title.addEventListener("mouseover",function(event){
// event.target.style.color='#fff';
// technology.style.color='#c9401d';
// });
// big_title.addEventListener("mouseleave",function(event){
// event.target.style.color='#c9401d';
//  technology.style.color='#fff';
// });

// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% cleave  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

document.addEventListener('DOMContentLoaded',()=>{
var cleave = new Cleave('.phone',{
    phone: true,
    PhoneRegionCode:'FR'
});

$('#country').change(function(){
    cleave.PhoneRegionCode = this.value;
    cleave.setRawValue('');
});   
});

const hide = document.querySelectorAll('.status-radio');

hide.forEach(element => {
    element.addEventListener('change',()=>{
        if(element.value == 'doctor')
        {
            document.querySelector('.doctor-name').classList.add('hidden');
        }else{
            document.querySelector('.doctor-name').classList.remove('hidden');
        }
     }); 
});
 




    
   
