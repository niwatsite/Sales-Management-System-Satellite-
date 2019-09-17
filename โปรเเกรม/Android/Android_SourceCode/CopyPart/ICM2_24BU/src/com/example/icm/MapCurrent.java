package com.example.icm;

import java.io.IOException;
import java.util.List;
import java.util.Locale;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.content.Context;
import android.content.Intent;
import android.support.v4.app.FragmentActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class MapCurrent extends FragmentActivity {
	
	String User_Id; //User_Id
	
    GoogleMap mMap;
    Marker mMarker;
    LocationManager lm;
    double lat, lng;
    //ซอย //ตำบล
    String Cust_District;
    //อำเภอ
    String Cust_Prefecture;
    //จังหวัด
    String Cust_Province;
    //รหัสไปรษณีย์
    String Cust_Code;
     
    
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_map_current);
        
    	Intent intent= getIntent();
    	User_Id = intent.getStringExtra("User_Id"); //User_Id
        
        mMap = ((SupportMapFragment)getSupportFragmentManager()
                .findFragmentById(R.id.map)).getMap();
		
        final Button btnBack = (Button) findViewById(R.id.btnsavemap);
        // Perform action on click
        btnBack.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
				Intent BackActivity = new Intent();
				BackActivity.putExtra("lat",lat);
				BackActivity.putExtra("lng",lng);
				//add
				//BackActivity.putExtra("strCust_District",Cust_District);
				//BackActivity.putExtra("strCust_Prefecture",Cust_Prefecture);
				//BackActivity.putExtra("strCust_Province",Cust_Province);
				//BackActivity.putExtra("strCust_Code",Cust_Code);
				BackActivity.putExtra("strPage","0");
				setResult(RESULT_OK, BackActivity);
				finish();
            }
        });
    }
    
    LocationListener listener = new LocationListener() {
        public void onLocationChanged(Location loc) {
            LatLng coordinate = new LatLng(loc.getLatitude()
                    , loc.getLongitude());
            lat = loc.getLatitude();
            lng = loc.getLongitude();
            
            Toast.makeText(MapCurrent.this,getAddress(lat,lng), Toast.LENGTH_SHORT).show();

            if(mMarker != null)
                mMarker.remove();
            
            mMarker = mMap.addMarker(new MarkerOptions()
                    .position(new LatLng(lat, lng)));
            mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(
                    coordinate, 16));
        }

        public void onStatusChanged(String provider, int status, Bundle extras) {}
        public void onProviderEnabled(String provider) {}
        public void onProviderDisabled(String provider) {}
    };
    
    private String getAddress(double To11, double To22) {
        StringBuilder result = new StringBuilder();
        try {
            Geocoder geocoder = new Geocoder(this, Locale.getDefault());
            List<Address> addresses = geocoder.getFromLocation(To11, To22, 1);
            if (addresses.size() > 0) {
                Address address = addresses.get(0);
                //ซอย //ตำบล
                result.append(address.getAddressLine(0)).append("\n");
                //อำเภอ
                result.append(address.getLocality()).append("\n");
                //จังหวัด
                result.append(address.getAdminArea()).append("\n");                
                //ชื่อประเทศ
                result.append(address.getCountryName()).append("\n");
                //รหัสประเทศ
                result.append(address.getCountryCode()).append("\n");
                //รหัสไปรษณีย์
                result.append(address.getPostalCode()).append("\n");
                
                //ซอย //ตำบล
                Cust_District = address.getAddressLine(0);
                //อำเภอ
                Cust_Prefecture = address.getLocality();
                //จังหวัด
                Cust_Province = address.getAdminArea();
                //รหัสไปรษณีย์
                Cust_Code = address.getPostalCode();
                 
            }
        } catch (IOException e) {
            Log.e("tag", e.getMessage());
        }

        return result.toString();
    }
    
    public void onResume() {
        super.onResume();
        
        lm = (LocationManager)getSystemService(Context.LOCATION_SERVICE);

        boolean isNetwork = 
                lm.isProviderEnabled(LocationManager.NETWORK_PROVIDER);
        boolean isGPS = 
                lm.isProviderEnabled(LocationManager.GPS_PROVIDER);

        if(isNetwork) {
            lm.requestLocationUpdates(LocationManager.NETWORK_PROVIDER
                    , 5000, 10, listener);
            Location loc = lm.getLastKnownLocation(
                    LocationManager.NETWORK_PROVIDER);
            if(loc != null) {
                lat = loc.getLatitude();
                lng = loc.getLongitude();
            }
        }
        
        if(isGPS) {
            lm.requestLocationUpdates(LocationManager.GPS_PROVIDER
                    , 5000, 10, listener);
            Location loc = lm.getLastKnownLocation(
                    LocationManager.GPS_PROVIDER);
            if(loc != null) {
                lat = loc.getLatitude();
                lng = loc.getLongitude();
            }
        }
    }
    
    public void onPause() {
        super.onPause();
        lm.removeUpdates(listener);
    }
    
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.map_current, menu);
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
				
				Intent f = new Intent(getApplicationContext(),Login.class);
				f.putExtra("User_Id", User_Id);//User_Id
        		startActivity(f);
        		
        		return true;

			}
		}

		
		return super.onOptionsItemSelected(item);
    
	}
}
