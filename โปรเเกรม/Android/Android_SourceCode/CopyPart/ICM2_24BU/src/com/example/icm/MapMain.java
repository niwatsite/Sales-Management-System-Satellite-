package com.example.icm;

import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;
import java.util.Locale;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.protocol.BasicHttpContext;
import org.apache.http.protocol.HttpContext;
import org.w3c.dom.Document;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.maps.model.PolylineOptions;

import android.content.Intent;
import android.graphics.Color;
import android.location.Address;
import android.location.Geocoder;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v4.app.FragmentActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Toast;

public class MapMain extends FragmentActivity {
	String User_Id; //User_Id
    GoogleMap mMap;
    GMapV2Direction md;

  // LatLng startPosition = new LatLng(13.687140112679154, 100.53525868803263);
  // LatLng endPosition = new LatLng(13.683660045847258, 100.53900808095932);
 
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.mapmain);

        Bundle intent = getIntent().getExtras();
    	final String FromstrStoreLati1= (String)intent.get("strStoreLati1");
    	final String FromstrStoreLongi1= (String)intent.get("strStoreLongi1");
    	double From11 = Double.valueOf(FromstrStoreLati1).doubleValue();
    	double From22 = Double.valueOf(FromstrStoreLongi1).doubleValue();
    	User_Id = (String)intent.get("User_Id"); //User_Id
        
    //	String total2 = Double.toString(From11);
    	
    	final String TostrStoreLati2= (String) intent.get("strStoreLati2");
    	final String TostrStoreLongi2= (String) intent.get("strStoreLongi2");
    	double To11 = Double.valueOf(TostrStoreLati2).doubleValue();
    	double To22 = Double.valueOf(TostrStoreLongi2).doubleValue();
    	
    	LatLng startPosition = new LatLng(From11,From22);
        LatLng endPosition = new LatLng(To11,To22);
        
        LatLng coordinates = new LatLng(To11,To22); 
       // LatLng coordinates = new LatLng(13.685400079263206, 100.537133384495975); 
     //  Toast.makeText(MapMain.this,FromstrStoreLati1+""+FromstrStoreLongi1, Toast.LENGTH_SHORT).show();
        
        Toast.makeText(MapMain.this,getAddress(To11,To22), Toast.LENGTH_SHORT).show();
         Toast.makeText(MapMain.this,getDistance(From11, From22, To11, To22), Toast.LENGTH_SHORT).show();

        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy 
                    = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        md = new GMapV2Direction();
        mMap = ((SupportMapFragment)getSupportFragmentManager()
                        .findFragmentById(R.id.map)).getMap();

      //  LatLng coordinates = new LatLng(13.685400079263206, 100.537133384495975);        
        mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(coordinates, 16));
        
        mMap.addMarker(new MarkerOptions().position(startPosition).title("Start"));
        mMap.addMarker(new MarkerOptions().position(endPosition).title("End"));
        
        Document doc = md.getDocument(startPosition 
                , endPosition, GMapV2Direction.MODE_DRIVING);
        int duration = md.getDurationValue(doc);
        String distance = md.getDistanceText(doc);
        String start_address = md.getStartAddress(doc);
        String copy_right = md.getCopyRights(doc);

        ArrayList<LatLng> directionPoint = md.getDirection(doc);
        PolylineOptions rectLine = new PolylineOptions().width(3).color(Color.RED);
        
        for(int i = 0 ; i < directionPoint.size() ; i++) {            
            rectLine.add(directionPoint.get(i));
        }
        
        mMap.addPolyline(rectLine);
    }
	//get km
    public String getDistance(double lat1, double lon1, double lat2, double lon2) {
        String result_in_kms = "";
        String url = "http://maps.google.com/maps/api/directions/xml?origin=" + lat1 + "," + lon1 + "&destination=" + lat2 + "," + lon2 + "&sensor=false&units=metric";
         
        /*        
        Mode ของ google map จะมี 3 mode คือ driving,walking และ bicycling
            ถ้าเราจะเปลี่ยน mode ก็เพิ่ม &mode=walking ต่อท้าย URL
        */
         
        String tag[] = {"text"};
        HttpResponse response = null;
        try {
            HttpClient httpClient = new DefaultHttpClient();
            HttpContext localContext = new BasicHttpContext();
            HttpPost httpPost = new HttpPost(url);
            response = httpClient.execute(httpPost, localContext);
            InputStream is = response.getEntity().getContent();
            DocumentBuilder builder = DocumentBuilderFactory.newInstance().newDocumentBuilder();
            Document doc = builder.parse(is);
            if (doc != null) {
                NodeList nl;
                ArrayList args = new ArrayList();
                for (String s : tag) {
                    nl = doc.getElementsByTagName(s);
                    if (nl.getLength() > 0) {
                        Node node = nl.item(nl.getLength() - 1);
                        args.add(node.getTextContent());
                    } else {
                        args.add(" - ");
                    }
                }
                result_in_kms = String.format("%s", args.get(0));
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result_in_kms;
    }
    //crate line
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
            }
        } catch (IOException e) {
            Log.e("tag", e.getMessage());
        }

        return result.toString();
    }

    
}
