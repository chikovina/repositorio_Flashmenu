package cl.flashmenu.aplicacion;
 
import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
 
public class email extends Activity {
 
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.email);
    }
 
    public void onClick(View v) {
        // Reemplazamos el email por algun otro real
        String[] to = { "daniel18.df@gmail.com", "octavio.valencia.v@gmail.com" };
        String[] cc = { "x.danielx.13@hotmail.com" };
        enviar(to, cc, "Hola",
                "Esto es un email enviado desde una app de Android");
    }
 
    private void enviar(String[] to, String[] cc,
        String asunto, String mensaje) {
        Intent emailIntent = new Intent(Intent.ACTION_SEND);
        emailIntent.setData(Uri.parse("mailto:"));
        //String[] to = direccionesEmail;
        //String[] cc = copias;
        emailIntent.putExtra(Intent.EXTRA_EMAIL, to);
        emailIntent.putExtra(Intent.EXTRA_CC, cc);
        emailIntent.putExtra(Intent.EXTRA_SUBJECT, asunto);
        emailIntent.putExtra(Intent.EXTRA_TEXT, mensaje);
        emailIntent.setType("message/rfc822");
        startActivity(Intent.createChooser(emailIntent, "Email "));
    }
}