      	import './three.js-master/build/three.js';
        import './three.js-master/examples/js/libs/fflate.min.js';
        import './three.js-master/examples/js/loaders/GLTFLoader.js';
 		import './three.js-master/examples/js/controls/OrbitControls.js';
        import './three.js/examples/js/WebGL.js';
    	import './three.js-master/examples/js/libs/stats.min.js';
    	import './node_modules/jquery/dist/jquery.min.js';

     //%%%%%%%%%%%%%%%%%%%%%%%%%%% about fade wihen appear in view  %%%%%%%%%%%%%%%%%
     
			const faders = document.querySelectorAll('.about');
            const options={};
            
            const appear= new IntersectionObserver (function(entries,appear){
            	entries.forEach(entry =>{
            		if(!entry.isIntersecting){
            			return;
            		}else{
            			entry.target.classList.add("appear");
            			appear.unobserve(entry.target);
            		}
            		
            	}); 
            },options);
            
            faders.forEach(fader => {
            	appear.observe(fader);
            });
            
    //%%%%%%%%%%%%%%%%%%%%%%%%%%% about fade wihen appear in view  %%%%%%%%%%%%%%%%%
    
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
            
            
     //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%ù hover on grid content %%%%%%%%%%%%%%%%%%%%%%%// 
     
     const content_background = document.querySelectorAll(".content-background");
     
     
     content_background.forEach(content =>{
    	content.addEventListener("mouseover",function(event){
     		event.target.style.backgroundImage='url(/Media/grey.png)';
     		  
     		  });
     		 content.addEventListener("mouseleave",function(event){
     		event.target.style.backgroundImage ='url(/Media/galaxy.jpeg)';
     		  
     		  });
     	});

     //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%ù hover on upper paragraphe %%%%%%%%%%%%%%%%%%%%%%%// 
	
	const technology = document.getElementById("technology");
	const big_title = document.getElementById("big-title");

	big_title.addEventListener("mouseover",function(event){
    	event.target.style.color='#fff';
		technology.style.color='#c9401d';
   	});
    big_title.addEventListener("mouseleave",function(event){
    	event.target.style.color='#c9401d';
     	technology.style.color='#fff';
	});

      
	/////////////////////////////////////////////// 3d model ///////////////////////////////

//            if ( THREE.WEBGL.isWebGLAvailable() === false ) {

//                document.body.appendChild( WEBGL.getWebGLErrorMessage() );

//            }

//		
//            var container, stats, controls;
//            var camera, scene, renderer, light;

//            var clock = new THREE.Clock();

//            var mixer;

//            init();
//            animate();

//            function init() {

//                camera = new THREE.PerspectiveCamera( 50, window.innerWidth / window.innerHeight, 1, 2000 );
//                camera.position.set( 0, 150, 200);
//				camera.rotation.x= -Math.PI/12;
//				camera.updateProjectionMatrix();
//				renderer = new THREE.WebGLRenderer( { antialias: true } );
//                renderer.setPixelRatio( window.devicePixelRatio );
//                renderer.setSize( window.innerWidth, window.innerHeight );
//                renderer.shadowMap.enabled = true;
//                
//                container = document.getElementById('upper');
//                container.appendChild(renderer.domElement );
////                controls = new THREE.OrbitControls( camera , renderer.domElement);
////                controls.target.set( 0, 100, 0 );
////                controls.update();

//                scene = new THREE.Scene();
//                scene.background = new THREE.Color( 0xa0a0a0 );
//                //scene.fog = new THREE.Fog( 0xa0a0a0, 200, 1000 );

//                light = new THREE.HemisphereLight( 0x000000, 0x303030 );
//                light.position.set( 0, 0, 200 );
//                scene.add( light );

//                light = new THREE.DirectionalLight( 0xc9401d );
//                light.position.set( 0, 200, -200 );
//                light.castShadow = true;
//                light.shadow.camera.top = 180;
//                light.shadow.camera.bottom = - 100;
//                light.shadow.camera.left = - 120;
//                light.shadow.camera.right = 120;
//                scene.add( light );

//                // scene.add( new THREE.CameraHelper( light.shadow.camera ) );

//                // ground
//                var loader = new THREE.TextureLoader();
//                var texture = loader.load('Media/grey.png');
//                var geometry = new THREE.SphereGeometry(500,50,50);
//				var material = new THREE.MeshBasicMaterial({color:0xffffff});
//				var mesh = new THREE.Mesh(geometry,new THREE.MeshPhongMaterial({map: texture}));
//               /* var mesh = new THREE.Mesh( new THREE.PlaneBufferGeometry( 1000, 1000 ), new THREE.MeshPhongMaterial( { color: 0x999999,depthWrite: false } ) );
//                mesh.rotation.x = - Math.PI / 2;*/
//                mesh.receiveShadow = true;
//                mesh.material.side = THREE.BackSide;
//                mesh.rotation.y = -Math.PI/3;
//                mesh.rotation.x = Math.PI/2;
//                scene.add( mesh );

//                var grid = new THREE.GridHelper( 1000, 100, 0x505050, 0x505050 );
//                grid.material.opacity = 0.7;
//                grid.material.transparent = false;
//                scene.add( grid );

//                // model
//                var loader2 = new THREE.GLTFLoader();
//                loader2.load( 'scene.gltf', function ( gltf ) {
//                
//                    gltf.scene.traverse( function ( child ) {

//                        if ( child.isMesh ) {

//                            child.castShadow = true;
//                            child.receiveShadow = true;

//                        }

//                    } );

//                    scene.add(gltf.scene);

//                } );
//				

//                window.addEventListener( 'resize', onWindowResize, false );

//            }

//            function onWindowResize() {

//                camera.aspect = window.innerWidth / window.innerHeight;
//                camera.updateProjectionMatrix();

//                renderer.setSize( window.innerWidth, window.innerHeight );

//            }

//            //

//            function animate() {

//                requestAnimationFrame( animate );

//                var delta = clock.getDelta();

//                if ( mixer ) mixer.update( delta );

//                renderer.render( scene, camera );


//            }
//            
//           
//            
//            
//            
//            
