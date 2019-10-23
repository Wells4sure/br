<template>
    <div>
        <div class="text-center m-2" v-text="error_msg" style="color:red;" v-if="error_msg"></div>

<div v-if="earnings"  >
        <div class="card bg-light text-dark my-card mb-5" v-for="earned in earnings " :key="earned.index">
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-2 text-center">
                       <img src="public/images/icons/shop.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Store Name:</h5>
                        <p v-text="earned.branch_name"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/receipt.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reciept Number:</h5>
                        <p v-text="earned.receipt_number"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/banknotes.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Amount Spent:</h5>
                        <p v-text="earned.amount"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/price_tag.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Points Earned:</h5>
                        <p v-text="earned.points_earned"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/calendar.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Date:</h5>
                        <p v-text="earned.created_at"></p>
                    </div>

                   
                </div>

            </div>
        </div>
   
        </div>
    </div>
</template>
<script>
export default {
        data() {
            return{
                'earnings':[],
                'error_msg':''
            }
        },
      mounted() {
          var company = JSON.parse(sessionStorage.getItem('person'));
             axios.get('http://testrewardsapi.dczambia.com/v1/transactions?company_id='+company.companies.company_id+'&customer_id='+company.customer.customer_id+'')
              .then(response => {
                  if(response.data.error == true){
                      this.error_msg = 'Failed To load data'
                  }else{
                      this.earnings =response.data.transactions
                 
                  }
              }).catch(error => {
                
          console.log('failed')
            })
        }
}
</script>
<style scoped>
.my-img{
    width: 55px;
}
.my-card{
    max-width: 660px;
    width: 100%;
    margin: 0 auto;

}
</style>