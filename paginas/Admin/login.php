<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Diário online de obras - Omega Grupo</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
  <div id="topo">
    <div><a href="?">Voltar para site </a></div>
    <img src="images/logo.png" width="71" height="59" /> </div>
  <div id="conteudo">
    <div id="boxLogin">
      <h1>Relatório Diário de Obras</h1>
      <div>
        <form action="?pag=admin&op=login" method="post">
          <table width="240" height="160" border="0" align="left" cellpadding="0" cellspacing="3">
            <tr>
              <td align="center"><p>
                  <label for="usuario">Usuário:</label>
                  <input name="usuario" id="usuario" type="text"/>
                </p></td>
            </tr>
            <tr>
              <td align="center"><p>
                  <label for="senha">Senha:</label>
                  <input name="senha"  type="password"  id="senha" value=""/>
                </p></td>
            </tr>
            <tr>
              <td align="center">
                <input type="submit" name="button" id="button" value="ENTRAR" />	
             </td>
            </tr>
            <tr>
              <td height="56" align="center"><a href="#">Esqueci meu login/senha.</a></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="erro"><?php echo $_SESSION["erroLogin"];?></div>
    </div>
  </div>
</div>
  <div id="rodape">©2009 OMEGA Engenhapria e Serviços</div>

</body>
</html>
