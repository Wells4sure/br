<template>
    
<span v-text="text"></span> 
</template>
<script>
export default {
      data(){
        return{
            'company':[],
            'companyname':'',
            'text':''
            
        }
        },
         mounted(){
            this.company =JSON.parse(sessionStorage.getItem('person'));

         
            this.companyname = this.company.companies.company_name

            this.text=this.companyname +' Rewards'
        }

}
</script>