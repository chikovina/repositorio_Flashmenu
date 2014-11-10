package carta;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import cl.flashmenu.aplicacion.JSONParser;
import cl.flashmenu.aplicacion.Paypal;
import cl.flashmenu.aplicacion.R;
import cl.flashmenu.aplicacion.pagarMenu;
import cl.flashmenu.aplicacion.servidor;


import administrador.iniciarSesion;
import administrador.perfilAdmRestaurant;
import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.RadioButton;
import android.widget.SimpleAdapter;
import android.widget.TextView;


public class listaPlatos extends ListActivity {

	// Progress Dialog
	private ProgressDialog pDialog;
	String usuario, idADM, idREST;
	String idadmrest;
	String idd, nombreP, descripcionP, precioP;
	
	// Creating JSON Parser object
	JSONParser jParser = new JSONParser();

	ArrayList<HashMap<String, String>> PlatosList;

	// url to get all empleados list Reemplaza la IP de tu equipo o la direccion de tu servidor 
	// Si tu servidor es tu PC colocar IP Ej: "http://127.97.99.200/taller06oct/..", no colocar "http://localhost/taller06oct/.."
	private static String url_Lista_platos = servidor.ip() + "/PHP/FlashmenuPHP/ListaPlatos.php";

	// JSON Node names
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_platos = "platos";
	private static final String TAG_NOMBRE = "Platos_nombre";
	private static final String TAG_DESCRIPCION = "Platos_descripcion";
	private static final String TAG_PRECIO = "Platos_precio";
	private static final String TAG_ID = "Restaurant_idRestaurant";
	

		  
	   //private static String url_all_inforest = "http://10.40.3.149/PHP/FlashmenuPHP/perfilAdm.php";
	   //private static String url_all_inforest = "http://190.153.212.77/daniel_fernandez/perfilAdm.php"
	  

	JSONArray j1 = null;
	
	
	

	// empleados JSONArray
	JSONArray platosl = null;

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.lista); 
		
		
		
		//RECIBIR DATOS POR INTENT
				Bundle extras = getIntent().getExtras();
				        if (extras != null) {
				     	   usuario  = extras.getString("usuario");//usuario
				     	  idADM  = extras.getString("idADM");//usuario
				     	  idREST  = extras.getString("idREST");//usuario
				     	  
				        }else{
				     	   usuario="error";
				     	  idADM="error";
				     	 idREST="error";
				     	}///
		
		idREST = "1";
		

		// Hashmap for ListView
				       PlatosList = new ArrayList<HashMap<String, String>>();

		// Loading empleados in Background Thread
		new LoadAllplatos().execute();

		// Get listview
		ListView lv = getListView();

		// on seleting single Empleado
		// launching Edit Empleado Screen
		lv.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
				// getting values from selected ListItem
			//	String n = ((TextView) view.findViewById(R.id.nombrePlato)).getText().toString();
			//	String d = ((TextView) view.findViewById(R.id.descripcionPlato)).getText().toString();
			//	String p = ((TextView) view.findViewById(R.id.precioPlato)).getText().toString();
				
				String n = ((CheckBox) view.findViewById(R.id.nombrePlato)).getText().toString();
				String d = ((TextView) view.findViewById(R.id.descripcionPlato)).getText().toString();
				String p = ((TextView) view.findViewById(R.id.precioPlato)).getText().toString();
				
				

				// Starting new intent
				Intent in = new Intent(getApplicationContext(),	listaPlatos.class);
			/*	in.putExtra("id",idADM);
				in.putExtra("idREST",idREST);
				in.putExtra("nom",nombreP);*/
				
				
				// sending pid to next activity		
				in.putExtra(TAG_NOMBRE, n);
				in.putExtra(TAG_DESCRIPCION, d);
				in.putExtra(TAG_PRECIO, p);
				
				// starting new activity and expecting some response back
				startActivityForResult(in, 100);
				//startActivity(in);
			}
				
			
			
		});
		
		 Button siguiente = (Button) findViewById(R.id.botonListas);
		 siguiente.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				
				Intent i = new Intent(getApplicationContext(), Paypal.class);
				startActivity(i);

				finish();
			}
		});
		
		

	}

	// Response from Edit Empleado Activity
	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		super.onActivityResult(requestCode, resultCode, data);
		// if result code 100
		if (resultCode == 100) {
			// if result code 100 is received 
			// means user edited/deleted Empleado
			// reload this screen again
			Intent intent = getIntent();
			finish();
			startActivity(intent);
		}

	}

	/**
	 * Background Async Task to Load all Empleado by making HTTP Request
	 * */
	class LoadAllplatos extends AsyncTask<String, String, String> {

		/**
		 * Before starting background thread Show Progress Dialog
		 * */
		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(listaPlatos.this);
			pDialog.setMessage("Cargando platos. Please wait...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(false);
			pDialog.show();
		}

		/**
		 * getting All empleados from url
		 * */
		protected String doInBackground(String... args) {
			// Building Parameters
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			
			params.add(new BasicNameValuePair("idRestaurant", idREST));
		
			// getting JSON string from URL
			JSONObject json = jParser.makeHttpRequest(url_Lista_platos, "GET", params);
			
			// Check your log cat for JSON reponse
			Log.d("All platos: ", json.toString());

			try {
				// Checking for SUCCESS TAG
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					// empleados found
					// Getting Array of empleados
					platosl = json.getJSONArray(TAG_platos);

					// looping through All empleados
					for (int i = 0; i < platosl.length(); i++) {
						JSONObject c = platosl.getJSONObject(i);

						// Storing each json item in variable
					//	String cedula = c.getString(TAG_CEDULA);
						nombreP = c.getString(TAG_NOMBRE);
						descripcionP = c.getString(TAG_DESCRIPCION);
						precioP = c.getString(TAG_PRECIO);
						//idd = c.getString(TAG_ID);

						// creating new HashMap
						HashMap<String, String> map = new HashMap<String, String>();

						// adding each child node to HashMap key => value
						//map.put(TAG_CEDULA, cedula);
						map.put(TAG_NOMBRE, nombreP);
						map.put(TAG_DESCRIPCION, descripcionP);
						map.put(TAG_PRECIO, precioP);
					//	map.put(TAG_ID, idd);

						// adding HashList to ArrayList
						PlatosList.add(map);
					}
				} else {
					// no empleados found
					// Launch Add New Empleado Activity
					Intent i = new Intent(getApplicationContext(), perfilAdmRestaurant.class);
					// Closing all previous activities
					i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
					startActivity(i);
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
		}

		/**
		 * After completing background task Dismiss the progress dialog
		 * **/
		protected void onPostExecute(String file_url) {
			// dismiss the dialog after getting all empleados
			pDialog.dismiss();
			// updating UI from Background Thread
			runOnUiThread(new Runnable() {
				public void run() {
					/**
					 * Updating parsed JSON data into ListView
					 * */
					ListAdapter adapter = new SimpleAdapter(
							listaPlatos.this, PlatosList, R.layout.list_itemplatos,
							new String[] { TAG_NOMBRE, TAG_DESCRIPCION, TAG_PRECIO }, new int[] {R.id.nombrePlato, R.id.descripcionPlato, R.id.precioPlato});
					
					
				
				
					// updating listview
					setListAdapter(adapter);
				}
			});

		}

	}
	
	
}