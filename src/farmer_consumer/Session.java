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
    public String username=null;
    public String userType=null;
    public int uid=-1;
    public int typeid=-1;
    public Session(String user, int u_id, String ustyp){
        username=user;
        uid=u_id;
        userType=ustyp;
    }
    public void reset(){
        username=null;
        userType=null;
        uid=-1;
        typeid=-1;
    }
}
