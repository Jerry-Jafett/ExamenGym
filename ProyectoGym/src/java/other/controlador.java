package other;
        
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
// Notice, do not import com.mysql.jdbc.*
// or you will have problems!

public class controlador {
    
    static Connection conn = null;
    
    static{
        conectar();
    }
    
    public static void conectar() {
        try {
            // The newInstance() call is a work around for some
            // broken Java implementations

            Class.forName("com.mysql.jdbc.Driver").newInstance();
        } catch (Exception ex) {
            // handle the error
        }
        
        try {
            conn =
               DriverManager.getConnection("jdbc:mysql://localhost/gymlocochon?" +
                                           "user=root&password=");
            
            System.out.println("Conexion exitosa");
            // Do something with the Connection
        } catch (SQLException ex) {
            // handle any errors
            System.out.println("SQLException: " + ex.getMessage());
            System.out.println("SQLState: " + ex.getSQLState());
            System.out.println("VendorError: " + ex.getErrorCode());
        }
    }
    
    public static void main(String[] args) {
        
        List<Horario> lh = getHorarios();
        
        for(Horario h : lh){
            System.out.println(h.id + " "+ h.id_maestro);
        }
    }
    
    public static void meterDatos(){
        Statement stm = null;
        ResultSet rs = null;
        
        try {
            stm = conn.createStatement();
            rs = stm.executeQuery("SELECT * FROM juegos");
            
            while(rs.next()){
                System.out.println(rs.getInt("id")+" "+rs.getString("nombre"));
            }
//            System.out.println();

            // Now do something with the ResultSet ....
        }
        catch (SQLException ex){
            // handle any errors
            System.out.println("SQLException: " + ex.getMessage());
            System.out.println("SQLState: " + ex.getSQLState());
            System.out.println("VendorError: " + ex.getErrorCode());
        }
    }
    
    // Alumnos y Personas
    
    public static boolean registraAlumno(alumno al){
        Statement stm = null;
        ResultSet rs = null;
        String query;
        query = "insert into alumnos (id_alumnos,nombre,apellido_paterno,"
                + "apellido_materno,edad,domicilio,telefono,celular)"
                + " values (0,"
                + "'"+al.nombre+"',"
                + "' " + al.ap_pat +"',"
                + "' " + al.ap_mat +"',"
                + " " + al.edad +","
                + "' " + al.domicilio +"',"
                + "' " + al.telefono +"',"
                + "' " + al.celular +"'"
                + ");";
        
        try{
            stm = conn.createStatement();
            stm.executeUpdate(query);
        }
        catch(Exception e){
            System.out.println("lol falle");
            e.printStackTrace();
            return false;
        }
        return true;        
    }
    
    public static boolean registraMaestro(maestro m){
        Statement stm = null;
        String query;
        query = "insert into maestros (nombre,apellido_paterno,apellido_materno,telefono,celular,rfc) values"
                + "("
                +"'"+ m.nombre+"',"
                +"'"+ m.app+"',"
                +"'"+ m.apm+"',"
                +""+ m.telefono+","
                +""+ m.celular+","
                +"'"+ m.rfc+"'"
                + ")";                
        
        try{
            stm = conn.createStatement();
            stm.executeUpdate(query);
        }
        catch(Exception e){
            System.out.println("lol falle");
            e.printStackTrace();
            return false;
        }
        return true; 
    }
    
    public static List<alumno> getAlumnos(){
        boolean res = false;
            
        conectar();
        Statement stm = null;
        ResultSet rs = null;
        String query = "Select * from alumnos";
        List<alumno> la = new ArrayList();
        
        try {
            stm = conn.createStatement();
            rs = stm.executeQuery(query);
            
            
            
            while(rs.next()){
                alumno al = new alumno();
                al.id = rs.getInt("id_alumnos");
                al.nombre = rs.getString("nombre");
                al.ap_pat = rs.getString("apellido_paterno");
                al.ap_mat = rs.getString("apellido_materno");
                al.edad = rs.getInt("edad");
                al.domicilio = rs.getString("domicilio");
                al.telefono = rs.getString("telefono");
                al.celular = rs.getString("celular");
                al.fechaInscripcion = rs.getString("fecha_inscripcion");
                la.add(al);
            }                                 
            
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
            ex.printStackTrace();
        }                
        return la;
    }
    
    public static List<maestro> getMaestros(){
        boolean res = false;
            
        conectar();
        Statement stm = null;
        ResultSet rs = null;
        String query = "Select * from maestros";
        List<maestro> lm = new ArrayList();
        
        try {
            stm = conn.createStatement();
            rs = stm.executeQuery(query);        
                        
            while(rs.next()){
                maestro al = new maestro();
                al.id = rs.getInt("id_maestro");
                al.nombre = rs.getString("nombre");
                al.app = rs.getString("apellido_paterno");
                al.apm = rs.getString("apellido_materno");
//                al.domicilio = rs.getString("domicilio");
                al.telefono = rs.getString("telefono");
                al.celular = rs.getString("celular");
                al.rfc = rs.getString("rfc");
                lm.add(al);
            }                                 
            
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
            ex.printStackTrace();
        }                
        return lm;
    }
    
    public static alumno getAlumno(int id){
        boolean res = false;
        
        conectar();
        
        Statement stm = null;
        ResultSet rs = null;
        alumno al = null;
                
        try {
            stm = conn.createStatement();
            String query = "Select * from alumnos where id_alumnos="+id;
            
            rs = stm.executeQuery(query);
            
            if(rs.next()){
                res = true;                
                al = new alumno();
                al.id = rs.getInt("id_alumnos");
                al.nombre = rs.getString("nombre");
                al.ap_pat = rs.getString("apellido_paterno");
                al.ap_mat = rs.getString("apellido_materno");
                al.edad = rs.getInt("edad");
                al.domicilio = rs.getString("domicilio");
                al.telefono = rs.getString("telefono");
                al.celular = rs.getString("celular");
                al.fechaInscripcion = rs.getString("fecha_inscripcion");
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return al;
    }
    
    public static maestro getMaestro(int id){
        Statement stm = null;
        ResultSet rs = null;
        maestro al = null;
        try {
            stm = conn.createStatement();
            String query = "Select * from maestros where id_maestro="+id;
            
            rs = stm.executeQuery(query);
            
            while(rs.next()){
                al = new maestro();
                al.id = rs.getInt("id_maestro");
                al.nombre = rs.getString("nombre");
                al.app = rs.getString("apellido_paterno");
                al.apm = rs.getString("apellido_materno");
//                al.domicilio = rs.getString("domicilio");
                al.telefono = rs.getString("telefono");
                al.celular = rs.getString("celular");
                al.rfc = rs.getString("rfc");
            }
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return al;
    }
    
    // Disciplinas
    
    public static boolean registrarDisciplina(String nombre){
        conectar();
        Statement stm;
        boolean res = false;
        try {
            stm = conn.createStatement();
            String query = "Insert into disciplina(nombre) values ('"+nombre+"')";
            
            stm.executeUpdate(query);
            res = true;
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return res;
    }
    
    public static disciplina getDisciplina(int id){
        conectar();
        Statement stm = null;
        ResultSet rs = null;
        disciplina ds = null;
        
        try {
            stm = conn.createStatement();
            String query = "Select * from disciplina where id_disciplina ="+id;
            rs = stm.executeQuery(query);
            ds = new disciplina();
            while(rs.next()){
                ds.nombre = rs.getString("Nombre");
                ds.id = rs.getInt("id_disciplina");
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return ds;
    }
    
    public static List<disciplina> getDisciplinas(){
        conectar();
        List<disciplina> ls = new ArrayList();
        
        Statement stm = null;
        ResultSet rs = null;
        
        try {
            stm = conn.createStatement();
            String query = "Select * from disciplina";
            
            rs = stm.executeQuery(query);
            
            while(rs.next()){
                disciplina ds = new disciplina();
                ds.id = rs.getInt("id_disciplina");
                ds.nombre = rs.getString("nombre");
                ls.add(ds);
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return ls;
    }
    
    // Horarios
    
    public static boolean registrarHorario(Horario hor){
        boolean res = false;
        conectar();
        Statement stm = null;
        
        try {
            stm = conn.createStatement();
            String query = "Insert into horarios(id_maestro,id_sucursal,id_disciplina) values"
                    + "("+hor.id_maestro+ ","+hor.id_sucursal+ ","+hor.id_disciplina+ ")"; 
            
            stm.executeUpdate(query);
            res = true;
        } catch (SQLException ex) {
//            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
            ex.printStackTrace();
        }
        
        return res;
    }
    
    public static Horario getHorario(int id){
        conectar();
        Statement stm;
        ResultSet rs;
        Horario hor = null;
        try {
            stm = conn.createStatement();
            String query = "Select * from horarios where id_horarios="+id;
            
            rs = stm.executeQuery(query);
            
            while(rs.next()){
                hor = new Horario();
                hor.id = rs.getInt("id_horarios");
                hor.id_disciplina = rs.getInt("id_disciplina");
                hor.id_maestro = rs.getInt("id_maestro");
                hor.id_sucursal = rs.getInt("id_sucursal");
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return hor;
    }
    
    public static List<Horario> getHorarios(){
        conectar();
        Statement stm;
        ResultSet rs;
        Horario hor = null;
        List<Horario> lh = new ArrayList();
        
        try {
            stm = conn.createStatement();
            String query = "Select * from horarios";
            
            rs = stm.executeQuery(query);
            
            while(rs.next()){
                hor = new Horario();
                hor.id = rs.getInt("id_horarios");
                hor.id_disciplina = rs.getInt("id_disciplina");
                hor.id_maestro = rs.getInt("id_maestro");
                hor.id_sucursal = rs.getInt("id_sucursal");
                lh.add(hor);
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(controlador.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        return lh;
    }
}