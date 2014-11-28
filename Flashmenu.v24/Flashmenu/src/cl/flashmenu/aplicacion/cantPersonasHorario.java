package cl.flashmenu.aplicacion;

import java.util.ArrayList;
import java.util.List;


import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.res.Configuration;
import android.os.Bundle;
import android.support.v4.app.ActionBarDrawerToggle;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;


public class cantPersonasHorario  extends Activity {
	
	private Spinner spinner2;
	private List<String> lista2;
	
	Button btnHaciaMenu;
	String L;
	
	private DrawerLayout drawerLayout;
	private ListView drawer;
	private ActionBarDrawerToggle toggle;
	private static final String[] opciones = {"perfil", "Opción 2", "Opción 3"};

	@SuppressLint("NewApi")
	@Override
	protected void onCreate(Bundle savedInstanceState) {
	   super.onCreate(savedInstanceState);
	   setContentView(R.layout.cantpersonashorario);
	   
	   
	// Rescatamos el Action Bar y activamos el boton Home
			getActionBar().setDisplayHomeAsUpEnabled(true);
			getActionBar().setHomeButtonEnabled(true);

			// Declarar e inicializar componentes para el Navigation Drawer
			drawer = (ListView) findViewById(R.id.drawer);
			drawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);
			//TextView tex = (TextView) findViewById(R.id.text1);

			// Declarar adapter y eventos al hacer click
			drawer.setAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, android.R.id.text1, opciones));

			drawer.setOnItemClickListener(new OnItemClickListener() {
				@Override
				public void onItemClick(AdapterView<?> arg0, View arg1, int arg2, long arg3) {
					Toast.makeText(cantPersonasHorario.this, "Pulsado: " + opciones[arg2], Toast.LENGTH_SHORT).show();
					
					if(opciones[arg2].equalsIgnoreCase("perfil")){
						
						Intent i = new Intent(getApplicationContext(), Paypal.class);
						startActivity(i);
					}
					
					drawerLayout.closeDrawers();

				}
			});

			// Sombra del panel Navigation Drawer
			drawerLayout.setDrawerShadow(R.drawable.drawer_shadow, GravityCompat.START);

			// Integracion boton oficial
			toggle = new ActionBarDrawerToggle(
					this, // Activity
					drawerLayout, // Panel del Navigation Drawer
					R.drawable.ic_drawer, // Icono que va a utilizar
					R.string.app_name, // Descripcion al abrir el drawer
					R.string.hello_world // Descripcion al cerrar el drawer
					){
				public void onDrawerClosed(View view) {
					// Drawer cerrado
					getActionBar().setTitle(getResources().getString(R.string.app_name));
					invalidateOptionsMenu();
				}

				public void onDrawerOpened(View drawerView) {
					// Drawer abierto
					getActionBar().setTitle("Menu");
					invalidateOptionsMenu(); 
				}
			};

			drawerLayout.setDrawerListener(toggle);
	
	  
	   DatosPorDefecto2();
	   
	   btnHaciaMenu = (Button) findViewById(R.id.haciaMenu);
	   btnHaciaMenu.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				
				Intent i = new Intent(getApplicationContext(), Paypal.class);
				startActivity(i);

				
		//	 Intent i2=new Intent(cantPersonasHorario.this, infoMenu.class);
		//		 i2.putExtra("datosLista",L);
		//		 startActivity(i2); 

				//finish();
			}
		});
	   
	   
	}


	
	
	private void DatosPorDefecto2() {
		   spinner2 = (Spinner) findViewById(R.id.spinner2);
		   lista2 = new ArrayList<String>();
		   spinner2 = (Spinner) this.findViewById(R.id.spinner2);
		   lista2.add("12:00");
		   lista2.add("13:00");
		   lista2.add("14:00");
		   lista2.add("15:00");
		   lista2.add("16:00");
		   lista2.add("17:00");
		   lista2.add("18:00");
		   lista2.add("19:00");
		   
		   ArrayAdapter<String> adaptador = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, lista2);
		   adaptador.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
		   spinner2.setAdapter(adaptador);
		   
		 /*  spinner1.setOnItemSelectedListener(new OnItemSelectedListener() {
			   @Override
			   public void onItemSelected(AdapterView<?> arg0, View arg1, int arg2, long arg3) {
			      Toast.makeText(arg0.getContext(), "Seleccionado: " + arg0.getItemAtPosition(arg2).toString(), Toast.LENGTH_SHORT).show();
			   }
			   @Override
			   public void onNothingSelected(AdapterView<?> arg0) {
			   }
			});*/
		   
		}
	
	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		if (toggle.onOptionsItemSelected(item)) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}

	// Activamos el toggle con el icono
	@Override
	protected void onPostCreate(Bundle savedInstanceState) {
		super.onPostCreate(savedInstanceState);
		toggle.syncState();
	}
	
		
	}

