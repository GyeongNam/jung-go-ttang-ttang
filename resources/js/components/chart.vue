<template>
<div class="inbox_chat">
  <div class="chat_list">
    <div class="chat_people">
      <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
      <div class="chat_ib">
        <h5> {{user.name}}  {{datas.id}}  <span class="chat_date"> Dec 25</span></h5>
        <p>  </p>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    // export default {
    //   data(){
    //     return {
    //         users: [],
    //          datas : []
    //     }
    //   },
    //
    //   created(){
    //     axios.get('/api/muser').then(res => {
    //         this.datas = res.data.users;
    //         this.users = res.data.users;
    //     }).catch(error => {
    //       console.log(error);
    //     });
    //   }
      // ,
      //   mounted() {
      //       console.log('Component mounted.')
      //   }
    // }
</script>
