package co.com.Mysticalcut.questions;

import net.serenitybdd.screenplay.Actor;
import net.serenitybdd.screenplay.Question;
import net.serenitybdd.screenplay.questions.Text;

import static co.com.Mysticalcut.userinterface.Quotes.MENSAJE_QUOTES;
import static jxl.biff.FormatRecord.logger;

public class ValidacioneQuotes implements Question<Boolean> {

    public static ValidacioneQuotes ValidacioneQuotes() {return new ValidacioneQuotes(); }


    @Override
    public Boolean answeredBy(Actor actor) {
        try {
            String texto = Text.of(MENSAJE_QUOTES).viewedBy(actor).asString();
            return "Bot-services@gmail.com".equals(texto);
        } catch (Exception e) {
            logger.info(" No encontró el texto o hubo otro error");
            return false;
        }
    }
}
