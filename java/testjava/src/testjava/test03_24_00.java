package testjava;


public class test03_24_00 {

	public static void main(String[] args) {
		permute("abdc");
	}
	
	
	public  void permute(String str){
		
	}
	
	public void permute(char[] str, int low, int high){
		
	}
	
	
	//Ï°Ìâ 1.5
	public static int ones( int n ){
		if(n<2){
			return 2;
		}else{
			return ones(n/2)+1;
		}
	}
}
