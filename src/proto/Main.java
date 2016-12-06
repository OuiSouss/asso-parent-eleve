package proto;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import proto.components.SceneEnum;

public class Main extends Application {

    public static Core core;
    @Override
    public void start(Stage primaryStage) throws Exception{
        core = new Core();
        core.mainStage = primaryStage;
        Parent root = FXMLLoader.load(getClass().getClassLoader().getResource("proto/views/mainView.fxml"));
        Scene s = new Scene(root, 500, 300);
        core.addScene(SceneEnum.mainView, s);
        root = FXMLLoader.load(getClass().getClassLoader().getResource("proto/views/livresView.fxml"));
        s = new Scene(root, 500, 300);
        core.addScene(SceneEnum.livresView, s);
        root = FXMLLoader.load(getClass().getClassLoader().getResource("proto/views/stocksView.fxml"));
        s = new Scene(root, 500, 300);
        core.addScene(SceneEnum.stocksView, s);
        core.switchScene(SceneEnum.mainView, "Association");
        primaryStage.show();

    }

    public static Core getCore()
    {
        return core;
    }
    public static void main(String[] args) {
        launch(args);


    }
}
