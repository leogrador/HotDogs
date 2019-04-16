package cinéma;


import javax.imageio.ImageIO;
import javax.swing.*;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.image.BufferedImage;
import java.util.ArrayList;
import java.util.List;

import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableModel;
import javax.swing.text.NavigationFilter;

import java.awt.*;
import java.awt.event.*;
import java.util.ArrayList;
import java.util.List;
import java.util.NavigableMap;
class fenhome extends JFrame implements ActionListener
{
	
	JComboBox cmbtime = new JComboBox();
	JComboBox cmbtitre = new JComboBox();
	JComboBox cmbjour = new JComboBox();
	JComboBox place = new JComboBox();

	int prix; 
	JLabel cout = new JLabel("Cout total : " + prix);
	JButton payer = new JButton("Procéder au payement");
	
	public fenhome (){ 
		setTitle("Cinéma");
		setSize(1000,1000);
		setLocationRelativeTo(null);
		setDefaultCloseOperation(EXIT_ON_CLOSE);
		setContentPane(buildContentPane());
		setVisible(true);
		}
	
	public JPanel buildContentPane(){
		

		JPanel pane = new JPanel();
		pane.setLayout(new GridLayout(6,2));
		JPanel Panel1 = new JPanel();
		Panel1.setLayout(new FlowLayout());
		JPanel Panel2 = new JPanel();
		Panel2.setLayout(new FlowLayout());
		JPanel Panel3 = new JPanel();
		Panel3.setLayout(new FlowLayout());
		JPanel Panel4 = new JPanel();
		Panel4.setLayout(new FlowLayout());
		JPanel Panel5 = new JPanel();
		Panel5.setLayout(new FlowLayout());
		JPanel Panel6 = new JPanel();
		Panel6.setLayout(new FlowLayout());
		JLabel titre = new JLabel("Cinéma");
		Font fonttitre = new Font("Arial", Font.BOLD, 60);
		titre.setFont(fonttitre);
		titre.setForeground(Color.white);
		JLabel heure = new JLabel("Horaires");
		Font fheure = new Font("Arial", Font.BOLD, 20);
		heure.setFont(fheure);
		JLabel film = new JLabel("Choississez votre film");
		Font ffilm = new Font("Arial", Font.BOLD, 20);
		film.setFont(ffilm);
		JLabel jour = new JLabel("Choississez votre jour");
		Font fjour = new Font("Arial", Font.BOLD, 20);
		jour.setFont(fjour);
		JLabel places = new JLabel("Combien de places?");
		Font fplace = new Font("Arial", Font.BOLD, 20);
		places.setFont(fplace);
		
		
		Font fcout = new Font("Arial", Font.BOLD, 20);
		cout.setFont(fcout);
		
		cmbtime.setModel(new javax.swing.DefaultComboBoxModel(new String[] { "12h00","20h00"}));
		
		cmbtitre.setModel(new javax.swing.DefaultComboBoxModel(new String[] { "A star is born", "Coco", "Rémi sans famille", "Au bout des doigts"}));
		
		cmbjour.setModel(new javax.swing.DefaultComboBoxModel(new String[] { "lundi 7 janvier", "dimanche 12 janvier"}));
		
		place.setModel(new javax.swing.DefaultComboBoxModel(new String[] { "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15"}));
		
		cmbtime.addActionListener(this);

		
		Panel1.setBackground(Color.black);
		Panel1.add(titre);
		pane.add(Panel1);
		
		
		Panel2.setBackground(Color.lightGray);
		pane.add(Panel2);
		Panel2.add(film);
		Panel2.add(cmbtitre);


		Panel3.setBackground(Color.lightGray);
		Panel3.add(places);
		Panel3.add(place);
		pane.add(Panel3);
		
		Panel4.setBackground(Color.lightGray);
		pane.add(Panel4);
		Panel4.add(heure); 
		Panel4.add(cmbtime);
		Panel4.add(jour);
		Panel4.add(cmbjour);
		pane.add(Panel4);
		
		Panel5.setBackground(Color.lightGray);
		Panel5.add(cout);
		pane.add(Panel5);
		

		Panel6.setBackground(Color.lightGray);
		Panel6.add(payer);
		pane.add(Panel6);
		
	   	return pane; }


	public void actionPerformed(ActionEvent e) {
		String splace = (String)place.getSelectedItem();
		int iplace = Integer.parseInt(splace); 
		String s = (String) cmbtime.getSelectedItem();
        switch (s) {
            case "12h00":
            	prix = 8; 
            	cout.setText("Cout total : " + prix* iplace);
                break;
            case "20h00":
            	prix = 10; 
            	cout.setText("Cout total : " + prix * iplace);
                break;

        }}}



