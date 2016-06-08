<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://200.16.7.112/");
  }

  public function testMyTestCase()
  {

    $this->click("link=PRODUCTOS");
    $this->waitForPageToLoad("30000");
    $this->click("link=Agregar Producto");
    $this->waitForPageToLoad("30000");
    $this->type("id=nombre", "Producto1");
    $this->type("id=descripcion", "producto firma papus");
    $this->select("id=id_tipo_producto", "label=Souvenirs");
    $this->click("css=input.btn.btn-success");
    $this->waitForPageToLoad("30000");
    $this->click("css=#modalSuccess > div.modal-dialog > div.modal-content > div.modal-footer > button.btn.btn-default");
    $this->click("link=LOGIN");
    $this->waitForPageToLoad("30000");
    $this->type("name=email", "adming@mail.com");
    $this->type("name=password", "123456");
    $this->click("//button[@type='submit']");
    $this->waitForPageToLoad("30000");
    $this->click("link=Regresar");
    $this->waitForPageToLoad("30000");

  }
}
?>
