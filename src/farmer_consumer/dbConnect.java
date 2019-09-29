/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package farmer_consumer;

/**
 *
 * @author archer
 */
import java.sql.*;

public class dbConnect {
    final private static String hostname = "127.0.0.1";
    final private static int port = 3306;
    final private static String database = "farmer_customer";
    final private static String user = "mysql";
    final private static String pass = "password";

    public Connection con = null;
    public Statement stmt = null;
    public PreparedStatement prestmt = null;
    public ResultSet rs = null;
    
    public void connect() throws Exception {
        con = DriverManager.getConnection("jdbc:mysql://"+hostname+":"+port+"/"+database, user, pass);
        stmt = con.createStatement();
        System.out.println("\nConnected.");
    }
    public void close() {
        try {
            if(con!=null) {
                con.close();
            }
            if(stmt!=null) {
                stmt.close();
            }
            if(rs!=null) {
                rs.close();
            }
            System.out.println("\nConnection closed.");
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}