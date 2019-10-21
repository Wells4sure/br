<template>
    
<span v-text="firstname">

</span>
</template>
<script>
export default {
      data(){
        return{
            'profile':[],
            'firstname':'',
            'lastname':''
        }
        },
         mounted(){
            this.profile =JSON.parse(sessionStorage.getItem('person'));

            this.firstname = this.profile.customer.firstname
        }

}
</script>