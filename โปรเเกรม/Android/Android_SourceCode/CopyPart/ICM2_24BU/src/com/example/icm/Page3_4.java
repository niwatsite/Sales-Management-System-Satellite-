package com.example.icm;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.HashMap;
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
import android.widget.AdapterView.OnItemClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.SimpleAdapter;

public class Page3_4 extends ActionBarActivity {

	String User_Id; //User_Id
    String strStoreLati11;
    String  strStoreLongi11;
    double strStoreLati1;
    double  strStoreLongi1;
    GPSTracker gps;

    @SuppressLint("NewApi")
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_page3_4);
        
    	Intent intent= getIntent();
    	User_Id = intent.getStringExtra("User_Id"); //User_Id

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }
        
        final Button btn1 = (Button) findViewById(R.id.btnsavemap);
        // Perform action on click
        btn1.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
            	SearchData1(); //ดึงข้อมูล Database
            }
        }); 
    }
    
	public void SearchData1()
    {
    	// listView1
        final ListView lisView1 = (ListView)findViewById(R.id.listView1); 	
   	 	// editText1
        final EditText inputText = (EditText)findViewById(R.id.txtKeyword); 
        
        String url = "http://www.icmpsutrang.esy.es/android_www/getCustID.php";
		
       //String url = "http://10.0.3.2/android/getCustID.php";
       // String url = "http://10.0.2.2/android/getCustR.php";
		
		// Paste Parameters
		List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("txtKeyword",inputText.getText().toString()));

		try {
			JSONArray data = new JSONArray(getJSONUrl(url,params));
			
			final ArrayList<HashMap<String, String>> MyArrList = new ArrayList<HashMap<String, String>>();
			HashMap<String, String> map;
			
			for(int i = 0; i < data.length(); i++){
                JSONObject c = data.getJSONObject(i);
                
    			map = new HashMap<String, String>();
    			map.put("CustomerID", c.getString("Cust_Id"));
    			map.put("Cust_Fname", c.getString("Cust_Fname"));
    			map.put("Cust_Lname", c.getString("Cust_Lname"));
    			map.put("Cust_Tel", c.getString("Cust_Tel"));
    			map.put("StoreLati", c.getString("StoreLati"));
    			map.put("StoreLongi", c.getString("StoreLongi"));
    			map.put("Cust_Id_Current", c.getString("Cust_Id_Current"));
    			//address
    			map.put("Cust_Number", c.getString("Cust_Number"));
    			map.put("Cust_Moo", c.getString("Cust_Moo"));
    			map.put("Cust_Road", c.getString("Cust_Road"));
    			map.put("Cust_District", c.getString("Cust_District"));
    			map.put("Cust_Prefecture", c.getString("Cust_Prefecture"));
    			map.put("Cust_Province", c.getString("Cust_Province"));
    			map.put("Cust_Code", c.getString("Cust_Code"));
    			MyArrList.add(map);
			}

	        SimpleAdapter sAdap;
	        sAdap = new SimpleAdapter(Page3_4.this, MyArrList, R.layout.activity_column2,
	               new String[] {"CustomerID","Cust_Fname","Cust_Lname"}, new int[] {R.id.ColCustomerID, R.id.ColFName, R.id.ColLName});      
	        lisView1.setAdapter(sAdap);
	        final AlertDialog.Builder viewDetail = new AlertDialog.Builder(this);
			// OnClick Item
			lisView1.setOnItemClickListener(new OnItemClickListener() {
				public void onItemClick(AdapterView<?> myAdapter, View myView,
						int position, long mylng) {

					final String strCustomerID = MyArrList.get(position).get("CustomerID")
							.toString();
					final String strFname = MyArrList.get(position).get("Cust_Fname")
							.toString();
					final String strLname = MyArrList.get(position).get("Cust_Lname")
							.toString();
					final String strCust_Id_Current = MyArrList.get(position).get("Cust_Id_Current")
							.toString();
					final String strTel = MyArrList.get(position).get("Cust_Tel")
							.toString();
					final String strStoreLati2 = MyArrList.get(position).get("StoreLati")
							.toString();
					final String strStoreLongi2 = MyArrList.get(position).get("StoreLongi")
							.toString();
					//address
					final String strCust_Number = MyArrList.get(position).get("Cust_Number")
							.toString();
					final String strCust_Moo = MyArrList.get(position).get("Cust_Moo")
							.toString();
					final String strCust_Road = MyArrList.get(position).get("Cust_Road")
							.toString();
					final String strCust_District = MyArrList.get(position).get("Cust_District")
							.toString();
					final String strCust_Prefecture = MyArrList.get(position).get("Cust_Prefecture")
							.toString();
					final String strCust_Province = MyArrList.get(position).get("Cust_Province")
							.toString();
					final String strCust_Code = MyArrList.get(position).get("Cust_Code")
							.toString();
					
					strStoreLati1 = Double.valueOf(strStoreLati2);
					strStoreLongi1 = Double.valueOf(strStoreLongi2);

					viewDetail.setIcon(android.R.drawable.btn_star_big_on);
					viewDetail.setTitle("ข้อมูลลูกค้า");
					viewDetail.setMessage("รหัส\t\t\t\t\t: " + strCustomerID + "\n"
							+ "ชื่อ\t\t\t\t\t\t: " + strFname + "\n" 
							+ "นามสกุล	\t: " + strLname + "\n" 
							+ "เบอร์โทร	\t: " + strTel + "\n" 
							+ "พิกัดลูกค้า " + "\n"
							+ "  "+strStoreLati2+ ","+ strStoreLongi2);
					viewDetail.setPositiveButton("ตกลง", new DialogInterface.OnClickListener()
		                {
		                  public void onClick(DialogInterface dialog, int which)
		                  {
		      				Intent BackActivity = new Intent();
		    				BackActivity.putExtra("strCustomerID",strCustomerID);
		    				BackActivity.putExtra("strFname",strFname);
		    				BackActivity.putExtra("strLname",strLname);
		    				BackActivity.putExtra("strCust_Id_Current",strCust_Id_Current);
		    				BackActivity.putExtra("strTel",strTel);
				    		BackActivity.putExtra("lat",strStoreLati1);
				    		BackActivity.putExtra("lng",strStoreLongi1);
				    		//add
		    				BackActivity.putExtra("strCust_Number",strCust_Number);
		    				BackActivity.putExtra("strCust_Moo",strCust_Moo);
		    				BackActivity.putExtra("strCust_Road",strCust_Road);
		    				BackActivity.putExtra("strCust_District",strCust_District);
		    				BackActivity.putExtra("strCust_Prefecture",strCust_Prefecture);
				    		BackActivity.putExtra("strCust_Province",strCust_Province);
				    		BackActivity.putExtra("strCust_Code",strCust_Code);
				    		//Chack
							BackActivity.putExtra("strType","1");
							BackActivity.putExtra("strPage","1");
		    				setResult(RESULT_OK, BackActivity);
		    				finish();
		                  }
		                });
					viewDetail.setNeutralButton("ยกเลิก", new DialogInterface.OnClickListener()
		                {
		                  public void onClick(DialogInterface dialog, int which)
		                  {
			      				Intent BackActivity = new Intent();
			    				setResult(RESULT_OK, BackActivity);
			    				finish();
		                  }
		                });
					viewDetail.show();   
				}
			});
		} catch (JSONException e) {	
			
			e.printStackTrace();
		}
    } 

	public String getJSONUrl(String url,List<NameValuePair> params) {
		StringBuilder str = new StringBuilder();
		HttpClient client = new DefaultHttpClient();
		HttpPost httpPost = new HttpPost(url);
		
		try {
			httpPost.setEntity(new UrlEncodedFormEntity(params,"UTF-8"));
			HttpResponse response = client.execute(httpPost);
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
				Log.e("Log", "Failed to download file..");
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
        getMenuInflater().inflate(R.menu.page3_4, menu);
        return true;
    }
    
    @Override
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
				
    	        AlertDialog.Builder dialog = new AlertDialog.Builder(Page3_4.this);
    	        dialog.setTitle("ออกจากระบบ");
    	        dialog.setIcon(R.drawable.ic_launcher);
    	        dialog.setCancelable(true);
    	        dialog.setMessage("คุณต้องการออกจากระบบใช่หรือไม่...");
    	        dialog.setPositiveButton("ใช่", new OnClickListener() {
    	            public void onClick(DialogInterface dialog, int which) {
            			Intent newActivity = new Intent(Page3_4.this,Login.class);
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