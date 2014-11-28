package cl.flashmenu.aplicacion;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


import cliente.crearReserva.getID;
import android.app.Activity;
import android.app.DatePickerDialog;
import android.app.Dialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.TextView;
import android.widget.Toast;

public class Calendario extends Activity {

	//////
	JSONParser jsonParser = new JSONParser();


		String idCliente;

	private static String url_create_Cliente = servidor.ip() + servidor.ruta2()+"nuevaReserva.php";

	private static final String TAG_SUCCESS = "success";


	private TextView tvDisplayDate;
	private DatePicker dpResult;
	private Button btnChangeDate, btnHaciaDetalle;

	String d;

	//desde intent
	String idRest, usuario, mailRest, direccionRest, hora;

	private int year;
	private int month;
	private int day;

	static final int DATE_DIALOG_ID = 999;

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.calendario);

		//RECIBIR DATOS POR INTENT
		Bundle extras = getIntent().getExtras();
		if (extras != null) {
			hora = extras.getString("hora");
			idRest  = extras.getString("idRest");//
			usuario  = extras.getString("usuario");//
			mailRest  = extras.getString("mailRest");//
			direccionRest  = extras.getString("direccionRest");//
			idCliente = extras.getString("idCliente");


		}else{
			idRest="error";
			usuario="error";
			mailRest="error";
			direccionRest="error";
			idCliente="error";
		}///

		setCurrentDateOnView();
		addListenerOnButton();



		btnHaciaDetalle = (Button) findViewById(R.id.btnHaciaDetalle);

		btnHaciaDetalle.setOnClickListener(new OnClickListener() {

			@Override
			public void onClick(View v) {
				new CrearReserva().execute();
				Intent i = new Intent(getApplicationContext(),	Paypal.class);
				Toast.makeText(getApplicationContext(), d, Toast.LENGTH_LONG).show();
				i.putExtra("fecha", d);
				i.putExtra("hora", hora);
				i.putExtra("idRest", idRest);
				i.putExtra("usuario", usuario);
				i.putExtra("mailRest", mailRest);
				i.putExtra("direccionRest", direccionRest);

				startActivity(i);

			}

		});

	}

	// display current date
	public void setCurrentDateOnView() {

		tvDisplayDate = (TextView) findViewById(R.id.tvDate);
		dpResult = (DatePicker) findViewById(R.id.dpResult);

		final Calendar c = Calendar.getInstance();
		year = c.get(Calendar.YEAR);
		month = c.get(Calendar.MONTH);
		day = c.get(Calendar.DAY_OF_MONTH);

		// set current date into textview
		tvDisplayDate.setText(new StringBuilder()
		// Month is 0 based, just add 1
		.append(month + 1).append("-").append(day).append("-")
		.append(year).append(" "));

		// set current date into datepicker
		dpResult.init(year, month, day, null);
		d = year +"-"+ month +"-"+ day;

	}

	public void addListenerOnButton() {

		btnChangeDate = (Button) findViewById(R.id.btnChangeDate);

		btnChangeDate.setOnClickListener(new OnClickListener() {

			@Override
			public void onClick(View v) {

				showDialog(DATE_DIALOG_ID);
		
			}

		});

	}

	@Override
	protected Dialog onCreateDialog(int id) {
		switch (id) {
		case DATE_DIALOG_ID:
			// set date picker as current date
			return new DatePickerDialog(this, datePickerListener, year, month,
					day);
		}
		return null;
	}

	private DatePickerDialog.OnDateSetListener datePickerListener = new DatePickerDialog.OnDateSetListener() {

		// when dialog box is closed, below method will be called.
		public void onDateSet(DatePicker view, int selectedYear,
				int selectedMonth, int selectedDay) {
			year = selectedYear;
			month = selectedMonth;
			day = selectedDay;

			// set selected date into textview
			tvDisplayDate.setText(new StringBuilder().append(month + 1)
					.append("-").append(day).append("-").append(year)
					.append(" "));

			// set selected date into datepicker also
			dpResult.init(year, month, day, null);

		}
	};



	
	class CrearReserva extends AsyncTask<String, String, String> {
		protected String doInBackground(String... args) {

			List<NameValuePair> params = new ArrayList<NameValuePair>();

			params.add(new BasicNameValuePair("Reserva_fecha", d));
			params.add(new BasicNameValuePair("Reserva_hora", hora));
			params.add(new BasicNameValuePair("Cliente_idCliente", idCliente));

			JSONObject json = jsonParser.makeHttpRequest(url_create_Cliente,"POST", params);
			Log.d("Create Response", json.toString());

			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {

					//					Intent i = new Intent(getApplicationContext(),	Paypal.class);
					//					i.putExtra("fecha", d);
					//					i.putExtra("hora", hora);
					//					i.putExtra("idRest", idRest);
					//					i.putExtra("usuario", usuario);
					//					i.putExtra("mailRest", mailRest);
					//					i.putExtra("direccionRest", direccionRest);
					//
					//					startActivity(i);
					//		Toast.makeText(getApplicationContext(), "reserva exitosa", Toast.LENGTH_LONG).show();

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