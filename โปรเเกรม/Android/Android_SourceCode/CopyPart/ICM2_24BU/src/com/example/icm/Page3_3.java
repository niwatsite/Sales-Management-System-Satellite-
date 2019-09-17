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
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import android.support.v7.app.ActionBarActivity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.DialogInterface.OnClickListener;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class Page3_3 extends ActionBarActivity {
	
Button nextmap;
double sProdPrice1;
String sProdID;
String sProdName;
int sCount;
double sProdPriceCD;
String sUser_Id;
double lat;
double lng;
String lat2;
String lng2;
//static final int REQUEST_CODE  = 123 ;
String strCustomerID;
String strFname;
String strLname;
String strCust_Id_Current;
String strTel;
String strChack;

String strCust_Number;
String strCust_Moo;
String strCust_Road;
String strCust_District;
String strCust_Prefecture;
String strCust_Province;
String strCust_Code;

String strType = "0";
String strPage = "0";

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_page3_3);
		
         Bundle intent = getIntent().getExtras();
    	 sProdID = (String)intent.get("sProdID");
    	 sProdName = (String)intent.get("sProdName");
     	 sProdPrice1 = intent.getDouble("sProdPrice1",0);
     	 
     	 sUser_Id = (String)intent.get("User_Id"); 
     	 
     	sCount = intent.getInt("sCount");
      	sProdPriceCD = intent.getDouble("sProdPriceCD",0);
     	// sCount = (integer)intent.get("sCount");
    	//sProdPriceCD = (String)intent.getDouble("sProdPriceCD");
        IntenData1();
        GetData2();
        
	        //Ser Customers
			Button nextCustSer = (Button) findViewById(R.id.btnCustSer);
			nextCustSer.setOnClickListener(new View.OnClickListener(){
		 			public void onClick(View v) {
		 				Intent it = new Intent(Page3_3.this,Page3_4.class);
		 				it.putExtra("User_Id", sUser_Id);//User_Id
		 				startActivityForResult(it,123);
		 			}
	 			});
	         //ser Maps
			 Button nextmap = (Button) findViewById(R.id.btnmain);
			 nextmap.setOnClickListener(new View.OnClickListener(){
		 			public void onClick(View v) {
		 				Intent it = new Intent(Page3_3.this,MapCurrent.class);
		 				it.putExtra("User_Id", sUser_Id);//User_Id
		 				startActivityForResult(it,456);
		 			}
	 			});
	        //SAVE
			 final AlertDialog.Builder adb = new AlertDialog.Builder(this);
			 Button nextSave = (Button) findViewById(R.id.btnSave);
			 nextSave.setOnClickListener(new View.OnClickListener(){	
		 			public void onClick(View v) {
						adb.setTitle("บันทึกข้อมูล");
							adb.setMessage("กรุณาทำการยืนยันบันทึกข้อมูล");
							adb.setNegativeButton("ยกเลิก", null);
							adb.setPositiveButton("ตกลง", new AlertDialog.OnClickListener() {
								public void onClick(DialogInterface dialog, int arg1) {
									SaveData();
								}
							});
							adb.show();
		 			}
		 		});
	}
	
    public boolean SaveData()
    {
    	final TextView sOrderId = (TextView)findViewById(R.id.txtOrderId);
		//show value Customers
		final TextView strFnameOut = (TextView)findViewById(R.id.txtNameF);
		final TextView strLnameOut = (TextView)findViewById(R.id.txtNameL);
		final TextView strTelOut = (TextView)findViewById(R.id.txtPhone);
		final TextView strCust_Id_CurrentOut = (TextView)findViewById(R.id.txtCust_Id_Current);
		//show value Customers add
		final TextView strCust_NumberOut = (TextView)findViewById(R.id.txtAdd1);
		final TextView strCust_MooOut = (TextView)findViewById(R.id.txtAdd2);
		final TextView strCust_RoadOut = (TextView)findViewById(R.id.txtAdd3);
		final TextView strCust_DistrictOut = (TextView)findViewById(R.id.txtAdd4);
		final TextView strCust_PrefectureOut = (TextView)findViewById(R.id.txtAdd5);
		final TextView strCust_ProvinceOut = (TextView)findViewById(R.id.txtAdd6);
		final TextView strCust_CodeOut = (TextView)findViewById(R.id.txtAdd7);

    		// Dialog
        	final AlertDialog.Builder ad = new AlertDialog.Builder(this);
        	
    		ad.setTitle("สถานะ");
    		ad.setIcon(android.R.drawable.btn_star_big_on); 
    		ad.setPositiveButton("Close", null);

    		// Check strFnameOut
    		if(strFnameOut.getText().length() == 0)
    		{
                ad.setMessage("กรุณากรอกข้อมูล ชื่อ ลูกค้า");
                ad.show();
                strFnameOut.requestFocus();
                return false;
    		}

    		//Check ""
 
    		// Check strLnameOut
    		if(strLnameOut.getText().length() == 0)
    		{
                ad.setMessage("กรุณากรอกข้อมูล นามสกุล ลูกค้า");
                ad.show();
                strLnameOut.requestFocus();
                return false;
    		}
    		// Check strCust_Id_CurrentOut
    		if(strCust_Id_CurrentOut.getText().length() == 0)
    		{
                ad.setMessage("กรุณากรอกข้อมูล เลขประจำตัวประชาชน ลูกค้า");
                ad.show();
                strCust_Id_CurrentOut.requestFocus();
                return false;
    		}
    		// Check strTelOut
    		if(strTelOut.getText().length() == 0)
    		{
                ad.setMessage("กรุณากรอกข้อมูล เบอร์โทร ลูกค้า");
                ad.show();
                strTelOut.requestFocus();
                return false;
    		}
    		/*
    		// Check strCust_NumberOut
    		if(strCust_NumberOut.getText().length() == 0)
    		{
                ad.setMessage("Please input [Number] ");
                ad.show();
                strCust_NumberOut.requestFocus();
                return false;
    		}
    		// Check strCust_MooOut
    		if(strCust_MooOut.getText().length() == 0)
    		{
                ad.setMessage("Please input [Moo] ");
                ad.show();
                strCust_MooOut.requestFocus();
                return false;
    		}
    		// Check strCust_RoadOut
    		if(strCust_RoadOut.getText().length() == 0)
    		{
                ad.setMessage("Please input [Road] ");
                ad.show();
                strCust_RoadOut.requestFocus();
                return false;
    		}
    		// Check strCust_DistrictOut
    		if(strCust_DistrictOut.getText().length() == 0)
    		{
                ad.setMessage("Please input [District] ");
                ad.show();
                strCust_DistrictOut.requestFocus();
                return false;
    		}
    		// Check strCust_PrefectureOut
    		if(strCust_PrefectureOut.getText().length() == 0)
    		{
                ad.setMessage("Please input [Prefecture] ");
                ad.show();
                strCust_PrefectureOut.requestFocus();
                return false;
    		}
    		// Check strCust_ProvinceOut
    		if(strCust_ProvinceOut.getText().length() == 0)
    		{
                ad.setMessage("Please input [ProvinceOut] ");
                ad.show();
                strCust_ProvinceOut.requestFocus();
                return false;
    		}
    		// Check strCust_CodeOut
    		if(strCust_CodeOut.getText().length() == 0)
    		{
                ad.setMessage("Please input [CodeOut] ");
                ad.show();
                strCust_CodeOut.requestFocus();
                return false;
    		}
*/
            String url = "http://www.icmpsutrang.esy.es/android_www/PostCustInPut.php";
    		
            //String url = "http://10.0.3.2/android/PostCustInPut.php";
    		//String url = "http://10.0.2.2/android/PostCustInPut.php";
            
    		List<NameValuePair> params = new ArrayList<NameValuePair>();
    		//AddOrder_sale_detail
    		params.add(new BasicNameValuePair("strProd_Id", String.valueOf(sProdID)));
    		params.add(new BasicNameValuePair("strProd_Num_Count", String.valueOf(sCount)));
    		//params.add(new BasicNameValuePair("strProd_Num_Count_Price", String.valueOf(sProdPriceCD)));
    		//params.add(new BasicNameValuePair("strProd_Price_Result", String.valueOf(sProdPrice1)));
            //AddOrder_sale
            params.add(new BasicNameValuePair("strOrder_Id", sOrderId.getText().toString()));
            params.add(new BasicNameValuePair("strUser_Id", String.valueOf(sUser_Id)));
            //AddCustomer 
    		params.add(new BasicNameValuePair("strCust_Id", String.valueOf(strCustomerID)));
            params.add(new BasicNameValuePair("strFnameOut", strFnameOut.getText().toString()));
            params.add(new BasicNameValuePair("strLnameOut", strLnameOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_TelOut", strTelOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_Id_CurrentOut", strCust_Id_CurrentOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_NumberOut", strCust_NumberOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_MooOut", strCust_MooOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_RoadOut", strCust_RoadOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_DistrictOut", strCust_DistrictOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_PrefectureOut", strCust_PrefectureOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_ProvinceOut", strCust_ProvinceOut.getText().toString()));
            params.add(new BasicNameValuePair("strCust_CodeOut", strCust_CodeOut.getText().toString()));
            params.add(new BasicNameValuePair("lat", String.valueOf(lat2)));
            params.add(new BasicNameValuePair("lng", String.valueOf(lng2)));
            params.add(new BasicNameValuePair("strType", String.valueOf(strType)));
            
        	 String resultServer  = getHttpPost(url,params);
            
            /*** Default Value ***/
        	String strStatusID = "0";
        	String strError = "Unknow Status!";
        	
        	JSONObject c;
			try {
				c = new JSONObject(resultServer);
            	strStatusID = c.getString("StatusID");
            	strError = c.getString("Error");
			} catch (JSONException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			// Prepare Save Data
			if(strStatusID.equals("0"))
			{
                ad.setMessage(strError);
                ad.show();
			}
			else
			{
				
				Toast.makeText(Page3_3.this, "ทำรายการเรียบร้อยเเล้ว", Toast.LENGTH_SHORT).show();
				Intent newActivity = new Intent(Page3_3.this,Main.class);
		    	newActivity.putExtra("User_Id", sUser_Id);//User_Id
				startActivity(newActivity);
				
			}
    	return true;
    }
    
    private String getHttpPost(String url, List<NameValuePair> params) {
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
    
	protected void onActivityResult(int requestCode,int resultCode,Intent data) {
		if (requestCode==123) {
			if (resultCode==RESULT_OK) {
				//get maps
				 lat = data.getDoubleExtra("lat",0);
				 lng = data.getDoubleExtra("lng",0);
				 lat2 = String.valueOf(lat);
				 lng2 = String.valueOf(lng);
				 Toast.makeText(Page3_3.this,lat2+","+lng2, Toast.LENGTH_SHORT).show();
				 
				 //get Customers
				 strCustomerID = data.getStringExtra("strCustomerID");
				 strFname = data.getStringExtra("strFname");
				 strLname = data.getStringExtra("strLname");
				 strCust_Id_Current = data.getStringExtra("strCust_Id_Current");
				 strTel = data.getStringExtra("strTel");
				 strChack = data.getStringExtra("strChack");
				 //get Customers add
				 strCust_Number = data.getStringExtra("strCust_Number");
				 strCust_Moo = data.getStringExtra("strCust_Moo");
				 strCust_Road = data.getStringExtra("strCust_Road");
				 strCust_District = data.getStringExtra("strCust_District");
				 strCust_Prefecture = data.getStringExtra("strCust_Prefecture");
				 strCust_Province = data.getStringExtra("strCust_Province");
				 strCust_Code = data.getStringExtra("strCust_Code");
				 //show Type
				 strType = data.getStringExtra("strType");
				 strPage = data.getStringExtra("strPage");
				 IntenData2();
			//	 Toast.makeText(Page3_2.this,strPage, Toast.LENGTH_SHORT).show();
			}
		}
			if (requestCode==456) {
				if (resultCode==RESULT_OK) {
					//get maps
					 lat = data.getDoubleExtra("lat",0);
					 lng = data.getDoubleExtra("lng",0);
					 lat2 = String.valueOf(lat);
					 lng2 = String.valueOf(lng);
					 Toast.makeText(Page3_3.this,lat2+","+lng2, Toast.LENGTH_SHORT).show();
			//		 Toast.makeText(Page3_2.this,strPage, Toast.LENGTH_SHORT).show();
				}
		   }
	}
	
    private void IntenData2() {
				//show value Customers
					final TextView strFnameOut = (TextView)findViewById(R.id.txtNameF);
					final TextView strLnameOut = (TextView)findViewById(R.id.txtNameL);
					final TextView strTelOut = (TextView)findViewById(R.id.txtPhone);
					final TextView strCust_Id_CurrentOut = (TextView)findViewById(R.id.txtCust_Id_Current);
					//show value Customers add
					final TextView strCust_NumberOut = (TextView)findViewById(R.id.txtAdd1);
					final TextView strCust_MooOut = (TextView)findViewById(R.id.txtAdd2);
					final TextView strCust_RoadOut = (TextView)findViewById(R.id.txtAdd3);
					final TextView strCust_DistrictOut = (TextView)findViewById(R.id.txtAdd4);
					final TextView strCust_PrefectureOut = (TextView)findViewById(R.id.txtAdd5);
					final TextView strCust_ProvinceOut = (TextView)findViewById(R.id.txtAdd6);
					final TextView strCust_CodeOut = (TextView)findViewById(R.id.txtAdd7);
					
				//set value Customers
					strFnameOut.setText(strFname);
					strLnameOut.setText(strLname);
					strTelOut.setText(strTel);
					strCust_Id_CurrentOut.setText(strCust_Id_Current);
					//set value Customers add
					strCust_NumberOut.setText(strCust_Number);
					strCust_MooOut.setText(strCust_Moo);
					strCust_RoadOut.setText(strCust_Road);
					strCust_DistrictOut.setText(strCust_District);
					strCust_PrefectureOut.setText(strCust_Prefecture);
					strCust_ProvinceOut.setText(strCust_Province);
					strCust_CodeOut.setText(strCust_Code);
	}

	public void GetData2()
    {
    	// txtUserId,txtUserId,txtUsername,txtPassword,txtFName,txtLName,txtTel
    	final TextView result = (TextView)findViewById(R.id.txtOrderId);
    	
    	String url2 = "http://www.icmpsutrang.esy.es/android_www/getOrdertID.php";
    	
    	//String url2 = "http://10.0.3.2/android/getOrdertID.php";
    	//String url = "http://10.0.2.2/android/getOrdertID.php";

            	String resultServer  = getHttpGet2(url2);
            	result.setText(resultServer);
            }

	public String getHttpGet2(String url2) {
		StringBuilder str2 = new StringBuilder();
		HttpClient client = new DefaultHttpClient();
		HttpGet httpGet2 = new HttpGet(url2);
		
		try {
			HttpResponse response = client.execute(httpGet2);
			StatusLine statusLine = response.getStatusLine();
			int statusCode = statusLine.getStatusCode();
			if (statusCode == 200) { // Status OK
				HttpEntity entity = response.getEntity();
				InputStream content = entity.getContent();
				BufferedReader reader = new BufferedReader(new InputStreamReader(content));
				String line;
				while ((line = reader.readLine()) != null) {
					str2.append(line);
				}
			} else {
				Log.e("Log", "Failed to download result..");
			}
		} catch (ClientProtocolException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return str2.toString();
	}

	private void IntenData1() {
		final TextView sUserNameOut = (TextView)findViewById(R.id.txtUser);
		final TextView sProdNameOut = (TextView)findViewById(R.id.txtPName);
		final TextView sProdPriceOut = (TextView)findViewById(R.id.txtPPrice);
		final TextView sCountOut = (TextView)findViewById(R.id.txtPCount);
		final TextView sProdPriceCDOut = (TextView)findViewById(R.id.txtPPriceCd);
		sUserNameOut.setText(sUser_Id);
		
		sProdNameOut.setText(sProdName);
		
		String sProdPriceT = String.valueOf(sProdPrice1);
		sProdPriceOut.setText(sProdPriceT);
				
		String sCountT = String.valueOf(sCount);
		sCountOut.setText(sCountT);
		
		String sProdPriceCDT = String.valueOf(sProdPriceCD);
		sProdPriceCDOut.setText(sProdPriceCDT);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.page3_3, menu);
		return true;
	}

	public boolean onOptionsItemSelected(MenuItem item){	
    	{
			switch (item.getItemId()) {
			
			case R.id.action_Main:
				
				Intent a = new Intent(getApplicationContext(),Main.class);
				a.putExtra("User_Id", sUser_Id);//User_Id
        		startActivity(a);	
        		
        		return true;
		
			case R.id.action_Proshow:
				
				Intent b = new Intent(getApplicationContext(),Page1.class);
				b.putExtra("User_Id", sUser_Id);//User_Id
        		startActivity(b);
        		
        		return true;
        		
			case R.id.action_Model:
				
				Intent c = new Intent(getApplicationContext(),Page2.class);
				c.putExtra("User_Id", sUser_Id);//User_Id
        		startActivity(c);
        		
        		return true;
        	
			case R.id.action_Order:
				
				Intent d = new Intent(getApplicationContext(),Page3.class);
				d.putExtra("User_Id", sUser_Id);//User_Id
        		startActivity(d);
        		
        		return true;
        		
			case R.id.action_Service:
				
				Intent e = new Intent(getApplicationContext(),Page4.class);
				e.putExtra("User_Id", sUser_Id);//User_Id
        		startActivity(e);
        		
        		return true;
        		
			case R.id.action_Exit:
				
	{
				
    	        AlertDialog.Builder dialog = new AlertDialog.Builder(Page3_3.this);
    	        dialog.setTitle("ออกจากระบบ");
    	        dialog.setIcon(R.drawable.ic_launcher);
    	        dialog.setCancelable(true);
    	        dialog.setMessage("คุณต้องการออกจากระบบใช่หรือไม่...");
    	        dialog.setPositiveButton("ใช่", new OnClickListener() {
    	            public void onClick(DialogInterface dialog, int which) {
            			Intent newActivity = new Intent(Page3_3.this,Login.class);
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
