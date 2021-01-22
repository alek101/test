const name=document.querySelector('#name');
const email=document.querySelector('#email');
const comment=document.querySelector('#comment');
document.querySelector('#postCommentButton').addEventListener('click',(e)=>{
    e.preventDefault();
    const url='createComment.php';
    const parametars=new URLSearchParams();
    parametars.append('name',name.value);
    parametars.append('email',email.value);
    parametars.append('comment',comment.value);
    fetch(url,
    {
        method: 'POST',
        ContentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        body: parametars
    })
    .then(res=>res.json())
    .then(res=>{
        if(res=="Added comment")
        {
            document.querySelector('#message').innerHTML="Your's comment waits for approvement!";
            name.value="";
            email.value="";
            comment.value=null;
        }
        if(res=="Error")
        {
            alert("Comment wasn't added!");
        }
    })
    .catch(err=>console.log(err));
})