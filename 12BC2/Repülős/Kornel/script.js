function jaratLeker() {
    let honnan = document.getElementById("honnan").value;
    let hova = document.getElementById("hova").value;
    fetch(`http://localhost/api/jaratok?honnanhova=${honnan}-${hova}`)
    .then(response => response.json())
    .then(data => {
        let adatok = data;
        document.getElementById("jaratok").innerHTML="";
        for (let i = 0; i < adatok.length; i++) {
            let lgi = document.createElement("div");
            lgi.classList.add("list-group-item");
            lgi.innerHTML = "<b>"+adatok[i].jaratszam +"</b><br>"+adatok[i].honnan + "<br>"+ adatok[i].hova + "<br>" + adatok[i].indul + "<br>" + adatok[i].erkezik+ "<br>";
            document.getElementById("jaratok").appendChild(lgi);
            let gomb = document.createElement("input");
            gomb.type = "button";
            gomb.value = "Foglal";
            gomb.classList.add("btn","btn-primary");
            lgi.appendChild(gomb);
            gomb.addEventListener("click",function(){
                document.getElementById("jaratszam").value = adatok[i].jaratszam;
            });
        }
    })    
}

function foglal(){
    let nev = document.getElementById("nev").value;
    let utazokszama = document.getElementById("utazokszama").value;
    let jaratszam = document.getElementById("jaratszam").value;
    fetch(`http://localhost/api/foglalasok`,{
        method:"POST",
        body:JSON.stringify({"nev": nev, "darab":utazokszama, "jaratszam":jaratszam})
    })
}

function foglalasLeker(){
    let kiir = document.getElementById("foglalasok");
    fetch(`http://localhost/api/foglalasok`)
    .then(response => response.json())
    .then(data => {
        let adatok = data;
        document.getElementById("foglalasok").innerHTML="";
        for (let i = 0; i < adatok.length; i++) {
            let lgi = document.createElement("div");
            lgi.classList.add("list-group-item");
            lgi.innerHTML = adatok[i].jaratszam + "  " + adatok[i].nev + "  " + adatok[i].darab;
            document.getElementById("foglalasok").appendChild(lgi);
            let gomb = document.createElement("input");
            gomb.type = "button";
            gomb.value = "Töröl";
            gomb.classList.add("btn","btn-primary","float-end");
            lgi.appendChild(gomb);
            gomb.addEventListener("click",()=>foglalasTorol(adatok[i].foglalasid));
        }
    })    
}

function foglalasTorol(id){
    fetch(`http://localhost/api/foglalasok?id=${id}`,{
        method:"DELETE"
    })
    .then(response => {
        foglalasLeker();
    })
}



foglalasLeker();