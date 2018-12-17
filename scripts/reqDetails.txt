
 var form = document.getElementById("frm");
//  var form2 = document.getElementById("frmGet");
 var a = 0;
 var b = 0;
 var c = 0;
 var d = 0;
 var e = 0;
 var f = 0;
 var g = 0;
 var h = 0;
 
 function cat1(){

    if( a == 0 ){
        form.catGet1.value = "1";
        a = 1;
    }else{
        form.catGet1.value = "0";
        a = 0;
    }
}

function cat2(){
    
    if( b == 0 ){
        form.catGet3.value = "1";
        b = 1;
    }else{
        form.catGet3.value = "0";
        b = 0;
    }
}

function cat3(){
    
    if( c == 0 ){
        form.catGet5.value = "1";
        c = 1;
    }else{
        form.catGet5.value = "0";
        c = 0;
    }
}

function cat4(){
    
    if( d == 0 ){
        form.catGet7.value = "1";
        d = 1;
    }else{
        form.catGet7.value = "0";
        d = 0;
    }
}

function cat5(){
    
    if( e == 0 ){
        form.catGet2.value = "1";
        e = 1;
    }else{
        form.catGet2.value = "0";
        e = 0;
    }
}

function cat6(){
    
    if( f == 0 ){
        form.catGet4.value = "1";
        f = 1;
    }else{
        form.catGet4.value = "0";
        f = 0;
    }
}

function cat7(){
    
    if( g == 0 ){
        form.catGet6.value = "1";
        g = 1;
    }else{
        form.catGet6.value = "0";
        g = 0;
    }
}

function cat8(){

    if( h == 0 ){
        form.catGet8.value = "1";
        h = 1;
        form.categoryOfWork9.disabled = false;
        // document.getElementById("other").setAttribute("style","background-color:red;");
        document.getElementById("other").focus();
    }else{
        form.catGet8.value = "0";
        h = 0;
        form.categoryOfWork9.disabled = true;
        // form.categoryOfWork9.value = "";
        document.getElementById("other").value = "";
    }
}


function cat1Che(){

    if( a == 0 ){
        form.catGet1.value = "1";
        form.categoryOfWork1.checked = true;
        a = 1;
    }else{
        form.catGet1.value = "0";
        form.categoryOfWork1.checked = false;
        a = 0;
    }
}

function cat2Che(){
    
    if( b == 0 ){
        form.catGet3.value = "1";
        form.categoryOfWork3.checked = true;
        b = 1;
    }else{
        form.catGet3.value = "0";
        form.categoryOfWork3.checked = false;
        b = 0;
    }
}

function cat3Che(){
    
    if( c == 0 ){
        form.catGet5.value = "1";
        form.categoryOfWork5.checked = true;
        c = 1;
    }else{
        form.catGet5.value = "0";
        form.categoryOfWork5.checked = false;
        c = 0;
    }
}

function cat4Che(){
    
    if( d == 0 ){
        form.catGet7.value = "1";
        form.categoryOfWork7.checked = true;
        d = 1;
    }else{
        form.catGet7.value = "0";
        form.categoryOfWork7.checked = false;
        d = 0;
    }
}

function cat5Che(){
    
    if( e == 0 ){
        form.catGet2.value = "1";
        form.categoryOfWork2.checked = true;
        e = 1;
    }else{
        form.catGet2.value = "0";
        form.categoryOfWork2.checked = false;
        e = 0;
    }
}

function cat6Che(){
    
    if( f == 0 ){
        form.catGet4.value = "1";
        form.categoryOfWork4.checked = true;
        f = 1;
    }else{
        form.catGet4.value = "0";
        form.categoryOfWork4.checked = false;
        f = 0;
    }
}

function cat7Che(){
    
    if( g == 0 ){
        form.catGet6.value = "1";
        form.categoryOfWork6.checked = true;
        g = 1;
    }else{
        form.catGet6.value = "0";
        form.categoryOfWork6.checked = false;
        g = 0;
    }
}

function cat8Che(){

    if( h == 0 ){
        form.catGet8.value = "1";
        form.categoryOfWork8.checked = true;
        h = 1;
        form.categoryOfWork9.disabled = false;
        // document.getElementById("other").setAttribute("style","background-color:red;");
        document.getElementById("other").focus();
    }else{
        form.catGet8.value = "0";
        form.categoryOfWork8.checked = false;
        h = 0;
        form.categoryOfWork9.disabled = true;
        // form.categoryOfWork9.value = "";
        document.getElementById("other").value = "";
    }
}