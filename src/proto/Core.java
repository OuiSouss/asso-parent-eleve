package proto;

import javafx.scene.Scene;
import javafx.stage.Stage;
import proto.components.SceneEntity;
import proto.components.SceneEnum;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by echo on 06/12/2016.
 */
public class Core {

    public Stage mainStage;

    public List<SceneEntity> scenes;

    public Core()
    {
        scenes = new ArrayList<>();
    }

    public void addScene(SceneEnum e, Scene s)
    {
        for (int i = 0; i < scenes.size(); i++) {
            SceneEntity o = scenes.get(i);
            if (o.id.equals(e))
            {
                scenes.remove(o);
                i = scenes.size();
            }
        }

        SceneEntity o = new SceneEntity();
        o.id = e;
        o.scene = s;
        scenes.add(o);
    }

    public void switchScene(SceneEnum e)
    {
        for (int i = 0; i < scenes.size(); i++) {
            SceneEntity o = scenes.get(i);
            if (o.id.equals(e)) {
                mainStage.setScene(o.scene);
            }
        }
    }

    public void switchScene(SceneEnum e, String title)
    {
        for (int i = 0; i < scenes.size(); i++) {
            SceneEntity o = scenes.get(i);
            if (o.id.equals(e)) {
                mainStage.setTitle(title);
                mainStage.setScene(o.scene);
            }
        }
    }

    public Scene getScene(SceneEnum e)
    {
        for (int i = 0; i < scenes.size(); i++) {
            SceneEntity o = scenes.get(i);
            if (o.id.equals(e)) {
                return o.scene;
            }
        }
        return null;
    }
}
