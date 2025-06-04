package co.com.Mysticalcut.questions;

import net.serenitybdd.screenplay.Actor;
import net.serenitybdd.screenplay.Question;
import net.serenitybdd.screenplay.questions.Text;

import static co.com.Mysticalcut.userinterface.QuotesCancel.MENSAJEQUOTESCANCEL;
import static jxl.biff.FormatRecord.logger;

public class ValidacionesQuotesCancel implements Question<Boolean> {

    public static ValidacionesQuotesCancel ValidacioneQuotesCancel() {return new ValidacionesQuotesCancel(); }


    @Override
    public Boolean answeredBy(Actor actor) {
        try {
            String texto = Text.of(MENSAJEQUOTESCANCEL).viewedBy(actor).asString();
            return "cancelada".equals(texto);
        } catch (Exception e) {
            logger.info(" No encontró el texto o hubo otro error");
            return false;
        }
    }
}
