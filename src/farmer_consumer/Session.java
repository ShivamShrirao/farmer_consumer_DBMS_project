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
    public int uid=-1;
    public Session(String user, int u_id){
        username=user;
        uid=u_id;
    }
    public void reset(){
        username=null;
        uid=-1;
    }
}
