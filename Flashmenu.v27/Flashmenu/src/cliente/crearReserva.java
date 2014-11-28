package cliente;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import cl.flashmenu.aplicacion.JSONParser;
import cl.flashmenu.aplicacion.Paypal;
import cl.flashmenu.aplicacion.R;
import cl.flashmenu.aplicacion.servidor;
import cl.flashmenu.aplicacion.verMapa;
import cl.flashmenu.aplicacion.R.id;
import cl.flashmenu.aplicacion.R.layout;
import cl.flashmenu.aplicacion.R.menu;
import cliente.crearCliente.CrearCliente;

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
import android.widget.EditText;
import android.widget.Toast;

public class crearReserva extends Activity{

	
	JSONParser jsonParser = new JSONParser();


	//desde intent
	String idRest, usuario, mailRest, direccionRest, hora, fecha;
	
	String idCliente;

	private static String url_create_Cliente = servidor.ip() + servidor.ruta2()+"nuevaReserva.php";

	private static final String TAG_SUCCESS = "success";
	
	JSONParser jParser = new JSONParser();

////
	private static String url_all_inforest = servidor.ip() +servidor.ruta2() + "getClienteId.php";
	JSONArray j1 = null;
	private static final String TAG_ID = "idCliente";



	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
	//	setContentView(R.layout.calendario);

		//RECIBIR DATOS POR INTENT
		Bundle extras = getIntent().getExtras();
		if (extras != null) {
			fecha = extras.getString("fecha");
			hora = extras.getString("hora");
			idRest  = extras.getString("idRest");//
			usuario  = extras.getString("usuario");//
			mailRest  = extras.getString("mailRest");//
			direccionRest  = extras.getString("direccionRest");//


		}else{
			fecha = "error";
			idRest="error";
			usuario="error";
			mailRest="error";
			direccionRest="error";
		}///
		new getID().execute();
		new CrearReserva().execute();
	}
	
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
	class CrearReserva extends AsyncTask<String, String, String> {
		protected String doInBackground(String... args) {

			List<NameValuePair> params = new ArrayList<NameValuePair>();

			params.add(new BasicNameValuePair("Reserva_fecha", fecha));
			params.add(new BasicNameValuePair("Reserva_hora", hora));
			params.add(new BasicNameValuePair("Cliente_idCliente", idCliente));

			JSONObject json = jsonParser.makeHttpRequest(url_create_Cliente,"POST", params);
			Log.d("Create Response", json.toString());

			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {

					Intent i = new Intent(getApplicationContext(),	Paypal.class);
					i.putExtra("fecha", fecha);
					i.putExtra("hora", hora);
					i.putExtra("idRest", idRest);
					i.putExtra("usuario", usuario);
					i.putExtra("mailRest", mailRest);
					i.putExtra("direccionRest", direccionRest);

					startActivity(i);

				} else {
					}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
		}
	}
	
//
}
