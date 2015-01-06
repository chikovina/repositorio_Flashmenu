package administrador;


import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import restaurant.ListaRestaurant;
import restaurant.crearRestaurant;
import restaurant.perfilRestaurant;

import cl.flashmenu.aplicacion.JSONParser;
import cl.flashmenu.aplicacion.MainActivity;
import cl.flashmenu.aplicacion.R;
import cl.flashmenu.aplicacion.servidor;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;


public class perfilAdmRestaurant extends Activity {

	Button ingresarrestaurant, modificarAdm, haciaPerRest, salir;
	String usuario, idADM, id2;
	
	
	private ProgressDialog pDialog;

	   JSONParser jParser = new JSONParser();
	   
	  
	   //private static String url_all_inforest = "http://10.40.3.149/PHP/FlashmenuPHP/perfilAdm.php";
	   //private static String url_all_inforest = "http://190.153.212.77/daniel_fernandez/perfilAdm.php"
	   private static String url_all_inforest = servidor.ip() + "/PHP/FlashmenuPHP/perfilAdm.php";
	   private static String url_all_rest = servidor.ip() + "/PHP/FlashmenuPHP/perfilAdm2.php";
	   
	   
	JSONArray j1 = null;
	JSONArray j2 = null;
	
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_ID = "id";
	private static final String TAG_ID2 = "id2";
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.perfiladmrestaurant);
		
		
		
		//RECIBIR DATOS POR INTENT
		Bundle extras = getIntent().getExtras();
		        if (extras != null) {
		     	   usuario  = extras.getString("usuario");//usuario
		     	   
		        }else{
		     	   usuario="error";
		     	}///
		 new Loadrest().execute();
	
		
		modificarAdm = (Button) findViewById(R.id.b5);
		modificarAdm.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				
				Intent i = new Intent(getApplicationContext(), modificarAdmRestaurant.class);
				startActivity(i);

				//finish();
			}
		});
		
		
		ingresarrestaurant = (Button) findViewById(R.id.b6);
		ingresarrestaurant.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				
				Intent i = new Intent(getApplicationContext(), crearRestaurant.class);
				 i.putExtra("usuario",usuario);
				 i.putExtra("id",idADM);
				startActivity(i);
				
				

				//finish();
			}
		});
		
		
		haciaPerRest = (Button) findViewById(R.id.haciaPerfilRest);
		haciaPerRest.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				
				Intent i = new Intent(getApplicationContext(), ListaRestaurant.class);
				 i.putExtra("usuario",usuario);
				 i.putExtra("idADM",idADM);
				 i.putExtra("idREST",id2);
					// i.putExtra("id",id2);
				startActivity(i);

				//finish();
			}
		});
		
		salir = (Button) findViewById(R.id.salirPerfilAdm);
		salir.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				
				Intent i = new Intent(getApplicationContext(), MainActivity.class);
				startActivity(i);

				//finish();
			}
		});
		
		
		

		
	}
	
	
	///////
	
	public class Loadrest extends AsyncTask<String, String, String> {

		/**
		 * Before starting background thread Show Progress Dialog
		 * */
		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(perfilAdmRestaurant.this);
			pDialog.setMessage("Cargando informacion. Espere porfavor...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(false);
			pDialog.show();
		}

		/**
		 * getting All empleados from url
		 * */
		protected String doInBackground(String... args) {
			
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("buscar", usuario));
			
			JSONObject json = jParser.makeHttpRequest(url_all_inforest, "POST", params);
			
			Log.d("All : ", json.toString());

			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					j1 = json.getJSONArray(TAG_ID);
			//		j2 = json.getJSONArray(TAG_ID2);
					
					for (int i = 0; i < j1.length(); i++) {
						JSONObject c = j1.getJSONObject(i);
			//			JSONObject d = j2.getJSONObject(i);
						
						idADM = c.getString(TAG_ID);
			//			id2 = d.getString(TAG_ID2);
						
					}
				} else {

			Intent i = new Intent(getApplicationContext(), perfilAdmRestaurant.class);
					i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
					startActivity(i);
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return idADM;
	}
		
		
		
		protected void onPostExecute(String file_url) {
			pDialog.dismiss();
			
			Toast toast1 = Toast.makeText(getApplicationContext(),idADM, Toast.LENGTH_SHORT);
		      toast1.show();
		}
	}
	///////
	
	
	
///////
	
	public class Loadrest2 extends AsyncTask<String, String, String> {

		/**
		 * Before starting background thread Show Progress Dialog
		 * */
		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(perfilAdmRestaurant.this);
			pDialog.setMessage("Cargando informacion. Espere porfavor...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(false);
			pDialog.show();
		}

		/**
		 * getting All empleados from url
		 * */
		protected String doInBackground(String... args) {
			
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("buscar", idADM));
			
			JSONObject json = jParser.makeHttpRequest(url_all_rest, "POST", params);
			
			Log.d("All : ", json.toString());

			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
				
					j2 = json.getJSONArray(TAG_ID2);
					
					for (int i = 0; i < j2.length(); i++) {
						
						JSONObject d = j2.getJSONObject(i);
						
					
						id2 = d.getString(TAG_ID2);
						
					}
				} else {

			Intent i = new Intent(getApplicationContext(), perfilAdmRestaurant.class);
					i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
					startActivity(i);
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
	}
		
		
		
		protected void onPostExecute(String file_url) {
			pDialog.dismiss();
			
			Toast toast1 = Toast.makeText(getApplicationContext(),idADM, Toast.LENGTH_SHORT);
		      toast1.show();
		}
	}
	///////
	
	
	
	

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}
}