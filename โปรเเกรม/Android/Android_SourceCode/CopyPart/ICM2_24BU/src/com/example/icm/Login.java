package com.example.icm;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;
import android.app.AlertDialog;
import android.app.Dialog;
import android.app.ProgressDialog;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.StatusLine;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import android.os.Bundle;
import android.os.StrictMode;
import android.annotation.SuppressLint;
import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.util.Log;
import android.view.View;
import android.view.Menu;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Login extends ActionBarActivity {
	
    ProgressDialog dialog;
    
    String strMemberID;
    
    @SuppressLint("NewApi")
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }
        
        final AlertDialog.Builder ad = new AlertDialog.Builder(this);
        // txtUsername & txtPassword
        final EditText txtUser = (EditText)findViewById(R.id.txtUser_Username); 
        final EditText txtPass = (EditText)findViewById(R.id.txtUser_Password); 
        
        // btnLogin
        final Button btnLogin = (Button) findViewById(R.id.btnLogin);
        // Perform action on click
        btnLogin.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
            	
            	
            	String url = "http://www.icmpsutrang.esy.es/android_www/checkLogin.php";
            	//String url = "http://10.0.3.2/android/checkLogin.php";
            	//String url = "http://10.0.2.2/android/checkLogin.php";
        		List<NameValuePair> params = new ArrayList<NameValuePair>();
                params.add(new BasicNameValuePair("strUser", txtUser.getText().toString()));
                params.add(new BasicNameValuePair("strPass", txtPass.getText().toString()));
                
                /** Get result from Server (Return the JSON Code)
                 * StatusID = ? [0=Failed,1=Complete]
                 * MemberID = ? [Eg : 1]
                 * Error	= ?	[On case error return custom error message]
                 * 
                 */
            	String resultServer  = getHttpPost(url,params);
                /*** Default Value ***/
            	String strStatusID = "0";
            		   strMemberID = "0";
            	String strError = "Unknow Status!";
            	
            	JSONObject c;
				try {
					c = new JSONObject(resultServer);
	            	strStatusID = c.getString("StatusID");
	            	strMemberID = c.getString("User_Id");
	            	strError = c.getString("Error");
	            	
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				// Prepare Login
				if(strStatusID.equals("0"))
				{
					// Dialog
					ad.setTitle("Error! ");
					ad.setIcon(android.R.drawable.btn_star_big_on); 
					ad.setPositiveButton("Close", null);
					ad.setMessage(strError);
					ad.show();
					txtUser.setText("");
					txtPass.setText("");
				}
				else
				{
					Download();
				}
            } 
        }); 
    }
    
	protected void Download() {
		String title = "ลงชื่อเข้าใช้";
		String msg = "กำลังเข้าสู่ระบบ โปรดรอสักครู่...";
		dialog = ProgressDialog.show(Login.this, title, msg);
		
		Thread thread = new Thread(new Runnable() {
			
			@Override
			public void run() {
				try {
					Thread.sleep(2000);
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
				dialog.dismiss();
				//nextpage
				Intent newActivity = new Intent(Login.this,DetailActivity.class);
				newActivity.putExtra("User_Id", strMemberID);
				startActivity(newActivity);
			}
		});
		thread.start();
	}

	public String getHttpPost(String url,List<NameValuePair> params) {
		StringBuilder str = new StringBuilder();
		HttpClient client = new DefaultHttpClient();
		HttpPost httpPost = new HttpPost(url);
		try {
			httpPost.setEntity(new UrlEncodedFormEntity(params,"UTF-8"));
			HttpResponse response = client.execute(httpPost);
			StatusLine statusLine = response.getStatusLine();
			int statusCode = statusLine.getStatusCode();
			if (statusCode == 200) { // Status OK
				HttpEntity entity = response.getEntity();
				InputStream content = entity.getContent();
				BufferedReader reader = new BufferedReader(new InputStreamReader(content));
				String line;
				while ((line = reader.readLine()) != null) {
					str.append(line);
				}
			} else {
				Log.e("Log", "Failed to download result..");
			}
		} catch (ClientProtocolException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return str.toString();
	}
	
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.login, menu);
        return true;
    } 
}