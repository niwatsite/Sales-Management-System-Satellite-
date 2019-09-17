package com.example.icm;

import android.support.v7.app.ActionBarActivity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.DialogInterface.OnClickListener;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class Page4 extends ActionBarActivity {
	Button nextp1;
	Button nextp2;
	Button nextp3;
	
	String User_Id; //User_Id

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_page4);
		
    	Intent intent= getIntent();
    	User_Id = intent.getStringExtra("User_Id"); //User_Id
		
		 nextp1 = (Button) findViewById(R.id.btnser2);
	        nextp1.setOnClickListener(new View.OnClickListener(){
	 			@Override
	 			public void onClick(View v) {
	 				// TODO Auto-generated method stub
	 				Intent it = new Intent(Page4.this,Page4_3.class);
	 				it.putExtra("User_Id", User_Id);//User_Id
	 				startActivity(it);
	 			}
	 		});
		
		 nextp2 = (Button) findViewById(R.id.btnser3);
	        nextp2.setOnClickListener(new View.OnClickListener(){
	 			@Override
	 			public void onClick(View v) {
	 				// TODO Auto-generated method stub
	 				Intent it = new Intent(Page4.this,Page4_1.class);
	 				it.putExtra("User_Id", User_Id);//User_Id
	 				startActivity(it);
	 			}
	 		});
		 nextp3 = (Button) findViewById(R.id.btnser1);
		      nextp3.setOnClickListener(new View.OnClickListener(){
		 		@Override
		 		public void onClick(View v) {
		 			// TODO Auto-generated method stub
		 			Intent it = new Intent(Page4.this,Page4_2.class);
		 			it.putExtra("User_Id", User_Id);//User_Id
		 			startActivity(it);
		 		}
		 	});
	        
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.page4, menu);
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
        		
			/*case R.id.action_Service:
				
				Intent e = new Intent(getApplicationContext(),Page4.class);
				e.putExtra("User_Id", User_Id);//User_Id
        		startActivity(e);
        		
        		return true;
        	*/	
			case R.id.action_Exit:
				
	{
				
    	        AlertDialog.Builder dialog = new AlertDialog.Builder(Page4.this);
    	        dialog.setTitle("ออกจากระบบ");
    	        dialog.setIcon(R.drawable.ic_launcher);
    	        dialog.setCancelable(true);
    	        dialog.setMessage("คุณต้องการออกจากระบบใช่หรือไม่...");
    	        dialog.setPositiveButton("ใช่", new OnClickListener() {
    	            public void onClick(DialogInterface dialog, int which) {
            			Intent newActivity = new Intent(Page4.this,Login.class);
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
