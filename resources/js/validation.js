

function chk(){
    
    
// membership validation

 if (document.agree.checked==false){
     alert("이용 약관에 동의해주세요!");
     return false; //왜 안되지?
 }

// ID validation

 var id = document.getElementById('id').value;

 var num = id.search(/[0-9]/g);

 var eng = id.search(/[a-z]/ig);

 var spe = id.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

 if(id.length < 6 || id.length > 10){

  alert("6자리 ~ 10자리 이내의 ID를 입력해주세요.");

  return false;

 }

 if(id.search(/₩s/) != -1){

  alert("ID는 공백을 포함할 수 없습니다.");

  return false;

 } if(num < 0 || eng < 0 || spe < 0 ){

  alert("영문,숫자, 특수문자를 혼합한 ID를 입력해주세요.");

  return false;

 }
 
 // Name validation

 var name = document.getElementById('name').value;

 var num4 = name.search(/[0-9]/g);

 var eng4 = name.search(/[a-z]/ig);

 var spe4 = name.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

 if(name.length > 10){

  alert("10자 이하의 이름을 입력해주세요.");

  return false;

 }

 if(num4 > 0 || spe4 > 0 ){

  alert("이름에 숫자와 특수기호를 이용할 수 없습니다.");

  return false;

 }
 
 // Password validation

 var pw = document.getElementById('pw').value;

 var num2 = pw.search(/[0-9]/g);

 var eng2 = pw.search(/[a-z]/ig);

 var spe2 = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

 if(pw.length < 6 || pw.length > 10){

  alert("6자리 ~ 10자리 이내의 패스워드를 입력해주세요.");

  return false;

 }

 if(pw.search(/₩s/) != -1){

    alert("패스워드는 공백을 포함할 수 없습니다.");

    return false;

 } if(num2 < 0 || eng2 < 0 || spe2 < 0 ){

    alert("영문,숫자, 특수문자를 혼합한 패스워드를 입력해주세요.");

  return false;

 }
 
 // Phone number validation

 var phone = document.getElementById('phone').value;

 var num3 = id.search(/[0-9]/g);

 var eng3 = id.search(/[a-z]/ig);

 var spe3 = id.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);


 if(id.search(/₩s/) != -1){

    alert("전화번호는 공백을 포함할 수 없습니다.");

    return false;

 } if(eng3 > 0 || spe3 > 0 ){

    alert("전화번호는 숫자 만을 입력해주세요.");

    return false;

 }
 
 
 alert("환영합니다!"); 
 
 window.location=(index.html);
 return true;

 
}