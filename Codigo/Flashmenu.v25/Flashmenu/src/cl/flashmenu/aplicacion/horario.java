package cl.flashmenu.aplicacion;

import cl.flashmenu.aplicacion.DeselectableRadioButton;
import cl.flashmenu.aplicacion.DeselectableRadioGroup;
import cl.flashmenu.aplicacion.R;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.CompoundButton.OnCheckedChangeListener;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;
import android.view.Menu;



public class horario  extends Activity implements OnCheckedChangeListener {


	Button btnHaciaMenu;
	String L;
	TextView tex;
	RadioButton grupoRadios;
	RadioGroup rg;
	String hora;


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.horario);
		
		btnHaciaMenu = (Button) findViewById(R.id.haciaMenu);
		btnHaciaMenu.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View v) {

				Intent i = new Intent(getApplicationContext(), Calendario.class);
				i.putExtra("hora", hora);
				startActivity(i);

				//Toast.makeText(getApplicationContext(), hora, Toast.LENGTH_LONG).show();
			}
		});

		  // UI References
        DeselectableRadioButton inkyRadioButton = (DeselectableRadioButton) findViewById(R.id.radio0);
        DeselectableRadioButton pinkyRadioButton = (DeselectableRadioButton) findViewById(R.id.radio1);
        DeselectableRadioButton ponkyRadioButton = (DeselectableRadioButton) findViewById(R.id.radio2);
        
        // Event listeners
        inkyRadioButton.setOnCheckedChangeListener(this);
        pinkyRadioButton.setOnCheckedChangeListener(this);
        ponkyRadioButton.setOnCheckedChangeListener(this);
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
            }
            
           // Toast.makeText(this, messageResId, Toast.LENGTH_SHORT).show();
        }
    }  
}

