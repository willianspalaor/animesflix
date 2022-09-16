

/*
  MAPA DE FUNÃƒâ€¡Ãƒâ€¢ES
  
  01 -> modify_element
  02 -> set_element
  03 -> get_user_info
  04 -> set_style
  05 -> set_cookie
  06 -> get_cookie
  07 -> set_google_analitycs
  08 -> get_date
  09 -> disable_developer_mode
  10 -> disable_keydown
  11 -> get_page_referrer
  12 -> buffering
  13 -> get_cookie_2
  14 -> detect_adblock()
  15 -> set_title_page(string)
  16 -> forceSSL()
  17 -> loaderImages(time)
  18 -> owlCarousel(id, array)
  19 -> get_scroll_moviment() return up or down
  20 -> go_link(url) direct page for url especific
  21 -> remove_element(id) remove element html
*/


/*
  RECEBEDO COMO PARAMENTRO DOS VALORES, (ID DO ELEMENTO HTML, AÃƒâ€¡ÃƒÆ’O A SER EXECUTADA)
  AÃƒâ€¡Ãƒâ€¢ES
    -> HIDE (ESCONDE O ELEMENTO)
    -> SHOW (EXIBE O ELMENTO)
    -> REMOVE -> (REMOVE O ELEMENTO DO HTML, EXCLUI)
*/
  function modify_element(element,action){
    setTimeout( function() {
      if(action == 'hide'){
         document.getElementById(element).style.zIndex  = "-99999";    
         document.getElementById(element).style.display = "none";
      }
      if(action == 'show'){
         document.getElementById(element).style.zIndex  = "99999";    
         document.getElementById(element).style.display = "block";
      }
      if(action == 'remove'){
         var elem = document.getElementById(element);
         elem.remove();
      }
    }, 100);  
  }

/*
  CRIA ELEMENTOS HTML
    PARAMENTROS
      -> ELEMENT (tag do elemento)
      -> ID (id do elemento)
      -> CLASSNAME -> (class do elemento)
      -> SRC -> (atributo src, se necessÃƒÂ¡rio)
      -> LOCATION (head ou body)
      -> TIMER (tempo de execuÃƒÂ§ÃƒÂ£o em micro-segundos)
*/
  function set_element(element, id, className, src, style, location, timer){
    setTimeout( function() {  
      tag = document.createElement(element);
      if(className != ''){ tag.className = className; }
      if(id != ''){        tag.id = id; }
      if(src != ''){       tag.src = src; }
      if(style != ''){     tag.style=style; }
        
      if(element == 'iframe'){ tag.scrolling='no'; }     
      if(element == 'script'){ tag.type = 'text/javascript'; }
      if(location == 'body') { document.body.appendChild(tag); }
      if(location == 'head') { document.head.appendChild(tag); }         
    }, timer);
  }

//RETORNA UM ARRAY (DISPOSITIVO, NAVEGADOR, LARGURA, ALTURA)
  function get_user_info(){
    //DIMENSSÃƒâ€¢ES DO APARELHO LAGURA E ALTURA
    var width  = screen.width; 
    var height = screen.height;
    
    //DISPOSITVO DO USUÃƒÂRIO, RETORNA (mobile, smartv, desktop)
    var agentUser = navigator.userAgent.toLowerCase();    
    var device = false;    
    if(agentUser.indexOf("iphone")     >= 0){ device=true; sistema='ios'; }
    if(agentUser.indexOf("ipad")       >= 0){ device=true; sistema='ios'; }
    if(agentUser.indexOf("ipod")       >= 0){ device=true; sistema='ios'; }
    if(agentUser.indexOf("android")    >= 0){ device=true; sistema='android'; } 
    if(agentUser.indexOf("webos")      >= 0){ device=true; sistema='android'; }
    if(agentUser.indexOf("blackberry") >= 0){ device=true; sistema='android'; }
    if(agentUser.indexOf("webos")      >= 0){ device=true; sistema='android'; }
    if(agentUser.indexOf("symbian")    >= 0){ device=true; sistema='android'; }
    if(device == true){ device = 'mobile'; }
    else{
       if(agentUser.indexOf("smart") >= 0){ device=true; sistema='smartv'; }
       if(agentUser.indexOf("tv")    >= 0){ device=true; sistema='smartv'; }
       if(device == true){ device = 'smartv'; sistema='smartv'; }
       else{ device = 'desktop'; sistema='windows'; }
    }
    
    //NAVEGADOR DO USUÃƒÂRIO RETORNA (firefox, avast, opera, chrome)
    browserc = navigator.userAgent.toLowerCase();
    if(browserc.indexOf("firefox/") >= 0){ browserc='firefox'; }
    if(browserc.indexOf("avast/") >= 0){   browserc='avast'; }
    if(browserc.indexOf("opr/") >= 0){     browserc='opera'; }
    if(browserc.indexOf("chrome/") >= 0){  browserc='chrome'; } 
    if(browserc.indexOf("safari/") >= 0){  browserc='safari'; } 

    var userArray = {'device':device, 'browser':browserc, 'width':width, 'height':height, 'system':sistema};
    return userArray;
  }

//ATRIBUI UM ESTILO A UMA ELEMENTO (id do elemento html, estilo, tempo de execuÃƒÂ§ÃƒÂ£o)
  function set_style(element, style, timer){
    setTimeout( function() {
      tag = document.getElementById(element);
      tag.style = style;
    }, timer*1000);
  }

//CRIA UM COOKIE (nome, valor, tempo de expiraÃƒÂ§ÃƒÂ£o)
  function set_cookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*60000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  } 

//PEGA UM COOKIE (nome do cookie) retorna false caso cookie nÃƒÂ£o exista
  function get_cookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++){
        var c = ca[i];
        while(c.charAt(0) == ' '){ c = c.substring(1); }
        if(c.indexOf(name) == 0){ return true; }
    }
    return false;
  }  

//CRIAR FUNÃƒâ€¡ÃƒÆ’O DO GOOGLE ANALITYCS
  function set_google_analitycs(analitycsCode){
    tag = document.createElement("script");
    tag.src = 'https://www.googletagmanager.com/gtag/js?id='+analitycsCode;
    document.head.appendChild(tag);  
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', analitycsCode);
  }

//RETORNA UMA ARRAY COM A DATA ATUAL
  function get_date(){
   //ObtÃƒÂ©m a data/hora atual
     var data = new Date();
   //Guarda cada pedaÃƒÂ§o em uma variÃƒÂ¡vel
     var dia     = data.getDate();           // 1-31
     if(dia <= 9){ dia = '0'+dia; }
     var dia_sem = data.getDay()+1;          // 1-6 (1=domingo)
     var mes     = data.getMonth()+1;        // 1-12 (1=janeiro)
     if(mes <= 9){ mes = '0'+mes; }
     var ano2    = data.getYear();           // 2 dÃƒÂ­gitos
     var ano4    = data.getFullYear();       // 4 dÃƒÂ­gitos
     var hora    = data.getHours();          // 0-23
     var min     = data.getMinutes();        // 0-59
     var seg     = data.getSeconds();        // 0-59
     var mseg    = data.getMilliseconds();   // 0-999
     var tz      = data.getTimezoneOffset(); // em minutos
   //Formata a data e a hora (note o mÃƒÂªs + 1)
     str_data = ano4 + '/' + mes + '/' + dia;
     var str_hora = hora + ':' + min + ':' + seg;

     var date_array = {'day':dia, 'week':dia_sem, 'month':mes, 'year':ano4, 'hour':hora, 'min':min, 'seg':seg};
     return date_array;
  }

//DESABILITA MODO DESENVOLVEDOR NO NAVEGADOR
  function disable_developer_mode(action=null){

    var userinfo = get_user_info();

   (function () {
      'use strict';
      const devtools = { isOpen: false, orientation: undefined };
      const threshold = 160;
      const emitEvent = (isOpen, orientation) => {
        window.dispatchEvent(new CustomEvent('devtoolschange', {
          detail: {
            isOpen,
            orientation
          }
        }));
      };
      const dev_mode = ({emitEvents = true} = {}) => {
        const widthThreshold = window.outerWidth - window.innerWidth > threshold;
        const heightThreshold = window.outerHeight - window.innerHeight > threshold;
        const orientation = widthThreshold ? 'vertical' : 'horizontal';

        if(!(heightThreshold && widthThreshold) && ((window.Firebug && window.Firebug.chrome && window.Firebug.chrome.isInitialized) || widthThreshold || heightThreshold)){
          if((!devtools.isOpen || devtools.orientation !== orientation) && emitEvents) { emitEvent(true, orientation); }
          devtools.isOpen = true;
          devtools.orientation = orientation;
        }else{
          if(devtools.isOpen && emitEvents) { emitEvent(false, undefined); }
          devtools.isOpen = false;
          devtools.orientation = undefined;
        }
      };
      dev_mode({emitEvents: false});
      setInterval(dev_mode, 100);
      if(typeof module !== 'undefined' && module.exports) { module.exports = devtools; } else { window.devtools = devtools; }
    })();

    if(window.devtools.isOpen == true && userinfo['system'] != 'ios'){
      if(action == 'clean_html'){ $('html').remove(); console.clear(); }
      if(action == null){ window.location.href = window.location.href; }
    }
      
    window.addEventListener('devtoolschange', event => {
      if(userinfo['system'] != 'ios'){
        if(action == 'clean_html'){ $('html').remove(); console.clear(); }
        if(action == null){ window.location.href = window.location.href; }
      } 
    });

  }

//DESABILITA BOTÃƒÆ’O CTRL DO TECLADO
  function disable_keydown(){
    document.addEventListener("keydown", function (event) { if (event.ctrlKey) { event.preventDefault(); } });
    document.addEventListener('contextmenu', event => event.preventDefault());
  }

//RETORNA A REFERENCIA DA PAGINA
  function get_page_referrer(){
    return document.referrer;
  }

//EXIBE NA TELA UM GIF DE LOADING
  function buffering(str){
    if(str == 'start'){        
       var txt =  '<div id="buffering" style="position:fixed;z-index:2147483638;top:0;left:0;right:0;bottom:0;width:100%;background:rgba(0,0,0,0.9);">';
       txt += '<span style="margin: auto;right: 0;left: 0;top: 0;bottom: 0;width: wid%;height: 150px;position: absolute;color: #fff;width: 75px;">Aguarde...</span>';
       txt     += '<div style="width: 70px; height: 70px; border: 5px solid; border-color: #000 #ffc107 #ffc107 #ffc107; border-radius: 50%; animation: loadingx 0.5s infinite; margin: auto; left: 0; bottom: 0; right: 0; top: 0;position: absolute;"></div><style type="text/css">@keyframes loadingx{ 0%{ transform:rotate(0deg); }100%{ transform:rotate(360deg); } }</style></div>';
       $('body').append(txt);
    }
    if(str == 'ending'){
      if((document.getElementById('buffering')) != null){ document.getElementById('buffering').remove(); }
    }
  }

//RETORNA VALOR DO COOKIE RECEBENDO COMO PARAMENTRO O NOME
  function get_cookie_2(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  }

  function detect_adblock(){
    var tag = document.createElement('script');
    tag.setAttribute('type','text/javascript');
    tag.setAttribute('src','https://developersone.com.br/scripts/prebid-ads.js');
    document.head.appendChild(tag);
  }

  function set_title_page(str){
    document.title = str;
  }
  
  function forceSSL(){
    if(location.protocol == 'http:'){ window.location.href="https://"+window.location.host; }  
  }
  
  function loaderImages(timer=1){
    setTimeout( function() {
      imgs = document.getElementsByTagName('img');
      for(var i=0; i < imgs.length; i++){
        if(typeof(imgs[i]) != 'undefined'){
          if(imgs[i].src == ''){
            if(imgs[i].dataset != ''){
              var dataset = imgs[i].getAttribute('data-src');
              if(dataset.indexOf(",") >= 0){
                img = imgs[i].getAttribute('data-src').split(',');
                img_poster   = img[0];
                img_backdrop = img[1];
                if(img_backdrop == ''){ img_backdrop=img_poster; }
                if(img_poster   == ''){ img_poster  =img_backdrop; }
                if(screen.width > screen.height){ image=img_backdrop; }else{ image=img_poster; }
                imgs[i].setAttribute('src', image);
              }else{
                imgs[i].setAttribute('src', dataset);
              }
            }
          }
        }
      }
    }, timer);
  }

  function owlCarousel(id, array,margin=6,padding=20,loop=false){    
    jQuery(document).ready(function($) {
      $("#"+id).owlCarousel({ 
        autoplay:true,
        margin:margin,
        autoplayTimeout:60000,
        autoplayHoverPause:true,
        loop:loop, 
        stagePadding:padding, 
        nav:true, 
        slideSpeed:10000, 
        paginationSpeed:5000, 
        autoPlay:60000, 
        addClassActive:true, 
        responsive:{ 0:{items:array[0]},414:{items:array[1]},567:{items:array[2]},768:{items:array[3]},992:{items:array[4]},1200:{items:array[5]}, 1400:{items:array[6]} }
      });
    }); 
  }

  function get_scroll_moviment(){
    window.addEventListener("wheel", event => {
      const delta = Math.sign(event.deltaY); 
      if(delta == -1){ return 'up'; }else{ return 'down'; }
    });          
  }
  
  function meta_seo(page_title,meta_description,page_url=null){  
    if(page_title != null){ 
      document.title = atob(page_title);
      document.querySelector('meta[property="og:title"]').setAttribute("content", atob(page_title));
      document.querySelector('meta[name="twitter:title"]').setAttribute("content", atob(page_title));
    }
    
    if(meta_description != null){
      document.querySelector('meta[name="description"]').setAttribute("content", atob(meta_description));    
      document.querySelector('meta[property="og:description"]').setAttribute("content", atob(meta_description));   
      document.querySelector('meta[name="twitter:description"]').setAttribute("content", atob(meta_description));  
    }
    
    if(page_url != null){
      document.querySelector('link[rel="alternate"]').setAttribute("href", atob(page_url));
      document.querySelector('link[rel="canonical"]').setAttribute("href", atob(page_url));
      document.querySelector('link[rel="shortlink"]').setAttribute("href", atob(page_url));
      document.querySelector('meta[property="og:url"]').setAttribute("content", atob(page_url));
    }
  }

  function go_link(url){
    window.location.href=url;
  }


