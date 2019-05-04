<template id="deleteBtn">
  <div>
    <div v-bind:key="user.id">
      <button class="btn btn-vigiles btn-block font-weigth-bold" @click="confirmDeleteProfile(user.id)">Cancella account</button>
    </div>
  </div>
</template>

<script type="text/javascript">
  const Swal = require('sweetalert2');

  export default {
    data() {
      return {
        users: [],
        user: {
          id: '',
          name: '',
          surname: '',
          email: ''
        }
      }
    },

    created() {
      this.id = document.querySelector("meta[name='user-id']").getAttribute('content');
      this.fetchProfile(this.id);
    },

    methods: {
      fetchProfile(id) {
        fetch(`/api/user/${id}`)
        .then(res => res.json())
        .then(res => {
          this.user = res.data;
        })
        .catch(err => console.log(err));
      },

      confirmDeleteProfile(id) {
        Swal.fire({
          title: 'Attenzione!',
          text: 'Sei sicuro di voler eliminare il tuo account?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, keep it'
        }).then((result) => {
          if (result.value) {
            fetch(`api/user/${id}`, {
              method: 'delete'
            })
            .then(res => res.json)
            .then(
              Swal.fire(
                'Successo!',
                'Il tuo account è stato cancellato',
                'success'
              ),
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
