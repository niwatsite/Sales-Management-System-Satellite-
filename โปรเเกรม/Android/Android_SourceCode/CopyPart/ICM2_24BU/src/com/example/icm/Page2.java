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
import android.widget.Button;
import android.widget.SimpleAdapter;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

public class Page2 extends ActionBarActivity {
	
		String User_Id; //User_Id

	    String sProdName;
	    String sProdPrice1;
	    String sProdID;
	    String sTax_Id;
	    String sTax_Mon;
	    String sTax_Rate; 
	    TextView txtCost1;
	    double amount1;
	    double amount2;
	    double amount3;
	    double amount4;
	    int amountcount;

	    Button btnSubmit;
    
    @SuppressLint("NewApi")
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_page2);
        
        Bundle intent = getIntent().getExtras();
     	User_Id = (String)intent.get("User_Id"); //User_Id
        
        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }
        SpinnerData1();
        SpinnerData2();
        ResultData3(); 
    }

	private void SpinnerData2() {
		// spinner1 Rate
        final Spinner spin = (Spinner)findViewById(R.id.spinner2); 
        
        String url = "http://www.icmpsutrang.esy.es/android_www/getTax.php";
        //String url = "http://10.0.3.2/android_www/getTax.php";
		//String url = "http://10.0.2.2/android_www/getTax.php";

		try {
			JSONArray data = new JSONArray(getJSONUrl(url));
			final ArrayList<HashMap<String, String>> MyArrList = new ArrayList<HashMap<String, String>>();
			HashMap<String, String> map;
			for(int i = 0; i < data.length(); i++){
                JSONObject c = data.getJSONObject(i);
                
    			map = new HashMap<String, String>();
    			map.put("Tax_Id", c.getString("Tax_Id"));
    			map.put("Tax_Mon", c.getString("Tax_Mon"));
    			map.put("Tax_Rate", c.getString("Tax_Rate"));
    			MyArrList.add(map);	
			}
	        SimpleAdapter sAdap;
	        sAdap = new SimpleAdapter(Page2.this, MyArrList, R.layout.activity_column_tax,
	                new String[] {"Tax_Mon"}, new int[] {R.id.ColFName}); 
	        
	        spin.setAdapter(sAdap);
	        spin.setOnItemSelectedListener(new OnItemSelectedListener() {

				public void onItemSelected(AdapterView<?> arg0, View selectedItemView,
						int position, long id) {
						sTax_Id = MyArrList.get(position).get("Tax_Id")
							.toString();
						sTax_Mon = MyArrList.get(position).get("Tax_Mon")
								.toString();
						sTax_Rate = MyArrList.get(position).get("Tax_Rate")
							.toString();
					 
						String data2 = sTax_Mon;
						amountcount = Integer.parseInt(data2); // value Mon

						String data3 = sTax_Rate;
						amount2 = Double.parseDouble(data3); // value คำนวณ rate
				
	}
				public void onNothingSelected(AdapterView<?> arg0) {
		      	    Toast.makeText(Page2.this,
	        	    		"Your Selected : Nothing",
	        	    			Toast.LENGTH_SHORT).show();	
				}
	        });
		} catch (JSONException e) {
			e.printStackTrace();
		}	
	}

	private void ResultData3() {

			btnSubmit = (Button)findViewById(R.id.btnSubmit);
			btnSubmit.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View v) {
				//ราคาผ่อน = ราคาปกติ +(ราคาปกติ*ราคาผ่อน)
				amount4 = amount1+(amount1*amount2);
				//ราคาผ่อน/n = ราคาผ่อน/n
				amount3 = amount4/amountcount;
				 
	                AlertDialog.Builder builder = new AlertDialog.Builder(Page2.this);
	                builder.setTitle("ข้อมูลการผ่อนชำระ");
	                builder.setMessage("ราคาสินค้า : " + (String.format("%.2f", amount1)) + " บาท\n\nจำนวนงวด : " 
	                        + amountcount + " งวด\n\nราคาผ่อน   : "+(String.format("%.2f", amount4))+" หรือ\n\nคิดเป็น       : "
	                		+(String.format("%.2f", amount3))+" บาท/เดือน");    
	                builder.setPositiveButton("สั่งซื้อ", new DialogInterface.OnClickListener()
	                {
	                  public void onClick(DialogInterface dialog, int which)
	                  {
	  					Intent newActivity = new Intent(Page2.this,Page3_3.class);
		 		    	  newActivity.putExtra("sProdID", sProdID);
		 		    	  newActivity.putExtra("sProdName", sProdName);
		 		    	  newActivity.putExtra("sProdPrice1", amount1);
		 		    	  newActivity.putExtra("sCount", amountcount);
		 		    	  newActivity.putExtra("sProdPriceCD", amount4);
		 		    	  newActivity.putExtra("User_Id", User_Id);//User_Id
						startActivity(newActivity);
	                  }
	                });
	                builder.setNeutralButton("ยกเลิก", new DialogInterface.OnClickListener()
	                {
	                  public void onClick(DialogInterface dialog, int which)
	                  {

	                  }
	                });
	                builder.show();   
			}
			
		});
	}

	private void SpinnerData1() {
		// spinner1 Product
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
	        sAdap = new SimpleAdapter(Page2.this, MyArrList, R.layout.activity_column_product,
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
					 
						txtCost1 = (TextView)findViewById(R.id.textView47);
						String data1 = sProdPrice1;
						amount1 = Double.parseDouble(data1); // value คำนวณ
						txtCost1.setText(sProdPrice1);
				}
				public void onNothingSelected(AdapterView<?> arg0) {
		      	    Toast.makeText(Page2.this,
	        	    		"Your Selected : Nothing",
	        	    			Toast.LENGTH_SHORT).show();	
				}
	        });
		} catch (JSONException e) {
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
        getMenuInflater().inflate(R.menu.page2, menu);
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
        		
			/*case R.id.action_Model:
				
				Intent c = new Intent(getApplicationContext(),Page2.class);
				c.putExtra("User_Id", User_Id);//User_Id
        		startActivity(c);
        		
        		return true;
        	*/	
			case R.id.action_Order:
				
				Intent d = new Intent(getApplicationContext(),Page3.class);
				d.putExtra("User_Id", User_Id);//User_Id
        		startActivity(d);
        		
        		return true;
        		
			case R.id.action_Service:
				
				Intent e = new Intent(getApplicationContext(),Page4.class);
				e.putExtra("User_Id", User_Id);//User_Id
        		startActivity(e);
        		
        		return true;
        		
			case R.id.action_Exit:
			{
				
    	        AlertDialog.Builder dialog = new AlertDialog.Builder(Page2.this);
    	        dialog.setTitle("ออกจากระบบ");
    	        dialog.setIcon(R.drawable.ic_launcher);
    	        dialog.setCancelable(true);
    	        dialog.setMessage("คุณต้องการออกจากระบบใช่หรือไม่...");
    	        dialog.setPositiveButton("ใช่", new OnClickListener() {
    	            public void onClick(DialogInterface dialog, int which) {
            			Intent newActivity = new Intent(Page2.this,Login.class);
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