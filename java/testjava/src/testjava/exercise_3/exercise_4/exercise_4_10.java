package testjava.exercise_3.exercise_4;

import java.io.*;

public class exercise_4_10 {
	
	public void list(File f){
		list(f,0);
	}
	
	public void list(File f,int depth){
		printName(f,depth);
		
		if(f.isDirectory()){
			File[] files = f.listFiles();
			
			for(File l:files){
				list(l,depth+1);
			}
		}
	}
	
	void printName(File f, int depth){
		String name = f.getName();
		
		for(int i=0;i<depth;i++){
			System.out.println("  ");
		}
		if(f.isDirectory()){
			System.out.println("Dir: "+ name);
		}else{
			System.out.println(f.getName() + "" + f.length());
		}
	}
	
	public static void main(String args[]){
		exercise_4_10 L  = new exercise_4_10();
		File f = new File("d:\\ ");
		L.list(f);
	}
	
	
	
	
	
}