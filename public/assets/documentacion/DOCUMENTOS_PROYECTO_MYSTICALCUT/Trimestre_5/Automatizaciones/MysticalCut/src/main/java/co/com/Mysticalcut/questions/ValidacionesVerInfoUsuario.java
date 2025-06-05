package co.com.Mysticalcut.questions;

import net.serenitybdd.screenplay.Actor;
import net.serenitybdd.screenplay.Question;
import net.serenitybdd.screenplay.questions.Text;

import static co.com.Mysticalcut.userinterface.autenticacionVerInfoUsuario.MENSAJE_VER_USUARIO;
import static jxl.biff.FormatRecord.logger;

public class ValidacionesVerInfoUsuario implements Question<Boolean>{
    public static ValidacionesVerInfoUsuario ValidacionesVerInfoUsuario() {return new ValidacionesVerInfoUsuario(); }


    @Override
    public Boolean answeredBy(Actor actor) {
        try {
            String texto = Text.of(MENSAJE_VER_USUARIO).viewedBy(actor).asString();
            return "Detalles del Usuario".equals(texto);
        } catch (Exception e) {
            logger.info(" No encontró el texto o hubo otro error");
            return false;
        }
    }
}