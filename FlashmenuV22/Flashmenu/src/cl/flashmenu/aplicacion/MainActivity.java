package cl.flashmenu.aplicacion;


import java.util.Timer;
import java.util.TimerTask;


import cliente.inicioSesionCliente;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageSwitcher;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.ViewSwitcher.ViewFactory;


public class MainActivity extends Activity {

	private Button ver, admRestCrear, iniciar, iniciar2; 
	private TextView crearAdm;
	
	private ImageSwitcher imageSwitcher;

	private int[] gallery = {R.drawable.a, R.drawable.b, R.drawable.c, R.drawable.d};

	private int position = 0;

	private Timer timer = null;
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		
		/*imageSwitcher = (ImageSwitcher) findViewById(R.id.imageSwitcher);

		imageSwitcher.setFactory(new ViewFactory() {

			public View makeView(){
				
				return new ImageView(MainActivity.this);
			} 
		});
		*/
	/*	timer = new Timer();
		timer.scheduleAtFixedRate(new TimerTask() {

			public void run() {

				runOnUiThread(new Runnable() {
					public void run() {
						imageSwitcher.setImageResource(gallery[position]);
						position++;
						if (position == 6)
						{
							position = 0;
						}
					}
				});
			}

		}, 0, 2500);*/
		
	/*   ver = (Button) findViewById(R.id.b1);
	   ver.setOnClickListener(new View.OnClickListener() {
		
		@Override
		public void onClick(View v) {
			
			Intent i = new Intent(getApplicationContext(), verMapa.class);
			startActivity(i);

			//finish();
		}
	});*/
	   
	  /* admRestCrear = (Button) findViewById(R.id.b2);
	   admRestCrear.setOnClickListener(new View.OnClickListener() {
		
		@Override
		public void onClick(View v) {
			
			Intent i = new Intent(getApplicationContext(), crearAdmRestaurant.class);
			startActivity(i);

			//finish();
		}
	});*/
	   
	   /*iniciar = (Button) findViewById(R.id.b3);
	   iniciar.setOnClickListener(new View.OnClickListener() {
		
		@Override
		public void onClick(View v) {
			//javamail j1 = new javamail("daniel18.df@gmail.com", "danielinformatica09321", "flashmenu.daniel@gmail.com", "primermail", "asdasdasdasd", "gmail");
			//j1.setGmailProps();
			//j1.send();
			
			Intent i = new Intent(getApplicationContext(), inicioSesionCliente.class);
			startActivity(i);

			//finish();
		}
	});*/
	   
	   
	   iniciar2 = (Button) findViewById(R.id.bInicioCli);
	   iniciar2.setOnClickListener(new View.OnClickListener() {
		
		@Override
		public void onClick(View v) {
			
			Intent i = new Intent(getApplicationContext(), inicioSesionCliente.class);
			startActivity(i);

			//finish();
		}
	});
	   
	   	   
	}

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
