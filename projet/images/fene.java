package fenetre;
import javax.swing.JFrame;
import javax.swing.

import java.awt.Color;
import java.awt.GridLayout;
import java.awt.FlowLayout;


public class fene extends JFrame {

	
	static JTextField jtf1 =  new JTextField(10);
	static JTextField jtf2 = new JTextField(10);
	static JTextField jtf3 = new JTextField(10); 


		public fene (){ 
			setTitle("examen");
			setSize(500,600);
			setLocationRelativeTo(null);
			setDefaultCloseOperation(EXIT_ON_CLOSE);
		    setContentPane(buildContentPane());
		    setVisible(true); }
			
			
			
			
			public JPanel buildContentPane(){
			JPanel pane = new JPanel();
			pane.setLayout(new GridLayout(3,2));
			JPanel PanelGauche1 = new JPanel();
			PanelGauche1.setLayout(new FlowLayout());
			JPanel PanelGauche2 = new JPanel();
			PanelGauche2.setLayout(new FlowLayout());
			JPanel PanelGauche3 = new JPanel();
			PanelGauche3.setLayout(new FlowLayout());
			JPanel PanelDroite1 = new JPanel();
			PanelDroite1.setLayout(new FlowLayout());
			JPanel PanelDroite2 = new JPanel();
			PanelDroite2.setLayout(new FlowLayout());
			JPanel PanelDroite3 = new JPanel();
			PanelDroite3.setLayout(new FlowLayout());
			
			
			
			Paneldroite1.setBackground(Color.white);
			Paneldroite1.add(jtf1);
			Paneldroite2.setBackground(Color.white);
			Paneldroite2.add(jtf2);
			Paneldroite3.setBackground(Color.white);
			Paneldroite3.add(jtf3);

			PanelGauche1.setBackground(Color.grey);
			PanelGauche1.add(new JButton ("nom"));
			PanelGauche2.setBackground(Color.grey);
			PanelGauche2.add(new JButton ("Téléphone"));
			PanelGauche3.setBackground(Color.grey);
			PanelGauche3.add(new JButton("Adresse"));
			
			
			pane.add(PanelGauche1);
			pane.add(PanelGauche2);
			pane.add(PanelGauche3);
			pane.add(PanelDroite1);
			pane.add(PanelDroite2);
			pane.add(PanelDroite3);
			
			
			return pane; 
		}
		