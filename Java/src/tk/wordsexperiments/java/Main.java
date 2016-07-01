package tk.wordsexperiments.java;

import javafx.application.Application;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.image.Image;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

/**
 *
 * @author Jaiquon Smith <jaydeshaun@live.ca>
 */
public class Main extends Application {

    private WordsExperiments we = new WordsExperiments();
    private TextArea result;

    @Override
    public void start(Stage primaryStage) {
        double max = Double.MAX_VALUE;

        BorderPane root = new BorderPane();

        //Create Top Header
        Label slogan = new Label("Experimenting with words is our pleasure!");
        slogan.setAlignment(Pos.CENTER);
        slogan.setMaxSize(max, max);
        root.setTop(slogan);

        //User Words Experiment
        TextArea txtExperiment = new TextArea();
        txtExperiment.setMaxSize(max, max);
        txtExperiment.setPromptText("Experimentation starts here...");
        txtExperiment.setWrapText(true);

        //The results for the experiment
        result = new TextArea();
        result.setMaxSize(max, max);
        result.setEditable(false);
        result.setWrapText(true);

        Label lbl1 = new Label("Experiment Type:");

        //Experiment Options
        ComboBox<String> cbOptions = new ComboBox<>();
        String[] options = {"Reverse Everything"};
        ObservableList<String> ol = FXCollections.observableArrayList(options);
        cbOptions.setItems(ol);
        cbOptions.getSelectionModel().selectFirst();
        
        //Button
        Button btnTest = new Button("Test Experiment");
        btnTest.setAlignment(Pos.BASELINE_RIGHT);
        btnTest.setPadding(new Insets(10));
        btnTest.setOnAction((ActionEvent) -> {
            we.setString(txtExperiment.getText());
            
            switch(cbOptions.getSelectionModel().getSelectedIndex()){
                case 0:
                    we.reverse();
                    result.setText(we.getNewString());
                    break;
            }
            if (root.getBottom() != result)
                root.setBottom(result);
        });

        GridPane content = new GridPane();
        content.add(txtExperiment, 0, 0, 2, 1);
        content.add(lbl1, 0, 1);
        content.add(cbOptions, 1, 1);
        content.add(btnTest, 0, 2);
        root.setCenter(content);

        //root.setRight(donation);
        
        Scene scene = new Scene(root);

        primaryStage.getIcons().add(
            new Image("https://wordsexperiments.tk/favicon-16x16.png")
        );
        primaryStage.setTitle("Words Experiments (Beta 1.0.0)");
        primaryStage.setScene(scene);
        primaryStage.show();
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }

}
