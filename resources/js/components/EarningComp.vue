<template>
    <div>
        <div class="text-center m-2" v-text="error_msg" style="color:red;" v-if="error_msg"></div>

<div v-if="earnings.length"  >
        <div class="card bg-light text-dark my-card mb-5" v-for="p in paginatedData " :key="p.index">
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-2 text-center">
                       <img src="public/images/icons/shop.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Store Name:</h5>
                        <p v-text="p.branch_name"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/receipt.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Reciept Number:</h5>
                        <p v-text="p.receipt_number"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/banknotes.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Amount Spent:</h5>
                        <p v-text="p.amount"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/price_tag.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Points Earned:</h5>
                        <p v-text="p.points_earned"></p>
                    </div>

                    <div class="col-sm-2 text-center">
                        <img src="public/images/icons/calendar.svg" class="img img-responsive my-img" alt="finance_medal">
                    </div>
                    <div class="col-sm-10">
                        <h5>Date:</h5>
                        <p v-text="p.created_at"></p>
                    </div>

                   
                </div>

            </div>
        </div>
        <ul class="pagination justify-content-center" style="margin:20px 0">
            <li class="page-item"><a class="page-link" href="#" @click="prevPage" :disabled="pageNumber==0" >Previous</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#" @click="nextPage" :disabled="pageNumber >= pageCount -1">Next</a></li>
        </ul>

        </div>

        <div class="text-center" v-if="earnings.length==0">
            <h3> You have not earned any reward, please check again later. </h3>
        </div>

    </div>
</template>
<script>
export default {
        props:{

        size:{
        type:Number,
        required:false,
        default: 1
        }
    },

        data() {
            return{
                earnings:[],
                error_msg:'',
                pageNumber: 0
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
        },
         computed: {
             pageCount(){
                    let l = this.earnings.length,
                        s = this.size;
                    return Math.ceil(l/s);
                },
                paginatedData(){
                    const start = this.pageNumber * this.size,
                        end = start + this.size;
                    return this.earnings.slice(start, end);
                }
         },
        methods:{
            nextPage(){
                this.pageNumber++;
            },
            prevPage(){
                this.pageNumber--;
            }
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