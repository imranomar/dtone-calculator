<template>
  <div class="cal_container">

    <calculator></calculator>

    <div class="mt-4">
      <p>
      Imran Omar Bukhsh<br>
      <small>00971 50 422 5054</small><br>
      <small>imranomar@gmail.com</small><br>
      </p>
    </div>

  </div>
</template>

<script>

import calculator from './Calculator';

export default {

  name: 'app',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  components :{
    'calculator': calculator
  }
}
</script>

<style>
  div
  {
    text-align: center;
  }
  .cal_container
  {
    max-width: 370px
  }

  h1{
    font-family: 'Helvetica', Arial, sans-serif;
    font-size: 30px;
    margin-bottom: 20px;
  }

  p{
    line-height: 20px;
  }




</style>
