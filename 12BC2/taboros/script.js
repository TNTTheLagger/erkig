function diakRogzit(){
    let nev = document.getElementById("nev").value;
    let kor = document.getElementById("kor").value;
    fetch("http://localhost/api/diak",{
        method: "POST",
        body: JSON.stringify({"nev":nev, "kor":kor})
    })
}

function jelentkezesRogzit(){
    let diakid = document.getElementById("diakid").value;
    let tabor = document.getElementById("tabor").value;
    fetch("http://localhost/api/jelentkezes",{
        method: "POST",
        body: JSON.stringify({"diakid":diakid, "tabor":tabor})
    })
}

function jelentkezesListaz(){
    fetch("http://localhost/api/jelentkezes")
    .then(response=>response.json())
    .then(data=>{
        let kiirando = document.getElementById("kiirando");
        let adatok = data;
        for (let i = 0; i < adatok.length; i++) {
            let lgi = document.createElement("div");
            lgi.classList.add("list-group-item");
            lgi.innerHTML = adatok[i].nev + "---" + adatok[i].tabor;
            kiirando.appendChild(lgi);
        }
    })

    

}