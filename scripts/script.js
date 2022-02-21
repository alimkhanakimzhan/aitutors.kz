
$(function frmotpr(){
        var field = new Array("email", "password", "name", "surname","gpa", "dateofbirth", "gender","gpa", 
            "phone_number", "course","price","persinformation","subjectinformation");
        $("#reg_form").submit(function() {
            var error=0;
            $("#reg_form").find(":input").each(function() {
                for(var i=0;i<field.length;i++){
                    if($(this).attr("name")==field[i]){
                        if(!$(this).val()){
                            $(this).addClass('notvalid');
                            error=1;    
                        }
                        else{
                            $(this).removeClass('notvalid');
                        }
                    }                       
                }               
           })

            if(error==0){
            return true;
            }else{ var err_text = "";
            if(error==1)  err_text="Не все обязательные поля заполнены!";
            $("#messenger").html(err_text); 
            $("#messenger").fadeIn("slow"); 
            return false;
            }
            if(field['gpa'].val()>4){
                field['gpa'].addClass('notvalid');
                error=1;
            }
        })
    });

$(function frmotpr1(){
        var field1 = new Array("name", "rating", "course", "otzyv_text");
        $("#otzyv").submit(function() {
            var error=0;
            $("#otzyv").find(":input").each(function() {
                for(var i=0;i<field1.length;i++){
                    if($(this).attr("name")==field1[i]){
                        if(!$(this).val()){
                            $(this).addClass('notvalid');
                            error=1;    
                        }
                        else{
                            $(this).removeClass('notvalid');
                        }
                    }                       
                }               
           })

            if(error==0){
            return true;
            }else{ var err_text = "";
            if(error==1)  err_text="Не все обязательные поля заполнены!";
            $("#messenger1").html(err_text); 
            $("#messenger1").fadeIn("slow"); 
            return false;
            }
        })
    });



var phoneMask = IMask(
  document.getElementById('input_phone'), {
    mask: '+{7}(000)000-00-00'
  });


 var modal=document.getElementById("modalwindow");


    function collapse(){
         var avatarka=document.getElementById("avatarka");
         var collapse_ava = document.getElementById("avac");
         var bloak= document.getElementById("bloak");
         
         if(avatarka.style.display=="flex"){
            bloak.style.height="230px";
            collapse_ava.style.opacity=1;
            collapse_ava.style.transform="translateY(0px)"
            avatarka.style.display="inline-flex";
         }
      
         else{
            
            collapse_ava.style.transform="translateY(-300px)"
            avatarka.style.display="flex";
             collapse_ava.style.opacity=0;
             bloak.style.height="80px";
         }
    }
    
    function modal(){
      
         var modal=document.getElementById("modalwindow");
        modal.style.display="flex";
    }
   
    function closedoor(){ 
    
        var modal=document.getElementById("modalwindow");
        modal.style.display="none";
    }
   window.onclick = function(event) {
    var modal=document.getElementById("modalwindow");
    if (event.target == modal ) {
      modal.style.display = "none";
     
    }
  } 

  function burgerButton(){
    var burger = document.getElementById("burger_container");
    var leftx= document.getElementById("left_x");
    var rightx= document.getElementById("right_x");
    var nox= document.getElementById("no_x");
    var header = document.getElementById("header__");
    var logo = document.getElementById("index_logo");
    var bloak= document.getElementById("bloak");
    if(burger.style.opacity==0){
        burger.style.opacity=1;
        bloak.style.height="100vh";
        header.style.backgroundColor="#303030";
        burger.style.transform="translateX(0px)";
        logo.style.transform="translateX(-300px)";


        leftx.classList.add("left_x");
        rightx.classList.add("right_x");
        nox.classList.add("no_x");
    }
    else{
        bloak.style.height="80px";
        burger.style.opacity=0;
        header.style.backgroundColor="rgba(210, 210, 210, 0.42)";
        burger.style.transform="translateX(500px)";
        logo.style.transform="translateX(0px)";

        leftx.classList.remove("left_x");
        rightx.classList.remove("right_x");
        nox.classList.remove("no_x");
    }
  }
  


