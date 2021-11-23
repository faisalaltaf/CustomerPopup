


        //===START SHOP PAGE REQUEST CHECK SHOW POPUP DATABASE ============



// var shop = Shopify.shop;
// var xhr = new XMLHttpRequest();
// var url = 'apps/customer_email/pagecheck'
// var param = 'shop='+shop;
// xhr.open('POST', url, true);
//       xhr.onreadystatechange = function() {
//      if(this.readyState == 4 && this.status == 200) {
//           var page_store =JSON.parse(xhr.response);
//           console.log(page_store);
//      }
          
//       }
//       xhr.send(param);
     
//=== END  SHOP PAGE REQUEST CHECK SHOW POPUP DATABASE ============


var page_check_store = ShopifyAnalytics.meta.page.pageType;
console.log(page_check_store)
var getapend = document.querySelector("body");
var weekday =0;
var head  = document.getElementsByTagName('head')[0];
    var link  = document.createElement('link');
    link.rel  = 'stylesheet';
    link.type = 'text/css';
    link.href = 'https://customerpup.discountly.app/style.css';
    link.media = 'all';
    head.appendChild(link)
;
var getapend = document.querySelector("body");

//   ============REQUEST SENT POP UP DATA============== 
let user = getCookie("username");
if(user==''){

    var shop = Shopify.shop;
    var xhr = new XMLHttpRequest();
    var url = 'apps/customer_email/popupdata'
    var param = 'shop='+shop;
    xhr.open('POST', url, true);
          xhr.onreadystatechange = function() {
         if(this.readyState == 4 && this.status == 200) {
               var status_check = JSON.parse(xhr.response);
         var button = status_check.button;
         var email = status_check.email;
         var file_path = status_check.file_path;
         var list_item = status_check.list_item;
         var list = list_item.split(",");
         var top_heading = status_check.top_heading;
          var head_background = status_check.head_background; 
          var top_heading_color = status_check.top_heading_color;
          var top_heading_font = status_check.top_heading_font;
          var list_items_color = status_check.list_items_color;
          var list_items_font = status_check.list_items_font;
          var button_colors = status_check.button_colors;
          var tags_shop = status_check.tags_shop;
          weekday = status_check.weekday;
        var tags_shop_json =JSON.parse(tags_shop);
       var shop_check = tags_shop_json.toString().split(',')
      
       
     if(shop_check.some(shop_check => shop_check === page_check_store)){
        
    
        //  fruits.toString()
         
         var html =`<div class="md-modal md-show md-effect-1" id="modal-1">
         <div class="md-content" style='background-color:${head_background}'>
         
             <div class="popup-logo-wrap">
                 <img class="popup-logo" src="https://customerpup.discountly.app/images/${file_path}" alt="">
             </div>
             <div class="content_hide">
                 <h1 style="color:${top_heading_color}; font-family:${top_heading_font} ;">${top_heading}</h1>
                 <ul style="color:${list_items_color}; font-family:${list_items_font} ;" class="model-bullets">`;
                 list.forEach(element => {
                    html+=`<li>`+element+`</li>`;
                });
                html+=`
                 </ul>
                 
                 <div class="lead-capture">
                     <input id="input_email" class="lead-email" type="text" placeholder="${email}" required>
                     <button class="lead-button" style="background:${button_colors}; s" onclick = "submitbtn()">${button}</button>
                     <div class="alert_msg" style="display:none;">please entre the email</div>
                     <p class="already">Already a member? <a href="#">Log in</a></p>
                 </div>
                 </div>
                 </div>
                 </div>
                 <div onclick="overlay();" class="md-overlay md-show" style="display:block;"></div>
                 
         
         `;
         
         getapend.insertAdjacentHTML("afterend", html);
         
    }
        }
         
    };
    xhr.send(param);
    //   ============END REQUEST SENT POP UP DATA============== 
}


// function overlay(){
//     document.querySelector('#modal-1').style.display ='none';
//     document.querySelector('.md-overlay').style.display ='none';
// }


// ================START GET COOKIE FUNCTION ==================
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');  
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
// ================END COOKIE FUNCTION ==================






var modal = document.getElementById("modal-1");

function submitbtn(){
    let user = getCookie("username");
    document.querySelector('.lead-button').innerHTML = 'LOADING';
    if(user==""){

        var xhr = new XMLHttpRequest();
        var email= document.getElementById('input_email').value;
        var param = 'email='+email;
        var url = 'apps/customer_email';
          xhr.open('POST', url, true);
        
        //Send the proper header information along with the request
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {//Call a function when the state changes.
            // var value = JSON.parse(xhr.response)
            if(xhr.response == '422') {
                document.querySelector('.alert_msg').style.display= 'block';
                document.querySelector('.lead-button').innerHTML = 'Already Data';
            }else{
                // console.log(JSON.parse(xhr.response));
               var html_1 = `
            <div class="md-modal md-show md-effect-1" id="modal-2" style='width:60%;'>
            <div class="md-content">
         <div class="popup-logo-wrap" style="height:400px;" >
             <img class="popup-logo" src="https://customerpup.discountly.app/images/1637219837.svg" alt="">
         </div>
         <div class="content_hide">
           
             
             <div class="lead-capture">

             <div class="md-modal md-show md-effect-1">
             <div class="md-content">
             
                 <div class="popup-logo-wrap">
                     <img class="popup-logo" src="https://customerpup.discountly.app/images/check.png" alt="">
                 </div>
                 <div>
                 <h2> Successfully </h2>
                 </div>
                 </div>
                 </div>
             </div>
             
         </div>
     </div>
     </div>
                 `  
                 
                var content_hide = document.querySelector('#modal-1');
                // content_hide.insertAdjacentHTML("afterend", html_1);
                content_hide.innerHTML = html_1;
                setCookie("username", this.response, 30);
                set = getCookie("username");
                
                setTimeout(function(){
                     document.querySelector('.md-overlay').style.display ='none';
                     document.getElementById("modal-1").style.display = 'none'; 
                     document.getElementById("modal-2").style.display = 'none'; 
                    }, 2000);
                   
            }
    
            }
             xhr.send(param);
             
    }
        }
//  console.log(weekday)
     //  ===================== START COOKIE FUNCTION ======================
function setCookie(cname,cvalue,exdays) {
    const d = new Date();
    d.setTime(d.getTime() + ( weekday* 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    
      
  }
//  ===================== END COOKIE FUNCTION ======================
     





        // =============== START SWEET ALERT MESSEAGE =================
    //     $(document).on('click', '.SwalBtn1', function() {
    //         //Some code 1
    //         console.log('Button 1');
    //         swal.clickConfirm();
    //     });
    //     $(document).on('click', '.SwalBtn2', function() {
    //         //Some code 2 
    //         console.log('Button 2');
    //         swal.clickConfirm();
    //     });
    
    // $('#ShowBtn').click(function(){
    //     swal({
    //         title: 'Title',
    //         html: "Some Text" +
    //             "<br>" +
    //             '<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">' + 'Button1' + '</button>' +
    //             '<button type="button" role="button" tabindex="0" class="SwalBtn2 customSwalBtn">' + 'Button2' + '</button>',
    //         showCancelButton: false,
    //         showConfirmButton: false
    //     });
    //  }); 
    //     // =============== END SWEET ALERT MESSEAGE ================= 

// var xhr = new XMLHttpRequest();
// var url = '/userlogin';
// // var shop = u;
// xhr.open('POST', url, true);
// xhr.onreadystatechange = function() {
//      if(this.readyState == 4 && this.status == 200) {
//         //    var status_check = JSON.parse(xhr.response);
     
//     }
// };
// xhr.send(shop);
  

// console.log("hello1");
// // var shop = (Shopify.shop);

// document.write(
//     '<link rel="stylesheet" type="text/css" href="https://faisalchatapp.discountly.app/assets_chat/style.css">'
// );



// var getapend = document.querySelector("body");
// // `<button class="form_btn"><i class="far fa-question-circle" aria-hidden="true"></i>Help</button>`;

// //   const request = new XMLHttpRequest();
// // var url = 'apps/chat2';
// // request.open("POST",url,true);
// // request.send();





// var http = new XMLHttpRequest();
// var url = "/apps/chat2";
// var shop = Shopify.shop;
// http.open("POST", url, true);

// //Send the proper header information along with the request
// http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// http.onreadystatechange = function () {
//     //Call a function when the state changes.
//     if (http.readyState == 4 && http.status == 200) {
//         var obj = JSON.parse(http.response);
//        var statuscheck = obj[4];
//     //=== start status show and hide value get===//
//        var chat_status = statuscheck.contact
//        var question_status = statuscheck.question
//        var option_status = statuscheck.option
//        var main_status = statuscheck.mainscript
//        //=== end status show and hide value get===//
//     //    console.log(chat_status)

//         var obj_color = obj[0];
//         var obj_contact = obj[1];
//         var obj_question = obj[2];

//         // console.log(typeof obj_contact)
//         // console.log(typeof obj_question)
//         // console.log(typeof(obj_contact));

//         var len_contact = obj_contact.length;
//         var len_question = obj_question.length;

//         //   var faisal;
//         //  for(variables of obj_question){
//         //     avatar =`<section>
//         //     <button onclick="myFunction('best_question0',this)" class="w3-show quest_bg">${variables.question}?</button>
//         //     <div id="best_question0" class="w3-hide ans_bg">
//         //         <p>Once you have placed your order, we will send you a confirmation email to track the status of your order. Once your order is shipped we will send you another email along with the link to track your order. Or, you can track the status of your order from your "order history" section on your account page on the website.</p>
//         //     </div>
//         //     </section>`
//         //   }
//         // console.log(len_question);
//         // var question;
//         // for (variable of obj_question){
//         //   // console.log(variable.avatar);
//         //   question +=`<section>
//         //   <button onclick="myFunction('best_question0',this)" class="w3-show quest_bg">${variable.question}?</button>
//         //   <div id="best_question0" class="w3-hide ans_bg">
//         //       <p>Once you have placed your order, we will send you a confirmation email to track the status of your order. Once your order is shipped we will send you another email along with the link to track your order. Or, you can track the status of your order from your "order history" section on your account page on the website.</p>
//         //   </div>
//         //   </section>`
//         // }
//           //========LOOP FUNCTION CHAT DIV ==///////
//     function howMany(obj_contact) {
//         return `<a href="https://wa.me/${obj_contact.name}" class="whatsapp_form" target="https://wa.me/${obj_contact.number}">
//     <div class="w_img"><img src="https://faisalchatapp.discountly.app/icon_drop/${obj_contact.avatar}.png" alt=""></div>
//     <div class="w_head"><p>${obj_contact.name}${obj_contact.number}</p></div> 
//     </a>`;
//     }


      
//         var i = 0;
//         function howMany_1(obj_question) {
//             i++;
//             // console.log(i);
//             return `<div class='question_22' style="display:block">
//             <section>
//         <button onclick="myFunction_1('${obj_question.id}',this)" class="w3-show quest_bg">${obj_question.question}?</button>
//         </section>
//             </div>
            
//         <section>
//         <div id='${obj_question.id}'  style="display:none" id="best_question" class="w3-hide ans_bg">
//             <p>${obj_question.answer}.</p>
//         </div>
//         </section>`;
//         }
//         // console.log(obj_question.map(maphowMany_1(obj_question)))
//         // console.log(len_question)

//         //         let display = [];
//         // let print = Object.keys(obj_question).map(function(elem){
//         //     if(obj_question[elem] == 0 || obj_question[elem] ==""){
//         //         display = "N/A";
//         //     } else if (typeof obj_question[elem] =='object'){
//         //         display = obj_question[elem].join(", ") ;
//         //     } else {
//         //         display = obj_question[elem];
//         //     }
//         //     return `${elem.charAt(0).toUpperCase()}${elem.slice(1)}: ${display}`;
//         // })
//         // console.log(howMany(obj_contact));
//         // console.log(print.join('\n'));

//         //=========================start append chat area request response==================== ///
//         //====================================================================///
//         var buttomcoupen = `
       
//     <div  class="wla_background_color wal_form_btn "  onclick="open_widget()" style="display: block; float:right; background:${
//         obj_color.color
//     }">
//                     <div class="wla_front_icon"><img class="wal-btn" src="https://widget.abandonedguru.com/img/help-icon.png"></div>
//                     <div class="wla_fron_text">${obj_color.lable_text}</div>
//                 </div>
          
//         <div class="form_bg">
         
//          <div class="top_form" id="top_form_1">
         
//           <h3><span id="heading-back" style="display:none;"><img class="wal-arrow-left" style="filter: invert(0);"  onclick="close_ans()" width="20px" src="https://faisalchatapp.discountly.app/img/arrow-icon.png"></span id="heading-text"> <span>Whatsapp </span>  <img onclick="open_widget_1()" class="wal-arrow-right" width="20px" src="https://faisalchatapp.discountly.app/img/cross-icon.png"></h3> 
           
//          </div>	
         
//          <div class="body_form">

//           <div class="first" style="display:none" >
            
//          ${obj_contact.map(howMany).join("")} 
//           </div>
          
//          <div class="second" style="display:none">
//          <div id="show_question" class="slide-tr" style="display: block;"><div class="faq_quest" id="wla-quest">
//        <input id="besFilter" type="text" placeholder="How can we help?" style="background: url(https://faisalchatapp.discountly.app/img/search-icon.png) no-repeat !important;background-position: 10px !important;
//     background-size: 25px !important;">
//     ${obj_question.map(howMany_1).join("")}      
//     </div>
//             </div>
//             </div>
//           <div class="third" style="display:none">
      
//           <form class="contact_form" id="wal-contact" method="POST" style="display: block;">
//           <label>Name <span> *</span></label>
//           <input type="text" name="wal-name" id="wal-name" placeholder="" required="">
//           <label>Email Address <span> *</span></label>
//           <input type="text" name="wal-email" id="wal-email" placeholder="" required="">
//           <label>Phone Number<span> </span></label>
//           <input type="text" name="wal-number" id="wal-number" placeholder="">
//           <label>Question <span>*</span></label>
//           <textarea rows="4" name="wal-question" id="wal-question"></textarea>
//           <label id="captcha_lables">What is<span id="captcha_lable">1 + 3</span></label>
//           <input type="text" class="marg_0" name="captcha" id="captcha">
//           <p id="wrong"> To verify that you are not a robot</p>
//           <h3>By continuing, I agree to the privacy policy and provide my consent to contact me.</h3>
//          <button type="submit" class="wla_background_color"><span id="sub-btn" style="display: block;">Submit</span> <div id="sub-load" class="lds-ellipsis" style="display:none"><div></div><div></div><div></div><div></div></div></button>
//        </form>
          
//           </div>
//          </div>
//          <div class="footer_form wla_background_color" style = "background:${
//              obj_color.color
//          }">
//          <span class="help_icon_1 footer_icon">
//  <div class="footer_icon_active step_1_active wla_background_color" style="display: none; background:${
//      obj_color.color
//  }"></div>
//  <div class="help_icon_1 f_icon">
//      <a href="javascript:void(0);" id="step-1" onclick="question();">
//          <div class="f_show_icon"><img src="https://faisalchatapp.discountly.app/img/help-icon.png"></div>
//          <div class="f_icon_title">Help</div>
//      </a>
//  </div>
// </span>
//                      <span class="chat_icon_2 footer_icon">
//  <div class="footer_icon_active step_2_active wla_background_color" style="display: none; background:${
//      obj_color.color
//  }"></div>
//  <div class="f_icon">
//      <a href="javascript:void(0);" id="step-2" onclick="chat()">
//          <div class="f_show_icon"><img src="https://faisalchatapp.discountly.app/img/chat-icon.png"></div>
//          <div class="f_icon_title">Chat</div>
//      </a>
//  </div>
// </span>
// <span class="contact_icon_3 footer_icon">
//  <div class="footer_icon_active step_3_active wla_background_color" style="display: none; background:${
//      obj_color.color
//  }"></div>
//  <div class="f_icon">
//      <a href="javascript:void(0);" id="step-3" onclick="contact_form_fill()">
//          <div class="f_show_icon"><img src="https://faisalchatapp.discountly.app/img/contact-icon.png"></div>
//          <div class="f_icon_title">Contact</div>
//      </a>
//  </div>
// </span>
//   <p><a href="javascript:void(0);"> </a></p>
//      </div>          
//         </div>
        
        
//         `;
//         //=========================end append chat area request response==================== ///
//         //====================================================================///

//         //=========================satrt first div show chat area ==================== ///
//         //====================================================================///
//         getapend.insertAdjacentHTML("afterend", buttomcoupen);
//         document.querySelector(".first").style.display = "block";
//         document.querySelector(".form_bg").style.display = "none";

//         //=========================end first div show chat area ==================== ///
//         //====================================================================///
//         // console.log(obj[0])
//         // if(obj[0]){
//         //
//         //   document.querySelector('.wal_form_btn').style.background = obj_color.color;
//         //   document.querySelector('.footer_form').style.background = obj_color.color;

//         //========================= start position button left and right ==================== ///
//         //====================================================================///
//         if (obj_color.position == "right") {
//             document.querySelector(".wal_form_btn").style.right = "0";
//         }
//         if (obj_color.position == "left") {
//             document.querySelector(".wal_form_btn").style.left = "0";
//         }
//         //=========================end position button left and right ==================== ///
//         //====================================================================///
//         // document.querySelector('.wla_fron_text').innerHTML  = obj_color.lable_text;
//     }
// };
// http.send(shop);



// //========================= question function area==================== ///
// //====================================================================///
// function question() {
//     document.querySelector(".first").style.display = "none";
//     document.querySelector(".step_1_active").style.display = "block";
//     document.querySelector(".second").style.display = "block";
//     document.querySelector(".third").style.display = "none";
//     document.querySelector(".step_3_active").style.display = "none";
//     document.querySelector(".step_2_active").style.display = "none";
//     document.querySelector("#heading-back").style.display = "none";
// }
// //========================= chat function area==================== ///
// //====================================================================///
// function chat() {
//     document.querySelector("#heading-back").style.display = "none";
//     document.querySelector(".step_2_active").style.display = "block";
//     document.querySelector(".step_3_active").style.display = "none";
//     document.querySelector(".step_1_active").style.display = "none";
//     document.querySelector(".second").style.display = "none";
//     document.querySelector(".first").style.display = "block";
//     document.querySelector(".third").style.display = "none";
// }
// //========================= contact_form_fill function area==================== ///
// //====================================================================///
// function contact_form_fill() {
//     console.log("hello");
//     document.querySelector("#heading-back").style.display = "none";
//     document.querySelector(".step_3_active").style.display = "block";
//     document.querySelector(".step_1_active").style.display = "none";
//     document.querySelector(".step_2_active").style.display = "none";

//     document.querySelector(".second").style.display = "none";
//     document.querySelector(".first").style.display = "none";
//     document.querySelector(".third").style.display = "block";
// }
// //========================= end show area frontend chat==================== ///
// //====================================================================///

// function close_ans(){
//   console.log("hello");
// }
// // var obj_1 = obj[0];
// // console.log(obj_1)
// // $.get("apps/chat2", function(data, status){
// //     alert("Data: " + data + "\nStatus: " + status);
// //   });

// //========================= start frontend chat view assets==================== ///
// //====================================================================///
// function myFunction(Demo1) {
//     var x = document.getElementById(Demo1);
//     if (x.className.indexOf("w3-show") == -1) {
//         x.className += " w3-show";
//     } else {
//         x.className = x.className.replace(" w3-show", "");
//     }
// }

// function myFunction(Demo2) {
//     var x = document.getElementById(Demo2);
//     if (x.className.indexOf("w3-show") == -1) {
//         x.className += " w3-show";
//     } else {
//         x.className = x.className.replace(" w3-show", "");
//     }
// }

// function myFunction(Demo3) {
//     var x = document.getElementById(Demo3);
//     if (x.className.indexOf("w3-show") == -1) {
//         x.className += " w3-show";
//     } else {
//         x.className = x.className.replace(" w3-show", "");
//     }
// }

// function myFunction(Demo4) {
//     var x = document.getElementById(Demo4);
//     if (x.className.indexOf("w3-show") == -1) {
//         x.className += " w3-show";
//     } else {
//         x.className = x.className.replace(" w3-show", "");
//     }
// }

// function myFunction(Demo5) {
//     var x = document.getElementById(Demo5);
//     if (x.className.indexOf("w3-show") == -1) {
//         x.className += " w3-show";
//     } else {
//         x.className = x.className.replace(" w3-show", "");
//     }
// }

// //========================= end frontend chat view assets==================== ///
// //====================================================================///

// //========================= chat button view hide and show small button==================== ///
// //====================================================================///
// function open_widget() {
//     var x = document.querySelector(".form_bg");
//     if (x.style.display === "none") {
//         x.style.display = "block";
//     } else {
//         x.style.display = "none";
//     }
// }
// function open_widget_1() {
//     var x = document.querySelector(".form_bg");
//     x.style.display = "none";
// }

// //========================= end  view hide and show small button==================== ///
// //====================================================================///

// //=========================start question area hide and show answer  ==================== ///
// //====================================================================///
// function myFunction_1(id, query) {
//     // console.log(query)
//     var id_class = id;
//     let n = id_class.toString();
//     console.log('hello');
//   //  document.querySelector('.second').style.display = "none";
//     var x_id = document.getElementById(n);
//   //   x_id.style.display = "block";
//   //  var clas_div=  document.querySelector('.question_22');
//   //  clas_div.style.display = "none";
//     if (x_id.style.display === "none") {
//         x_id.style.display = "block";
//     } else {
//         x_id.style.display = "none";
//     }
// }
// //=========================end question area hide and show answer  ==================== ///
// //====================================================================///

// // =========================================================================
// // =============================STATUS CHECK REQUEST START =====================
// // =========================================================================
// // var xhr = new XMLHttpRequest();
// // var url = '/apps/chat2/checkstatus';
// // var shop = Shopify.shop;
// // xhr.open('POST', url, true);
// // xhr.onreadystatechange = function() {
// //      if(this.readyState == 4 && this.status == 200) {
// //         //    var status_check = JSON.parse(xhr.response);
// //            var status_check =xhr.response
// //         //    console.log( typeof(xhr.response));
// //            console.log( status_check.question);
// //            console.log( status_check.option);
// //         // ===== options check the condition hide and show icon =============///
// //            if(status_check.option==0){
// //             document.querySelector(".contact_icon_3").style.display = "none";
// //             document.querySelector(".third").style.display = "none";
// //         }
// //         // =========chat  check condition hide and show =====/
// //         if(status_check.contact==0){
// //             // console.log(status_check.contact)
// //             document.querySelector(".chat_icon_2").style.display = 'none';
// //             document.querySelector(".first").style.display = 'none'; 
// //         }
// //         // =========question check condition hide and show =====/
// //         if(status_check.question==0){
// //          document.querySelector(".help_icon_1").style.display = "none";
// //          document.querySelector(".second").style.display = "none";
         
// //      }
// //     }
// // };
// // xhr.send(shop);
  
// // // =========================================================================
// // =============================STATUS CHECK REQUEST END =====================
// // =========================================================================





//================= pup javascript ===============
