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
import cl.flashmenu.aplicacion.horario;
import cl.flashmenu.aplicacion.menulateral;
import cl.flashmenu.aplicacion.servidor;
import cliente.perfilCliente;


import android.R.menu;
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
import android.widget.Toast;
import cl.flashmenu.aplicacion.menulateral;

public class listaPlatos extends ListActivity{

	// Progress Dialog
	private ProgressDialog pDialog;

	//recibidos por intent
	String usuario, idRest, mailRest, direccionRest;


	String idd, nombreP, descripcionP, precioP;

	// Creating JSON Parser object
	JSONParser jParser = new JSONParser();

	ArrayList<HashMap<String, String>> PlatosList;

	private static String url_Lista_platos = servidor.ip() + servidor.ruta2()+"ListaPlatos.php";

	// JSON Node names
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_platos = "platos";
	private static final String TAG_NOMBRE = "Platos_nombre";
	private static final String TAG_DESCRIPCION = "Platos_descripcion";
	private static final String TAG_PRECIO = "Platos_precio";
	private static final String TAG_ID = "Restaurant_idRestaurant";




	JSONArray j1 = null;




	// JSONArray
	JSONArray platosl = null;

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.lista); 

		//RECIBIR DATOS POR INTENT
		Bundle extras = getIntent().getExtras();
		if (extras != null) {

			idRest  = extras.getString("idRest");
			usuario  = extras.getString("usuario");
			mailRest  = extras.getString("mailRest");
			direccionRest  = extras.getString("direccionRest");

		}else{
			idRest="error";
			usuario="error";
			mailRest="error";
			direccionRest="error";
		}///
		
		
		
		new LoadAllplatos().execute();
		
		
		Toast.makeText(getApplicationContext(), idRest, Toast.LENGTH_LONG).show();
		
		
		// Hashmap for ListView
		PlatosList = new ArrayList<HashMap<String, String>>();



		// Get listview
		ListView lv = getListView();


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

				Intent i = new Intent(getApplicationContext(), horario.class);
				startActivity(i);

				finish();
			}
		});



	}


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
	 * Background Async Task to Load all platos by making HTTP Request
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
		 * getting All platos from url
		 * */
		protected String doInBackground(String... args) {
			// Building Parameters
			List<NameValuePair> params = new ArrayList<NameValuePair>();

			params.add(new BasicNameValuePair("buscar", idRest));

			// getting JSON string from URL
			JSONObject json = jParser.makeHttpRequest(url_Lista_platos, "POST", params);

			// Check your log cat for JSON reponse
			Log.d("All platos: ", json.toString());

			try {
				// Checking for SUCCESS TAG
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {

					platosl = json.getJSONArray(TAG_platos);


					for (int i = 0; i < platosl.length(); i++) {
						JSONObject c = platosl.getJSONObject(i);


						nombreP = c.getString(TAG_NOMBRE);
						descripcionP = c.getString(TAG_DESCRIPCION);
						precioP = c.getString(TAG_PRECIO);


						// creating new HashMap
						HashMap<String, String> map = new HashMap<String, String>();


						map.put(TAG_NOMBRE, nombreP);
						map.put(TAG_DESCRIPCION, descripcionP);
						map.put(TAG_PRECIO, precioP);


						// adding HashList to ArrayList
						PlatosList.add(map);
					}
				} else {

					Intent i = new Intent(getApplicationContext(), perfilCliente.class);
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

			pDialog.dismiss();

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