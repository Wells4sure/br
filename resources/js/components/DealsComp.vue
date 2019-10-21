<template>
    <div>
       <div class="row">
           <div class="col-xs-12 col-md-3 ">
               <div class="my-img" style="background:url('public/images/d1.jpg');">
                   <p class="average-points-on-pic">3500</p>
               </div>
           </div>
       </div>
    </div>
</template>
<script>
export default {
    mounted() {

      
    }
}
</script>
<style scoped>
    .my-img{
          width: 100%;
    padding-bottom: 65%;
    background-repeat: no-repeat;
    background-position: 50% 50%;
    background-size: cover;
    margin-bottom: 15px;
    position: relative;
    }
.average-points-on-pic {
    position: absolute;
    bottom: 0;
    max-width: 170px;
    width: 100%;
    color: #fff;
    margin-bottom: 15px;
    padding: 5px;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    background-color: rgba(9,13,7,.7);
    line-height: 22px;
}
</style>