package proto.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.Scene;
import proto.Core;
import proto.Main;
import proto.components.SceneEnum;

import java.net.URL;
import java.util.ResourceBundle;


public class mainController implements Initializable{
    public Core core;


    @FXML
    public void goToLivres(ActionEvent actionEvent) {
        core.switchScene(SceneEnum.livresView);
    }


    @Override
    public void initialize(URL location, ResourceBundle resources) {
        this.core = Main.getCore();
    }
}