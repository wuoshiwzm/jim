package testjava;

import java.awt.Shape;

public class helloworld {
	
public static void main(String[] args) {
		
		GenericMemoryCell<Integer> m = new GenericMemoryCell<>();
		
		m.write(123);
		
		int val = m.read();
		
		System.out.println(val);
	}


 
	
}
