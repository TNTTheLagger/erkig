<script>

export default {

  data() {
    return {
        ujTura:{
            nev:"",
            tav:0,
            hely:0
        },
        turak:[]
    }
  },
  mounted(){
       this.turaLeker(); 
  },
  methods:{

    turaLeker(){
        fetch("http://localhost/api/turak")
        .then(response => response.json())
        .then(data => {
            this.turak = data
        })
    },

    turaRogzit()
    {
        fetch("http://localhost/api/turak",{
            method: "POST",
            headers: {
                "Content-Type":"application/json"
            },
            body: JSON.stringify({"nev":this.ujTura.nev, "tav":this.ujTura.tav, "elerheto_hely":this.ujTura.hely}) 
        })
        this.turak.push({...this.ujTura});
    }
  }
}
</script>

<template>
        
       <div class="row">
            <div class="col-lg-6">
                <h3 class="mt-3">Új túra hozzáadása</h3>

                <div class="mb-3">
                    <label for="nev" class="form-label">Túra neve</label>
                    <input type="text" class="form-control" id="nev" v-model="ujTura.nev">
                </div>

                <div class="mb-3">
                    <label for="tav" class="form-label">Táv (km)</label>
                    <input type="number" class="form-control" id="tav" v-model="ujTura.tav">
                </div>

                <div class="mb-3">
                    <label for="hely" class="form-label">Elérhető helyek száma</label>
                    <input type="number" class="form-control" id="hely" v-model="ujTura.hely">
                </div>

                <input type="button" value="Hozzáadás" class="btn btn-warning mt-3" @click="turaRogzit">
            </div>

            <div class="col-lg-6">
                <h3 class="mt-3">Rögzített túrák</h3>
            </div>
       </div> 

</template>