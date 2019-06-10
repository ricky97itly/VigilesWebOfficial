<template id="deleteBtn">
  <!-- La div vuota SERVE DI BRUTTO, se proviamo a metterci il v-bind:key dà errore in compilazione -->
  <div>
    <!-- v-bind:key serve per far sapere alla div l'id dello user, cosi posso passarlo nel metodo dell'onclick -->
    <div v-bind:key="user.id">
      <button class="btn btn-vigiles btn-block font-weigth-bold" @click="confirmDeleteProfile(user.id)">Cancella account</button>
    </div>
  </div>
</template>

<script type="text/javascript">
  const Swal = require('sweetalert2');

  export default {
    // Struttura dell'utente
    data() {
      return {
        user: {
          id: '',
          name: '',
          surname: '',
          email: ''
        }
      }
    },

    // Il metodo created è particolare ed è uno dei pochi che può stare fuori dai methods, viene eseguito automaticamente al caricamento della pagina
    created() {
      this.id = document.querySelector("meta[name='user-id']").getAttribute('content');
      this.fetchProfile(this.id);
    },

    // In vue.js tutti i metodi vanno all'interno di methods: {metodo1, metodo2, ecc}
    methods: {
      // Richiesta GET alla nostra API per trovare un solo user (quello corrente), non specifico GET perchè è quella di default
      // ATTENZIONE: l'URL non va tra apici singoli, ma tra backticks (non so come si dice in italiano), cmq, nella tastiera italiana si scrive facendo [ option + \ ]
      fetchProfile(id) {
        fetch(`/api/user/${id}`)
        .then(res => res.json())
        .then(res => {
          this.user = res.data;
        })
        .catch(err => console.log(err));
      },

      // Prima chiedo se è sicuro di voler eliminare l'account
      confirmDeleteProfile(id) {
        Swal.fire({
          title: 'Attenzione!',
          text: 'Sei sicuro di voler eliminare il tuo account?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Elimina account',
          deleteButtonText: 'Annulla'
        }).then((result) => {
          // Se risponde di si, faccio una richiesta DELETE alla nostra API
          if (result.value) {
            fetch(`api/user/${id}`, {
              method: 'delete'
            })
            .then(res => res.json)
            .then(
              // Altro SWAL per dire che ha eliminato l'account con successo
              Swal.fire(
                'Successo!',
                'Il tuo account è stato cancellato',
                'success'
              ),
              // Aspetto 3 secondi e lo riporto alla home, che automaticamente, per colpa del middleware, ci riporta al login
              setTimeout(function() {
                window.location.href = '/';
              }, 3000)
            )
            .catch(err => console.log(err));
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            console.log("NON Cancellato");
          }
        })
      }
    }
  }
</script>
