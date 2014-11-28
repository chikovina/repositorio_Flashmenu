package cl.flashmenu.aplicacion;
    
import java.io.File;
import java.util.Properties;
 
import javax.activation.DataHandler;
import javax.activation.FileDataSource;
import javax.mail.BodyPart;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;
 

public class javamail {
 
    private String origenEmail;
    private String origenPassword;
 
    private String destinoEmail;
 
    private String auth;
    private String sslEnable;
    private String smtpHost;
    private String smtpPort;
 
    public javamail(String origenEmail,String origenPassword,String destinoEmail){
        this.origenEmail=origenEmail;
        this.origenPassword=origenPassword;
        this.destinoEmail=destinoEmail;
 
        this.auth="true";
        this.sslEnable="true";
        this.smtpHost="smtp.gmail.com";
        this.smtpPort="587";
    }
 
    public boolean enviar(){
        boolean correcto=true;
        final String username=origenEmail;
        final String password=origenPassword;
 
        Properties props = new Properties();
        props.put("mail.smtp.auth", auth);
        props.put("mail.smtp.starttls.enable", sslEnable);
        props.put("mail.smtp.host", smtpHost);
        props.put("mail.smtp.port", smtpPort);
 
        Session session = Session.getInstance(props,
                new javax.mail.Authenticator() {
                    protected PasswordAuthentication getPasswordAuthentication() {
                        return new PasswordAuthentication(username, password);
                    }
                });
 
        try {
 
            BodyPart texto=new MimeBodyPart();
            texto.setText("Texto");
 
        //    BodyPart adjunto=new MimeBodyPart();
          //  adjunto.setDataHandler(new DataHandler(new FileDataSource(adj)));
          //  adjunto.setFileName("adjunto");
 
            MimeMultipart mm=new MimeMultipart();
            mm.addBodyPart(texto);
           // mm.addBodyPart(adjunto);
 
            MimeMessage mensaje=new MimeMessage(session);
            mensaje.setFrom(new InternetAddress(origenEmail));
            mensaje.setRecipients(Message.RecipientType.TO,
                    InternetAddress.parse(destinoEmail));
            mensaje.setSubject("Asunto");
            mensaje.setContent(mm);
 
            Transport.send(mensaje);
        } catch (MessagingException e) {
            correcto=false;
            throw new RuntimeException(e);
 
        }
        return correcto;
    }
}
