package com.example.icm;

import android.support.v7.app.ActionBarActivity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.DialogInterface.OnClickListener;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

public class Main extends ActionBarActivity {
	
	Button nextp2;
	Button nextp3;
	Button nextp4;
	
	String User_Id; //User_Id

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
    	Intent intent= getIntent();
    	User_Id = intent.getStringExtra("User_Id"); //User_Id
				
        final Button btnBack = (Button) findViewById(R.id.btnBack);
        // Perform action on click
        	btnBack.setOnClickListener(new View.OnClickListener() {
        		public void onClick(View v) {
        	        AlertDialog.Builder dialog = new AlertDialog.Builder(Main.this);
        	        dialog.setTitle("ออกจากระบบ");
        	        dialog.setIcon(R.drawable.ic_launcher);
        	        dialog.setCancelable(true);
        	        dialog.setMessage("คุณต้องการออกจากระบบใช่หรือไม่...");
        	        dialog.setPositiveButton("ใช่", new OnClickListener() {
        	            public void onClick(DialogInterface dialog, int which) {
                			Intent newActivity = new Intent(Main.this,Login.class);
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
          });
		
		 Button nextp1 = (Button) findViewById(R.id.btnmain);
	        nextp1.setOnClickListener(new View.OnClickListener(){
	 			@Override
	 			public void onClick(View v) {
	 				Intent it = new Intent(Main.this,Page1.class);
	 				it.putExtra("User_Id", User_Id);//User_Id
	 				startActivity(it);
	 			}
	 		});
		
		 Button nextp2 = (Button) findViewById(R.id.Button2);
	        nextp2.setOnClickListener(new View.OnClickListener(){
	 			@Override
	 			public void onClick(View v) {
	 				Intent it = new Intent(Main.this,Page2.class);
	 				it.putExtra("User_Id", User_Id);//User_Id
	 				startActivity(it);
	 			}
	 		});
	        
		 Button nextp3 = (Button) findViewById(R.id.Button3);
		        nextp3.setOnClickListener(new View.OnClickListener(){
	 			@Override
	 			public void onClick(View v) {
	 				Intent it = new Intent(Main.this,Page3.class);
	 				it.putExtra("User_Id", User_Id);//User_Id
	 				startActivity(it);
		 		}
		 	});
		        
		Button nextp4 = (Button) findViewById(R.id.Button4);
			    nextp4.setOnClickListener(new View.OnClickListener(){
		 		@Override
		 		public void onClick(View v) {
		 			Intent it = new Intent(Main.this,Page4.class);
		 			it.putExtra("User_Id", User_Id);//User_Id
		 			startActivity(it);
			 	}
			 });
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {

		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}
}
