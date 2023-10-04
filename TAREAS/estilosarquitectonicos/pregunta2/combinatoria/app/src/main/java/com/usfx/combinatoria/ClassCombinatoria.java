package com.usfx.combinatoria;

public class ClassCombinatoria {
    private int numerador;
    private int orden;
    private int resultado;

    public ClassCombinatoria(int numerador, int orden) {
        this.numerador = numerador;
        this.orden = orden;
    }

    public int getNumerador() {
        return numerador;
    }

    public void setNumerador(int numerador) {
        this.numerador = numerador;
    }

    public int getOrden() {
        return orden;
    }

    public void setOrden(int orden) {
        this.orden = orden;
    }

    public String calcular() {
        long resultado = factorial(numerador) / (factorial(orden) * factorial(numerador - orden));
        return String.valueOf(resultado);
    }

    private long factorial(int num) {
        if (num == 0 || num == 1) {
            return 1;
        } else {
            return num * factorial(num - 1);
        }
    }





}
