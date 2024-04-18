package sem6.Java.practicals.slip12;

import java.sql.*;
import javax.swing.*;

//CREATE TABLE IF NOT EXISTS PROJECT (
//    project_id SERIAL PRIMARY KEY,
//    Project_name TEXT,
//    Project_description TEXT,
//    Project_Status TEXT
//);
//INSERT INTO PROJECT (Project_name, Project_description, Project_Status)
//VALUES 
//    ('Project 1', 'Description of Project 1', 'InProgress'),
//    ('Project 2', 'Description of Project 2', 'Completed'),
//    ('Project 3', 'Description of Project 3', 'Pending');

/**
 * Write a Java Program to create a PROJECT table with field’s project_id,
 * Project_name, Project_description, Project_Status. Insert values in the
 * table. Display all the details of the PROJECT table in a tabular format on
 * the screen.(using swing).
 */
class Database {

    public static String url = "jdbc:postgresql://localhost:5432/sample";
    public static String username = "postgres";
    public static String pass = "Harish";
    
    public static String[][] getProjectDetails()
    {
        try {
            Class.forName("org.postgresql.Driver");
            Connection conn = DriverManager.getConnection(url, username, pass);
            String query = "SELECT * FROM public.project;";
            PreparedStatement st = conn.prepareStatement(query);
            ResultSet set = st.executeQuery();
            
            String [][]data = new String[10][10];
            int i =0;
            while(set.next())
            {
               System.out.println("ID" + set.getInt("id"));
               System.out.println("Name" + set.getString("name"));
               System.out.println("Description :"+ set.getString("description"));
               System.out.println("Status :" + set.getString("status"));
               
               String id = Integer.toString(set.getInt("id"));
               data[i][0] =id;
               data[i][1] =set.getString("name");
               data[i][2] = set.getString("description");
               data[i][3] =set.getString("status");
               i++;
            }
            return data;
        } catch (SQLException ex) {
         ex.printStackTrace();
        } catch (ClassNotFoundException ex) {
        }
        return null;
    }
}
public class Ex2 extends JFrame{
    
    JTable table;
    Ex2()
    {
        super("Project Details");
        setSize(500,500);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
       
        String [][] data = Database.getProjectDetails();
        
        String [] colNames = {"ID" ,"Name","Description","Status"} ;
  
        table = new JTable(data , colNames);
        table.setBounds(30, 40, 200, 300);
        
        add(table);
        setVisible(true);
    }  
    public static void main(String[] args) {
        new Ex2();   
    }
}

