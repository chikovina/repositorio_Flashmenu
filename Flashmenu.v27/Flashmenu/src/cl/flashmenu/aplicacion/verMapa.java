package cl.flashmenu.aplicacion;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import restaurant.infoRestaurantes;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;



import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.GoogleMap.OnMarkerClickListener;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

public class verMapa extends Activity{

	private GoogleMap googleMap;
	String usuario, idRest, idCliente;
	//int idRest;

	private static final String TAG_SUCCESS = "success";

	JSONParser jParser = new JSONParser();

	////
	private static String url_all_inforest = servidor.ip() +servidor.ruta2() + "getClienteId.php";
	JSONArray j1 = null;
	private static final String TAG_ID = "idCliente";
	//////

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.vermapa);

		//RECIBIR DATOS POR INTENT
		Bundle extras = getIntent().getExtras();
		if (extras != null) {
			usuario  = extras.getString("usuario");//usuario


		}else{
			usuario="error";
		}///
		new getID().execute();

		MapFragment mapFragment = (MapFragment) getFragmentManager().findFragmentById(R.id.map);
		googleMap = mapFragment.getMap();
		googleMap.setMyLocationEnabled(true);





		googleMap.addMarker(new MarkerOptions().position(new LatLng(-33.013779, -71.543099))
				.title("sushihome").snippet("Vuelva a presionar el marker para mas informacion!"));

		googleMap.addMarker(new MarkerOptions().position(new LatLng(-33.013591, -71.542563))
				.title("MAIA").snippet("Vuelva a presionar el marker para mas informacion!"));

		googleMap.addMarker(new MarkerOptions().position(new LatLng(-33.017302, -71.543780))
				.title("Sanito").snippet("Vuelva a presionar el marker para mas informacion!"));

		googleMap.addMarker(new MarkerOptions().position(new LatLng(-33.012863, -71.548731))
				.title("El rancho del cordobes").snippet("Vuelva a presionar el marker para mas informacion!"));



		//googleMap.setMapType(GoogleMap.MAP_TYPE_SATELLITE);

		googleMap.setOnMarkerClickListener(new OnMarkerClickListener(){

			@Override
			public boolean onMarkerClick(Marker arg0) {


			
				//////////
				googleMap.setOnMarkerClickListener(new OnMarkerClickListener(){

						@Override
					public boolean onMarkerClick(Marker arg0) {

				if(arg0.getTitle().equalsIgnoreCase("sushihome")){					
					Intent i = new Intent(getApplicationContext(), infoRestaurantes.class);
					idRest = "6";
					i.putExtra("idRest", idRest);
					i.putExtra("usuario",usuario);
					i.putExtra("idCliente",idCliente);
					Toast.makeText(getApplicationContext(), idRest, Toast.LENGTH_LONG).show();
					startActivity(i);
				}
				else if(arg0.getTitle().equalsIgnoreCase("El rancho del cordobes")){
					Intent i = new Intent(getApplicationContext(), infoRestaurantes.class);
					idRest = "7";
					i.putExtra("idRest", idRest);
					i.putExtra("usuario",usuario);
					i.putExtra("idCliente",idCliente);
					Toast.makeText(getApplicationContext(), idRest, Toast.LENGTH_LONG).show();
					Toast.makeText(getApplicationContext(), idCliente, Toast.LENGTH_LONG).show();
					startActivity(i);
				}
				else if(arg0.getTitle().equalsIgnoreCase("MAIA")){
					Intent i = new Intent(getApplicationContext(), infoRestaurantes.class);
					idRest = "8";
					i.putExtra("idRest", idRest);
					i.putExtra("usuario",usuario);
					i.putExtra("idCliente",idCliente);
					Toast.makeText(getApplicationContext(), idRest, Toast.LENGTH_LONG).show();
					startActivity(i);
				}
				else if(arg0.getTitle().equalsIgnoreCase("Sanito")){
					Intent i = new Intent(getApplicationContext(), infoRestaurantes.class);
					idRest = "9";
					i.putExtra("idRest", idRest);
					i.putExtra("usuario",usuario);
					i.putExtra("idCliente",idCliente);
					Toast.makeText(getApplicationContext(), idRest, Toast.LENGTH_LONG).show();
					startActivity(i);
				}
				



					return false;
				}
					});

				//////////

				return false;
			}
		});

	}//oncreatr
	
	
	//
	public class getID extends AsyncTask<String, String, String> {
		protected String doInBackground(String... args) {

			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("buscar", usuario));

			JSONObject json = jParser.makeHttpRequest(url_all_inforest, "POST", params);

			Log.d("All : ", json.toString());

			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					j1 = json.getJSONArray(TAG_ID);

					for (int i = 0; i < j1.length(); i++) {
						JSONObject c = j1.getJSONObject(i);

						idCliente = c.getString(TAG_ID);

					}
				} else {

				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
		}
	}
	//
	
	

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

}
