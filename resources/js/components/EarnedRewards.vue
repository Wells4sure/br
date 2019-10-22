<template>
    <div>
        <div class="text-center m-2" v-text="error_msg" style="color:red;" v-if="error_msg"></div>

<div v-if="rewards_earnings" >
        <div class="card bg-light text-dark my-card" v-for="rewards_earned in rewards_earnings " :key="rewards_earned.index">
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-2 text-center">
                       <img src="public/images/icons/medal.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reward Campaign Name:</h5>
                        <p v-text="rewards_earned.reward_campaign_name"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/finance_medal.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reward Type:</h5>
                        <p v-text="rewards_earned.reward_type"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/information.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Redeemed Status:</h5>
                        <p v-text="rewards_earned.redeemed_status"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/price_tag.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Used points:</h5>
                        <p v-text="rewards_earned.points_used"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/calendar.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Date Earned:</h5>
                        <p v-text="rewards_earned.redeemed_date_earned"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/information.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Please Proceed to the store to claim your Reward:</h5>
                        
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
                'rewards_earnings':[],
                'error_msg':''
            }
        },
      mounted() {
            var company = JSON.parse(sessionStorage.getItem('person'));
             axios.get('http://testrewardsapi.dczambia.com/v1/rewards_earned?customer_id='+company.customer.customer_id+'&company_id='+company.companies.company_id)
              .then(response => {
                  if(response.data.error === true){
                      this.error_msg = 'Failed To load data'
                  }else{

                      this.rewards_earnings = response.data.rewards_earned;
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