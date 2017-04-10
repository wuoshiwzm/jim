package testjava;



public class test03_24_00 {

	public static void main(String[] args) {
		long startTime=System.currentTimeMillis();   //获取开始时间  
		fib(40000000);  //测试的代码段  
		long endTime=System.currentTimeMillis(); //获取结束时间  
		System.out.println("  ");
		System.out.println("程序运行时间： "+(startTime-endTime)+"ms");   
	}
	
	//计算斐波那数
	
	public static void fib(int num){
	int[] fibArr = new int[num];
	fibArr[0] = 1;
	fibArr[1] = 1;
		
		for(int i=2;i<num;i++){
			fibArr[i] = fibArr[i-1]+fibArr[i-2];
		}
		
		System.out.println(fibArr[num-1]);
 
	}
	
	
	public static void permute(String str){
		
	}
	
	public void permute(char[] str, int low, int high){
		
	}
	
	
	//习题 1.5
	public static int ones( int n ){
		if(n<2){
			return 2;
		}else{
			return ones(n/2)+1;
		}
	}



}
