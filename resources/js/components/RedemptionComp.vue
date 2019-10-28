<template>
    <div>
        <div class="text-center m-2" v-text="error_msg" style="color:red;" v-if="error_msg"></div>

<div v-if="redemptions" >
        <div class="card bg-light text-dark my-card" v-for="redemption in redemptions " :key="redemption.index">
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-2 text-center">
                       <img src="public/images/icons/medal.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reward Campaign Name:</h5>
                        <p v-text="redemption.reward_campaign_name"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/finance_medal.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reward Type:</h5>
                        <p v-text="redemption.reward_type"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/information.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Redeemed Status:</h5>
                        <p v-text="redemption.redeemed_status"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/price_tag.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Used points:</h5>
                        <p v-text="redemption.points_used"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/calendar.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Date Redeemed:</h5>
                        <p v-text="redemption.redeemed_date_claimed"></p>
                    </div>

                   
                </div>

            </div>
        </div>
        </div>
        <div class="text-center" v-if="redemptions.length==0">
            <h3> You have not redeemed any rewards </h3>
        </div>
    </div>
</template>
<script>
export default {
        data() {
            return{
                'redemptions':[],
                'error_msg':''
            }
        },
      mounted() {
          var company = JSON.parse(sessionStorage.getItem('person'));
             axios.get('http://testrewardsapi.dczambia.com/v1/rewards_redeemed?customer_id='+company.customer.customer_id+'&company_id='+company.companies.company_id)
              .then(response => {
                  if(response.data.error == true){
                      this.error_msg = 'Failed To load data'
                  }else{

                      this.redemptions = response.data.rewards_redeemed;
           
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