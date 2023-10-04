package com.usfx.combinatoria;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {


    Button buttonmcombinatoria, buttonmfinish;
    EditText edittextmnumerador, edittextmorden;
    TextView textviewmresultado;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        buttonmcombinatoria = findViewById(R.id.buttonmcombinatoria);
        buttonmfinish = findViewById(R.id.buttonmfinish);
        edittextmnumerador = findViewById(R.id.editTextmnumerador);
        edittextmorden = findViewById(R.id.editTextmorden);
        textviewmresultado = findViewById(R.id.textViewmresultado);

        buttonmfinish.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view){
                finish();
            }
        });
        buttonmcombinatoria.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Invocar a Activity
                int n = Integer.parseInt(edittextmnumerador.getText().toString());
                int p = Integer.parseInt(edittextmorden.getText().toString());
                 ClassCombinatoria oper = new ClassCombinatoria(n,p);
                 String r = oper.calcular();
                // Usar String.valueOf() para convertir el resultado a String
                textviewmresultado.setText(r);



//                ClassComplex classcomplex = new ClassComplex(a,b,c,d);
//                classcomplex.multiplicar();
//                textViewcox.setText(classcomplex.getX());
            }
        });

    }



}