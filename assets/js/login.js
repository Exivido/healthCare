
function flip(){

    document.querySelector(".inner-card").style.transform="rotateY(180deg)";
    setTimeout(() => {
        document.getElementById("login").style.display="none";

    }, 300);
    
}
function flipBack(){
    document.querySelector(".inner-card").style.transform="rotateY(0deg)";
    document.getElementById("login").style.display="block";

}
function showPassLogin(a){
    if(a.previousElementSibling.type=="text")
          a.previousElementSibling.type="password";
     else
          a.previousElementSibling.type="text";
}


function isNotEmpty(element,e){
    let a=element.parentNode.querySelectorAll('input');
    for(i=0;i<=a.length-1;i++)
    {
        if(a[i].value=="")
        {
            alert("لطفا همه ورودی ها را پر کنید !");
            e.preventDefault();
            return;
        }
        else if(a[1].value.length<8 || a[2].value.length<8)
        {
            alert("نام کاربری و رمز عبور باید بیشتر از 8 حرف باشد !");
            e.preventDefault();
            return;
        }
        
    }
}
