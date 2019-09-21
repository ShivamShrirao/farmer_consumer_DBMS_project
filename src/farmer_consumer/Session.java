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
public class Session {
    private static String username=null;
    public static int uid=0;
    public Session(String user, int u_id){
        username=user;
        uid=u_id;
    }
}
