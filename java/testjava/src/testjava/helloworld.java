package testjava;



public class helloworld {

	public static void main(String[] args) {
		output(-4539872316.211212512);		
	}
	static void output(double num) {
		// 整数部分'
	
		long digit = (long) Math.abs(num);
		
		if(digit < 1) {

			System.out.print("0");

		}else{
			System.out.print(digit);
		}
		
		//小数部分
		
		double decimal = Math.abs(num - (long)num);
		if(decimal > 0){
			printdigit(decimal);
		}else{
			System.out.print("0");
		}

	}
	
	static void printdigit(double  num){
		if(num >1){
			printdigit((long)(num / 10));
			System.out.print(s);
		}
	}
}
