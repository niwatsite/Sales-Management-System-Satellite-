package com.example.icm;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

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
import android.app.Activity;
import android.content.Intent;
import android.util.Log;
import android.view.View;
import android.view.Menu;
import android.widget.Button;
import android.widget.TextView;

public class DetailActivity extends Activity {
	
	String User_Id; //User_Id
    @SuppressLint("NewApi")
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }
        
        showInfo();
        
        final Button next = (Button) findViewById(R.id.btnmain);
        next.setOnClickListener(new View.OnClickListener(){
 			
 			@Override
 			public void onClick(View v) {
 				Intent it = new Intent(DetailActivity.this,Main.class);
 				it.putExtra("User_Id", User_Id);//User_Id
 				startActivity(it);
 			}
 		});  
    }
    
    public void showInfo()
    {
    	final TextView tUserId = (TextView)findViewById(R.id.txtUser_Id);
    	final TextView tUsername = (TextView)findViewById(R.id.txtUser_Username);
    	final TextView tPassword = (TextView)findViewById(R.id.txtUser_Password);
    	final TextView tFName = (TextView)findViewById(R.id.txtUser_Fname);
    	final TextView tLName = (TextView)findViewById(R.id.txtUser_Lname);
    	final TextView tTel = (TextView)findViewById(R.id.txtUser_Tel);
    	final TextView tDepastment = (TextView)findViewById(R.id.txtUser_Depastment);
    	
    	String url = "http://www.icmpsutrang.esy.es/android_www/getByMemberID.php";
    	
    	//String url = "http://10.0.3.2/android/getByMemberID.php";
    	//String url = "http://10.0.2.2/android/getByMemberID.php";
    	
    	Intent intent= getIntent();
    	User_Id = intent.getStringExtra("User_Id"); //User_Id

		List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("sMemberID", User_Id));

    	String resultServer  = getHttpPost(url,params);
    	String strMemberID = "";
    	String strUsername = "";
    	String strPassword = "";
    	String strName = "";
    	String strEmail = "";
    	String strTel = "";
    	String strDepName = "";
    	
    	JSONObject c;
		try {
			c = new JSONObject(resultServer);
			strMemberID = c.getString("User_Id");
			strUsername = c.getString("User_Username");
			strPassword = c.getString("User_Password");
			strName = c.getString("User_Fname");
			strEmail = c.getString("User_Lname");
			strTel = c.getString("User_Tel");
			strDepName = c.getString("Department_name");
			
			
			if(!strMemberID.equals(""))
			{
				tUserId.setText(strMemberID);
				tUsername.setText(strUsername);
				tPassword.setText(strPassword);
				tFName.setText(strName);
				tLName.setText(strEmail);
				tTel.setText(strTel);
				tDepastment.setText(strDepName);
			}
			else
			{
				tUserId.setText("-");
				tUsername.setText("-");
				tPassword.setText("-");
				tFName.setText("-");
				tLName.setText("-");
				tTel.setText("-");	
				tDepastment.setText("-");	
			}
        	
		} catch (JSONException e) {
			e.printStackTrace();
		}
    }
    
	public String getHttpPost(String url,List<NameValuePair> params) {
		StringBuilder str = new StringBuilder();
		HttpClient client = new DefaultHttpClient();
		HttpPost httpPost = new HttpPost(url);
		
		try {
			httpPost.setEntity(new UrlEncodedFormEntity(params));
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
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}