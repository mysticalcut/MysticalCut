package co.com.Mysticalcut.questions;


import net.serenitybdd.screenplay.Actor;
import net.serenitybdd.screenplay.Question;
import net.serenitybdd.screenplay.questions.Text;

import static co.com.Mysticalcut.userinterface.View.MENSAJE_VIEW;
import static jxl.biff.FormatRecord.logger;

public class ValidacionesView implements Question<Boolean> {


        public static ValidacionesView ValidacioneView() {return new ValidacionesView(); }


        @Override
        public Boolean answeredBy(Actor actor) {
            try {
                String texto = Text.of(MENSAJE_VIEW).viewedBy(actor).asString();
                return "Corte Clásico".equals(texto);
            } catch (Exception e) {
                logger.info(" No encontró el texto o hubo otro error");
                return false;
            }
        }
}
