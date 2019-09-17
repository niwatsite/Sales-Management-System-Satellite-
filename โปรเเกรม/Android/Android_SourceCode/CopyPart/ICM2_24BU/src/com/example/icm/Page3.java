package com.example.icm;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.HashMap;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.StatusLine;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import android.os.Bundle;
import android.os.StrictMode;
import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.DialogInterface.OnClickListener;
import android.support.v7.app.ActionBarActivity;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.view.Menu;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.SimpleAdapter;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

public class Page3 extends ActionBarActivity {
	

	String User_Id; //User_Id
	
	 	Spinner spinnerDropDown;

	    String sProdPrice1;
	    String sProdPrice2;
	    String sProdID;
	    String sProdName;
	    TextView txtCost2;
	    double amount1;
	    RadioButton myOption1, myOption2;
	    Button nextp3_1;
    
    @SuppressLint("NewApi")
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_page3);
        
    	Intent intent= getIntent();
    	User_Id = intent.getStringExtra("User_Id"); //User_Id

		 nextp3_1 = (Button) findViewById(R.id.btnSubmit);
		 nextp3_1.setOnClickListener(new View.OnClickListener(){

	 			@Override
	 			public void onClick(View v) {
	 				// TODO Auto-generated method stub
	 		    ResultData2();
	 		       
	 		       if (myOption1.isChecked()==true) {
	 		    	   Intent newActivity = new Intent(Page3.this,Page3_2.class);
	 		    	   newActivity.putExtra("sProdID", sProdID);
	 		    	   newActivity.putExtra("sProdName", sProdName);
	 		    	   newActivity.putExtra("sProdPrice1", sProdPrice1);
	 		    	   newActivity.putExtra("User_Id", User_Id);//User_Id
	 		    	   startActivity(newActivity);
	 		       }else {
	 		    	  Intent newActivity = new Intent(Page3.this,Page3_1.class);
	 		    	  newActivity.putExtra("sProdID", sProdID);
	 		    	  newActivity.putExtra("sProdName", sProdName);
	 		    	  newActivity.putExtra("sProdPrice1", sProdPrice1);
	 		    	  newActivity.putExtra("User_Id", User_Id);//User_Id
		 			  startActivity(newActivity);
	 		       }
	 			}
	 		});
        
        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }
        SpinnerData1();

    }

	private void ResultData2() {
        myOption1 = (RadioButton)findViewById(R.id.radio0);
        myOption2 = (RadioButton)findViewById(R.id.radio1); 
	}

	private void SpinnerData1() {
		  // spinner1
        final Spinner spin = (Spinner)findViewById(R.id.spinner1); 
        
        String url = "http://www.icmpsutrang.esy.es/android_www/getProdectPrice.php";
        
        //String url = "http://10.0.3.2/android/getProdectPrice.php";
		//String url = "http://10.0.2.2/android/getProdectPrice.php";

		try {
			
			JSONArray data = new JSONArray(getJSONUrl(url));
			final ArrayList<HashMap<String, String>> MyArrList = new ArrayList<HashMap<String, String>>();
			HashMap<String, String> map;
			
			for(int i = 0; i < data.length(); i++){
                JSONObject c = data.getJSONObject(i);
                
    			map = new HashMap<String, String>();
    			map.put("Prod_Id", c.getString("Prod_Id"));
    			map.put("Prod_Name", c.getString("Prod_Name"));
    			map.put("Prod_SalePrice", c.getString("Prod_SalePrice"));
    			MyArrList.add(map);	
			}
	        SimpleAdapter sAdap;
	        sAdap = new SimpleAdapter(Page3.this, MyArrList, R.layout.activity_column_product,
	                new String[] {"Prod_Name"}, new int[] {R.id.ColFName});      
	        spin.setAdapter(sAdap);
	        spin.setOnItemSelectedListener(new OnItemSelectedListener() {

				public void onItemSelected(AdapterView<?> arg0, View selectedItemView,
						int position, long id) {
					 sProdID = MyArrList.get(position).get("Prod_Id")
							.toString();
					 sProdName = MyArrList.get(position).get("Prod_Name")
							.toString();
					 sProdPrice1 = MyArrList.get(position).get("Prod_SalePrice")
							.toString();
					 
					 txtCost2 = (TextView)findViewById(R.id.textView47);

	                 String data1 = sProdPrice1;
	                 amount1 = Double.parseDouble(data1); // value?

					 txtCost2.setText(sProdPrice1);
	}
				public void onNothingSelected(AdapterView<?> arg0) {
					// TODO Auto-generated method stub
		      	    Toast.makeText(Page3.this,
	        	    		"Your Selected : Nothing",
	        	    			Toast.LENGTH_SHORT).show();	
				}
	        });
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public String getJSONUrl(String url) {
		StringBuilder str = new StringBuilder();
		HttpClient client = new DefaultHttpClient();
		HttpGet httpGet = new HttpGet(url);
		try {
			HttpResponse response = client.execute(httpGet);
			StatusLine statusLine = response.getStatusLine();
			int statusCode = statusLine.getStatusCode();
			if (statusCode == 200) { // Download OK
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
        getMenuInflater().inflate(R.menu.page3, menu);
        return true;
    }
    
    public boolean onOptionsItemSelected(MenuItem item){	
    	{
			switch (item.getItemId()) {
			
			case R.id.action_Main:
				
				Intent a = new Intent(getApplicationContext(),Main.class);
				a.putExtra("User_Id", User_Id);//User_Id
        		startActivity(a);	
        		
        		return true;
		
			case R.id.action_Proshow:
				
				Intent b = new Intent(getApplicationContext(),Page1.class);
				b.putExtra("User_Id", User_Id);//User_Id
        		startActivity(b);
        		
        		return true;
        		
			case R.id.action_Model:
				
				Intent c = new Intent(getApplicationContext(),Page2.class);
				c.putExtra("User_Id", User_Id);//User_Id
        		startActivity(c);
        		
        		return true;
        	
			/*case R.id.action_Order:
				
				Intent d = new Intent(getApplicationContext(),Page3.class);
				d.putExtra("User_Id", User_Id);//User_Id
        		startActivity(d);
        		
        		return true;
        	*/	
			case R.id.action_Service:
				
				Intent e = new Intent(getApplicationContext(),Page4.class);
				e.putExtra("User_Id", User_Id);//User_Id
        		startActivity(e);
        		
        		return true;
        		
			case R.id.action_Exit:
				
	{
				
    	        AlertDialog.Builder dialog = new AlertDialog.Builder(Page3.this);
    	        dialog.setTitle("ออกจากระบบ");
    	        dialog.setIcon(R.drawable.ic_launcher);
    	        dialog.setCancelable(true);
    	        dialog.setMessage("คุณต้องการออกจากระบบใช่หรือไม่...");
    	        dialog.setPositiveButton("ใช่", new OnClickListener() {
    	            public void onClick(DialogInterface dialog, int which) {
            			Intent newActivity = new Intent(Page3.this,Login.class);
            			startActivity(newActivity);
    	                finish();
    	            }
    	        });
    	        
    	        dialog.setNegativeButton("ไม่ใช่", new OnClickListener() {
    	            public void onClick(DialogInterface dialog, int which) {
    	                dialog.cancel();
    	            }
    	        });
    	        
    	        dialog.show();  
    	       
          }
        		return true;

			}
		}

		
		return super.onOptionsItemSelected(item);
    
	}
    
}