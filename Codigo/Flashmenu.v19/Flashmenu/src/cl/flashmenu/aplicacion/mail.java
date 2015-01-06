package cl.flashmenu.aplicacion;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import cl.flashmenu.aplicacion.JSONParser;
import cl.flashmenu.aplicacion.R;
import cl.flashmenu.aplicacion.servidor;
import android.app.Activity;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;

public class mail extends Activity {


	String email;


	private ProgressDialog pDialog;

	JSONParser jParser = new JSONParser();

	private static String url_mail = servidor.ip() + servidor.ruta2() + "restaurantes.php";



	private static final String TAG_SUCCESS = "success";
	private static final String TAG_EMAIL = "email";



	JSONArray emailJ = null;

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.inforestaurantes);

		new Loadrest().execute();

	}
	public class Loadrest extends AsyncTask<String, String, String> {

		/**
		 * Before starting background thread Show Progress Dialog
		 * */
		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(mail.this);
			pDialog.setMessage("Cargando informacio. Espere porfavor...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(false);
			pDialog.show();
		}



		protected String doInBackground(String... args) {

			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("buscar", "2"));

			JSONObject json = jParser.makeHttpRequest(url_mail, "POST", params);

			Log.d("All empleados: ", json.toString());

			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					emailJ = json.getJSONArray(TAG_EMAIL);

					for (int i = 0; i < emailJ.length(); i++) {
						JSONObject c = emailJ.getJSONObject(i);

						email = c.getString(TAG_EMAIL);

					}
				} else {


				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
		}



		protected void onPostExecute(String file_url) {
			pDialog.dismiss();

		}
	}
}
