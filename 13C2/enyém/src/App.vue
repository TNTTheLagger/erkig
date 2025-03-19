<script>
import Turak from './components/Turak.vue';
import Jelentkezesek from './components/Jelentkezesek.vue';

export default {
  components:{
    Turak,
    Jelentkezesek
  },
  data() {
    return {
        aktualisOldal: "Turak"
    }
  }
}
</script>

<template>
  <div class="container">
    <nav class="navbar navbar-expand-md" style="background-color: rgb(255, 238, 222);">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/src/assets/logo.png" alt="" style="width: 150px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#" @click="aktualisOldal='Turak'">Túrák</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" @click="aktualisOldal='Jelentkezesek'">Jelentkezések</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kapcsolat</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <component :is="aktualisOldal"/>

  </div>
</template>


<style>

.nav-item{
    font-size: x-large;
    border-bottom: 5px orange solid;
    margin-left: 10px;
    margin-right: 10px;
}

</style>