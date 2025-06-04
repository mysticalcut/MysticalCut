package co.com.Mysticalcut.stepsdefinitions;

import co.com.Mysticalcut.questions.ValidacionVisualizarUsuarios;
import co.com.Mysticalcut.tasks.VisualizarUsuariosAutenticarse;
import cucumber.api.java.es.Cuando;
import cucumber.api.java.es.Entonces;

import java.util.List;

import static net.serenitybdd.screenplay.GivenWhenThen.seeThat;
import static net.serenitybdd.screenplay.actors.OnStage.theActorInTheSpotlight;

public class VerInfoUsuarioStepDefinitions {

    @Cuando("^complete el inicio de sesion, se dirigira al apartado usuarios y podra ver todos los usuarios y seleccionara al usuarios que quiere ver su informacion$")
    public void completeElInicioDeSesionSeDirigiraAlApartadoUsuariosYPodraVerTodosLosUsuariosYSeleccionaraAlUsuariosQueQuiereVerSuInformacion() {

    }


    @Entonces("^Verificar que salga toda la informacion del usuario que se encuentra registado en MysticalCut$")
    public void verificarQueSalgaTodaLaInformacionDelUsuarioQueSeEncuentraRegistadoEnMysticalCut() {

    }

}
