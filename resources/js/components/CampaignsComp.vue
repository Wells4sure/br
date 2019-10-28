<template>
    <div>
        <div class="text-center m-2" v-text="error_msg" style="color:red;" v-if="error_msg"></div>

<div v-if="campaigns" >
        <div class="card bg-light text-dark my-card" v-for="campaign in campaigns " :key="campaign.reward_campaign_id">
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-2 text-center">
                       <img src="public/images/icons/medal.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reward Campaign Name:</h5>
                        <p v-text="campaign.reward_name"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/finance_medal.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reward Type:</h5>
                        <p v-text="campaign.reward_type"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/price_tag.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reward Cost:</h5>
                        <p v-text="campaign.required_points"></p>
                    </div>

                    <div class="col-sm-2 text-center ">
                         <img src="public/images/icons/calendar.svg" class="img img-responsive my-img" alt="calender icon">
                    </div>
                    <div class="col-sm-4">
                        <h5>From</h5>
                        <p v-text="campaign.reward_active_from"></p>
                    </div>
                    <div class="col-sm-2 text-center ">
                        <img src="public/images/icons/calendar.svg" class="img img-responsive my-img" alt="calender icon">
                    </div>
                    <div class="col-sm-4">
                        <h5>To</h5>
                        <p v-text="campaign.reward_active_to"></p>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <div class="text-center" v-if="campaigns.length==0">
            <h3> Currently no Campaigns runing at the momment please check back later </h3>
        </div>



    </div>
</template>
<script>

export default {
        data() {
            return{
                'campaigns':[],
                'error_msg':'',
              
            }
        },
        beforeCreate(){
            
        
        },
  
      mounted() {
            
            var company = JSON.parse(sessionStorage.getItem('person'));
             axios.get('http://testrewardsapi.dczambia.com/v1/reward_campaigns?company_id='+company.companies.company_id)
              .then(response => {
                  if(response.data.error == true){
                      this.error_msg = 'Failed To load data'
                  }else{

                      this.campaigns = response.data.reward_campaigns;
                  }
              }).catch(error => {
          
            });

          
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