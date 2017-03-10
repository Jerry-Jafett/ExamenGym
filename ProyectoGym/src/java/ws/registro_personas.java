/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ws;



import java.util.List;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import other.*;

/**
 *
 * @author Gerardo
 */
@WebService(serviceName = "registro_personas")
public class registro_personas {


    @WebMethod(operationName = "registrarAlumno")
    public boolean registrarAlumno(@WebParam(name = "al") alumno al) {
        //TODO write your implementation code here:
        controlador.conectar();
        boolean res = controlador.registraAlumno(al);
        return res;
    }

    
    @WebMethod(operationName = "registrarMaestro")
    public boolean registrarMaestro(@WebParam(name = "m") maestro m) {
        //TODO write your implementation code here:
        controlador.conectar();
        boolean res = controlador.registraMaestro(m);
        return res;
    }

    @WebMethod(operationName = "getAlumnos")
    public List<alumno> getAlumnos() {
        List res = controlador.getAlumnos();
        return res;
    }
    
    @WebMethod(operationName = "getMaestros")
    public List<maestro> getMaestros() {
        List res = controlador.getMaestros();
        return res;
    }
    
    @WebMethod(operationName = "getAlumno")
    public alumno getAlumno(int id) {
        alumno al = controlador.getAlumno(id);
        return al;
    }
    
    
    //Disciplinas
    @WebMethod(operationName = "registraDisciplina")
    public boolean registraDisciplina(String nombre) {
        boolean res = controlador.registrarDisciplina(nombre);
        return res;
    }
    
    @WebMethod(operationName = "getDisciplina")
    public disciplina getDisciplina(int id) {
        disciplina dic = controlador.getDisciplina(id);
        return dic;
    }
    
    @WebMethod(operationName = "getDisciplinas")
    public List<disciplina> getDisciplinas() {
        List<disciplina> lres = controlador.getDisciplinas();
        return lres;
    }
    
    //Horarios
    @WebMethod(operationName = "registraHorario")
    public boolean registraHorario(Horario hor) {
        boolean res = controlador.registrarHorario(hor);
        return res;
    }
    
    @WebMethod(operationName = "getHorario")
    public Horario getHorario(int id) {
        Horario hor = controlador.getHorario(id);
        return hor;
    }
    
    @WebMethod(operationName = "getHorarios")
    public List<Horario> getHorarios() {
        List<Horario> hors = controlador.getHorarios();
        return hors;
    }
}
