package co.com.Mysticalcut.userinterface;

import net.serenitybdd.core.annotations.findby.By;
import net.serenitybdd.core.pages.PageObject;
import net.serenitybdd.screenplay.targets.Target;

public class autenticacionVisualizarUsuarios extends PageObject {

    public static Target BTN_USUARIOS = Target.the("Ir al modulo de usuarios ").located(By.xpath("//*[@id=\"app\"]/div/div[1]/header/ul/li[2]/a"));
    public static Target USUARIOS_SCROLL = Target.the("Seleccionar hora para hacer scroll ").located(By.xpath("//*[@id=\"app\"]/div/div[2]"));
    public static Target MENSAJE_USUARIOS = Target.the("Correo Cliente").located(By.xpath("//*[@id=\"app\"]/div/div[2]/div[3]/h5"));

}
