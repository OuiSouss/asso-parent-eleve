package proto.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import proto.Core;
import proto.Main;
import proto.components.SceneEnum;

import java.net.URL;
import java.util.ResourceBundle;

/**
 * Created by echo on 06/12/2016.
 */
public class livresController implements Initializable {
    public Core core;


    @FXML
    public void goToMain(ActionEvent actionEvent) {
        core.switchScene(SceneEnum.mainView);
    }

    @FXML
    public void goToStocks(ActionEvent actionEvent) {
        core.switchScene(SceneEnum.stocksView);
    }


    @Override
    public void initialize(URL location, ResourceBundle resources) {
        this.core = Main.getCore();
    }
}