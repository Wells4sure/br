<template>
    <div>
         <div class="text-center m-2" v-text="error_msg" style="color:red;" v-if="error_msg"></div>
         <div v-if="points" >
            <div class="card bg-light text-dark" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table">
                                    <tr>
                                        <th>Reward Campaign Name</th>
                                        <th>Valid From</th>
                                        <th>Valid To</th>
                                    </tr>
                                    <tr>
                                        <td v-text="campaigns.reward_name"></td>
                                        <td v-text="points.valid_from"></td>
                                        <td v-text="points.valid_to"></td>
                                    </tr>
                                </table>
                            </div>
                         <div class="col-sm-12 m-5"></div>
                            <div class="col-sm-4 text-center">
                                <h5>Total Earned Points</h5>
                                <div class="my-circle text-center">                                
                                    <h4 class="counter" v-text="points.points_total" ></h4>
                                </div>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h5>Available Points</h5>
                                <div class="my-circle text-center">
                                    <h4 v-text="points.points_available"></h4>
                                </div>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h5>Used Points</h5>
                                <div class="my-circle text-center">
                                    <h4 v-text="points.points_used"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        
        <div class="text-center" v-if="points.length==0">
            <h3> You have no points that have been earned at the moment, please check again later. </h3>
        </div>

    </div>
</template>
<script>
import { CountUp } from 'countup.js';
export default {
    data (){
        return{
            'error_msg':'',
            'points':[],
            'campaigns':[],
        }
    },
          mounted() {
              var company = JSON.parse(sessionStorage.getItem('person'));
              axios.get('http://testrewardsapi.dczambia.com/v1/points?customer_id='+company.customer.customer_id+'&company_id='+company.companies.company_id+'')
               .then(response => {
                    if(response.data.error == true){
                      this.error_msg = 'Failed To load data'
                  }else{

                      this.points = response.data.points[0].points;
                      this.campaigns = response.data.points[0].reward_campaign;
                  }
               });
           
          },

}
</script>
<style scoped>
.my-circle{
    border: 10px solid #d8d8d8;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    margin: 0 auto;
}
.my-circle h4{
    margin: 65px auto;
}
</style>