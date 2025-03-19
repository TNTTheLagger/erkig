function hozzavaloRogzit(){
    let nev = document.getElementById("nev").value;
    fetch("http://localhost/api/hozzavalok.php",{
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({"nev":nev})
    })
}

function hozzavaloListaz(){
    fetch("http://localhost/api/hozzavalok.php")
    .then(response => response.json())
    .then(data => console.log(data))
}


function hozzavaloTorol(id){
    fetch(`http://localhost/api/hozzavalok.php/${id}`,{
        method:"DELETE",
        headers:{"Content-Type":"application/json"}
    })
}


hozzavaloTorol(2);