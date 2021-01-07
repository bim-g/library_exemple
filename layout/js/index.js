w3.show('errorModal');
w3.show('deleteQ');
w3.show('succesModal');

function login(form,link){
    let formData= new FormData(form);
    let url=link;
    fetch(
        url,
        {
            method:'post',
            body:JSON.stringify({a:1,b:'d'})
        }
    )
    .then(res=>res.text())
    .then(response=>{
        console.log(JSON.parse(response));
    });
}

function $(id){return document.getElementById(id);}