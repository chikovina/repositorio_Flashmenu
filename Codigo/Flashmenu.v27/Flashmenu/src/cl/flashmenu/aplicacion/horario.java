package cl.flashmenu.aplicacion;

import cl.flashmenu.aplicacion.DeselectableRadioButton;
import cl.flashmenu.aplicacion.R;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.ActionBarDrawerToggle;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.CompoundButton.OnCheckedChangeListener;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;



public class horario  extends Activity implements OnCheckedChangeListener {


	Button btnHaciaMenu;
	String L;
	TextView tex;
	RadioButton grupoRadios;
	RadioGroup rg;
	String hora;

	//desde intent
	String idRest, usuario, mailRest, direccionRest, idCliente;

	private static final String TAG_NOMBRE = "Platos_nombre";
	private static final String TAG_DESCRIPCION = "Platos_descripcion";
	private static final String TAG_PRECIO = "Platos_precio";

	String nombrePlato, precioPlato;


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.horario);


		//RECIBIR DATOS POR INTENT
		Bundle extras = getIntent().getExtras();
		if (extras != null) {

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
			idCliente = "error";
		}///

		// getting Empleado details from intent
		Intent i = getIntent();

		// getting Empleado id (pid) from intent
		nombrePlato = i.getStringExtra(TAG_NOMBRE);
		precioPlato = i.getStringExtra(TAG_PRECIO);

		Toast.makeText(getApplicationContext(), nombrePlato, Toast.LENGTH_LONG).show();
		Toast.makeText(getApplicationContext(), precioPlato, Toast.LENGTH_LONG).show();

		btnHaciaMenu = (Button) findViewById(R.id.haciaMenu);
		btnHaciaMenu.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View v) {

				Intent i = new Intent(getApplicationContext(), Calendario.class);
				i.putExtra("hora", hora);
				i.putExtra("idRest", idRest);
				i.putExtra("usuario", usuario);
				i.putExtra("mailRest", mailRest);
				i.putExtra("direccionRest", direccionRest);
				i.putExtra("idCliente",idCliente);
				startActivity(i);

				Toast.makeText(getApplicationContext(), hora, Toast.LENGTH_LONG).show();
				Toast.makeText(getApplicationContext(), idCliente, Toast.LENGTH_LONG).show();
			}
		});

		// UI References
		DeselectableRadioButton aRadioButton = (DeselectableRadioButton) findViewById(R.id.radio0);
		DeselectableRadioButton bRadioButton = (DeselectableRadioButton) findViewById(R.id.radio1);
		DeselectableRadioButton cRadioButton = (DeselectableRadioButton) findViewById(R.id.radio3);
		DeselectableRadioButton dRadioButton = (DeselectableRadioButton) findViewById(R.id.radio4);
		DeselectableRadioButton eRadioButton = (DeselectableRadioButton) findViewById(R.id.radio5);
		DeselectableRadioButton fRadioButton = (DeselectableRadioButton) findViewById(R.id.radio6);
		DeselectableRadioButton gRadioButton = (DeselectableRadioButton) findViewById(R.id.radio7);

		// Event listeners
		aRadioButton.setOnCheckedChangeListener(this);
		bRadioButton.setOnCheckedChangeListener(this);
		cRadioButton.setOnCheckedChangeListener(this);
		dRadioButton.setOnCheckedChangeListener(this);
		eRadioButton.setOnCheckedChangeListener(this);
		fRadioButton.setOnCheckedChangeListener(this);
		gRadioButton.setOnCheckedChangeListener(this);
	}

	@Override
	public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
		if(isChecked) {
			int messageResId = R.string.app_name;

			switch(buttonView.getId()) {
			case R.id.radio0:
				hora = "12:00:00";

				break;


			case R.id.radio1:
				hora = "13:00:00";

				break;


			case R.id.radio2:
				hora = "14:00:00";
				
				break;

			case R.id.radio3:
				hora = "15:00:00";

				break;


			case R.id.radio4:
				hora = "16:00:00";

				break;


			case R.id.radio5:
				hora = "17:00:00";
				
				break;

			case R.id.radio6:
				hora = "18:00:00";

				break;


			case R.id.radio7:
				hora = "19:00:00";

				break;

			}

			// Toast.makeText(this, messageResId, Toast.LENGTH_SHORT).show();
		}
	}  	
}
