package co.com.Mysticalcut.userinterface;

import net.serenitybdd.core.annotations.findby.By;
import net.serenitybdd.core.pages.PageObject;
import net.serenitybdd.screenplay.targets.Target;

public class QuotesCancel extends PageObject {

    public static Target BTN_QUOTES = Target.the("Ir al modulo de servicio ").located(By.xpath("//*[@id=\"app\"]/div/div[1]/header/ul/li[4]/a"));

    public static Target BTN_CANCEL= Target.the("darle al boton de cancelar ").located(By.xpath("//*[@id=\"app\"]/div/div[1]/table/tbody/tr/td[9]/div/button"));

    public static Target MENSAJEQUOTESCANCEL = Target.the("cancelada").located(By.xpath("/html/body/div/div/div/div[1]/table/tbody/tr/td[8]"));

}
