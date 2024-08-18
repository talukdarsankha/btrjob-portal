<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
</head>
<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

.section{
  background: url("images/bg-1.jpg") no-repeat;
  height: 100vh;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
.wrapper{
  padding: 20px 50px;
}
.wrapper .title{
  font-size: 40px;
  font-weight: 600;
  margin-bottom: 10px;
}
.wrapper p{
  text-align: justify;
  padding-bottom: 20px;
}
.counter-up{
  background: url("images/footer-bg.jpg") no-repeat;
  min-height: 50vh;
  background-size: cover;
  background-attachment: fixed;
  padding: 0 50px;
  position: relative;
  display: flex;
  align-items: center;
}
.counter-up::before{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0,0,0,0.8);
}
.counter-up .content{
  z-index: 1;
  position: relative;
  display: flex;
  width: 100%;
  height: 100%;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
}
.counter-up .content .box{
  border: 1px dashed rgba(255,255,255,0.6);
  width: calc(25% - 30px);
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  flex-direction: column;
  padding: 20px;
}
.content .box .icon{
  font-size: 48px;
  color: #e6e6e6;
}
.content .box .counter{
  font-size: 50px;
  font-weight: 500;
  color: #f2f2f2;
  font-family: sans-serif;
}
.content .box .text{
  font-weight: 400;
  color: #ccc;
}
@media screen and (max-width: 1036px) {
  .counter-up{
    padding: 50px 50px 0 50px;
  }
  .counter-up .content .box{
    width: calc(50% - 30px);
    margin-bottom: 50px;
  }
}
@media screen and (max-width: 580px) {
  .counter-up .content .box{
    width: 100%;
  }
}
@media screen and (max-width: 500px) {
  .wrapper{
    padding: 20px;
  }
  .counter-up{
    padding: 30px 20px 0 20px;
  }
}

</style>
<body>
  <div class="section"></div>
  
  <div class="counter-up">
    <div class="content">
      <div class="box">
        <div class="icon"><i class="fas fa-history"></i></div>
        <div class="counter">724</div>
        <div class="text">Working Hours</div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-gift"></i></div>
        <div class="counter">508</div>
        <div class="text">Completed Projects</div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-users"></i></div>
        <div class="counter">436</div>
        <div class="text">Happy Clients</div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-award"></i></div>
        <div class="counter">120</div>
        <div class="text">Awards Received</div>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function(){
    $('.counter').counterUp({
      delay: 10,
      time: 1200
    });
  });
  </script>

</body>
</html>
