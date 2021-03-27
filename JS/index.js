        import '../js_lib/three.js-master/examples/js/libs/fflate.min.js';
 		import '../js_lib/three.js-master/examples/js/controls/OrbitControls.js';
    	import '../js_lib/node_modules/jquery/dist/jquery.min.js';
    	
     //%%%%%%%%%%%%%%%%%%%%%%%%%%% Intro %%%%%%%%%%%%%%%%%
     
     const t1 = gsap.timeline({defaults:{ease :"power1.easeInOut"}});
     const t2 = gsap.timeline({defaults:{ease :"power1.none"}});   
     const t3 = gsap.timeline({defaults:{ease :"none"}});    
     const technology = document.getElementById("technology");
     
          
     t1.to(".hide-h4",{y: "0%" , duration :0, stagger : 0});
     t1.to(".slider",{ y: "-100%",duration:0, delay:0});
     t1.to(".intro",{y:"-100%",duration:0},"-=0.75");
     t1.fromTo(".slider",{rotateY:"0deg"},{rotateY:"45deg",duration:1},"-=0.75");
     t1.fromTo(".intro",{rotateY:"0deg"},{rotateY:"45deg",duration:1},"-=0.75");
	 t2.fromTo(".nav_bar",{opacity:0},{opacity:1,duration:1, delay:0});
     t2.fromTo(".logo",{opacity:0},{opacity:1,duration:1},"-=1");
     t1.to(".big-title",{x: "0%",opacity:1, duration :0.5},"-=0.5");
     t1.to(technology,{x: "0%" ,opacity:1, duration :0.5},"-=0.5");
     
     
            
    //%%%%%%%%%%%%%%%%%%%%%%%%%%% nav bar stay at the top  %%%%%%%%%%%%%%%%%
    
    		const upper = document.querySelector(".upper");
    		const navbar = document.querySelector(".nav_bar");
    		const nav_options = { rootMargin:"-300px 0px 0px 0px"};
    		const background_nav = new IntersectionObserver (function(entries,background_nav){
            	entries.forEach(entry =>{
            		if(!entry.isIntersecting){
            			navbar.classList.add('nav_bar_scroll');
            		}else{
						navbar.classList.remove('nav_bar_scroll');
            		}
            		
            	}); 
            },nav_options);
            
          background_nav.observe(upper);
			
            
     //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%ù hover on upper paragraphe'%%%%%%%%%%%%%%%%%%%%%%%// 
	

		const big_title = document.querySelectorAll(".big-title");
		const text_wrapper = document.querySelector(".text-wrapper");

		big_title.forEach(content =>{
			content.addEventListener("mouseover",function(event){
				text_wrapper.classList.add('text-change-color');
				text_wrapper.classList.add('technology-change-color');
			});
			content.addEventListener("mouseleave",function(event){
				text_wrapper.classList.remove('text-change-color');
				text_wrapper.classList.remove('technology-change-color');
			});
		});
    
		

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% animate the section of images %%%%%%%%%%%%%%%%%%%%%%%// 
		const animated_images = document.querySelectorAll(".animate-item");
		const tween = new TimelineLite({ease:"power2.inOut"});
		const time_image = 1;
		const path1 ={
			curviness:1,
			path :[
				{left:'50%',top:'20%'}
				,{left:'80%',top:'50%'}
			]
		};
		const path2 ={
			curviness:1,
			path :[
				{left:'50%',top:'80%'}
				,{left:'20%',top:'50%'}	
			]
		};
		const path3 ={
			curviness:1,
			path :[
				{left:'80%',top:'50%'}
				,{left:'50%',top:'80%'}
			]
		};
		const path4 ={
			curviness:1,
			path :[
				{left:'20%',top:'50%'}
				,{left:'50%',top:'20%'}
			]
		};

		tween.to(animated_images[0],time_image,{
				motionPath:path1
				,scale:'1.4'
				,opacity:1
			})
			.to(animated_images[1],time_image,{
				motionPath:path2
				,scale:'1.4'
				,opacity:1
				},"-=1")
			.to(animated_images[2],time_image,{
				motionPath:path3
				,scale:'1.4'
				,opacity:1
			},"-=1")
			.to(animated_images[3],time_image,{
				motionPath:path4
				,scale:'1.4'
				,opacity:1			
			},"-=1")
			.to(animated_images,1,{left:'50%',top:'50%',scale:'0.8'}).to('.animate-item-text',1,{opacity:1});

		const controller = new ScrollMagic.Controller();
		const scene = new ScrollMagic.Scene({
			triggerElement:'.about',
			duration:5000,
			triggerHook:0
		}).setPin(".about").addTo(controller).setTween(tween);

	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% animate the heart beat %%%%%%%%%%%%%%%%%%%%%%%// 

	let path6 = anime.path('#heart path');
	anime({
		targets:'#shape',
		translateX:path6('x'),
		translateY:path6('y'),
		easing:'linear',
		duration:6000,
		loop:true
	});

	anime({
		targets:'#heart path',
		strokeDashoffset:[anime.strokeDashoffset,1200],
		easing:'linear',
		duration:4000,
		direction:'reverse',
		loop:true
	});

       
           
            
            
            
            
