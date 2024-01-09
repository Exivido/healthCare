let button=document.getElementById("chat-doctors");
let articleButton=document.getElementById("article-btn");

function chatDoctors(element,doctorID)
{
    let docName=doctorID;
    button.value=docName;
    button.click();
}

function articles(id)
{
    articleButton.value=id;
    articleButton.click();
}