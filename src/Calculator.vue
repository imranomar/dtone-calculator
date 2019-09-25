<template>
  <div id="calculator">
    <div class="container">
      <div class="row">
        <div class="col-12 display" >{{text}}</div>
      </div>
      <div class="row">
        <div class="col alert alert-secondary " >Cannot be zero</div>
      </div>
      <div class="row">
        <div class="col-2 btn btn-secondary" @click="keyPressed">SRT</div>
        <div class="col-2 btn btn-secondary" @click="keyPressed">CRT</div>
        <div class="col-2 btn btn-secondary" @click="factor">FAC</div>
        <div class="col-2 btn btn-secondary" @click="keyPressed">POW</div>
        <div class="col-2 btn btn-light" @click="keyPressed"><</div>
        <div class="col-2 btn btn-light" @click="reset">AC</div>
      </div>
      <div class="row">
        <div class="col-3 btn btn-primary" @click="keyPressed">7</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">8</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">9</div>
        <div class="col-3 btn btn-info bold bigger" @click="keyPressed">+</div>
      </div>
      <div class="row">
        <div class="col-3 btn btn-primary" @click="keyPressed">4</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">5</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">6</div>
        <div class="col-3 btn btn-info bold bigger" @click="keyPressed">-</div>
      </div>
      <div class="row">
        <div class="col-3 btn btn-primary" @click="keyPressed">1</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">2</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">3</div>
        <div class="col-3 btn btn-info  bigger" style="" >/</div>
      </div>
      <div class="row">
        <div class="col-3 btn btn-primary" @click="keyPressed">+/-</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">.</div>
        <div class="col-3 btn btn-primary" @click="keyPressed">0</div>
        <div class="col-3 btn btn-info bold bigger" @click="keyPressed">*</div>
      </div>
      <div class="row">
        <div class="col-12 equal btn btn-warning" @click="keyPressed">
          =
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: "Calculator",
    data: function()
    {
      return{
        text : '0',
        operator : '',
        operand : '',
      }
    },
    methods: {
      factor:function(e)
      {
        alert('factor');
        let headers = {
          'Access-Control-Allow-Origin' : '*',
        };


        this.$http.post('http://localhost/api/fac',{num1:this.text}, {headers: headers})
          .then(response =>
          {
            alert(response);
          }, error =>
          {
            alert(error);
          });
      },
      keyUp: function(e)
      {
        if (e.keyCode === 27) {
          this.reset();
        }
      },
      keyPressed : function(e)
      {

        let pressed =  e.target.innerHTML;

        // < PRESSED
        if(pressed=='&lt;')
        {
          this.text = this.text.slice(0, -1);
          if(this.text == '' || this.text == '-' || this.text == '0.'   ) //and if text is 0 then do nothing
          {
            this.text = '0'
          }
          return;
        }
        //+/- PRESSED
        if(pressed=='+/-')
        {
          if(this.text == '0' ) //and if text is 0 then do nothing
          {
            return;
          }
          else
          {

            if(this.text.indexOf('-')==0) //remove negative if already
            {
              this.text = this.text.substr(1);
              return;
            }
            else
            {
              this.text = '-' + this.text;
              return;
            }

          }
        }


        //ZERO PRESSED
        if(pressed==0)
        {
          if(this.text == '0' ) //and if text is 0 then do nothing
          {
            return;
          }
        }

        //DECIMAL PRESSED
        if(pressed=='.')
        {

          if (this.text.indexOf('.') != -1)  //do not add decimal if already there
          {
            return;
          }


          if(this.text == '0' ) //add zero before decimal if nothing there
          {
            this.text = '0.';
            return;
          }
        }

        //DIGIT PRESSED WHEN ZERO WAS SHOWING
        if(this.text == '0' )
        {
          this.text = '';
        }


        this.text = this.text + e.target.innerHTML;

      },
      reset:function()
      {
        this.text= '0';
      }
    },
    created: function() {
      document.addEventListener('keyup', this.keyUp);
    }
  }
</script>

<style scoped>
  .display {
    background-color: #222222;
    color: white;
    text-align: right;
    border-top-left-radius: 20px;
    padding: 20px;
    border-top-right-radius: 20px;
    width: 500px;
    font-size:40px
  }

  .btn
  {
    border-radius: 0px;
    border: 1px solid deepskyblue;
    font-size: 1.25rem;
  }

  .bold
  {
    font-weight: bold;
  }

  .bigger
  {
    font-size: 20px;
  }

  .equal
  {

    color: white;
    text-align: center;
    border-bottom-left-radius: 20px;
    padding: 10px;
    border-bottom-right-radius: 20px;
    width: 500px;
    font-size: 30px
  }

  .alert
  {
    margin-bottom: 0px;
    padding: 0rem .8rem;
    font-size: 12px;
    border-radius: 0px;
    color:red;
  }

</style>
