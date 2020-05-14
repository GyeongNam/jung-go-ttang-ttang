// $("#new_pw").keyup(function (){
//   alert(  $("#new_pw").val());
// })
var id_check = false;
var pw_check = false;

$("#new_ppw, #new_pw").keyup(function (){
  if($("#new_pw").val() == $("#new_ppw").val()){
    if ($("#new_ppw").val() != "" && $("#new_pw").val() != "") {
      $("#notice").html("비밀번호가 일치합니다!");
      $("#notice").css("color", "green");

      pw_check  = true;
    }else{
      $("#notice").html("");
      pw_check  = false;
    }
  }else{
    $("#notice").html("비밀번호가 일치하지 않습니다!");
    $("#notice").css("color", "red");
    pw_check  = false;
  }
})

function to_submit(){
  if(pw_check == false){
    alert("비밀번호를 확인해주세요!");
    return false;

  }
}
