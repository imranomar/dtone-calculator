<template>
  <div>
    <p>Calculator By CalCo</p>
    <calculator></calculator>

    <div class="mt-4">
      Imran Omar Bukhsh<br>
      <small>00971 50 422 5054</small><br>
      <small>imranomar@gmail.com</small><br>
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
  p{
    font-family: 'Helvetica', Arial, sans-serif;
    font-size: 30px;
  }
</style>
