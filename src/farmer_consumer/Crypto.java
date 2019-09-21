/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package farmer_consumer;

import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

/**
 *
 * @author archer
 */
public class Crypto {
    public static String getMD5(String input){
        try{
            MessageDigest md = MessageDigest.getInstance("MD5");
            byte[] mDigest = md.digest(input.getBytes());
            BigInteger no = new BigInteger(1, mDigest);
            String hash = no.toString(16);
            while(hash.length()<32){
                hash = "0" + hash;
            }
            return hash;
        }
        catch(NoSuchAlgorithmException e){
            System.out.println(e);
        }
        return null;
    }
    
}
