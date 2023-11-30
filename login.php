    <div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>
    <p class="mx-auto" style="width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500">Login</p>
    <form action="procesalogin.php" method='post' class="mx-auto" style="width: 600px;" onsubmit="return validarFormulario()">
      <div>
        <label for="staticEmail" style="font-family:Libre Franklin;font-size:15px;padding-bottom:5px">Usuario</label>
        <div>
          <input type="text"  class="d-inline w-100" name="user" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px">
        </div>
      </div>
      <div>
        <label for="inputPassword" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Contraseña</label>
        <div>
          <input type="password"  class="d-inline w-100" name="pass" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px">
        </div>
      </div>
      <button type="submit" class="login-button d-inline w-100 mt-4" style="font-size:15px;font-family:Libre Franklin;background-color:black;color:white;padding:10px;border:0px solid black;border-radius:5px"
        onmouseover="this.style.backgroundColor='#333333'; this.style.border='0px solid #333333'"
        onmouseout="this.style.backgroundColor='black'; this.style.border='0px solid black'">Entrar</button>
    </form>
    <div id="eldiv"></div>
    <script src="Script/login.js"></script>